# Modelagem dos Processos de Negócio

Nesta seção são descritos os processos atuais (**AS-IS**) e os processos propostos (**TO-BE**) relacionados ao projeto **FarmaCeltas**. Foram identificados gargalos e dificuldades nos processos atuais, sendo propostas melhorias significativas através da aplicação de soluções tecnológicas, visando trazer eficiência operacional, sustentabilidade e organização.

---

## Processo 1 – Controle Diário de Temperatura

### Situação Atual (AS-IS)

No cenário atual, a farmácia enfrenta dificuldades operacionais no controle diário da temperatura ambiente, procedimento obrigatório para atender às exigências fiscais e garantir a validade dos medicamentos. Esse controle é realizado manualmente, onde os funcionários preenchem formulários impressos com caneta, sem possibilidade de rasuras. Caso ocorra um erro ao registrar a temperatura, todo o formulário precisa ser descartado e preenchido novamente, gerando desperdício significativo de tempo e material.

Além disso, há alto uso desnecessário de papel e dificuldades logísticas no armazenamento seguro das informações impressas, expondo os documentos a riscos de perda ou deterioração, podendo gerar problemas futuros em auditorias e fiscalizações.

### Proposta de Solução (TO-BE)

A proposta para otimizar este processo consiste na substituição dos formulários físicos por uma solução digital, utilizando ferramentas como Excel ou aplicativos semelhantes. Dessa forma, os funcionários podem realizar o registro diário das temperaturas digitalmente, permitindo correções rápidas sem a necessidade de descartar registros anteriores devido a erros.

O farmacêutico responsável poderá validar os registros digitalmente por meio de assinaturas eletrônicas e armazená-los em formato PDF, facilitando significativamente a organização e apresentação dos documentos em auditorias e fiscalizações.

**Benefícios esperados:**

- Redução do desperdício de papel, contribuindo com a sustentabilidade;
- Maior agilidade nas correções e manutenção das informações;
- Melhoria logística devido à facilidade no armazenamento e organização;
- Diminuição dos riscos associados à perda ou deterioração de documentos físicos.

Assim, o processo torna-se eficiente, sustentável e alinhado diretamente às estratégias da farmácia parceira.

- [Detalhamento Completo - Processo 1](./processes/processo-1-nome-do-processo.md)

---

## Processo 2 – Entrega de Produtos

### Situação Atual (AS-IS)

Atualmente, quando um pedido é feito pelo cliente, a farmácia verifica manualmente se há disponibilidade do produto no estoque local. Caso não esteja disponível, uma solicitação é feita à filial. Nesse cenário, o entregador precisa se deslocar primeiro até a filial para buscar o produto e depois passar novamente na farmácia apenas para retirar o pedido impresso antes de realizar a entrega ao cliente. Esse fluxo operacional resulta em deslocamentos desnecessários e atrasos nas entregas.

### Proposta de Solução (TO-BE)

A proposta consiste em reestruturar esse processo permitindo que, nos casos onde o produto esteja disponível somente na filial, o pedido seja impresso diretamente no local. Com essa mudança, o entregador realiza um único deslocamento até a filial, onde retira simultaneamente o produto e o pedido impresso, seguindo diretamente para a entrega ao cliente.

**Benefícios esperados:**

- Redução significativa de deslocamentos e economia de combustível;
- Otimização do tempo de entrega ao cliente;
- Diminuição do consumo de papel devido à redução das impressões duplicadas;
- Melhor organização operacional entre a farmácia e filial.

- [Detalhamento Completo - Processo 2](./processes/[Farmaceltas] Sprint 2 - Processo 2:: Entregas.md)

---

## Indicadores de Desempenho

A seguir, são apresentados indicadores essenciais para avaliar a eficácia dos processos propostos. Esses indicadores estão alinhados com os objetivos estratégicos e operacionais do projeto **FarmaCeltas**:

| Indicador                               | Objetivo                                 | Descrição                                                                | Fonte de Dados       | Fórmula de cálculo                                           |
|-----------------------------------------|------------------------------------------|--------------------------------------------------------------------------|----------------------|--------------------------------------------------------------|
| Percentual de erros em registros        | Avaliar redução de erros operacionais    | Mede o percentual de erros no preenchimento diário dos registros         | Tabela Registros     | (total de erros de registro / total de registros) * 100      |
| Tempo médio gasto em registro diário    | Avaliar eficiência no processo diário    | Mede o tempo médio diário gasto pelos funcionários para registro da temperatura | Tabela Registros | (∑ tempo diário dos registros / número total de registros)   |
| Percentual de entregas dentro do prazo  | Avaliar eficiência logística das entregas| Mede o percentual de entregas realizadas dentro do prazo previsto        | Tabela Entregas      | (entregas no prazo / total entregas realizadas) * 100        |
| Quantidade mensal de papel consumido    | Monitorar redução no uso de papel        | Mede a quantidade total mensal de papel utilizado pela farmácia          | Controle Impressões  | Quantidade absoluta mensal de papel usado                    |
| Índice de satisfação dos funcionários   | Avaliar impacto interno das mudanças     | Mede a satisfação dos funcionários com as melhorias implementadas        | Pesquisa Interna     | (funcionários satisfeitos / total de funcionários entrevistados) * 100 |

> **Observação:**  
> Todas as informações necessárias para o cálculo desses indicadores deverão estar claramente especificadas no diagrama de classes do projeto, garantindo a viabilidade da coleta e análise dos dados propostos.
