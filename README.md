# Instruções para Configuração do Projeto

Este repositório contém um projeto Laravel. Siga os passos abaixo para configurá-lo e executá-lo localmente.

## 1. Clonar o Projeto

Para começar, clone o projeto para o seu ambiente local usando o seguinte comando:

git clone https://github.com/calditostech/bookstore.git

## 2. Inicializar o Docker Compose

./vendor/bin/sail up -d

## 3. Acessar o Container do Docker

docker exec -it bookstore-laravel.test.bookstore-1 bash

## 4. Executar as Migrações do Banco de Dados

php artisan migrate

## 5. Instalar Dependências do Composer

composer install

## 6. Compilar os Ativos do Frontend

npm install e npm run dev

## 7. Acesso ao Sistema

Email: admin@teste.com.br
Senha: 12345678

## 8. Tela projeto

<img src="img/tela_bookstore.png" alt="Preview do Projeto" width="500"/>



