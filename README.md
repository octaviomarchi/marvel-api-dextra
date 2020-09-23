# marvel-api-dextra

## Set up ##

** Requirements: **

- Docker;
- Docker Compose;

** Running **

Inside the project folder run:

``` 
docker-compose up --build 
docker exec marvel-api-dextra composer install
docker exec marvel-api-dextra php artisan migrate

```

** Testing **

Inside the project folder run:

```
docker exec marvel-api-dextra php artisan test
```

** Web URI **

[localhost:7100](http://localhost:7100)

** Endpoints **

* `/v1/public/characters`
* `/v1/public/characters/{characterId}`
* `/v1/public/characters/{characterId}/comics`
* `/v1/public/characters/{characterId}/events`
* `/v1/public/characters/{characterId}/series`
* `/v1/public/characters/{characterId}/stories`