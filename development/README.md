Perfeito! Aqui está o `README.md` atualizado com o passo a passo completo e claro para rodar sua aplicação Laravel com Docker:

---

````markdown
# 🚀 Guia para rodar a aplicação Laravel com Docker

Este projeto utiliza Docker para facilitar o ambiente de desenvolvimento Laravel + PostgreSQL.  
Siga os passos abaixo para rodar a aplicação localmente.

---

## ✅ Pré-requisitos

- Docker instalado
- Docker Compose instalado (já vem incluso no Docker Desktop)

---

## 📦 Primeira vez rodando o projeto

### 1. Clone o repositório

```bash
git clone <url-do-repositorio>
cd FarmaCeltas
````

### 2. Crie o arquivo `.env`

```bash
cp development/.env.example development/.env
```

> Esse arquivo é essencial para o Laravel funcionar corretamente.

### 3. Suba os containers com Docker

```bash
docker compose up -d --build
```

Esse comando irá:

* Construir os containers (`php`, `nginx`, `postgresql`, etc.)
* Subir os serviços Laravel + PostgreSQL
* Montar os volumes com o código-fonte

### 4. Instale as dependências do PHP (Composer)

```bash
docker compose run --rm composer install
```

### 5. Gere a chave da aplicação

```bash
docker compose run --rm artisan key:generate
```

### 6. Corrija as permissões das pastas `storage` e `bootstrap/cache`

```bash
docker compose exec php sh -c "chown -R www-data:www-data storage bootstrap/cache && chmod -R 775 storage bootstrap/cache"
```

### 7. Execute as migrations do banco de dados

```bash
docker compose run --rm artisan migrate
```

### 8. (Opcional) Instale as dependências do front-end e compile os assets

```bash
docker compose run --rm npm install
docker compose run --rm npm run dev
```

---

## 🌐 Acesse no navegador

Abra o endereço:

[http://localhost:8000](http://localhost:8000)

Se tudo estiver certo, você verá a página inicial do Laravel ou da sua aplicação personalizada.

---

## 💡 Dicas

* Para acessar o terminal do container app:

  ```bash
  docker compose exec app sh
  ```

* Para acessar o banco PostgreSQL via linha de comando:

  ```bash
  docker compose exec postgresql psql -U appuser -d appdb
  ```

---
