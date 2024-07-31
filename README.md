# laravel-vue-task

## Требования

- nodejs 16.20.2
- php 8.1

## Установка

настраиваем .env из .env.example и запускаем комманды:
- <code>composer install</code>
- <code>php artisan migrate</code>
- <code>npm install</code>
- <code>npm run build</code> 
- <code>php artisan serve</code> 

## Работа в админке

логинимся и у нас естж доступ к страницам юзеров и платежей.
Мы можем менять статус платежа и прибавится баланс юзера.

## Работа с Postman

### Генерим токен в постмане для апи запросов

#### Метод:
<code>POST</code>

#### Ендпоинт:
<code>http://127.0.0.1:8000/api/get-token</code>

#### Тело:
<pre> {"email" : "", "password" : ""}</pre>


#### Результат: 

<pre>{"token": "4|CA8hUkvhyqED8lxu3WEM7AvZOIvNuLhk9CNEmAjSf6b77139"}</pre>


<hr>


### Для создания платежа

#### Метод:
<code>POST</code>

#### Ендпоинт:
<code>http://127.0.0.1:8000/api/payments</code>

#### Тело:
<pre>
{
    “payment_id”: “2bb346ad-e49e-4232-b96e-fa930d5b5ff7”
    "login": "User-1",
    "details": "description",
    “amount”: 10000,
    "currency": "RUB",
    “status”: “CREATED”
} 
</pre>


#### результат:

<pre>
{
    "login": "user-1",
    "details": "description",
    "amount": "10000",
    "currency": "RUB",
    "status": "created",
    "payment_id": "2bb346ad-e49e-4232-b96e-fa930d5b5ff7",
    "updated_at": "2024-07-31T09:48:08.000000Z",
    "created_at": "2024-07-31T09:48:08.000000Z",
    "id": 6
}
</pre>
