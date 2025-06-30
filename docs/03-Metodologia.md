
# Metodologia

<span style="color:red">Pré-requisitos: <a href="02-Especificacao.md"> Especificação do projeto</a></span>

Nesta seção, descrevemos a metodologia adotada pelo grupo para abordar e resolver o problema identificado no projeto FarmaCeltas. São detalhadas informações referentes ao ambiente de desenvolvimento, controle de versão, ferramentas empregadas e o processo ágil adotado para gestão e acompanhamento das tarefas, utilizando a metodologia Scrum.

## Controle de versão

A ferramenta de controle de versão adotada no projeto foi o [Git](https://git-scm.com/), sendo que o [GitHub](https://github.com) foi utilizado para hospedagem do repositório.

O projeto segue a seguinte convenção para o nome de branches:

- `main`: versão estável já testada do software
- `unstable`: versão já testada do software, porém instável
- `testing`: versão em testes do software
- `develop`: versão de desenvolvimento do software

Quanto à gerência de issues, o projeto adota a seguinte convenção para etiquetas:

- `documentation`: melhorias ou acréscimos à documentação
- `bug`: uma funcionalidade encontra-se com problemas
- `enhancement`: uma funcionalidade precisa ser melhorada
- `feature`: uma nova funcionalidade precisa ser introduzida

A configuração e o padrão do projeto foi dado pelas seguintes convenções:

- Commits realizados frequentemente com mensagens claras e descritivas.
- Merges realizados sempre entre branches intermediárias (develop → testing → unstable → main) após validação.
- Uso sistemático de Pull Requests para revisão colaborativa antes do merge final para a branch main.
- Gestão de issues feita diretamente no GitHub, utilizando labels para melhor organização.

## Planejamento do projeto

###  Divisão de papéis


#### Sprint 1
- Repositório no GitHub / Preenchimento do README / Preenchimento da Documentação de Contexto / Preenchimento da Especificação do Projeto / Preenchimento das Referências / Inserir a URL do repositório Git nos slides e nos comentários de envio da tarefa: **Gabriel Assuncao Costa e Rafael Bernardoni Gomes**
- Planejamento do projeto: **Marcelo Henrique Passini Ferreira**
- Preenchimento do relatório: **Gabriela Maria da Silva**
- Slides e acompanhamento de projeto: **Krycia Figueiredo Azevedo e Vinicius do Amaral Fonseca Filho**

#### Sprint 2
- Modelagem AS-IS e TO-BE do processo 1: **Marcelo Henrique Passini Ferreira**
- Modelagem AS-IS e TO-BE do processo 2: **Gabriela Maria da Silva** 
- Apresentação do projeto: **Vinicius do Amaral Fonseca Filho**
- Preenchimento Github: **Gabriel Assuncao Costa**
- Documentação do projeto: **Rafael Bernardoni Gomes**
- Relatório APC: **Krycia Figueiredo Azevedo**

#### Sprint 3
- Planejamento e slides: **Marcelo Henrique Passini Ferreira**
- Jornada de usuários: **Gabriela Maria da Silva** 
- Prótotipação de telas: **Vinicius do Amaral Fonseca Filho**
- Projeto do banco de dados e Scripts: **Gabriel Assuncao Costa**
- Preenchimento de APC e partes 5 e 6 do Github: **Rafael Bernardoni Gomes**
- Diagramas, ER, DER e Scripts: **Krycia Figueiredo Azevedo**

#### Sprint 4
- QuizzListPage / QuizControler e slides: **Marcelo Henrique Passini Ferreira**
- Frontend da Landing page e parte da API REST de Gerenciamento de conteúdo: **Gabriela Maria da Silva** 
- Prótotipação de telas: **Vinicius do Amaral Fonseca Filho**
- Conexão backend/banco de dados/frontend e deploy: **Gabriel Assuncao Costa**
- Frontend do Cadastro de Usuario: **Rafael Bernardoni Gomes**
- Preencher o template APC, PostPage.vue / QuizzPage.vue e ChatComplement.php: **Krycia Figueiredo Azevedo**


###  Quadro de tarefas

#### Sprint 1

Atualizado em: 16/03/2025

| Responsável                          | Tarefa/Requisito                     | Iniciado em    | Prazo      | Status   | Terminado em    |
| :----                                |    :----                             |      :----:    | :----:     | :----:   | :----:          |
| Gabriel Assuncao Costa               | Documentação do projeto              | 01/03/2025     | 16/03/2025 | ✔️       |16/03/2025      |
| Gabriela Maria da Silva              | Preenche relatório para sistema APC  | 01/03/2025     | 16/03/2025 | ✔️       |16/03/2025      |
| Krycia Figueiredo Azevedo            | Slides, requisitos e personas        | 01/03/2025     | 16/03/2025 | ✔️       |16/03/2025      |
| Marcelo Henrique Passini Ferreira    | Planejamento do projeto              | 01/03/2025     | 16/03/2025 | ✔️       |16/03/2025      |
| Rafael Bernardoni Gomes              | Documentação do projeto              | 01/03/2025     | 16/03/2025 | ✔️       |16/03/2025      |
| Vinicius do Amaral Fonseca Filho     | Slides e acompanhamento do projeto   | 01/03/2025     | 16/03/2025 | ✔️       |16/03/2025      |

#### Sprint 2

Atualizado em: 05/04/2025

| Responsável                          | Tarefa/Requisito                                        | Iniciado em    | Prazo      | Status   | Terminado em    |
| :----                                |    :----                                                |      :----:    | :----:     | :----:   | :----:          |
| Gabriel Assuncao Costa               | Documentação do projeto                                 | 25/03/2025     | 06/04/2025 | ✔️       |05/04/2025      |
| Gabriela Maria da Silva              | Preencher relatório para sistema APC  e modelagem as-is | 25/03/2025     | 06/04/2025 | ✔️       |05/04/2025      |
| Krycia Figueiredo Azevedo            | Preenchimento e entrega parcial do relatório            | 25/03/2025     | 06/04/2025 | ✔️       |05/04/2025      |
| Marcelo Henrique Passini Ferreira    | Planejamento do projeto e modelagem as-is               | 25/03/2025     | 06/04/2025 | ✔️       |31/03/2025      |
| Rafael Bernardoni Gomes              | Documentação do projeto                                 | 25/03/2025     | 06/04/2025 | ✔️       |06/04/2025      |
| Vinicius do Amaral Fonseca Filho     | Slides e acompanhamento do projeto                      | 25/03/2025     | 06/04/2025 | ✔️       |05/04/2025      |

#### Sprint 3

Atualizado em: 11/05/2025

| Responsável                          | Tarefa/Requisito                                  | Iniciado em    | Prazo      | Status   | Terminado em    |
| :----                                |    :----                                          |      :----:    | :----:     | :----:   | :----:          |
| Gabriel Assuncao Costa               | Projeto do banco de dados                         | 06/04/2025     | 11/05/2025 | ✔️       |10/05/2025      |
| Gabriela Maria da Silva              | Jornada de usuários                               | 06/04/2025     | 11/05/2025 | ✔️       |10/05/2025      |
| Krycia Figueiredo Azevedo            | Responsável pelos diagramas                       | 06/04/2025     | 11/05/2025 | ✔️       |10/05/2025      |
| Marcelo Henrique Passini Ferreira    | Planejamento e slides                             | 06/04/2025     | 11/05/2025 | ✔️       |10/05/2025      |
| Rafael Bernardoni Gomes              | Preenchimento de APC e partes 5 e 6 do github     | 06/04/2025     | 11/05/2025 | ✔️       |11/05/2025      |
| Vinicius do Amaral Fonseca Filho     | Prótotipação de telas                             | 06/04/2025     | 11/05/2025 | ✔️       |10/05/2025      |

#### Sprint 4

Atualizado em: 08/06/2025

| Responsável                          | Tarefa/Requisito                                  | Iniciado em    | Prazo      | Status   | Terminado em    |
| :----                                |    :----                                          |      :----:    | :----:     | :----:   | :----:          |
| Gabriel Assuncao Costa               | Conexão backend/banco de dados/frontend e deply   | 02/06/2025     | 08/06/2025 | ✔️       |08/06/2025      |
| Gabriela Maria da Silva              | Frontend da Landing page e parte de API REST      | 01/06/2025     | 08/06/2025 | ✔️       |08/06/2025      |
| Krycia Figueiredo Azevedo            | Preencher Tamplete, frontend da PostPage          | 03/06/2025     | 08/06/2025 | ✔️       |08/06/2025      |
| Marcelo Henrique Passini Ferreira    | QuizzListPage e QuizzControler e slides           | 03/06/2025     | 08/06/2025 | ✔️       |08/06/2025      |
| Rafael Bernardoni Gomes              | Frontend de Cadastro de Usuario                   | 02/06/2025     | 08/06/2025 | ✔️       |08/06/2025      |
| Vinicius do Amaral Fonseca Filho     | Preenchimento do github                           | 01/06/2025     | 08/06/2025 | ✔️       |08/06/2025      |

#### Sprint 5

Atualizado em: 29/06/2025

| Responsável                          | Tarefa/Requisito                                  | Iniciado em    | Prazo      | Status   | Terminado em    |
| :----                                |    :----                                          |      :----:    | :----:     | :----:   | :----:          |
| Gabriel Assuncao Costa               | Conexão backend/banco de dados/frontend e deply   | 20/06/2025     | 29/06/2025 | ✔️       |29/06/2025      |
| Gabriela Maria da Silva              | Frontend da Landing page e parte de API REST      | 22/06/2025     | 29/06/2025 | ✔️       |29/06/2025      |
| Krycia Figueiredo Azevedo            | Preencher Tamplete, frontend da PostPage          | 21/06/2025     | 29/06/2025 | ✔️       |29/06/2025      |
| Marcelo Henrique Passini Ferreira    | QuizzListPage e QuizzControler e slides           | 23/06/2025     | 29/06/2025 | ✔️       |29/06/2025      |
| Rafael Bernardoni Gomes              | Frontend de Cadastro de Usuario                   | 24/06/2025     | 29/06/2025 | ✔️       |29/06/2025      |
| Vinicius do Amaral Fonseca Filho     | Preenchimento do github, revisão de RNF e RF                         | 21/06/2025     | 29/06/2025 | ✔️       |29/06/2025      |




Legenda:
- ✔️: terminado
- 📝: em execução
- ⌛: atrasado
- ❌: não iniciado

### Processo
O grupo adotou a metodologia ágil Scrum, utilizando quadros do GitHub Projects para acompanhar as tarefas, facilitando a visualização dos requisitos priorizados, divisão das atividades e andamento das entregas.

    Reuniões semanais foram estabelecidas para acompanhamento do desenvolvimento e ajustes das prioridades.

    Cada Sprint durou aproximadamente três semanas, com objetivos e tarefas previamente definidas.

    O quadro de projeto no GitHub foi dividido em:

        To do (A Fazer)

        In progress (Em Andamento)

        Done (Concluído)


## Relação de ambientes de trabalho

Os artefatos do projeto são desenvolvidos a partir de diversas plataformas. Todos os ambientes e frameworks utilizados no desenvolvimento da aplicação estão listados na seção abaixo.

### Ferramentas

A realização do projeto foi dada pelo uso das seguintes ferramentas:

| Ambiente                            | Plataforma                         | Link de acesso                         |
|-------------------------------------|------------------------------------|----------------------------------------|
| Repositório de código fonte         | GitHub                             | [http://.... ](https://github.com/ICEI-PUC-Minas-PBE-ADS-SI/2025-1-p5-tias-FarmaCeltas/tree/main/development)     |
| Documentos do projeto               | GitHub                             | [http://.... ](https://github.com/ICEI-PUC-Minas-PBE-ADS-SI/2025-1-p5-tias-FarmaCeltas/tree/main/docs)     |
| Projeto de interface                | Figma                              | [http://.... ]([https://www.figma.com/](https://www.figma.com/proto/lnQulNTTF49h82e39bnEki/Untitled?node-id=0-1&t=lewFvxycc712q0qB-1)) |
| Gerenciamento do projeto            | GitHub Projects                    | [http://.... ](https://github.com/orgs/ICEI-PUC-Minas-PBE-ADS-SI/projects/27)     |
| Hospedagem                          | Vercel                             | [http://.... ](http://farmaceltasvm.brazilsouth.cloudapp.azure.com:5173/)    |

Justificativas para as ferramentas adotadas:

    GitHub:
    Utilizado por ser amplamente aceito, fácil colaboração, controle de versão eficaz e integração nativa com gerenciamento de tarefas (issues e projetos).

    Figma:
    Escolhido pela facilidade na criação colaborativa de protótipos intuitivos, interativos e acessíveis, garantindo melhor compreensão do usuário.

    Vercel:
    Selecionado pela rapidez, simplicidade na hospedagem gratuita e integração nativa com GitHub, ideal para aplicações educacionais e ágeis.
 
