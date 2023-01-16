# Установка проекта
Копирование репозитория

    git clone https://github.com/Sararun/test-task-kontur.git
Зайти в проект

    cd test-task-kontur
Скопировать env.example в .env

    cp .env.example .env
Установить composer

    composer install
Зайти в env и установить значения
   Конфигурация бд
    
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=test_task_kontur
    DB_USERNAME=sail
    DB_PASSWORD=password
    
   Конфигурация mailer
   
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.yandex.ru
    MAIL_PORT=587
    MAIL_USERNAME=*@yandex.ru * сюда ввести свою почту
    MAIL_PASSWORD=Пароль
    MAIL_ENCRYPTION=
    MAIL_FROM_ADDRESS="*@yandex.ru" * сюда ввести свою почту
    MAIL_FROM_NAME="${APP_NAME}"
        
        На данный момент mailer только с яндексом работает
 
Зайти в контейнер
    
    sail up
    
    docker-compose exec laravel.test bash
    
    php artisan migrate

    exit
 Заполнение бд
    
    Создайте пользователя у которого поле is_admin = 1
    Мой код берёт админов и отправляет им всем данные нового пользователя
# Работа в программе
Если установка прошла успешно, 
    
    docker-compose exec laravel.test bash
    
    php artisan serve
больше некаких действий со стороны программиста не требуется, код работает автоматически

# Объяснение кода
Буду описывать те модули, которые создавал и редактировал

## Model

   #### User
 
        Описал поля, которые должны вставляться в бд

## Controller

   #### UserController
  
        Принимает данные с апи которые прошли валидацию,отправляет на почту админу, кладёт их в бд

## Requests
 
   #### UserPostRequest
  
        Описал ответ на данные из фронта и написал правила валидации

## Resource
 
  ####  UserResource
  
        Описал данные, которые должно лететь в бд 

## Mail

  ####  UserData
    
        Описал данные которые должно лететь в письмо

Миграции в папке миграций

Шаблон письма в views\userData.bldae.php
  


