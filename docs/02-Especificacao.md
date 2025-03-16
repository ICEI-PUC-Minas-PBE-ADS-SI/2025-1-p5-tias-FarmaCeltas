# Especificação do projeto

<span style="color:red">Pré-requisitos: <a href="01-Contexto.md"> Documentação de contexto</a></span>

Esta seção do documento aborda as definições e especificações detalhadas do projeto FarmaCeltas sob a perspectiva dos usuários. Utilizamos técnicas consolidadas de Design Thinking e User Stories, que permitiram compreender profundamente as necessidades dos usuários e garantir uma abordagem centrada nas suas expectativas.

Para isso, serão apresentados:

   - Diagrama e detalhamento das Personas: visando compreender perfis de usuários típicos.
   - Histórias de Usuários: representação clara dos objetivos dos usuários ao utilizar o sistema.
   - Requisitos Funcionais e Não Funcionais: especificação objetiva das funcionalidades essenciais e atributos técnicos desejáveis.
   - Restrições: identificação dos limites e parâmetros que guiarão o desenvolvimento do projeto.

## Personas
Persona 1

    Nome: Maria Clara
    Idade: 35 anos
    Profissão: Dona de Casa
    Objetivo: Deseja obter informações seguras sobre medicamentos cotidianos para cuidar melhor da saúde da sua família, evitando automedicação indevida.
    Necessidades: Conteúdos educativos claros, vídeos informativos acessíveis, quizzes para reforçar aprendizado.

Persona 2

    Nome: André Luiz
    Idade: 22 anos
    Ocupação: Universitário
    Descrição: André busca informações claras sobre medicamentos para tirar dúvidas rápidas antes de tomar decisões relacionadas à automedicação. Ele valoriza praticidade, agilidade e segurança.
    Necessidades: Vídeos informativos, perguntas rápidas respondidas via ChatGPT, material com embasamento científico.

Persona 3

    Nome: Patrícia Fernandes
    Idade: 36 anos
    Profissão: Técnica em administração
    Descrição: Responsável pelo cuidado com medicamentos da família, tem dúvidas frequentes sobre dosagens, interações e armazenamento adequado. Deseja fontes científicas acessíveis e confiáveis.
    Necessidades: Material escrito com base científica, vídeos claros e informativos, quizzes rápidos e perguntas respondidas via ChatGPT.

## Histórias de usuários

Com base na análise das personas, foram identificadas as seguintes histórias de usuários:

| EU COMO... (`PERSONA`) | QUERO/PRECISO... (`FUNCIONALIDADE`)                               | PARA... (`MOTIVO/VALOR`)                                 |
|------------------------|-------------------------------------------------------------------|----------------------------------------------------------|
| Usuário do sistema     | Acessar vídeos educativos                                         | Obter informações claras sobre medicamentos.             |
| Usuário do sistema     | Realizar quizzes interativos                                      | Testar e reforçar meu aprendizado.                       |
| Usuário do sistema     | Consultar materiais escritos validados cientificamente            | Ter segurança nas informações que estou acessando.       |
| Usuário do sistema     | Fazer perguntas sobre medicamentos diretamente para o ChatGPT     | Esclarecer dúvidas pontuais sobre medicamentos.          |
| Administrador          | Gerenciar (adicionar, editar e remover) quizzes e materiais educativos | Manter o sistema atualizado com conteúdos relevantes. |


## Requisitos

As tabelas a seguir apresentam os requisitos funcionais e não funcionais que detalham o escopo do projeto. Para determinar a prioridade dos requisitos, aplique uma técnica de priorização e detalhe como essa técnica foi aplicada.

### Requisitos funcionais

|ID    | Descrição do Requisito  | Prioridade |
|------|-----------------------------------------|----|
|RF-001| Permitir que o usuário cadastre tarefas | ALTA | 
|RF-002| Emitir um relatório de tarefas no mês   | MÉDIA |

### Requisitos não funcionais

|ID     | Descrição do Requisito  |Prioridade |
|-------|-------------------------|----|
|RNF-001| O sistema deve ser responsivo para rodar em dispositivos móveis | MÉDIA | 
|RNF-002| Deve processar as requisições do usuário em no máximo 3 segundos |  BAIXA | 

Com base nas histórias de usuários, enumere os requisitos da sua solução. Classifique esses requisitos em dois grupos:

- [Requisitos funcionais
 (RF)](https://pt.wikipedia.org/wiki/Requisito_funcional):
 correspondem a uma funcionalidade que deve estar presente na
  plataforma (ex: cadastro de usuário).
- [Requisitos não funcionais
  (RNF)](https://pt.wikipedia.org/wiki/Requisito_n%C3%A3o_funcional):
  correspondem a uma característica técnica, seja de usabilidade,
  desempenho, confiabilidade, segurança ou outro (ex: suporte a
  dispositivos iOS e Android).

Lembre-se de que cada requisito deve corresponder a uma e somente uma característica-alvo da sua solução. Além disso, certifique-se de que todos os aspectos capturados nas histórias de usuários foram cobertos.

> **Links úteis**:
> - [O que são requisitos funcionais e requisitos não funcionais?](https://codificar.com.br/requisitos-funcionais-nao-funcionais/)
> - [Entenda o que são requisitos de software, a diferença entre requisito funcional e não funcional, e como identificar e documentar cada um deles](https://analisederequisitos.com.br/requisitos-funcionais-e-requisitos-nao-funcionais-o-que-sao/)

## Restrições

Enumere as restrições à sua solução. Lembre-se de que as restrições geralmente limitam a solução candidata.

O projeto está restrito aos itens apresentados na tabela a seguir.

|ID| Restrição                                             |
|--|-------------------------------------------------------|
|001| O projeto deverá ser entregue até o final do semestre |
|002| O custo total do projeto não deve exceder o orçamento definido       |

## Diagrama de casos de uso

O diagrama de casos de uso é o próximo passo após a elicitação de requisitos. Ele utiliza um modelo gráfico e uma tabela com as descrições sucintas dos casos de uso e dos atores. O diagrama contempla a fronteira do sistema e o detalhamento dos requisitos funcionais, com a indicação dos atores, casos de uso e seus relacionamentos.

As referências abaixo irão auxiliá-lo na geração do artefato “diagrama de casos de uso”.

> **Links úteis**:
> - [Criando casos de uso](https://www.ibm.com/docs/pt-br/engineering-lifecycle-management-suite/design-rhapsody/10.0?topic=cases-creating-use)
> - [Como criar diagrama de caso de uso: tutorial passo a passo](https://gitmind.com/pt/fazer-diagrama-de-caso-uso.html/)
> - [Lucidchart](https://www.lucidchart.com/)
> - [Astah](https://astah.net/)
> - [Diagrams](https://app.diagrams.net/)
