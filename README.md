Vacancy App
===========
Приложение для отображения списка вакансий, их фильтрации по отделу и языку.

Интересные файлы
======================


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
