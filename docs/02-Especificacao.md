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

As tabelas a seguir apresentam os requisitos funcionais e não funcionais que detalham o escopo do projeto. A priorização dos mesmos foi baseada na relevância para o usuário final e facilidade de desenvolvimento.

### Requisitos funcionais

| ID     | Descrição do Requisito                                                        | Prioridade |
|--------|-------------------------------------------------------------------------------|------------|
| RF-001 | Permitir cadastro de usuários           | ALTA       |
| RF-002 | Permitir sistema de login           | ALTA       |
| RF-003 | Disponibilizar vídeos educativos           | ALTA       |
| RF-004 | Disponibilizar quizzes interativos para testar o aprendizado dos usuários      | ALTA       |
| RF-005 | Disponibilizar materiais escritos validados cientificamente                    | ALTA       |
| RF-006 | Permitir que o usuário faça perguntas respondidas pelo ChatGPT                 | ALTA       |
| RF-007 | Permitir que administradores gerenciem quizzes e materiais educativos          | ALTA       |
| RF-008 | Armazenar e apresentar progresso individual dos usuários nos quizzes           | BAIXA      |

### Requisitos não Funcionais
| RNF   | Requisitos Não Funcionais                                                                                         |
| ----- | ------------------------------------------------------------------------------------------------------------------ |
| RNF 01| A aplicação será desenvolvida com PHP, Vue.JS, Javascript, HTML 5 e CSS.                                           |
| RNF 02| O projeto deve seguir a Lei Geral de Proteção de Dados Pessoais (LGPD), Lei nº 13.709/2018.                        |
| RNF 03| A aplicação fará uso do idioma oficial do Brasil, PT-BR.                                                           |
| RNF 04| A disponibilidade da aplicação será de 24x7.                                                                       |
| RNF 05| O tempo de resposta da aplicação não deverá exceder 1 segundo.                                                     |
| RNF 06| Será utilizado o GitHub como plataforma de gerenciamento do desenvolvimento.                                       |
| RNF 07| Deverá ser um sistema responsivo para se ajustar a qualquer dispositivo.                                           |
| RNF 08| Deve dar suporte a aparelhos Android e iOS.                                                                        |

## Restrições

O projeto está restrito aos itens apresentados na tabela a seguir.

| ID     | Descrição da Restrição                                                                    |
|--------|-------------------------------------------------------------------------------------------|
| RST-001 | O sistema não deve promover marcas ou produtos farmacêuticos específicos.                |
| RST-002 | Não substituirá a orientação médica ou farmacêutica profissional.                        |
| RST-003 | Deve garantir que todas as informações disponibilizadas sejam validadas cientificamente. |
| RST-004 | O site não terá funcionalidades de comércio eletrônico ou venda de medicamentos.         |
| RST-005 | O sistema deverá operar em conformidade com a Lei Geral de Proteção de Dados (LGPD).     |
| RST-006 | Apenas administradores poderão adicionar ou editar conteúdos educativos e quizzes.       |
| RST-007 | Não será permitido conteúdo gerado por usuários que não passe por validação prévia.      |

## Diagrama de casos de uso

![image](https://github.com/user-attachments/assets/89ba92ba-534d-4450-b3d8-7f5f68eec08c)

## Atores Principais

### Usuário
É o público geral que acessa a plataforma para aprender sobre medicamentos e saúde básica. Pode ser qualquer pessoa da comunidade, clientes da drogaria ou profissionais da área que buscam atualização.

### Administrador
Responsável por manter e organizar o conteúdo da plataforma, incluindo quizzes, vídeos, materiais e o funcionamento da integração com o ChatGPT.

### ChatGPT Integrado
Ferramenta de inteligência artificial integrada à plataforma, que processa dúvidas e fornece respostas com base em fontes científicas confiáveis.

## Casos de Uso

### Consulta de Dúvidas sobre Medicamento
O usuário pode fazer perguntas sobre medicamentos e receber respostas informativas.

Inclui:
- Histórico de Perguntas e Respostas: o usuário pode revisar perguntas feitas anteriormente, o que ajuda a fixar aprendizados e evitar repetições.

### Realização de Quizzes Interativos
O usuário participa de quizzes para testar seus conhecimentos e aprender de forma lúdica.

Inclui:
- Acesso a Materiais Específicos: após responder aos quizzes, o usuário pode acessar conteúdos complementares.
- Acesso a Vídeos Educativos: vídeos ajudam na assimilação de temas de forma mais visual e acessível.

### Cadastro e Login
Funcionalidade essencial para personalizar a experiência e registrar o progresso do usuário.

Inclui:
- Monitoramento do Progresso nos Quizzes: permite ao usuário acompanhar sua evolução ao longo do tempo.

### Gerenciar o envio e recebimento de perguntas no ChatGPT 
O administrador revisa, organiza e envia perguntas feitas pelos usuários ao ChatGPT, podendo ainda filtrar ou moderar os conteúdos.

### Gerenciamento de Quizzes e Materiais 
Aqui, o administrador cadastra, atualiza e organiza quizzes, vídeos e materiais educativos dentro da plataforma.

### Processar e responder dúvidas com base em fontes científicas 
O sistema de IA responde às dúvidas dos usuários com base em fontes confiáveis, garantindo a segurança e a qualidade da informação compartilhada.

# Testando os Requisitos

### Requisitos Funcionais
RF-001 | Permitir cadastro de usuários  
![image](https://github.com/user-attachments/assets/78a5c097-a9d4-438b-b5a2-77ef9fa04284)

RF-002 | Permitir sistema de login 
![image](https://github.com/user-attachments/assets/ec7547c7-bd69-41b6-924c-90e5886a1e44)

RF-003 | Disponibilizar vídeos educativos   
![image](https://github.com/user-attachments/assets/5a8bf855-557b-42df-99cc-6b2ceee4b1cb)

RF-004 | Disponibilizar quizzes interativos para testar o aprendizado dos usuários
![image](https://github.com/user-attachments/assets/ff9ece7f-4d55-47d7-9cb0-b7e0b9ca437f)

RF-005 | Disponibilizar materiais escritos validados cientificamente
![image](https://github.com/user-attachments/assets/0184dd2b-bd51-4703-af88-5fabb45b9fc0)

RF-006 | Permitir que o usuário faça perguntas respondidas pelo ChatGPT 
![image](https://github.com/user-attachments/assets/054d7699-80ae-4566-b4c9-8da7acf3bd8a)

RF-007 | Permitir que administradores gerenciem quizzes e materiais educativos

![image](https://github.com/user-attachments/assets/1b530c07-2e02-4d0a-ae73-8c40b173c491)

RF-008 | Armazenar e apresentar progresso individual dos usuários nos quizzes 
![image](https://github.com/user-attachments/assets/4ec71939-9605-4c63-81ed-44cf07e7189d)

### Requisitos Não Funcionais

RNF 01| A aplicação será desenvolvida com PHP, Vue.JS, Javascript, HTML 5 e CSS.  |  OK

RNF 02| O projeto deve seguir a Lei Geral de Proteção de Dados Pessoais (LGPD), Lei nº 13.709/2018.   |  OK

RNF 03| A aplicação fará uso do idioma oficial do Brasil, PT-BR.  |  OK

RNF 04| A disponibilidade da aplicação será de 24x7.  |  OK

RNF 05| O tempo de resposta da aplicação não deverá exceder 1 segundo.  |  OK

RNF 06| Será utilizado o GitHub como plataforma de gerenciamento do desenvolvimento.  |  OK

RNF 07| Deverá ser um sistema responsivo para se ajustar a qualquer dispositivo.  |  OK

RNF 08| Deve dar suporte a aparelhos Android e iOS.  |  NÃO OK                                           
