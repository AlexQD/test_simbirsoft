Развертывание:
php artisan migrate

composer dump-autoload

php artisan db:seed --class AdminCreate #Создание администратора login: "test-project-laravel@ya.ru" pass:"secret"

php artisan db:seed --class FileTableSeeder #Заполнение тестовыми данными

В Файле .env - указать настройки почтового сервера