# CLOVER WEBMASTER

## 安裝方法
* git clone https://github.com/skyhilam/webmaster.git projectname
* cd projectname
* composer install
* composer update
* cp .env.example .env
* php artisan key:generate
* setup Mysql
  * set DB_DATABASE
  * set DB_USERNAME
  * set DB_PASSWORD
* setup Mail
  * set MAIL_USERNAME
  * set MAIL_PASSWORD
* php artisan migrate --seed
* optionaly type npm install to manage assets
