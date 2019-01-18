Развертывание:
composer install

создайте файл .env из .env.example заполнив своими парамметрами

php artisan migrate

composer dump-autoload

php artisan db:seed --class AdminCreate #Создание администратора login: "test-project-laravel@ya.ru" pass:"secret"

php artisan db:seed --class FileTableSeeder #Заполнение тестовыми данными, довольно длительный процесс 5 млн. записей

В Файле .env - указать настройки почтового сервера и размера загружаемого файла
MIN_FILE_SIZE - минимальный размер файла
MAX_FILE_SIZE - максимальный размер файла

В задании указано что принимать файлы не более 200Мб для этого:
 
    изменить настройки nginx
    http { 
         client_max_body_size 200M; 
    } 
    
    отредактировать файл php.ini
    memory_limit = 200M 
    post_max_size = 200M 
    upload_max_filesize = 200M 
    
    перезапустить службы

Административное меню : <domain_name>/admin
login: "test-project-laravel@ya.ru" pass:"secret"