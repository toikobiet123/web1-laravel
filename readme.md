# Project command

## Start
```
docker-compose up
```

## Exec to php-c and type
```
composer install

php artisan migrate
```

## Add user admin
### Exec to php-c and type
```
php artisan tinker

User::create(["name"=> "vietbe","email"=>"viet.tq@gmail.com","password"=>bcrypt("123"), "role"=>"1"]);
```

## Add user non-admin
### Exec to php-c and type

```
php artisan tinker

User::create(["name"=> "dondinh","email"=>"don.dq@gmail.com","password"=>bcrypt("123"), "role"=>"0"]);

```
