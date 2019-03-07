## [Postman Collection with authorization requests](https://www.getpostman.com/collections/e8aaf23decfa7b4937b4)

## Модели и миграции

Модели: https://laravel.com/docs/5.8/eloquent

Миграции: https://laravel.com/docs/5.8/migrations

Создание новой модели с миграцией для нее:  
**php artisan make:model Flight -m**

Столбцы таблицы и модификаторы: https://laravel.com/docs/5.8/migrations#columns

Индексы (ключи): https://laravel.com/docs/5.8/migrations#indexes

Запуск миграции:  
**php artisan migrate**

Откат последнего набора миграций:  
**php artisan migrate:rollback**

Откат всех миграций:  
**php artisan migrate:reset**

## Контроллеры

Контроллеры: https://laravel.com/docs/5.8/controllers

Создание контроллера с REST API:  
**php artisan make:controller PhotoController --api**

## Роуты

Роуты: https://laravel.com/docs/5.8/routing

## Реквесты (запросы)

Реквесты: https://laravel.com/docs/5.8/validation#form-request-validation

Создание форм реквеста:  
**php artisan make:request StoreBlogPost**

Правила валидации: https://laravel.com/docs/5.8/validation#available-validation-rules

## Сидинг (заполнение БД данными)

Сидеры: https://laravel.com/docs/5.8/seeding

Создание сидера:  
**php artisan make:seeder UsersTableSeeder**

Фабрики: https://laravel.com/docs/5.8/database-testing

Сщздание фабрики:  
**php artisan make:factory PostFactory --model=Post**

Фейкер: https://github.com/fzaninotto/Faker