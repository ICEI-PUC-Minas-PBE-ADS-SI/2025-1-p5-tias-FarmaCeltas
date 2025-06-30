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

    public function resolveEndpoint(): string
    {
        return 'chat/completions'; // sem a barra inicial!
    }

    public function setQuestionParameters(string $question): self
    {
        $this->question = $question;;

        return $this;
    }

    protected function defaultBody(): array
    {
        return [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'Você é um assistente especializado em saúde e medicamentos. Sua função é garantir que o usuário esteja fazendo uma pergunta relacionada exclusivamente a temas de saúde, bem-estar, medicamentos ou uso consciente de fármacos.
                        Se a pergunta do usuário estiver fora desse escopo, como temas pessoais, técnicos ou irrelevantes, responda apenas com "Pergunta fora do escopo permitido".
                        Caso a pergunta esteja dentro do escopo permitido, verifique se ela já foi registrada anteriormente ou é muito parecida com outra pergunta já cadastrada.',
                ],
                [
                    'role' => 'user',
                    'content' => $this->question,
                ],
            ],
            'temperature' => 0.3,
        ];
    }
}
