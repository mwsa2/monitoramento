# Softwares
  Laravel 11.x
  
  Postgresql 16
  
  VS code
# informacoes
  o arquivo comandos.txt contém os comandos usados no projeto, alguns arquivos e tabelas que
  não são usadas no projeto o Laravel criou automaticamente.

script de criacao do banco de dados
CREATE DATABASE "monitoramento_app"
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'Portuguese_Brazil.1252'
    LC_CTYPE = 'Portuguese_Brazil.1252'
    LOCALE_PROVIDER = 'libc'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;


  A pasta screenshots-Postman contém algumas imagens de testes de chamadas da API.
  Atentar para as operaçoes de PUT, que devem ser feitas com x-www-form-urlencoded.
  
# monitoramento_app
1. Eu, como usuário, desejo conseguir cadastrar uma categoria de transação
a. A categoria é composta por nome e id.
2. Eu, como usuário, desejo conseguir deletar uma categoria de transação
a. Deverá ser possível remover uma categoria através do ID. Atentar para as
transações relacionadas à categoria
3. Eu, como usuário, desejo conseguir listar categorias de transação
a. Retornar uma lista de todas as categorias e seus respectivos ID’s.
4. Eu, como usuário, desejo criar uma transação.
a. Uma transação armazena os seguintes dados: usuário que efetuou a transação,
tipo de transação (recebeu ou pagou), valor da transação e categoria da
transação.
5. Eu, como usuário, desejo remover uma transação.
a. Deverá ser possível remover uma transação através do ID.
6. Eu, como usuário, desejo listar minhas transações.
a. Retornar a lista de transações.
7. Eu, como usuário, desejo ltrar minhas transações.
a. Retornar a lista de transações com ltro. Possíveis ltros: transações por
categoria, transações por usuário e transações por tipo.
8. Eu, como usuário, desejo me cadastrar.
a. Criar um usuário que terá os seguintes dados: Nome completo, CPF, data de
cadastro, email e senha.
9. Eu, como usuário, desejo editar meus dados.
a. Editar um usuário através do seu ID.

10.Eu, como usuario, desejo deletar minha conta.
a. Deletar um usuário através do seu ID. Se atentar para as transações dos
usuários.

# Documentação dos endpoints
arquivo swagger.yaml
# Script para importação das tabelas do banco de dados
monitoramento-app\database\Dump
# Modelo de entidade relacionamento
monitoramento-app\database\Modelo-ERD

