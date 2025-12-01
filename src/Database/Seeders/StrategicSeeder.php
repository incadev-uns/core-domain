<?php

namespace IncadevUns\CoreDomain\Database\Seeders;

use Illuminate\Database\Seeder;
use IncadevUns\CoreDomain\Models\Iniciative;
use IncadevUns\CoreDomain\Models\IniciativeEvaluation;
use IncadevUns\CoreDomain\Models\KpiGoal;
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
            'strategic-contents.view',
            'strategic-contents.create',
            'strategic-contents.update',
            'strategic-contents.delete',

            'strategic-plans.view',
            'strategic-plans.create',
            'strategic-plans.update',
            'strategic-plans.delete',

            'strategic-objectives.view',
            'strategic-objectives.create',
            'strategic-objectives.update',
            'strategic-objectives.delete',

            // 📌 GESTIÓN DE CALIDAD EDUCATIVA (Estándares, Acreditación)
            'quality-estandards.view',
            'quality-estandards.create',
            'quality-estandards.update',
            'quality-estandards.delete',

            'stardard-rating.view',
            'stardard-rating.create',
            'stardard-rating.update',
            'stardard-rating.delete',

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

            'conversation-users.view',
            'conversation-users.create',
            'conversation-users.update',
            'conversation-users.delete',

            'messages.view',
            'messages.create',
            'messages.update',
            'messages.delete',

            'message-files.view',
            'message-files.create',
            'message-files.update',
            'message-files.delete',

            // 📌 INNOVACIÓN Y MEJORA CONTINUA
            'iniciatives.view',
            'iniciatives.create',
            'iniciatives.update',
            'iniciatives.delete',

            'iniciative-evaluations.view',
            'iniciative-evaluations.create',
            'iniciative-evaluations.update',
            'iniciative-evaluations.delete',

            // 📌 DOCUMENTACIÓN Y EVIDENCIAS
            'strategic-documents.view',
            'strategic-documents.create',
            'strategic-documents.update',
            'strategic-documents.delete',
        ];

        $plannerPermissions = [
            // 📌 PLANIFICACIÓN INSTITUCIONAL
            // Ver misión/visión/planes, editar solo metas/avances (objetivos)
            'strategic-contents.view',
            'strategic-plans.view',

            'strategic-objectives.view',
            'strategic-objectives.update',

            // 📌 GESTIÓN DE CALIDAD EDUCATIVA
            // Ver, Editar procesos de acreditación
            'quality-estandards.view',
            'quality-estandards.update',
            // Puede ver resultados de encuestas
            'stardard-rating.view',

            // 📌 GESTIÓN DE ALIANZAS Y CONVENIOS
            // Ver, Crear, Editar (seguimiento, renovación)
            'organizations.view',
            'agreements.view',
            'agreements.create',
            'agreements.update',

            // 📌 COLABORACIÓN Y COMUNICACIÓN DIGITAL
            // Ver, Crear, Editar tareas/archivos (mensajes)
            'conversations.view',
            'conversation-users.view',

            'messages.view',
            'messages.create',
            'messages.update',

            'message-files.view',
            'message-files.create',
            'message-files.update',

            // 📌 INNOVACIÓN Y MEJORA CONTINUA
            // Ver evaluaciones de mejoras aplicadas
            'iniciatives.view',
            'iniciative-evaluations.view',

            // 📌 DOCUMENTACIÓN Y EVIDENCIAS
            // Ver, Crear, Editar (carga de evidencias)
            'strategic-documents.view',
            'strategic-documents.create',
            'strategic-documents.update',
        ];

        $mejoraContinuaPermissions = [
            // 📌 PLANIFICACIÓN INSTITUCIONAL
            // Ver metas y resultados
            'strategic-contents.view',
            'strategic-plans.view',
            'strategic-objectives.view',

            // 📌 GESTIÓN DE CALIDAD EDUCATIVA
            // Ver, Crear, Editar (encuestas, auditorías internas)
            'quality-estandards.view',

            'stardard-rating.view',
            'stardard-rating.create',
            'stardard-rating.update',
            'stardard-rating.delete',

            // 📌 GESTIÓN DE ALIANZAS Y CONVENIOS
            // Solo ver para alinear objetivos
            'organizations.view',
            'agreements.view',

            // 📌 COLABORACIÓN Y COMUNICACIÓN DIGITAL
            // Ver, Crear canales/grupos de mejora
            'conversations.view',
            'conversations.create',

            'conversation-users.view',
            'conversation-users.create',

            'messages.view',
            'messages.create',

            'message-files.view',
            'message-files.create',

            // 📌 INNOVACIÓN Y MEJORA CONTINUA
            // Gestión completa de iniciativas
            'iniciatives.view',
            'iniciatives.create',
            'iniciatives.update',
            'iniciatives.delete',

            'iniciative-evaluations.view',
            'iniciative-evaluations.create',
            'iniciative-evaluations.update',
            'iniciative-evaluations.delete',

            // 📌 DOCUMENTACIÓN Y EVIDENCIAS
            // Ver (acceso seguro para auditoría institucional)
            'strategic-documents.view',
        ];

        if ($plannerAdminRole) {
            $plannerAdminRole->givePermissionTo($plannerAdminPermissions);
        }

        if ($plannerRole) {
            $plannerRole->givePermissionTo($plannerPermissions);
        }

        if ($mejoraContinuaRole) {
            $mejoraContinuaRole->givePermissionTo($mejoraContinuaPermissions);
        }

        /**
         * ========================================================
         * 0. USUARIOS (buscados por email)
         * ========================================================
         */
        $andrea = $userModelClass::where('email', 'andrea.planner@incadev.com')->firstOrFail();
        $miguel = $userModelClass::where('email', 'miguel.planner@incadev.com')->firstOrFail();
        $laura = $userModelClass::where('email', 'laura.improvement@incadev.com')->firstOrFail();
        $diego = $userModelClass::where('email', 'diego.improvement@incadev.com')->firstOrFail();
        $carlos = $userModelClass::where('email', 'carlos.alliances@incadev.com')->firstOrFail();
        $alex = $userModelClass::where('email', 'alex.docs@incadev.com')->firstOrFail();
        $ilan = $userModelClass::where('email', 'ilan.conversation@incadev.com')->firstOrFail();

        /**
         * ========================================================
         * 1. PLANES ESTRATÉGICOS
         * ========================================================
         */
        $plan1 = StrategicPlan::firstOrCreate(
            ['title' => 'Plan Estratégico Institucional 2026-2030'],
            [
                'description' => 'Plan estratégico de la Facultad orientado a mejorar calidad educativa, gestión de recursos y empleabilidad.',
                'alineacion_vision' => 'Alineado con la visión institucional de excelencia académica e impacto en el entorno.',
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
                'alineacion_vision' => 'Alineado con la visión institucional de excelencia académica e impacto en el entorno.',
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
            ['title' => 'Mejorar la satisfacción estudiantil'],
            [
                'plan_id' => $plan1->id,
                'description' => 'Incrementar el nivel de satisfacción general de los estudiantes con los servicios académicos y administrativos.',
                'goal_value' => 85.00,
                'status' => 'vigente',
                'user_id' => $andrea->id,
                'weight' => 25,
                'kpis' => [
                    [1],
                ],
            ]
        );

        StrategicObjective::firstOrCreate(
            ['title' => 'Optimizar la ejecución presupuestal'],
            [
                'plan_id' => $plan1->id,
                'description' => 'Garantizar un uso eficiente y oportuno del presupuesto asignado a la Facultad.',
                'goal_value' => 90.00,
                'status' => 'vigente',
                'user_id' => $miguel->id,
                'weight' => 25,
                'kpis' => [
                    [2],
                ],
            ]
        );

        StrategicObjective::firstOrCreate(
            ['title' => 'Mejorar la satisfacción con los instructores'],
            [
                'plan_id' => $plan2->id,
                'description' => 'Fortalecer las competencias pedagógicas y el acompañamiento docente para mejorar la experiencia del estudiante.',
                'goal_value' => 88.00,
                'status' => 'vigente',
                'user_id' => $andrea->id,
                'weight' => 25,
                'kpis' => [
                    [3],
                ],
            ]
        );

        /**
         * ========================================================
         * 3. KPI GOALS
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
            ['title' => 'Programa de practicas con empresas locales'],
            [
                'plan_id' => $plan1->id,
                'summary' => 'Fortalecer insercion laboral mediante convenios de practicas.',
                'user_id' => $miguel->id,
                'status' => 'en_ejecucion',
                'start_date' => '2025-02-01',
                'end_date' => '2025-12-15',
                'estimated_impact' => 'Alto',
            ]
        );

        $ini2 = Iniciative::firstOrCreate(
            ['title' => 'Celula de acreditacion por escuela'],
            [
                'plan_id' => $plan1->id,
                'summary' => 'Equipos dedicados a evidencias y mejora continua.',
                'user_id' => $carlos->id,
                'status' => 'propuesta',
                'start_date' => '2025-03-01',
                'end_date' => '2026-03-01',
                'estimated_impact' => 'Medio',
            ]
        );

        $ini3 = Iniciative::firstOrCreate(
            ['title' => 'Migracion de servicios a la nube'],
            [
                'plan_id' => $plan2->id,
                'summary' => 'Priorizar sistemas academicos y portal institucional.',
                'user_id' => $miguel->id,
                'status' => 'en_ejecucion',
                'start_date' => '2025-04-01',
                'end_date' => '2026-01-31',
                'estimated_impact' => 'Alto',
            ]
        );

        $ini4 = Iniciative::firstOrCreate(
            ['title' => 'Capacitacion docente en aulas virtuales'],
            [
                'plan_id' => $plan2->id,
                'summary' => 'Talleres mensuales y certificaciones.',
                'user_id' => $carlos->id,
                'status' => 'propuesta',
                'start_date' => '2025-05-15',
                'end_date' => '2025-11-30',
                'estimated_impact' => 'Medio',
            ]
        );

        $ini5 = Iniciative::firstOrCreate(
            ['title' => 'Revision de procesos academicos'],
            [
                'plan_id' => $plan1->id,
                'summary' => 'Auditar flujos actuales y documentar mejoras rapidas.',
                'user_id' => $miguel->id,
                'status' => 'en_revision',
                'start_date' => '2025-06-01',
                'end_date' => '2025-09-30',
                'estimated_impact' => 'Medio',
            ]
        );

        $ini6 = Iniciative::firstOrCreate(
            ['title' => 'Automatizacion de reportes gerenciales'],
            [
                'plan_id' => $plan2->id,
                'summary' => 'Implementar pipelines de datos para reportes recurrentes.',
                'user_id' => $carlos->id,
                'status' => 'aprobada',
                'start_date' => '2025-07-01',
                'end_date' => '2025-12-15',
                'estimated_impact' => 'Alto',
            ]
        );

        $ini7 = Iniciative::firstOrCreate(
            ['title' => 'Portal de transparencia institucional'],
            [
                'plan_id' => $plan2->id,
                'summary' => 'Publicar indicadores y avances en un portal abierto.',
                'user_id' => $miguel->id,
                'status' => 'finalizada',
                'start_date' => '2025-01-15',
                'end_date' => '2025-05-30',
                'estimated_impact' => 'Alto',
            ]
        );

        $ini8 = Iniciative::firstOrCreate(
            ['title' => 'Sistema de feedback estudiantil'],
            [
                'plan_id' => $plan1->id,
                'summary' => 'Encuestas y panel de seguimiento de mejoras.',
                'user_id' => $carlos->id,
                'status' => 'evaluada',
                'start_date' => '2024-11-01',
                'end_date' => '2025-03-31',
                'estimated_impact' => 'Medio',
            ]
        );

        $ini9 = Iniciative::firstOrCreate(
            ['title' => 'Central de compras de licencias'],
            [
                'plan_id' => $plan1->id,
                'summary' => 'Modelo unico de adquisicion de software para todas las facultades.',
                'user_id' => $miguel->id,
                'status' => 'rechazada',
                'start_date' => '2025-02-01',
                'end_date' => '2025-04-30',
                'estimated_impact' => 'Medio',
            ]
        );

        $ini10 = Iniciative::firstOrCreate(
            ['title' => 'Programa de mejora continua de aulas virtuales'],
            [
                'plan_id' => $plan2->id,
                'summary' => 'Refinar lineamientos, soporte y evidencias para aulas virtuales institucionales.',
                'user_id' => $diego->id,
                'status' => 'aprobada',
                'start_date' => '2025-08-01',
                'end_date' => '2026-02-28',
                'estimated_impact' => 'Medio',
            ]
        );

        /**
         * ========================================================
         * 6. EVALUACIONES DE INICIATIVAS
         * ========================================================
         */
        IniciativeEvaluation::firstOrCreate(
            [
                'summary' => 'Se evidencian avances en convenios y primeras incorporaciones.',
                'iniciative_id' => $ini1->id,
            ],
            [
                'evaluator_user' => $alex->id,
                'score' => 85.50,
                'document_id' => 2,
            ]
        );

        IniciativeEvaluation::firstOrCreate(
            [
                'summary' => 'Seguimiento: acuerdos firmados y primeros practicantes asignados.',
                'iniciative_id' => $ini1->id,
            ],
            [
                'evaluator_user' => $ilan->id,
                'score' => 88.00,
                'document_id' => null,
            ]
        );

        IniciativeEvaluation::firstOrCreate(
            [
                'summary' => 'Migracion con hitos cumplidos; pendiente optimizar costos.',
                'iniciative_id' => $ini3->id,
            ],
            [
                'evaluator_user' => $ilan->id,
                'score' => 78.25,
                'document_id' => 1,
            ]
        );

        IniciativeEvaluation::firstOrCreate(
            [
                'summary' => 'Seguimiento: se estabilizaron servicios, ahorro moderado logrado.',
                'iniciative_id' => $ini3->id,
            ],
            [
                'evaluator_user' => $alex->id,
                'score' => 80.50,
                'document_id' => null,
            ]
        );

        IniciativeEvaluation::firstOrCreate(
            [
                'summary' => 'Portal publicado y accesible; pendiente agregar serie historica.',
                'iniciative_id' => $ini7->id,
            ],
            [
                'evaluator_user' => $alex->id,
                'score' => 90.00,
                'document_id' => null,
            ]
        );

        IniciativeEvaluation::firstOrCreate(
            [
                'summary' => 'Evaluacion final: portal completo con historicos y dashboards basicos.',
                'iniciative_id' => $ini7->id,
            ],
            [
                'evaluator_user' => $ilan->id,
                'score' => 93.50,
                'document_id' => null,
            ]
        );

        IniciativeEvaluation::firstOrCreate(
            [
                'summary' => 'Feedback capturado y acciones de mejora registradas.',
                'iniciative_id' => $ini8->id,
            ],
            [
                'evaluator_user' => $ilan->id,
                'score' => 88.00,
                'document_id' => null,
            ]
        );

        IniciativeEvaluation::firstOrCreate(
            [
                'summary' => 'Revisión inicial del plan de mejora continua de aulas virtuales.',
                'iniciative_id' => $ini10->id,
            ],
            [
                'evaluator_user' => $alex->id,
                'score' => 82.00,
                'document_id' => null,
            ]
        );

        IniciativeEvaluation::firstOrCreate(
            [
                'summary' => 'Seguimiento: lineamientos aprobados y soporte reforzado.',
                'iniciative_id' => $ini10->id,
            ],
            [
                'evaluator_user' => $ilan->id,
                'score' => 87.50,
                'document_id' => null,
            ]
        );
    }
}
