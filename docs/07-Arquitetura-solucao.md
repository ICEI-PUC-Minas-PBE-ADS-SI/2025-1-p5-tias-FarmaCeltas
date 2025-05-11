# Arquitetura da solução

<span style="color:red">Pré-requisitos: <a href="05-Projeto-interface.md"> Projeto de interface</a></span>

Nesta seção, apresentamos a arquitetura proposta para o desenvolvimento do sistema FarmaCeltas. A arquitetura foi planejada para garantir modularidade, escalabilidade, manutenibilidade e segurança, respeitando as boas práticas de desenvolvimento de software.

O projeto será baseado em uma arquitetura multicamadas, separando claramente as responsabilidades entre Frontend, Backend e Banco de Dados, de forma a organizar o fluxo de dados e facilitar futuras expansões do sistema. A comunicação entre as camadas ocorrerá através de APIs RESTful, garantindo a interoperabilidade entre os componentes e permitindo uma experiência fluida ao usuário.

Além disso, o sistema será preparado para integrar-se com serviços externos, como a API do ChatGPT (para interação inteligente com os usuários), respeitando limites de segurança e privacidade.

A seguir, detalharemos as escolhas de tecnologias, os componentes da solução, a estrutura de comunicação entre módulos e as principais decisões de arquitetura adotadas.


## Diagrama de classes

O diagrama de classes ilustra graficamente a estrutura do software e como cada uma das classes estará interligada. Essas classes servem de modelo para materializar os objetos que serão executados na memória.
![DiagramaDeClasses](https://github.com/user-attachments/assets/0d5332ef-e17c-4560-b743-00909ef62c1b)

##  Modelo de dados

O desenvolvimento da solução FarmaCeltas exige a construção de uma base de dados robusta e integrada, capaz de sustentar o cadastro, a recuperação e o controle das informações relacionadas às funcionalidades e processos definidos. Essa estrutura permitirá o gerenciamento eficaz dos usuários, dos conteúdos educativos (vídeos, materiais, quizzes), das interações via ChatGPT, bem como o controle de registros operacionais, como o monitoramento da temperatura.

Com base na notação de Diagrama Entidade-Relacionamento (DER), foi elaborado um modelo conceitual unificado, contemplando todas as entidades, atributos e relacionamentos identificados nas etapas de levantamento dos processos de negócio. Este DER foi desenvolvido utilizando ferramentas específicas de modelagem, assegurando a padronização e a clareza dos elementos representados.

O modelo de dados também prevê o controle de acesso dos usuários, garantindo que cada perfil (usuário comum ou administrador) tenha permissões adequadas às suas funções no sistema, respeitando os papéis definidos no projeto de processos. As restrições de domínio, unicidade e integridade referencial foram implementadas para assegurar a consistência das informações armazenadas.

Por fim, a modelagem foi mapeada para um modelo relacional detalhado, especificando as tabelas, seus atributos, chaves primárias, estrangeiras, restrições de integridade e domínios, de forma a viabilizar a criação e operação da base de dados no Sistema Gerenciador de Banco de Dados (SGBD) escolhido.

## (NÃO ESQUECER DE COLOCAR) Apresente o modelo de dados por meio de um modelo relacional que contemple todos os conceitos e atributos apresentados na modelagem dos processos.

### Modelo ER

O Modelo ER representa, por meio de um diagrama, como as entidades (coisas, objetos) se relacionam entre si na aplicação interativa.

> **Links úteis**:
> - [Como fazer um diagrama entidade relacionamento](https://www.lucidchart.com/pages/pt/como-fazer-um-diagrama-entidade-relacionamento)

### Esquema relacional

O Esquema Relacional corresponde à representação dos dados em tabelas juntamente com as restrições de integridade e chave primária.
 

![Exemplo de um modelo relacional](images/modelo_relacional.png "Exemplo de modelo relacional.")
---

> **Links úteis**:
> - [Criando um modelo relacional - documentação da IBM](https://www.ibm.com/docs/pt-br/cognos-analytics/12.0.0?topic=designer-creating-relational-model)

### Modelo físico

Insira aqui o script de criação das tabelas do banco de dados.

Veja um exemplo:

```sql
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    type VARCHAR(50) NOT NULL CHECK (type IN ('admin', 'common')),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL
);

CREATE TABLE quizzes (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    topic VARCHAR(100) NOT NULL,
    difficulty VARCHAR(50) NOT NULL CHECK (type IN ('easy', 'medium', 'hard')),
);

CREATE TABLE questions (
    id SERIAL PRIMARY KEY,
    quiz_id INTEGER NOT NULL REFERENCES quizzes(id) ON DELETE CASCADE,
    statement TEXT NOT NULL,
    alternatives JSONB NOT NULL,
    correct_answer VARCHAR(255) NOT NULL
);

CREATE TABLE user_quiz_results (
    id SERIAL PRIMARY KEY,
    user_id INTEGER NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    quiz_id INTEGER NOT NULL REFERENCES quizzes(id) ON DELETE CASCADE,
    score INTEGER NOT NULL
);

CREATE TABLE ia_questions (
    id SERIAL PRIMARY KEY,
    user_id INTEGER NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    question_text TEXT NOT NULL,
    ia_response TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE temperatures (
    id SERIAL PRIMARY KEY,
    value DECIMAL(5,2) NOT NULL CHECK (value BETWEEN 10 AND 40),
    recorded_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    responsible_user_id INTEGER NOT NULL REFERENCES users(id) ON DELETE SET NULL
);
```
Esse script deverá ser incluído em um arquivo .sql na pasta [de scripts SQL](../src/db).


## Tecnologias

Descreva qual(is) tecnologias você vai usar para resolver o seu problema, ou seja, implementar a sua solução. Liste todas as tecnologias envolvidas, linguagens a serem utilizadas, serviços web, frameworks, bibliotecas, IDEs de desenvolvimento, e ferramentas.

Apresente também uma figura explicando como as tecnologias estão relacionadas ou como uma interação do usuário com o sistema vai ser conduzida, por onde ela passa até retornar uma resposta ao usuário.


| **Dimensão**   | **Tecnologia**  |
| ---            | ---             |
| Front-end      | HTML + CSS + JS + React |
| Back-end       | PHP         |
| SGBD           | PostgreSQL           |
| Deploy         | Vercel          |


## Hospedagem

A aplicação deve ser hospedada na plataforma Vercel, que oferece integração contínua com o GitHub e suporte nativo para aplicações front-end modernas, especialmente aquelas desenvolvidas com React. O front-end foi implantado diretamente a partir do repositório principal do projeto, utilizando a estrutura de build automática da plataforma, o que facilitou o processo de entrega contínua.

Já o back-end e o banco de dados foram desenvolvidos localmente em ambiente Docker e, posteriormente, planejados para migração futura para uma plataforma de hospedagem como Render, Heroku ou Railway, visando maior escalabilidade e integração com o PostgreSQL.

Essa estratégia de hospedagem foi pensada para permitir:

    Separação clara entre front-end e back-end;

    Facilidade de manutenção e testes;

    Acesso rápido e público à interface do sistema para avaliação acadêmica e extensão à comunidade.
    

Qualidade de Software

Para nortear o desenvolvimento do sistema FarmaCeltas, a equipe adotou como base o modelo de qualidade definido na norma ISO/IEC 25010, com foco nas seguintes subcaracterísticas:


| **Característica**   | **Subcaracterística** | **Justificativa**                                                                             |
| -------------------- | --------------------- | --------------------------------------------------------------------------------------------- |
| **Usabilidade**      | Operacionalidade      | A interface deve ser intuitiva e fácil de navegar para todos os públicos.                     |
|                      | Acessibilidade        | Conteúdos e textos precisam ser compreensíveis mesmo para leigos em tecnologia.               |
| **Desempenho**       | Tempo de resposta     | O sistema deve responder rapidamente às ações do usuário, especialmente nas buscas e quizzes. |
| **Confiabilidade**   | Maturidade            | O sistema deve ser estável e livre de falhas, garantindo confiança no uso diário.             |
| **Segurança**        | Confidencialidade     | As informações dos usuários devem ser protegidas, com controle de acesso adequado.            |
| **Manutenibilidade** | Modificabilidade      | O código deve ser organizado para facilitar correções e melhorias futuras.                    |



| **Subcaracterística** | **Métrica**                                | **Como será avaliada**                              |
| --------------------- | ------------------------------------------ | --------------------------------------------------- |
| Operacionalidade      | Tempo médio para completar um quiz         | Testes com usuários reais durante simulações de uso |
| Acessibilidade        | Contraste e legibilidade                   | Validação com Lighthouse e revisão de boas práticas |
| Tempo de resposta     | Tempo médio de resposta da API (em ms)     | Monitoramento com Postman ou JMeter                 |
| Maturidade            | Número de erros críticos durante testes    | Registro de falhas em sessões de testes             |
| Confidencialidade     | Armazenamento seguro de senhas (hash, JWT) | Revisão de código e testes de autenticação          |
| Modificabilidade      | Clareza e organização do código            | Avaliação por code review e padronização em equipe  |

