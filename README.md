# Marcação de pontos no mapa
Micro aplicação web que possibilita marca pontos de interesse no mapa.

## Tecnologia
### Front-End
- [NodeJS](https://nodejs.org/en/)
- [VueCLI](https://cli.vuejs.org/) 
- [Vuetify](https://vuetifyjs.com/en/) 
- [Axios Vue](https://www.npmjs.com/package/vue-axios) 
- [Leaflet](https://leafletjs.com/)

### Back-End
- [PHP](https://www.php.net/manual/pt_BR/intro-whatis.php)
- [Lumen](https://lumen.laravel.com/)
- [PostgreSQL](https://www.postgresql.org/)

## Inicar o projeto
### back-End
Após clonar o repositório abra o termianl na pasta raiz da aplicação e execute esses comandos:
```php
cd api
cp .env.exemple .env
compose install
```

Após executar esses comandos, vamos executar as migrations, assim irá criar as tabelas do banco de dados:
```php
php artisan migrate
```
Após executar as migrations, vamos executar a aplicação:
```php
php artisan serve
```
A aplicação está rodando em `localhost:8000`;

### Front-End
Na pasta raiz da aplicação execute esses comandos:
```npm
cd client
npm i
```

Para starta a aplicação, execute esse comando:
```npm
npm run serve
```

A aplicação vai está rodando em `localhost:8080`.

## Video demonstrativo

[![Watch the video](https://i9.ytimg.com/vi_webp/XaNIttsvxGA/mqdefault.webp?time=1620522600000&sqp=COjs3IQG&rs=AOn4CLBQeUTtCo35LOMxOUxzkOk5X5bEVw)](https://youtu.be/XaNIttsvxGA)
