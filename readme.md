Развертывание:
php artisan migrate

composer dump-autoload

php artisan db:seed --class AdminCreate #Создание администратора login: "test-project-laravel@ya.ru" pass:"secret"

php artisan db:seed --class FileTableSeeder #Заполнение тестовыми данными

В Файле .env - указать настройки почтового сервера

отредактировать файл nginx.conf
http { 
     client_max_body_size 200M; 
} 

отредактировать файл php.ini
memory_limit = 200M 
post_max_size = 200M 
upload_max_filesize = 200M 