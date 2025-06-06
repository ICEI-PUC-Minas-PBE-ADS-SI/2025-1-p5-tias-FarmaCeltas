<?php

namespace src\OpenAI\Http\Post;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class ChatComplement extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    private string $question;

    private array $existingQuestions;

    public function resolveEndpoint(): string
    {
        return '/chat/completions';
    }

    public function setQuestionParameters(string $question, array $existingQuestions): self
    {
        $this->question = $question;
        $this->existingQuestions = $existingQuestions;

        return $this;
    }

    protected function defaultBody(): array
    {
        return [
            'model' => 'gpt-4o',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'Você é um assistente especializado em saúde e medicamentos. Sua função é garantir que o usuário esteja fazendo uma pergunta relacionada exclusivamente a temas de saúde, bem-estar, medicamentos ou uso consciente de fármacos.
                        Se a pergunta do usuário estiver fora desse escopo, como temas pessoais, técnicos ou irrelevantes, responda apenas com "Pergunta fora do escopo permitido".
                        Caso a pergunta esteja dentro do escopo permitido, verifique se ela já foi registrada anteriormente ou é muito parecida com outra pergunta já cadastrada.',
                ],
                [
                    'role' => 'user',
                    'content' => "A pergunta feita pelo usuário é: \"{$this->question}\".
                        As perguntas previamente cadastradas são: " . implode('; ', $this->existingQuestions) . ".
                        Verifique se a pergunta já foi feita ou se é muito parecida com alguma existente.
                        Se for semelhante, responda exatamente com o título da pergunta semelhante. Caso contrário, responda apenas com a palavra 'nenhuma'.",
                ],
            ],
            'temperature' => 0.3,
        ];
    }
}
