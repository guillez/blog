# blog

Blog armado con laravel 5.5 siguiendo los pasos del canal de youtube

https://www.youtube.com/watch?v=8KcSezUegr4

Hay que configurar algunos archivos como

.env

APP_NAME=Blog
.....

DB_DATABASE=nombre de base datos
DB_USERNAME=usuario de base datos
DB_PASSWORD=clave de base datos

-------------------

para generar tablas , una vez creada la base de datos se debe ejecutar

php artisan migrate

en caso de tener que ejecutar nuevamente , si bien se borran todos los datos, se debe ejecutar

php artisan migrate refresh

-----------------------------------

AYUDAS DE SENTENCIAS Y CONFIGURACIONES ADICIONALES

composer global require "laravel/installer"

composer create-project --prefer-dist laravel/laravel socios "5.5.*"

copiar .env.example a .env

php artisan key:generate

config/database.php

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'mi base de datos'),
            'username' => env('DB_USERNAME', 'mi usuario'),
            'password' => env('DB_PASSWORD', 'mi clave de acceso a base datos'),



php artisan make:auth

php artisan migrate

Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table

php artisan migrate


retroceder un paso en la migracion

php artisan migrate:reset   - elimina todo!!!

realizar cambio de la migracion retrocediendo un paso y luego ejecutando la migracion nuevamente

php artisan migrate:refresh

para realizar migracion sin borrar datos

php artisan make:migration add_profession_to_users

Schema::table('users', function (Blueprint $table) {
    $table->dropColumn('profession');
});

Schema::table('users', (Blueprint $table)) {
    $table->string('profession', 50)->nullable()->after('password');
});


para retornar al ultimo lote de migraciones

php artisan migrate:rollback

para agregar migracion

php artisan make:migration .....

php artisan make:migration create_ciudades_table
php artisan make:migration create_provincias_table
php artisan make:migration create_paises_table

----------------------

php artisan make:model paises -all

modelo es en singular con la primer letra mayuscula y las tablas en plural y en ingles
------------------------------

php artisan make:model -a Country 

php artisan migrate

php artisan migrate refresh

php artisan make:migration create_pais_table
