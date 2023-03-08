 

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About APPS
 Project Office akgyk - laravel inventory system
Laravel is accessible, powerful, and provides tools required for large, robust applications.
 <p align="center">
    <a href="https://github.com/mac0285" target="_blank"><img src="http://ims.anggunkreasi.com/img/anggun.ico" width="120"></a>
</p>

http://ims.anggunkreasi.com

user: demo@admin.com
pwd:  123123123

git config --global user.name "haris rifai"
git config --global user.email "jiwa.yang.mati.rasa@gmail.com"

GIT:
## Instalasi 
 OPen Git Terminal
```bash
##clone from gitlab

git clone https://gitlab.com/mac0285/ims-laravel8.git

cd point-of-sale-laravel-9
```
 
### Setup Aplikasi
Jalankan perintah 
```bash
composer update
```
atau:
```bash
composer install
```
Copy file .env dari .env.example
```bash
cp .env.example .env
```
Konfigurasi file .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=example_app
DB_USERNAME=root
DB_PASSWORD=
```
Opsional
```bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:
APP_DEBUG=true
APP_URL=http://example-app.test
```
Generate key
```bash
php artisan key:generate
```
Migrate database
```bash
php artisan migrate
```
Seeder table User, Pengaturan
```bash
php artisan db:seed
```
Menjalankan aplikasi
```bash
php artisan serve
```

[MIT license](https://opensource.org/licenses/MIT)


(Optional) Create a symbolic link from public/storage to storage/app/public (docs):
php artisan storage:link
# lv8-ims
# systemITjogja
