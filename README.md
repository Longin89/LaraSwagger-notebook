# Тестовое задание: записная книжка на Laravel

## Общая информация
Данный проект представляет собой API, реализующее базовые CRUD-операции.
Для документирования методов использован фреймворк Swagger.
Проект реализован на базе докер-контейнера и имеет пошаговую инструкцию по тестированию приложения.

## 0. Подготовка

Находясь в нужной директории, клонируем репозиторий на компьютер с помощью команды:

```git clone git@github.com:Longin89/LaraSwagger-notebook-main.git```

После этого, переходим в папку

```LaraSwagger-notebook-main```

## 1. Установка

Для начала нужно скачать все необходимое для  контейнера командой:

```docker-compose build```

После этого поднимем сервисы с помощью:

```docker-compose up -d```

Далее, нужно зайти в файловую систему контейнера:

```docker exec -it -i php /bin/bash```

В папку ```src```

```cd src ```

Чтобы установить зависимости командой:

```composer install```

После завершения установки в браузерной строке нужно перейти по адресу

```http://localhost```

Чтобы убедится, что Laravel работает

![Laravel](/screenshots/1.jfif)

#### Внимание: если страница Laravel не отображается - проверьте наличие полных прав на папку проекта и обновите страницу.
В Ubuntu, например, самый простой способ это сделать - ввести команду

```sudo chmod -R 777 '/папка_проекта/'```

## 2. Миграция базы данных

Там-же, в файловой системе контейнера введите команду

```php artisan migrate```

для миграции тестовой базы данных.

Проверить результат (помимо логов) можно с помощью PhpMyAdmin, находящемуся по адресу (таблица Notes в бд Notebooks)

```http://localhost:8080```

![Phpmyadmin](/screenshots/2.jfif)

## 3. Swagger

В адресной строке браузера перейдите по адресу

```http://localhost/api/documentation```

и откройте вкладку ```Note```

![Swagger](/screenshots/3.jfif)

API содержит в себе 5 методов:

```GET api/v1/notes``` - возвращает все записи БД, включая количество страниц и пагинацию

```POST api/v1/notes``` - добавляет новую запись в БД.

```GET api/v1/notes/{note}``` - возвращает запись с указанным ИД или ошибку, если запись не существует.

```PUT api/v1/notes/{note}``` - Обновляет запись с указанным ИД или возвращает ошибку, если запись не существует или введенные данные некорректны.

```DELETE api/v1/notes/{note}``` - Удаляет запись с указанным ИД или возвращает ошибку, если запись не существует.

Поля принимают следующие данные:

```fio``` - Фамилия Имя Отчество (string, обязательно);

```phone``` - телефон (int, обязательно);

```email``` - почта (email, обязательно);

```company``` - компания (string);

```birthday``` - дата рождения (date);

```photo``` - ссылка на фото (string);

#### Примечание: загрузка изображений (проверялась через Postman) осуществляется в папку /storage/app/public/папка пользователя, в базу передается ссылка на картинку в виде строки.


## 4. Тестирование

Тестирование API происходило в ручном режиме через интерфейс Swagger, а так-же с помощью программы [Postman](https://www.postman.com/downloads/ "Postman").

Помимо этого, результаты ответов сверялись с записями в PhpMyAdmin.

