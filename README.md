# Conecta+

**Conecta+** é uma aplicação web de agenda telefônica desenvolvida com [Laravel Jetstream](https://jetstream.laravel.com/).  
Este projeto foi desenvolvido como parte do teste de proficiência em Laravel nível Júnior para a **Masterix Sistemas**. Todos os direitos são reservados à empresa.

> ### Cabeçalho do Teste
> 
> Teste proficiência em Laravel nível Júnior
> 
> Faça uma aplicação Jetstream para uma agenda telefônica.  
> Siga as seguintes especificações:
> 
> - Devemos armazenar o Nome, Endereço Completo, Data de Aniversário e os contatos da pessoa.
> - Cada pessoa pode ter quantos contatos o usuário quiser cadastrar.
> - Cada contato deve ser de um tipo que pode ser parametrizado no sistema, pelo usuário. Por exemplo: Telefone Fixo, Telefone Celular, E-mail, etc... 
> - A tela inicial do sistema mostra a lista dos registros no banco de dados, ordenado alfabeticamente; paginado de 10 em 10 registros. 
>   - Devem ser mostrados o Nome e os contatos da pessoa, por exemplo:
>     - **Rodolfo Stein**  
>       (62) 99987-7108 - Celular  
>       rodolfo@masterix.com.br - Email  
>       https://www.facebook.com/rodolfostein/ - Facebook
>     - **Fulano de Tal**  
>       (31) 12345-6789 - Fixo
> - Nesta tela inicial, deve haver um botão para incluir um novo registro. 
> - Deve ser possível pesquisar por nome ou parte dele (mínimo de 3 letras). 
> - Ao clicar no nome, o usuário é direcionado para uma tela onde pode editar o registro. 
>   - Na tela de edição do registro, é possível acrescentar, alterar ou excluir contatos. 
> - Na tela de edição, há um botão para deletar o registro. 
> - Foram criadas as migrations de todas as tabelas e os seeders necessários. 
> - A aplicação foi hospedada em um repositório (GitHub/GitLab) e as instruções para o setup foram enviadas. 
> 
> **Os quesitos avaliados serão:**
> - Aplicação que funcione conforme especificado;
> - Aderência aos conceitos do Framework Laravel / Jetstream;
> - Código conciso e bem documentado;
> - Capricho e Criatividade.

---

## Índice

- [Funcionalidades](#funcionalidades)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Pré-requisitos](#pré-requisitos)
- [Instalação](#instalação)
- [Uso](#uso)
- [Testes](#testes)
- [Contribuição](#contribuição)
- [Sobre](#sobre)

## Funcionalidades

- **Cadastro de Contatos:** Permite cadastrar pessoas com os seguintes dados:
  - Nome
  - Endereço Completo
  - Data de Aniversário
  - Múltiplos contatos personalizados (Telefone Fixo, Celular, E-mail, etc.)
- **Tela Inicial:**
  - Exibição de uma lista de pessoas ordenada alfabeticamente.
  - Paginação com 10 registros por página.
  - Barra de pesquisa por nome (mínimo de 3 letras).
  - Botão para adicionar um novo registro.
- **Tela de Edição:**
  - Atualização dos dados da pessoa.
  - Gerenciamento dos contatos (adicionar, editar ou excluir).
  - Botão para excluir o registro.
- **Autenticação:**  
  Devido à utilização do Laravel Jetstream, a aplicação permite o cadastro e login de quantos usuários forem necessários, possibilitando o acesso individualizado ao sistema.

## Tecnologias Utilizadas

- **Backend:** Laravel 10 com Jetstream
- **Frontend:** Blade, CSS e [Tailwind CSS](https://tailwindcss.com/)
- **Banco de Dados:** MariaDB (ou MySQL)
- **Gerenciamento de Dependências:** Composer, npm

## Pré-requisitos

Certifique-se de ter instalados em sua máquina:
- PHP 8.1 ou superior
- Composer
- Node.js e npm
- MySQL ou MariaDB
- Laravel CLI

## Instalação

Siga os passos abaixo para configurar a aplicação em seu ambiente local:

1. **Clone o repositório:**

   ```bash
   git clone https://github.com/ArthurNorb/conecta-plus.git
   cd conecta-plus
   ```

2. **Instale as dependências:**

   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Crie o arquivo de ambiente:**

   ```bash
   cp .env.example .env
   ```

   Configure o arquivo `.env` com as credenciais do seu banco de dados.

4. **Gere a chave da aplicação:**

   ```bash
   php artisan key:generate
   ```

5. **Execute as migrations e seeders:**

   ```bash
   php artisan migrate --seed
   ```

6. **Inicie o servidor local:**

   ```bash
   php artisan serve
   ```

   Acesse a aplicação pelo navegador em [http://127.0.0.1:8000/](http://127.0.0.1:8000/).

## Uso

Após a instalação, o sistema permite:
- Visualizar a lista de contatos na tela inicial.
- Realizar buscas rápidas utilizando a barra de pesquisa.
- Adicionar, editar ou remover contatos por meio das interfaces disponíveis.
- Efetuar cadastro e login, possibilitando que vários usuários possam utilizar a aplicação simultaneamente.

## Testes

Para executar a suíte de testes da aplicação, utilize o comando:

```bash
php artisan test
```

## Contribuição

Contribuições são sempre bem-vindas! Se você deseja melhorar o projeto, siga os passos abaixo:

1. Faça um fork deste repositório.
2. Crie uma branch para sua feature ou correção: `git checkout -b minha-feature`.
3. Realize as alterações necessárias e faça os commits.
4. Envie um pull request detalhando as mudanças realizadas.

## Sobre

Conecta+ foi desenvolvido com o objetivo de facilitar o gerenciamento de contatos de forma prática e eficiente, atendendo às especificações do teste de proficiência da Masterix Sistemas.  
Caso encontre algum problema ou tenha sugestões de melhoria, sinta-se à vontade para abrir uma issue ou enviar um pull request.
```
