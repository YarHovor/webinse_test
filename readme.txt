Задание сделано с помощью фреймворка Symfony.

1. Установить Composer.
2. Клонировать приложение из репозитория и перейти в его директорию:
    https://github.com/YarHovor/webinse_test
3. Запустите в консоли: composer install и дождаться конца установки.
4. Файл с дампом базы данных находится в корне папке - dump.sql
    Пользователь: dev
    Пароль: dev
    БД: db_wbns

    (настройка доступа в файле - .env ; 27 строка - DATABASE_URL=mysql://dev:dev@127.0.0.1:3306/db_wbns)
5. Запуск встроенного в PHP веб-сервер - bin/console server:start
