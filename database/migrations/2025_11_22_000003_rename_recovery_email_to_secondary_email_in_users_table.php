<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Limpiar duplicados manteniendo solo el usuario con ID más pequeño
        DB::table('users')
            ->whereNotNull('recovery_email')
            ->orderBy('id')
            ->eachById(function ($user) {
                // Ver si existe otro usuario más antiguo con el mismo correo
                $exists = DB::table('users')
                    ->where('recovery_email', $user->recovery_email)
                    ->where('id', '<', $user->id)
                    ->exists();

                if ($exists) {
                    DB::table('users')->where('id', $user->id)->update([
                        'recovery_email' => null,
                        'recovery_email_verified_at' => null,
                        'recovery_verification_code' => null,
                        'recovery_code_expires_at' => null,
                    ]);
                }
            });

        // 2. Renombrar columnas (Laravel abstrae diferencias entre motores)
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('recovery_email', 'secondary_email');
            $table->renameColumn('recovery_email_verified_at', 'secondary_email_verified_at');
            $table->renameColumn('recovery_verification_code', 'secondary_email_verification_code');
            $table->renameColumn('recovery_code_expires_at', 'secondary_email_code_expires_at');
        });

        // 3. Nuevo índice único
        Schema::table('users', function (Blueprint $table) {
            $table->unique('secondary_email', 'users_secondary_email_unique');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_secondary_email_unique');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('secondary_email', 'recovery_email');
            $table->renameColumn('secondary_email_verified_at', 'recovery_email_verified_at');
            $table->renameColumn('secondary_email_verification_code', 'recovery_verification_code');
            $table->renameColumn('secondary_email_code_expires_at', 'recovery_code_expires_at');
        });
    }
};
