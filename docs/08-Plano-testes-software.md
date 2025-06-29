# Plano de testes de software

<span style="color:red">Pré-requisitos: <a href="02-Especificacao.md"> Especificação do projeto</a></span>, <a href="05-Projeto-interface.md"> Projeto de interface</a>

O plano de testes de software é gerado a partir da especificação do sistema e consiste em casos de teste que deverão ser executados na aplicação. 
Ele documenta como a equipe verificará cada funcionalidade do FarmaCeltas antes de disponibilizá-la para uso. Este plano é crucial porque garante que as funcionalidades implementadas atendem aos requisitos levantados e resolvem os problemas identificados no Contexto.

**Importância do Plano de Testes**
- Validação Funcional: Assegura que cada requisito funcional seja atendido, de acordo com as Histórias de Usuário;
- Redução de erros: Identifica inconsistências ou falhas antes da entrega.


| **Caso de teste**  | **CT-001 – Cadastrar Usuário**  |
|:---: |:---: |
| Requisito associado | RF-001 - Permitir cadastro de usuários. |
| Objetivo do teste | Verificar se o usuário consegue se cadastrar com sucesso no sistema. |
| Passos | - Acessar o navegador <br> - Informar o endereço do site <br> - Navegar até a página de cadastro <br> - Preencher os campos obrigatórios (nome, e-mail, senha) <br> - Clicar em "Cadastrar" |
| Critério de êxito | - Cadastro realizado com sucesso e mensagem de confirmação exibida. |
| Responsável pela elaboração do caso de teste | Krycia Figueiredo Azevedo |

<br>

| **Caso de teste**  | **CT-002 – Efetuar login**  |
|:---: |:---: |
| Requisito associado | RF-002 - Permitir sistema de login. |
| Objetivo do teste | Verificar se o usuário consegue realizar login. |
| Passos | - Acessar o navegador <br> - Informar o endereço do site <br> - Navegar até a tela de login <br> - Preencher e-mail e senha cadastrados <br> - Clicar em "Login" |
| Critério de êxito | - Login realizado com sucesso e acesso liberado à plataforma. |
| Responsável pela elaboração do caso de teste | Krycia Figueiredo Azevedo |

<br>

| **Caso de teste**  | **CT-003 – Acessar vídeos educativos**  |
|:---: |:---: |
| Requisito associado | RF-003 - Disponibilizar vídeos educativos. |
| Objetivo do teste | Verificar se o usuário consegue visualizar os vídeos educativos disponíveis. |
| Passos | - Fazer login no sistema <br> - Navegar até a seção de vídeos <br> - Selecionar um vídeo <br> - Clicar em "Assistir" |
| Critério de êxito | - O vídeo é carregado e reproduzido corretamente. |
| Responsável pela elaboração do caso de teste | Krycia Figueiredo Azevedo |

<br>

| **Caso de teste**  | **CT-004 – Realizar quizzes interativos**  |
|:---: |:---: |
| Requisito associado | RF-004 - Disponibilizar quizzes interativos para testar o aprendizado dos usuários. |
| Objetivo do teste | Verificar se o usuário consegue iniciar, responder e finalizar quizzes. |
| Passos | - Fazer login no sistema <br> - Navegar até a seção de quizzes <br> - Selecionar um quiz <br> - Responder todas as questões <br> - Finalizar o quiz |
| Critério de êxito | - Sistema exibe feedback sobre as respostas e armazena o resultado do usuário. |
| Responsável pela elaboração do caso de teste | Krycia Figueiredo Azevedo |

<br>

| **Caso de teste**  | **CT-005 – Consultar materiais escritos**  |
|:---: |:---: |
| Requisito associado | RF-005 - Disponibilizar materiais escritos validados cientificamente. |
| Objetivo do teste | Verificar se os materiais escritos podem ser acessados pelos usuários. |
| Passos | - Fazer login no sistema <br> - Navegar até a seção de materiais <br> - Selecionar um artigo ou texto <br> - Visualizar o conteúdo completo |
| Critério de êxito | - O conteúdo é exibido de forma legível e completa. |
| Responsável pela elaboração do caso de teste | Krycia Figueiredo Azevedo |

<br>

| **Caso de teste**  | **CT-006 – Enviar perguntas ao ChatGPT**  |
|:---: |:---: |
| Requisito associado | RF-006 - Permitir que o usuário faça perguntas respondidas pelo ChatGPT. |
| Objetivo do teste | Verificar se as perguntas são enviadas e respondidas corretamente pelo ChatGPT integrado. |
| Passos | - Fazer login no sistema <br> - Abrir sessão de interação com ChatGPT <br> - Digitar uma pergunta no campo de entrada <br> - Clicar em "Enviar" |
| Critério de êxito | - O sistema exibe a resposta do ChatGPT de forma clara e em tempo hábil. |
| Responsável pela elaboração do caso de teste | Krycia Figueiredo Azevedo |

<br>

| **Caso de teste**  | **CT-007 – Gerenciar quizzes e materiais (admin)**  |
|:---: |:---: |
| Requisito associado | RF-007 - Permitir que administradores gerenciem quizzes e materiais educativos. |
| Objetivo do teste | Verificar se o administrador consegue criar, editar e excluir quizzes e materiais.|
| Passos | - Fazer login como administrador <br> - Navegar até o painel de gerenciamento <br> - Criar um novo quiz/material <br> - Editar um quiz/material existente <br> - Excluir um quiz/material | 
| Critério de êxito | - As alterações são salvas e refletidas no sistema para os usuários. |
| Responsável pela elaboração do caso de teste | Krycia Figueiredo Azevedo |

 
