# Build & Set up

console

```
$ composer i
$ cp .env.example .env
```

.env

```
...
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=homestead
# DB_USERNAME=homestead
# DB_PASSWORD=secret
...
```

# Commands

|name|description|
|:--|:--|
|php artisan get:key|Get the ssh public key from GitHub to local DB.|
