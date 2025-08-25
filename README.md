# CRUD de Login com Laravel

![Laravel](https://img.shields.io/badge/Laravel-v10-red) ![PHP](https://img.shields.io/badge/PHP-8.2-blue) ![MySQL](https://img.shields.io/badge/MySQL-v8-orange)

## Descrição

Este projeto é um **CRUD de login completo** desenvolvido em **Laravel**, que permite gerenciar usuários de forma segura e eficiente. Ele inclui funcionalidades de criação, leitura, atualização e exclusão de usuários, bem como autenticação básica com proteção de senha utilizando **hashing**.  

O objetivo é servir como base para sistemas que necessitam de gerenciamento de contas de usuários com segurança e boas práticas de desenvolvimento em Laravel.

---

## Funcionalidades

- **Registro de usuários**: Criação de contas com validação de campos.
- **Login e logout**: Autenticação segura usando hash de senhas.
- **CRUD de usuários**:  
  - Criar novos usuários  
  - Editar informações de usuários  
- **Proteção de rotas**: Apenas usuários autenticados podem acessar certas páginas.
- **Validações**: Todos os formulários possuem validação de dados do lado do servidor.
- **Feedbacks amigáveis**: Mensagens de sucesso e erro para todas as operações.

---

## Tecnologias Utilizadas

- **Backend**: [Laravel](https://laravel.com/) 10.x  
- **Banco de dados**: MySQL  
- **Frontend**: Blade templates + Bootstrap 5 (opcional)  
- **Segurança**: Hash de senhas (bcrypt), middleware de autenticação  

---

## Pré-requisitos

Antes de começar, você precisa ter instalado em sua máquina:

- PHP >= 8.2  
- Composer  
- MySQL  
- Node.js (opcional, se for usar Laravel Mix)  

---

## Instalação

1. Clone este repositório:

```
git clone https://github.com/seu-usuario/nome-do-repositorio.git
cd nome-do-repositorio
```
2. Instale as dependencias do laravel:

```
composer install
```
3. Configure o arquivo .env:

```
cp .env.example .env
```
4. Edite as variaveis do banco de dados:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```
5. Gere a chave da aplicação:

```
php artisan key:generate
```
6. Execute as migrations para criar as tabelas:

````
Execute as migrations para criar as tabelas:
````

7. Inicie o servidor:

````
php artisan serve
````

