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
Cientificamente conhecido como um Anti-Inflamatório Não Esteroidal, o paracetamol é mais comumente definido como um analgésico, que alivia as dores, e um antitérmico, por combater a febre.

No Brasil, o paracetamol é um Medicamento Isento de Prescrição (MIP) e, por isso, pode ser comprado na farmácia sem receita médica. Isso não significa que deve ser utilizado indiscriminadamente.

O seu mecanismo de ação está relacionado à inibição da enzima COX2, envolvida na geração da dor e febre. Seu efeito se inicia entre 15 a 30 minutos após a administração.

É indicado para tratar dores leves a moderadas, como dores de cabeça, musculares, de dente, e também febre associada a resfriados e gripes.

Apesar de sua segurança, o uso excessivo de paracetamol pode causar danos graves ao fígado. Em caso de sintomas persistentes, procure orientação médica.
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
O diabetes mellitus é uma doença crônica que afeta milhões de brasileiros. Caracteriza-se pela dificuldade do organismo em produzir ou utilizar adequadamente a insulina, hormônio responsável por controlar a glicose no sangue.

Existem diferentes tipos de diabetes, sendo os principais o tipo 1, tipo 2 e gestacional. O tipo 1 costuma surgir na infância ou adolescência e exige aplicações diárias de insulina. O tipo 2, mais comum, está associado a fatores como obesidade e sedentarismo.

O tratamento inclui mudanças no estilo de vida, alimentação equilibrada, prática regular de exercícios e, quando necessário, uso de medicamentos. O controle glicêmico adequado é essencial para evitar complicações como problemas cardiovasculares, retinopatia e neuropatia.

A prevenção do tipo 2 pode ser feita com hábitos saudáveis. Já o tipo 1 não possui prevenção conhecida, mas pode ser controlado com acompanhamento médico.
TEXT,
                'user_id' => $adminId,
            ],
            [
                'title' => 'Importância da hidratação para a saúde',
                'type' => 'texto',
                'content' => "A água desempenha papel vital em praticamente todas as funções do corpo humano. Desde a regulação da temperatura corporal até o transporte de nutrientes e remoção de toxinas, manter-se hidratado é essencial.",
                'user_id' => $adminId,
            ],
            [
                'title' => 'Entenda o que é Pressão Alta (Hipertensão)',
                'type' => 'video',
                'content' => 'https://www.youtube.com/watch?v=HULNAvWAg5M',
                'user_id' => $adminId,
            ],
            [
                'title' => 'Colesterol: O que você precisa saber',
                'type' => 'texto',
                'content' => "O colesterol é uma substância gordurosa presente em todas as células do corpo. Em excesso, pode causar problemas cardiovasculares. Uma dieta equilibrada e exercícios ajudam a mantê-lo sob controle.",
                'user_id' => $adminId,
            ],
            [
                'title' => 'Primeiros socorros: o que fazer em emergências',
                'type' => 'texto',
                'content' => "Saber agir em situações de emergência pode salvar vidas. Aprenda como proceder em casos de desmaio, parada cardíaca, engasgo, hemorragias e queimaduras.",
                'user_id' => $adminId,
            ],
            [
                'title' => 'Vacinas e sua importância na prevenção de doenças',
                'type' => 'texto',
                'content' => "As vacinas estimulam o sistema imune a produzir anticorpos e evitam doenças graves. São essenciais para proteger a saúde coletiva e erradicar epidemias.",
                'user_id' => $adminId,
            ],
            [
                'title' => 'Alimentação Saudável e seus Benefícios',
                'type' => 'texto',
                'content' => "Uma dieta balanceada contribui para a manutenção da saúde, prevenção de doenças e melhora do bem-estar. Inclua frutas, verduras, fibras e evite ultraprocessados.",
                'user_id' => $adminId,
            ],
            [
                'title' => 'A Importância da Atividade Física Regular',
                'type' => 'texto',
                'content' => "Praticar exercícios regularmente reduz riscos de doenças crônicas, melhora o humor, fortalece músculos e ossos, e ajuda no controle do peso.",
                'user_id' => $adminId,
            ],
            [
                'title' => 'Ansiedade: sinais, causas e como lidar',
                'type' => 'texto',
                'content' => "A ansiedade pode afetar a qualidade de vida e se manifestar em sintomas físicos e emocionais. Buscar ajuda psicológica e exercícios de respiração ajudam no controle.",
                'user_id' => $adminId,
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
