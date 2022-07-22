How to run this 
1) Rename .env.example to .env
2) Update database informations and smtp informations for email notification
3) Run command "composer install" require (PHP v8.0.2)
4) Run command "php artisan key:generate"
5) Run command "php artisan migrate:fresh --seed"
6) Run command "php artisan serve"


To Access the admin panel type http://127.0.0.1:8000/admin in your url.
Admin details => Email : admin@gmail.com
                 password : 123
