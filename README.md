# Conecta+

Conecta+ é uma aplicação web de agenda telefônica desenvolvida com Laravel Jetstream. O objetivo é fornecer uma interface simples e eficiente para gerenciar contatos, incluindo a criação, edição, exclusão e pesquisa de registros.

## Funcionalidades

- Cadastro de pessoas com:
  - Nome
  - Endereço Completo
  - Data de Aniversário
  - Contatos múltiplos e personalizados (Telefone Fixo, Celular, E-mail, etc.)
- Tela inicial com:
  - Lista de pessoas ordenada alfabeticamente
  - Paginação de 10 registros por vez
  - Exibição de nome e contatos
  - Barra de pesquisa por nome (mínimo de 3 letras)
  - Botão para adicionar um novo registro
- Tela de edição:
  - Permite atualizar os dados de uma pessoa
  - Adicionar, editar ou excluir contatos
  - Botão para excluir o registro

## Tecnologias Utilizadas

- **Laravel 10** com **Jetstream**
- **Tailwind CSS** para estilização
- **MySQL** como banco de dados

## Pré-requisitos

- PHP 8.1+
- Composer
- Node.js e npm
- MySQL
- Laravel CLI

## Instalação

Siga os passos abaixo para configurar a aplicação:

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/conecta-plus.git
   cd conecta-plus
   ```

2. Instale as dependências:
   ```bash
   composer install
   npm install && npm run dev
   ```

3. Crie o arquivo `.env`:
   ```bash
   cp .env.example .env
   ```
   Configure o arquivo `.env` com as credenciais do seu banco de dados.

4. Gere a chave da aplicação:
   ```bash
   php artisan key:generate
   ```

5. Execute as migrations e seeders:
   ```bash
   php artisan migrate --seed
   ```

6. Inicie o servidor local:
   ```bash
   php artisan serve
   ```

Acesse a aplicação em [http://localhost:8000](http://localhost:8000).
