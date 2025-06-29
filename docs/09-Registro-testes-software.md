# Registro de testes de software

<span style="color:red">Pré-requisitos: <a href="05-Projeto-interface.md"> Projeto de interface</a></span>, <a href="08-Plano-testes-software.md"> Plano de testes de software</a>

Relatório com as evidências dos testes de software realizados no sistema pela equipe, baseado em um plano de testes pré-definido.
O Registro de Testes documenta a execução prática dos casos de teste descritos. Esta seção comprova, com evidências, que os testes foram realizados por membros da equipe, conforme metodologia descrita (Metodologia).

O registro de testes de software é uma etapa essencial no ciclo de desenvolvimento do projeto FarmaCeltas, pois garante que todas as funcionalidades implementadas foram verificadas na prática e cumprem os requisitos definidos. Esse registro serve para documentar, de forma organizada, as evidências dos testes realizados, oferecendo rastreabilidade e transparência para a equipe e stakeholders.

A realização e documentação dos testes permite identificar pontos fortes e eventuais falhas na aplicação antes de sua disponibilização ao público, possibilitando correções que aumentam a qualidade e a confiabilidade do sistema. Além disso, contribui diretamente para a melhoria contínua do projeto, pois gera dados valiosos para orientar futuras iterações de desenvolvimento.

Em resumo, este registro demonstra que o sistema foi testado a partir do ponto de vista do usuário, validando que os fluxos principais de cadastro, login, navegação em conteúdos educativos, quizzes e interação via chat funcionam corretamente. Assim, reforça o compromisso do time com a entrega de uma solução estável, segura e eficaz para promover a educação sobre o uso seguro de medicamentos.



| **Caso de teste** 	| **CT-001 – Cadastrar Usuário** 	|
|:---:	|:---:	|
| Requisito associado | RF-001 - Permitir cadastro de usuários. |
| Registro de evidência | https://github.com/user-attachments/assets/c8e2646a-f09e-42e1-82af-ca78db99f7f4 |



| **Caso de teste** 	| **CT-002 – Efetuar login** 	|
|:---:	|:---:	|
| Requisito associado | RF-002 - Permitir sistema de login. |
| Registro de evidência | https://github.com/user-attachments/assets/e535c3c2-7fab-491b-b7ce-cd2539457df2 |

| **Caso de teste** 	| **CT-003 – Acessar vídeos educativos** 	|
|:---:	|:---:	|
| Requisito associado | RF-003 - Disponibilizar vídeos educativos. |
| Registro de evidência |  https://github.com/user-attachments/assets/bb7d10a1-3a8a-4242-a27c-5063f7636795|

| **Caso de teste** 	| **CT-004 – Realizar quizzes interativos** 	|
|:---:	|:---:	|
| Requisito associado | RF-004 - Disponibilizar quizzes interativos para testar o aprendizado dos usuários. |
| Registro de evidência | https://github.com/user-attachments/assets/c4d880a8-0691-452f-8fdc-f8efe7da9e0d |

| **Caso de teste** 	| **CT-005 – Consultar materiais escritos** 	|
|:---:	|:---:	|
| Requisito associado | RF-005 - Disponibilizar materiais escritos validados cientificamente. |
| Registro de evidência | https://github.com/user-attachments/assets/eb36987a-70e2-405a-8027-e6e42e7fdea6 |

| **Caso de teste** 	| **CT-006 – Enviar perguntas ao ChatGPT** 	|
|:---:	|:---:	|
| Requisito associado | RF-006 - Permitir que o usuário faça perguntas respondidas pelo ChatGPT. |
| Registro de evidência | PENDENTE |

| **Caso de teste** 	| **CT-007 – Gerenciar quizzes e materiais (admin)** 	|
|:---:	|:---:	|
| Requisito associado | RF-007 - Permitir que administradores gerenciem quizzes e materiais educativos. |
| Registro de evidência | PENDENTE |



> **Links úteis**:
> - [Screencast: entenda o que é e como gravar vídeos com ele](https://rockcontent.com/br/blog/screencast/) 

## Avaliação

Durante o processo de desenvolvimento da aplicação FarmaCeltas, foram realizados testes com foco na funcionalidade, usabilidade e desempenho do sistema, avaliando a eficácia das principais ferramentas oferecidas: integração com vídeos educativos, quizzes interativos, canal de perguntas com ChatGPT e materiais escritos com base científica.

Os pontos fortes identificados incluem a boa responsividade da interface, que se adaptou bem, e a experiência intuitiva do usuário durante a navegação, especialmente nos quizzes interativos, que se mostraram eficazes na fixação dos conteúdos. O canal de perguntas com o ChatGPT também apresentou resultados satisfatórios, oferecendo respostas rápidas e claras para dúvidas comuns sobre medicamentos, o que validou sua utilidade como recurso de apoio.

Entretanto, alguns pontos fracos também foram observados. Em determinados momentos, o sistema apresentou lentidão no carregamento de vídeos integrados via API, especialmente em conexões mais instáveis. Além disso, o módulo de perguntas e respostas, apesar de funcional, demonstrou limitações em compreender contextos muito específicos ou perguntas formuladas com ambiguidade, o que pode comprometer a confiança do usuário. Também foi percebida a ausência de um mecanismo de feedback imediato para relatar respostas insatisfatórias da IA.

> **Links úteis**:
> - [Ferramentas de Teste para JavaScript](https://geekflare.com/javascript-unit-testing/)
