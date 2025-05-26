🚀 Guia para rodar a aplicação Laravel com Docker

Este projeto usa Docker para simplificar o ambiente de desenvolvimento. Siga os passos abaixo para rodar a aplicação localmente.
✅ Pré-requisitos

    Docker instalado

    Docker Compose instalado (já vem incluso no Docker Desktop) 

📦 Primeira vez rodando o projeto

    Clone o repositório:

git clone <url-do-repositorio>
cd FarmaCeltas
docker compose up -d --build

Esse comando irá:

    Construir os containers (php, nginx, postgresql, etc.)

    Subir os serviços Laravel + PostgreSQL

    Montar os volumes com o código-fonte

    Instale as dependências do PHP (Composer):

docker compose run --rm composer install

    Gere a chave da aplicação:

docker compose run --rm artisan key:generate

    Corrija as permissões das pastas storage e bootstrap/cache:

docker compose exec php sh -c "chown -R www-data:www-data storage bootstrap/cache && chmod -R 775 storage bootstrap/cache"

    Execute as migrations do banco de dados:

docker compose run --rm artisan migrate

    (Opcional) Instale as dependências do front-end e compile os assets:

docker compose run --rm npm install
docker compose run --rm npm run dev

🌐 Acesse no navegador

Abra:

http://localhost:8000

Se tudo estiver certo, você verá a página inicial do Laravel ou da sua aplicação.
