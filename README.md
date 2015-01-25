Vacancy App
===========
Приложение для отображения списка вакансий, их фильтрации по отделу и языку.

Интересные файлы
======================
Контроллеры: https://github.com/Rottenwood/Vacancy/tree/master/src/Rottenwood/VacancyBundle/Controller

Сущности для Doctrine: https://github.com/Rottenwood/Vacancy/tree/master/src/Rottenwood/VacancyBundle/Entity

Репозитории DQL-запросов: https://github.com/Rottenwood/Vacancy/tree/master/src/Rottenwood/VacancyBundle/Repository

Основной сервис: https://github.com/Rottenwood/Vacancy/blob/master/src/Rottenwood/VacancyBundle/Service/VacancyService.php

Вид (view), реализованный без сторонних шаблонизаторов: https://github.com/Rottenwood/Vacancy/tree/master/src/Rottenwood/VacancyBundle/Resources/views/Default

jQuery приложение: https://github.com/Rottenwood/Vacancy/blob/master/web/assets/js/script.js

Таблица стилей CSS: https://github.com/Rottenwood/Vacancy/blob/master/web/assets/css/style.css

Тесты: https://github.com/Rottenwood/Vacancy/tree/master/src/Rottenwood/VacancyBundle/Tests

Команда для запуска тестов:
~~~
phpunit -c app/
~~~

Инструкция по установке
=======================
* Клонировать этот репозиторий:
~~~console
git clone https://github.com/Rottenwood/Vacancy.git
~~~

* Создать символическую ссылку на директорию web там, где она будет видна веб-серверу. Например, для LAMP:
~~~
sudo ln -s PROJECT_DIRECTORY/web /var/www/vacancy
~~~

* Перейти в директорию проекта и установить зависимости с помощью composer
~~~
cd PROJECT_DIRECTORY
php composer.phar install
~~~

* Скопировать файл конфигурации
~~~
cp app/config/parameters.yml.dist app/config/parameters.yml
~~~

* и внести в него реквизиты доступа к БД, изменив следующие строки
~~~
database_name:     THISISMYDBNAME
database_user:     THISISMYDBUSER
database_password: THISISMYDBPASS
~~~

* Создать базу данных и схему для нее
~~~
php app/console doctrine:database:create
php app/console doctrine:schema:create
~~~

* Загрузить fixtures-данные в БД
~~~
php app/console doctrine:fixtures:load
~~~

* Назначить права доступа на запись для пользователя веб-сервера, например для апача:
~~~
sudo setfacl -R -m u:www-data:rwX -m u:`whoami`:rwX app/cache app/logs && setfacl -dR -m u:www-data:rwx -m u:`whoami`:rwx app/cache app/logs
~~~

## Установка завершена!
Проект доступен по адресу http://localhost/vacancy
