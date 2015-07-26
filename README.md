# POST request logger

PHP Dumper using Websockets

## Install

Install node dependencies
```
npm install
```
Install PHP dependecies
```
composer install
```
Install bower dependencies

## Start the socket.io server
```
node node/server.js
```

## Start the PHP server
```
php -S 0.0.0.0:8080 -t www

```

## Check application

* open browser at localhost:8080/Hello
* perform a post request to the endpoint: localhost:8080/Hello and see the browser's console

there's a dummy script to perform a sample POST request
```
node node/post.js
```