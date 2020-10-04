<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="250"></a></p>

## Laravel com Vue.js

Projeto feito em Laravel e Vue.js com Axios, Vuex, VueRouter, que possue um crud de categoria e produto, onde produto nescessita de uma determinada categoria. 

Requerimentos:
- PHP >= 7.2.5
- Node

Crud:
- Criar
- Editar
- Salvar
- Excluir

## Baixar o projeto
Primeiro passo, clonar o projeto:
``` bash
# Clonar
git clone https://github.com/GeisonPiegas/laravel-vue.git

# Acessar
cd laravel-vue
```

## Configuração - Backend
Primeiro criar um banco de dados com o nome `laravel-vue` e depois:
``` bash
# Instalar dependências do projeto
composer install

# Criar migrations (Tabelas)
php artisan migrate
```

## Configuração - Frontend
``` bash
# Atualizar dependências
npm install

# Rodar em ambiente local (localhost:8080)
php artisan serve
```
