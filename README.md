# Build & Set up

console

```
$ composer i
$ cp .env.example .env
$ touch database/database.sqlite
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
|php artisan get:key|Get the ssh public keys from GitHub to local DB.|

# Response

|response|description|
|:--|:--|
|Success!||
|Status: 200 OK|Found the account, but not found the ssh public keys.|
|Status: 404 Not Found|Not found the account.|
