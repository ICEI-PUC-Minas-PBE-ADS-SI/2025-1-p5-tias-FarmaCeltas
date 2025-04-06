# Modelagem dos processos de negócio

Nesta seção são descritos os processos atuais (AS-IS) e os processos propostos (TO-BE) relacionados ao projeto FarmaCeltas. Foram identificados processos atuais que envolvem dificuldades e gargalos, e sugeridas melhorias através da aplicação tecnológica proposta, trazendo maior eficiência ao contexto.

## Modelagem da situação atual (Modelagem AS IS)

No cenário atual, a farmácia parceira enfrenta problemas operacionais em um processo simples, porém crítico: o controle diário da temperatura ambiente para atender às exigências fiscais e garantir a validade dos medicamentos. Esse processo é realizado manualmente pelos funcionários, que preenchem formulários impressos com caneta, onde rasuras não são permitidas. Caso um erro ocorra ao registrar a temperatura, é necessário descartar todo o formulário preenchido e reiniciar o processo, o que gera desperdício significativo de tempo e material.

Além da clara ineficiência operacional, há um alto uso desnecessário de papel, criando desafios logísticos para armazenamento seguro dessas informações ao longo dos anos. Esse método também expõe os documentos ao risco de deterioração ou perda, podendo gerar complicações futuras em auditorias e fiscalizações.

## Descrição geral da proposta (Modelagem TO BE)

Nossa proposta para melhorar esse processo consiste na substituição dos formulários físicos por uma solução digital simples, utilizando ferramentas como Excel ou softwares similares. Dessa forma, o funcionário poderá registrar diariamente as temperaturas diretamente em formato digital, permitindo correções rápidas e sem necessidade de descartar registros anteriores devido a erros.

Além disso, o farmacêutico responsável poderá validar os registros digitalmente, utilizando assinaturas eletrônicas, e armazená-los em PDF, facilitando significativamente o envio e apresentação dos documentos em auditorias ou fiscalizações.

Essa abordagem digital soluciona os principais gargalos atuais:

    Redução do desperdício de papel (contribuição direta para sustentabilidade).

    Facilidade nas correções e manutenção dos dados.

    Melhoria logística (facilidade no armazenamento e organização).

    Redução dos riscos relacionados à perda ou deterioração de documentos físicos.

Com isso, o processo torna-se mais eficiente, organizado, seguro e sustentável, alinhado diretamente às estratégias da farmácia parceira e às exigências fiscais vigentes.

## Modelagem dos processos

[PROCESSO 1 - Controle de Temperatura](./processes/processo-1-nome-do-processo.md "Detalhamento do processo 1.")

[PROCESSO 2 - Entregas de Produtos](./processes/processo-2-nome-do-processo.md "Detalhamento do processo 2.")


## Indicadores de desempenho

Apresente aqui os principais indicadores de desempenho e algumas metas para o processo. Atenção: as informações necessárias para gerar os indicadores devem estar contempladas no diagrama de classe. Coloque no mínimo 5 indicadores.

Use o seguinte modelo:

| **Indicador** | **Objetivos** | **Descrição** | **Fonte de dados** | **Fórmula de cálculo** |
| ---           | ---           | ---           | ---             | ---             |
| Percentual de reclamações | Avaliar quantitativamente as reclamações | Percentual de reclamações em relação ao total de atendimentos | Tabela Reclamações | número total de reclamações / número total de atendimentos |
| Taxa de requisições atendidas | Melhorar a prestação de serviços medindo a porcentagem de requisições atendidas| Mede a % de requisições atendidas na semana | Tabela Solicitações | (número de requisições atendidas / número total de requisições) * 100 |
| Taxa de entrega de material | Manter controle sobre os materiais que estão sendo entregues | Mede % de material entregue dentro do mês | Tabela Pedidos | (número de pedidos entregues / número total de pedidos) * 100 |


Obs.: todas as informações necessárias para gerar os indicadores devem estar no diagrama de classe a ser apresentado posteriormente.
