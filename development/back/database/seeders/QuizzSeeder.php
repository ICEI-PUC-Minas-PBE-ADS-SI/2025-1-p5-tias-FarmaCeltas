<?php

namespace Database\Seeders;

use App\Models\Quizz;
use App\Models\QuizzQuestion;
use Illuminate\Database\Seeder;

class QuizzSeeder extends Seeder
{
    public function run(): void
    {
        $quizzes = [
            [
                'user_id' => 1,
                'title' => 'Noções Básicas de Medicamentos',
                'theme' => 'Farmacologia',
                'difficulty' => 'Fácil',
                'questions' => [
                    [
                        'exercise_statement' => 'O que é paracetamol normalmente utilizado para tratar?',
                        'correct_answer' => 'Dor e febre',
                        'options' => ['Dor e febre', 'Gripe e tosse', 'Infecção bacteriana', 'Inflamação muscular']
                    ],
                    [
                        'exercise_statement' => 'Qual o risco de tomar antibióticos sem prescrição?',
                        'correct_answer' => 'Resistência bacteriana',
                        'options' => ['Alergia alimentar', 'Dependência química', 'Resistência bacteriana', 'Perda de apetite']
                    ],
                ],
            ],
            [
                'user_id' => 1,
                'title' => 'Automedicação e seus perigos',
                'theme' => 'Saúde Pública',
                'difficulty' => 'Média',
                'questions' => [
                    [
                        'exercise_statement' => 'Automedicar-se pode ser perigoso porque:',
                        'correct_answer' => 'Pode mascarar doenças graves e causar efeitos adversos',
                        'options' => ['Reduz custos médicos', 'Acelera a cura', 'Pode mascarar doenças graves e causar efeitos adversos', 'Melhora o bem-estar']
                    ],
                    [
                        'exercise_statement' => 'É seguro usar o mesmo medicamento que funcionou para outra pessoa?',
                        'correct_answer' => 'Não, cada organismo responde de forma diferente',
                        'options' => ['Sim, se for leve', 'Não, cada organismo responde de forma diferente', 'Sim, desde que já tenha usado antes', 'Depende do médico']
                    ],
                ],
            ]
        ];

        foreach ($quizzes as $quizData) {
            $quiz = Quizz::create([
                'user_id' => $quizData['user_id'],
                'title' => $quizData['title'],
                'theme' => $quizData['theme'],
                'difficulty' => $quizData['difficulty'],
            ]);

            foreach ($quizData['questions'] as $question) {
                QuizzQuestion::create([
                    'quiz_id' => $quiz->id,
                    'exercise_statement' => $question['exercise_statement'],
                    'correct_answer' => $question['correct_answer'],
                    'options' => $question['options'],
                ]);
            }
        }
    }
}
