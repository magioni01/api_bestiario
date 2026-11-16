# Bestiário API — Apenas um Show

API REST desenvolvida em PHP para consulta e gerenciamento de personagens do universo *Apenas um Show* (*Regular Show*), acompanhada de documentação Swagger e interfaces web interativas.

## Tecnologias Utilizadas
* **Backend:** PHP
* **Banco de Dados:** MySQL / MariaDB
* **Documentação:** Swagger / OpenAPI (`swagger.json`)
* **Frontend:** HTML5, CSS3 e JavaScript

## Estrutura do Projeto
* `api.php` — Endpoints da API RESTful.
* `db.php` — Configuração de conexão com o banco de dados.
* `db_bestiario.sql` — Script SQL para criação das tabelas e inserção dos personagens iniciais.
* `docs.html` e `swagger.json` — Documentação interativa das rotas da API.
* `index.html` — Tela principal de visualização do bestiário.
* `arena_pokemon.html` — Simulador de batalhas consumindo os dados da API.
* `estatisticas.html` — Painel de estatísticas dos personagens.
* `img/` — Recursos visuais dos personagens.

## Como Executar Localmente (XAMPP)

1. Copie a pasta do projeto para o diretório `htdocs` do seu XAMPP (ex: `C:\xampp\htdocs\api_bestiario`).
2. Inicie os serviços **Apache** e **MySQL** no painel de controle do XAMPP.
3. Acesse o **phpMyAdmin** (`http://localhost/phpmyadmin`), crie um banco de dados e importe o arquivo `db_bestiario.sql`.
4. Verifique se as credenciais de acesso no arquivo `db.php` correspondem ao seu ambiente local.
5. Acesse no navegador:
   * **Aplicação Web:** `http://localhost/api_bestiario/index.html`
   * **Documentação da API (Swagger):** `http://localhost/api_bestiario/docs.html`

## Autor
* **José Gabriel Magioni** — Análise e Desenvolvimento de Sistemas (FATEC Garça)
