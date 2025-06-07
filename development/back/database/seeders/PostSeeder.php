<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $adminId = User::where('role', 'admin')->value('id') ?? 1;

        $posts = [
            [
                'title' => 'O que é Paracetamol?',
                'type' => 'video',
                'content' => 'https://www.youtube.com/watch?v=zBFUEyuIM5I',
                'user_id' => $adminId,
            ],
            [
                'title' => 'Entendendo o Paracetamol',
                'type' => 'texto',
                'content' => <<<TEXT
Cientificamente conhecido como um Anti-Inflamatório Não Esteroidal, o paracetamol é mais comumente definido como um analgésico, que alivia as dores, e um antitérmico, por combater a febre. \n
No Brasil, o paracetamol é um Medicamento Isento de Prescrição (MIP) e, por isso, pode ser comprado na farmácia sem receita médica. \n
... (conteúdo reduzido para fins de demonstração)
TEXT,
                'user_id' => $adminId,
            ],
            [
                'title' => 'Insulina e Diabetes - Entenda',
                'type' => 'video',
                'content' => 'https://www.youtube.com/watch?v=BvxoKdEq8Vw',
                'user_id' => $adminId,
            ],
            [
                'title' => 'Tudo sobre Diabetes Mellitus',
                'type' => 'texto',
                'content' => <<<TEXT
O diabetes mellitus é uma doença crônica que atinge 13 milhões de indivíduos no Brasil, de acordo com o Ministério da Saúde. \n
A insulina é um hormônio responsável por regular a taxa de glicose no sangue. O diabetes mellitus representa a deficiência da produção dessa substância ou a resistência à sua ação. \n
... (conteúdo reduzido para fins de demonstração)
TEXT,
                'user_id' => $adminId,
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
