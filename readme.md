Local Installation, I assume you have local server like Xampp
Create a database locally named news 
Import the news.sql 

Download composer https://getcomposer.org/download/
Pull Laravel/php project from git provider.
Rename .env.example file to .env inside your project root and fill the database information. (windows wont let you do it, so you have to open your console cd your project root directory and run mv .env.example .env )
Open the console and cd your project root directory)
On my .env file i was using my gmail and had something like this on email information.
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=yourEmail
MAIL_PASSWORD=yourPassword
MAIL_ENCRYPTION=tls
Remember to change global mail address in config/mail.php and turn the option "Allow less secure apps" ON if you will use gmail.

Run composer install or php composer.phar install
Run php artisan serve

if everything goes well You can now access your project at localhost:8000
