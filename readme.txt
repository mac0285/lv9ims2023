composer require haruncpi/laravel-user-activity
php artisan user-activity:install
//add on models
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class User extends Authenticatable
{
        use Loggable;
php artisan user-activity:delete all

<!-- CRUD DATA -->
//create crud modelel

 php artisan make:model SoftwareCrud -m

 //Create livewire
 php artisan make:livewire Software/SoftwareCrud

//edit file migration add field to databases
$table->id();
$table->string('sku', 100);
$table->string('type', 100);
//run migration table
php artisan migrate


////kita tambahkan route baru untuk fitur CRUD manage posts. Letakkan route tersebut di dalam middleware auth agar saat mangakses /
Software
use App\Http\Livewire\SoftwareCrud;
Route::get('softwares', SoftwareCrud::class)->name('softwares');
//edit view blade

//add navigation blade
<x-jet-nav-link href="{{ route('softwares') }}" :active="request()->routeIs('softwares')">
        softwares
</x-jet-nav-link>


//add migration atrrib add fields
php artisan make:migration add_branchcode_to_passwords_table --table=passwords
$table->string('branch_code')->after('remark')->nullable();


php artisan make:migration add_branchcode_to_services_table --table=services
$table->string('branch_code')->after('month_date')->nullable();


php artisan make:migration add_branchcode_to_usages_table --table=usages
$table->string('branch_code')->after('month_date')->nullable();




#add field
$table->string('photo')->after('diagnose');
$table->string('file_name')->after('photo');

//add icon

https://heroicons.com/


//optimisation --------------------------------

1. php artisan config:cache
2. php artisan config:clear
3. php artisan route:cache
4. php artisan route:clear
5. php artisan optimize --force  --- error message
6. composer dumpautoload -o
7. compile asset :
        php artisan optimize
        php artisan config:cache
        php artisan route:cache
8. production:
        npm run production


Laravel without auto-discovery:
If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

Barryvdh\Debugbar\ServiceProvider::class,
If you want to use the facade to log messages, add this to your facades in app.php:

'Debugbar' => Barryvdh\Debugbar\Facade::class,


Beberapa versi 8 php dependencies yang perlu diupgrade diantaranya:
"laravel/framework": "^7.0" menjadi "^8.0"
"facade/ignition": "^2.0" menjadi "^2.3.6"
"nunomaduro/collision": "^4.1" menjadi "^5.0"
"guzzlehttp/guzzle": "^6.3" menjadi "^7.0.1"
"php": "^7.2.5" menjadi "^7.3.0"
"phpunit/phpunit": "^8.5" menjadi  "^9.0"


php -S 127.0.0.1:8000  -t public/ server.php






/// sweet alert:Install Sweet Alert Package
1. composer install:
composer require realrashid/sweet-alert

php artisan sweetalert:publish


2.Setup Blade View
@include('sweetalert::alert')

3. call
use RealRashid\SweetAlert\Facades\Alert;
or
use Alert;
.....
.....
.....
protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Alert::success('Congrats', 'You\'ve Successfully Registered');

        // or using toast

        // Alert::toast('You\'ve Successfully Registered', 'success');

        return $user;
    }

4. using else

Alert::info('Info Title', 'Info Message');
Alert::warning('Warning Title', 'Warning Message');
Alert::error('Error Title', 'Error Message');
Alert::question('Question Title', 'Question Message');
Alert::image('Image Title!','Image Description','Image URL','Image Width','Image Height');
Alert::html('Html Title', 'Html Code', 'Type');


5. Menggunakan Helper Function Alert
alert('Title','Lorem Lorem Lorem', 'success');
alert()->success('Title','Lorem Lorem Lorem');
alert()->info('Title','Lorem Lorem Lorem');
alert()->warning('Title','Lorem Lorem Lorem');
alert()->error('Title','Lorem Lorem Lorem');
alert()->question('Title','Lorem Lorem Lorem');
alert()->image('Image Title!','Image Description','Image URL','Image Width','Image Height');
alert()->html('<i>HTML</i> <u>example</u>'," You can use <b>bold text</b>, <a href='//github.com'>links</a> and other HTML tags ",'success');

6.Toast
toast('Your Post as been submited!','success');




## add image thumbniel

php artisan vendor:publish --tag=thumbnail-config

php artisan thumbnail:purge


<img src="{{ Thumbnail::src($path)->crop(64, 64)->url() }}" />


<?php
    //load image from dir
    \Thumbnail::src(public_path('images/example.jpeg'));

    //load image from Storage::disk('local')
    \Thumbnail::src('userimage.jpg', 'local' /* disk */);

    //load image from website
    \Thumbnail::src('https://picsum.photos/200');
?>


#jika foto di service tidak muncul


1. hapus forder storage di public
2. jalankan  php artisan storage:link  ulang
3. done


## Hapus LOG Laravel
truncate -s 0 /var/www/html/laravel9ims/storage/logs/laravel.log
cat /var/www/html/laravel9ims/storage/logs/laravel.log


## SLACK logging
https://slack.com/apps/A0F7XDUAZ-incoming-webhooks
