<?php

namespace IncadevUns\CoreDomain\Database\Seeders;

use Illuminate\Database\Seeder;
use IncadevUns\CoreDomain\Models\Iniciative;
use IncadevUns\CoreDomain\Models\IniciativeEvaluation;
use IncadevUns\CoreDomain\Models\KpiGoal;
use IncadevUns\CoreDomain\Models\StrategicDocument;
use IncadevUns\CoreDomain\Models\StrategicObjective;
use IncadevUns\CoreDomain\Models\StrategicPlan;
use Spatie\Permission\Models\Role;

class StrategicSeeder extends Seeder
{
    public function run(): void
    {
        $userModelClass = config('auth.providers.users.model', 'App\Models\User');

        $plannerAdminRole = Role::where('name', 'planner_admin')->first();
        $plannerRole = Role::where('name', 'planner')->first();
        $mejoraContinuaRole = Role::where('name', 'continuous_improvement')->first();

        $plannerAdminPermissions = [
            // 📌 PLANIFICACIÓN INSTITUCIONAL (Misión, Visión, Metas)
            'strategic_contents.view',
            'strategic_contents.create',
            'strategic_contents.update',
            'strategic_contents.delete',

            'strategic_plans.view',
            'strategic_plans.create',
            'strategic_plans.update',
            'strategic_plans.delete',

            'strategic_objectives.view',
            'strategic_objectives.create',
            'strategic_objectives.update',
            'strategic_objectives.delete',

            // Solo lectura de KPIs
            'kpi_goals.view',

            // 📌 GESTIÓN DE CALIDAD EDUCATIVA (Estándares, Acreditación)
            'quality_estandards.view',
            'quality_estandards.create',
            'quality_estandards.update',
            'quality_estandards.delete',

            'stardard_rating.view',
            'stardard_rating.create',
            'stardard_rating.update',
            'stardard_rating.delete',

            // 📌 GESTIÓN DE ALIANZAS Y CONVENIOS
            'organizations.view',
            'organizations.create',
            'organizations.update',
            'organizations.delete',

            'agreements.view',
            'agreements.create',
            'agreements.update',
            'agreements.delete',

            // 📌 COLABORACIÓN Y COMUNICACIÓN DIGITAL (tipo Slack)
            'conversations.view',
            'conversations.create',
            'conversations.update',
            'conversations.delete',

            'conversation_users.view',
            'conversation_users.create',
            'conversation_users.update',
            'conversation_users.delete',

            'messages.view',
            'messages.create',
            'messages.update',
            'messages.delete',

            'message_files.view',
            'message_files.create',
            'message_files.update',
            'message_files.delete',

            // 📌 INNOVACIÓN Y MEJORA CONTINUA
            'iniciatives.view',
            'iniciatives.create',
            'iniciatives.update',
            'iniciatives.delete',

            'iniciative_evaluations.view',
            'iniciative_evaluations.create',
            'iniciative_evaluations.update',
            'iniciative_evaluations.delete',

            // 📌 DOCUMENTACIÓN Y EVIDENCIAS
            'strategic_documents.view',
            'strategic_documents.create',
            'strategic_documents.update',
            'strategic_documents.delete',
        ];

        $plannerPermissions = [
            // 📌 PLANIFICACIÓN INSTITUCIONAL
            // Ver misión/visión/planes, editar solo metas/avances (objetivos)
            'strategic_contents.view',
            'strategic_plans.view',

            'strategic_objectives.view',
            'strategic_objectives.update',

            // Solo lectura de KPIs
            'kpi_goals.view',

            // 📌 GESTIÓN DE CALIDAD EDUCATIVA
            // Ver, Editar procesos de acreditación
            'quality_estandards.view',
            'quality_estandards.update',
            // Puede ver resultados de encuestas
            'stardard_rating.view',

            // 📌 GESTIÓN DE ALIANZAS Y CONVENIOS
            // Ver, Crear, Editar (seguimiento, renovación)
            'organizations.view',
            'agreements.view',
            'agreements.create',
            'agreements.update',

            // 📌 COLABORACIÓN Y COMUNICACIÓN DIGITAL
            // Ver, Crear, Editar tareas/archivos (mensajes)
            'conversations.view',
            'conversation_users.view',

            'messages.view',
            'messages.create',
            'messages.update',

            'message_files.view',
            'message_files.create',
            'message_files.update',

            // 📌 INNOVACIÓN Y MEJORA CONTINUA
            // Ver evaluaciones de mejoras aplicadas
            'iniciatives.view',
            'iniciative_evaluations.view',

            // 📌 DOCUMENTACIÓN Y EVIDENCIAS
            // Ver, Crear, Editar (carga de evidencias)
            'strategic_documents.view',
            'strategic_documents.create',
            'strategic_documents.update',
        ];

        $mejoraContinuaPermissions = [
            // 📌 PLANIFICACIÓN INSTITUCIONAL
            // Ver metas y resultados
            'strategic_contents.view',
            'strategic_plans.view',
            'strategic_objectives.view',

            // Solo lectura de KPIs
            'kpi_goals.view',

            // 📌 GESTIÓN DE CALIDAD EDUCATIVA
            // Ver, Crear, Editar (encuestas, auditorías internas)
            'quality_estandards.view',

            'stardard_rating.view',
            'stardard_rating.create',
            'stardard_rating.update',
            'stardard_rating.delete',

            // 📌 GESTIÓN DE ALIANZAS Y CONVENIOS
            // Solo ver para alinear objetivos
            'organizations.view',
            'agreements.view',

            // 📌 COLABORACIÓN Y COMUNICACIÓN DIGITAL
            // Ver, Crear canales/grupos de mejora
            'conversations.view',
            'conversations.create',

            'conversation_users.view',
            'conversation_users.create',

            'messages.view',
            'messages.create',

            'message_files.view',
            'message_files.create',

            // 📌 INNOVACIÓN Y MEJORA CONTINUA
            // Gestión completa de iniciativas
            'iniciatives.view',
            'iniciatives.create',
            'iniciatives.update',
            'iniciatives.delete',

            'iniciative_evaluations.view',
            'iniciative_evaluations.create',
            'iniciative_evaluations.update',
            'iniciative_evaluations.delete',

            // 📌 DOCUMENTACIÓN Y EVIDENCIAS
            // Ver (acceso seguro para auditoría institucional)
            'strategic_documents.view',
        ];

        if ($plannerAdminRole)
            $plannerAdminRole->givePermissionTo($plannerAdminPermissions);

        if ($plannerRole)
            $plannerRole->givePermissionTo($plannerPermissions);

        if ($mejoraContinuaRole)
            $mejoraContinuaRole->givePermissionTo($mejoraContinuaPermissions);

        /**
         * ========================================================
         * 0. USUARIOS (buscados por email)
         * ========================================================
         */
        $andrea = $userModelClass::where('email', 'andrea.planner@incadev.com')->firstOrFail();
        $miguel = $userModelClass::where('email', 'miguel.planner@incadev.com')->firstOrFail();
        $laura = $userModelClass::where('email', 'laura.improvement@incadev.com')->firstOrFail();

        /**
         * ========================================================
         * 1. PLANES ESTRATÉGICOS
         * ========================================================
         */
        $plan1 = StrategicPlan::firstOrCreate(
            ['title' => 'Plan Estratégico Institucional 2025-2027'],
            [
                'description' => 'Líneas estratégicas: calidad académica, alianzas y transformación digital.',
                'start_date' => '2025-01-01',
                'end_date' => '2027-12-31',
                'status' => 'vigente',
                'user_id' => $andrea->id,
            ]
        );

        $plan2 = StrategicPlan::firstOrCreate(
            ['title' => 'Plan de Transformación Digital 2025-2026'],
            [
                'description' => 'Modernización de procesos, capacitación docente y adopción de plataformas.',
                'start_date' => '2025-03-01',
                'end_date' => '2026-12-31',
                'status' => 'en_ejecucion',
                'user_id' => $miguel->id,
            ]
        );

        /**
         * ========================================================
         * 2. OBJETIVOS ESTRATÉGICOS
         * ========================================================
         */
        StrategicObjective::firstOrCreate(
            ['title' => 'Incrementar empleabilidad de egresados'],
            [
                'plan_id' => $plan1->id,
                'description' => 'Alianzas de prácticas, ferias laborales y seguimiento a egresados.',
                'goal_value' => 0.90,
                'user_id' => $andrea->id,
                'weight' => 40,
                'kpis' => [
                    ['name' => 'Tasa empleabilidad', 'target' => 90, 'unit' => '%'],
                    ['name' => 'Convenios activos', 'target' => 20, 'unit' => 'n'],
                ],
            ]
        );

        StrategicObjective::firstOrCreate(
            ['title' => 'Acreditar programas activos'],
            [
                'plan_id' => $plan1->id,
                'description' => 'Cumplir estándares y evidencias de calidad para la acreditación.',
                'goal_value' => 1.00,
                'user_id' => $miguel->id,
                'weight' => 35,
                'kpis' => [
                    ['name' => 'Programas acreditados', 'target' => 100, 'unit' => '%'],
                    ['name' => 'Hallazgos críticos', 'target' => 0, 'unit' => 'n'],
                ],
            ]
        );

        StrategicObjective::firstOrCreate(
            ['title' => 'Modernizar infraestructura digital'],
            [
                'plan_id' => $plan2->id,
                'description' => 'Migración de servicios, automatización y capacitación.',
                'goal_value' => 0.80,
                'user_id' => $andrea->id,
                'weight' => 25,
                'kpis' => [
                    ['name' => 'Servicios migrados', 'target' => 10, 'unit' => 'n'],
                    ['name' => 'Usuarios capacitados', 'target' => 200, 'unit' => 'n'],
                ],
            ]
        );

        /**
         * ========================================================
         * 3. DOCUMENTOS ESTRATÉGICOS
         * ========================================================
         */
        $doc1 = StrategicDocument::firstOrCreate(
            ['name' => 'Acta de Consejo Académico 001-2025'],
            [
                'path' => '/docs/acta_001.pdf',
                'type' => 'document',
                'description' => 'Acta oficial del consejo académico.',
            ]
        );

        $doc2 = StrategicDocument::firstOrCreate(
            ['name' => 'Matriz de KPIs 2025'],
            [
                'path' => '/docs/kpis_2025.xlsx',
                'type' => 'document',
                'description' => 'Listado y metas de indicadores institucionales.',
            ]
        );

        $doc3 = StrategicDocument::firstOrCreate(
            ['name' => 'Política de Calidad Educativa'],
            [
                'path' => '/docs/politica_calidad.pdf',
                'type' => 'document',
                'description' => 'Documento institucional aprobado.',
            ]
        );

        /**
         * ========================================================
         * 4. KPI GOALS
         * ========================================================
         */
        foreach ([
            ['name' => 'satisfaccion_estudiantil', 'display_name' => 'Satisfacción Estudiantil', 'goal_value' => 85],
            ['name' => 'ejecucion_presupuestal', 'display_name' => 'Ejecución Presupuestal', 'goal_value' => 90],
            ['name' => 'satisfaccion_instructores', 'display_name' => 'Satisfacción con Instructores', 'goal_value' => 88],
            ['name' => 'empleabilidad_graduados', 'display_name' => 'Tasa de Empleabilidad de Graduados', 'goal_value' => 75],
        ] as $kpi) {
            KpiGoal::firstOrCreate(
                ['name' => $kpi['name']],
                $kpi + [
                    'current_value' => 0,
                    'previous_value' => 0,
                    'trend' => 0,
                    'status' => 'Requiere atención',
                ]
            );
        }

        /**
         * ========================================================
         * 5. INICIATIVAS (buscadas por título)
         * ========================================================
         */
        $ini1 = Iniciative::firstOrCreate(
            ['title' => 'Programa de prácticas con empresas locales'],
            [
                'plan_id' => $plan1->id,
                'summary' => 'Fortalecer inserción laboral mediante convenios de prácticas.',
                'user_id' => $andrea->id,
                'status' => 'en_progreso',
                'start_date' => '2025-02-01',
                'end_date' => '2025-12-15',
                'estimated_impact' => 'Alto',
            ]
        );

        $ini2 = Iniciative::firstOrCreate(
            ['title' => 'Célula de acreditación por escuela'],
            [
                'plan_id' => $plan1->id,
                'summary' => 'Equipos dedicados a evidencias y mejora continua.',
                'user_id' => $laura->id,
                'status' => 'pendiente',
                'start_date' => '2025-03-01',
                'end_date' => '2026-03-01',
                'estimated_impact' => 'Medio',
            ]
        );

        $ini3 = Iniciative::firstOrCreate(
            ['title' => 'Migración de servicios a la nube'],
            [
                'plan_id' => $plan2->id,
                'summary' => 'Priorizar sistemas académicos y portal institucional.',
                'user_id' => $andrea->id,
                'status' => 'en_progreso',
                'start_date' => '2025-04-01',
                'end_date' => '2026-01-31',
                'estimated_impact' => 'Alto',
            ]
        );

        /**
         * ========================================================
         * 6. EVALUACIONES DE INICIATIVAS
         * ========================================================
         */
        IniciativeEvaluation::firstOrCreate(
            ['summary' => 'Se evidencian avances en convenios y primeras incorporaciones.'],
            [
                'iniciative_id' => $ini1->id,
                'evaluator_user' => $laura->id,
                'score' => 85.50,
                'document_id' => $doc2->id,
            ]
        );

        IniciativeEvaluation::firstOrCreate(
            ['summary' => 'Migración con hitos cumplidos; pendiente optimizar costos.'],
            [
                'iniciative_id' => $ini3->id,
                'evaluator_user' => $miguel->id,
                'score' => 78.25,
                'document_id' => $doc1->id,
            ]
        );

        IniciativeEvaluation::firstOrCreate(
            ['summary' => 'Células formadas; falta cerrar el plan de evidencias por escuela.'],
            [
                'iniciative_id' => $ini2->id,
                'evaluator_user' => $laura->id,
                'score' => 72.00,
                'document_id' => $doc3->id,
            ]
        );
    }
}
