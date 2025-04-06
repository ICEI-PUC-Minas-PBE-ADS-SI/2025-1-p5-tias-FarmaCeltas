### 3.3.2 Processo 2 – Entregas 
 
Na versão atual, ao receber um pedido, a farmácia verifica a disponibilidade do produto no estoque local. Quando não há disponibilidade, é feita uma solicitação à filial. Nesse cenário, o entregador precisa ir até a filial buscar o produto e, em seguida, passar na farmácia apenas para retirar o pedido impresso antes de realizar a entrega ao cliente. Esse fluxo gera deslocamentos desnecessários, atraso na entrega.
![Exemplo de um Modelo BPMN do PROCESSO 2](https://github.com/ICEI-PUC-Minas-PBE-ADS-SI/2025-1-p5-tias-FarmaCeltas/blob/main/docs/images/Entregas%20%20AS%20IS%20Diagrama.png?raw=true)

Na proposta de melhoria, o processo é reestruturado para permitir que, nos casos em que o produto está disponível somente na filial, o pedido também seja impresso diretamente na filial. Com isso, o entregador faz um único deslocamento até a filial, retirando tanto o produto quanto o pedido no mesmo local, e segue diretamente para a entrega. 

![Exemplo de um Modelo BPMN do PROCESSO 2](https://github.com/ICEI-PUC-Minas-PBE-ADS-SI/2025-1-p5-tias-FarmaCeltas/blob/main/docs/images/Entregas%20TO%20BE%20Diagrama.png?raw=true).


#### Detalhamento das atividades


**Receber Pedido**
Descrição: Nesta atividade, o atendente registra o pedido solicitado pelo cliente.

Versão COMO ESTÁ (AS-IS): O pedido é sempre impresso na farmácia, independentemente de onde o produto será retirado.
Versão A SER (TO-BE): O sistema identifica se o produto está apenas na filial. Nesses casos, o pedido é impresso diretamente na filial, otimizando o processo logístico.


| **Campo**       | **Tipo**         | **Restrições** | **Valor default** |
| ---             | ---              | ---            | ---               |
| nome_cleinte    | Caixa de texto   | Obrigatório    |                   |
| código_produto  | Caixa de texto   |  Obrigatório   |                   |
| quantidade      | Número           | Maior que 0    |                   |
| origem_pedido   |Seleção única     |Farmácia / Filial|    	Farmácia     |

| **Comandos**         |  **Destino**                   | **Tipo** |
| ---                  | ---                            | ---               |
| registrar            | 	Atividade 2 – Conferir Estoque| Padrão            |



**Conferir Estoque**
Descrição: O sistema verifica se o produto está disponível na farmácia ou na filial.

Versão COMO ESTÁ (AS-IS): A verificação é feita manualmente, e a decisão sobre onde imprimir o pedido não altera o fluxo.
Versão A SER (TO-BE): A verificação automatizada permite que, se o produto estiver apenas na filial, o pedido seja impresso lá, eliminando um deslocamento do entregador.

| **Campo**       | **Tipo**         | **Restrições** | **Valor default** |
| ---             | ---              | ---            | ---               |
| estoque_farmacia| Número           |        ≥ 0     |                   |
|  estoque_filial |      Número      |           ≥ 0  |                   |
|origem_disponível|  Seleção única   |      Automático|                   |

| **Comandos**         |  **Destino**                                   | **Tipo**          |
| ---                  | ---                                            | ---               |
| produto_local        | Atividade 3 – Separar e imprimir na farmácia|  |   padrão          |
| produto_filial       | Atividade 4 – Separar e imprimir na filial     |    padrão         |
| produto_indisponível | Atividade 5 – Avisar cliente                   |    padrão         |


**Separar e imprimir na Farmácia**
Descrição: O produto é separado na farmácia e o pedido é impresso localmente.

Versão COMO ESTÁ: Processo padrão seguido para todos os pedidos.
Versão A SER: Só ocorre quando o produto está de fato na farmácia.

| **Campo**       | **Tipo**        | **Restrições** | **Valor default** |
|-----------------|-----------------|----------------|-------------------|
| impressão       | Seleção única   | Sim / Não      | Sim               |
| responsável     | Caixa de texto  | Obrigatório    |                   |

| **Comandos** | **Destino**                        | **Tipo** |
|--------------|------------------------------------|----------|
| pronto       | Atividade 6 – Notificar entregador | padrão   |


**Separar e Imprimir na Filial**
Descrição: Quando o produto está apenas na filial, o pedido é impresso lá mesmo, evitando deslocamentos extras do entregador.

Versão COMO ESTÁ: Não é possível — o entregador precisa ir até a farmácia só para buscar o pedido.
Versão A SER: O pedido é enviado digitalmente à filial para impressão.

| **Campo**          | **Tipo**         | **Restrições** | **Valor default** |
|--------------------|------------------|----------------|-------------------|
| impressão_filial   | Seleção única    | Sim / Não      | Sim               |
| código_retirada    | Caixa de texto   | Obrigatório    |                   |

| **Comandos** | **Destino**                        | **Tipo** |
|--------------|------------------------------------|----------|
| pronto       | Atividade 6 – Notificar entregador | padrão   |


**Avisar Cliente**
Descrição: Caso o produto não esteja disponível nem na farmácia nem na filial, o cliente é avisado.

Versão COMO ESTÁ: Aviso pode demorar, pois depende de verificações manuais.
Versão A SER: Sistema automatiza a verificação e notifica o cliente mais rapidamente.


| **Campo**               | **Tipo**         | **Restrições**              | **Valor default** |
|-------------------------|------------------|------------------------------|-------------------|
| motivo_indisponível     | Área de texto    | Obrigatório                  |                   |
| canal_contato           | Seleção única    | WhatsApp / Email / Telefone  |                   |

| **Comandos** | **Destino** | **Tipo** |
|--------------|-------------|----------|
| fim          | Fim         | padrão   |



**Notificar Entregador**

Descrição: O entregador é informado sobre o local de retirada e o pedido já estará impresso no ponto correto.

Versão COMO ESTÁ: Entregador precisa ir até dois locais (filial + farmácia).
Versão A SER: Entregador vai direto até onde tudo está pronto, economizando tempo.


| **Campo**         | **Tipo**         | **Restrições**         | **Valor default** |
|-------------------|------------------|-------------------------|-------------------|
| nome_entregador   | Caixa de texto   | Obrigatório             |                   |
| local_retirada    | Seleção única    | Farmácia / Filial       |                   |

| **Comandos** | **Destino**         | **Tipo** |
|--------------|---------------------|----------|
| buscar       | Entregar ao cliente | padrão   |






