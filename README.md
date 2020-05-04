# InfyOmCRUDExample
CRUD Generado con Laravel y InfyOm

Basado en https://labs.infyom.com/laravelgenerator/docs/6.0/installation
# Instalacción :
1) Generar proyecto de Laravel 6:
``` 
composer create-proyect laravel/laravel=6.0.* LaravelGeneratorExample 
```
2) Ingresar al archivo de composer.json en el proyecto y agregar las siguientes lineas en la sección de "require":
``` 
"require": {
    "infyomlabs/laravel-generator": "6.0.x-dev",
    "laravelcollective/html": "^6.0",
    "infyomlabs/adminlte-templates": "6.0.x-dev"
    } 
```
3) Actualizar el composer con:
```
composer update
```
4) Agregar los Alias en el archivo de configuración config/app.php, agregar en el arrelgo de "Aliases" lo siguiente:
```
'Form'      => Collective\Html\FormFacade::class,
'Html'      => Collective\Html\HtmlFacade::class,
'Flash'     => Laracasts\Flash\Flash::class,
```
5) Ejecutar el comando de:
```
php artisan vendor:publish
```
6) Actualizar las rutas principales del API modificando el archivo app\Providers\RouteServiceProvider.php y actualizar las mapApiRoutes, por lo siguiente:
```
Route::prefix('api')
    ->middleware('api')
    ->as('api.')
    ->namespace($this->namespace."\\API")
    ->group(base_path('routes/api.php'));
```
7)Publicar el generador para iniciar a trabajar con el con el siguiente comando:
``` 
php artisan infyom:publish 
```
8)Instalar la versión de laravel/ui 1.2:
```
composer require laravel/ui "^1.2"
```
9)Generar el motor del diseño para Bootstrap con: 
```
php artisan ui bootstrap --auth
```
10)Sobre escribir la autenticación con el motor de laravel/ui sobre la autenticación de Laravel por defecto(Esto generara tambien los menus y otros archivos necesarios):
```
php artisan infyom.publish:layout
```
11)Se agregan las siguientes lineas al archivo de rutas(Routes/web.php):
```
Auth::routes();
Route::get('/home', 'HomeController@index'); 
```
12)Se habilita la opción del menú en config/infyom/laravel_generator.php agregando ('enabled'       => true) en la sección del menu quedando como:
```
'add_on' => [
        'swagger'       => false,
        'tests'         => true,
        'datatables'    => false,
        'menu'          => [
            'enabled'       => true,
            'menu_file'     => 'layouts/menu.blade.php',
        ],
    ],
```
# Generar CRUD
1) Generar un CRUD(scaffold):
```
php artisan infyom:scaffold $NOOMBRE_MODELO
```
*Sustituyendo el $NOOMBRE_MODELO por el Nombre del Modelo a generar(Notas, Autos, Usuarios, etc).*
2) Una vez generado el modelo ingresar los datos del campo en base a la configuración siguiente:
Para la especifiación de entradas deberan de colocarse de acuerdo a 
name db_type html_type options
Es decir:
- name - Nombre del Campo
- db_type - Tipo de dato, por ejemplo:
 - string - $table->string('field_name')
 - string,25 - $table->string('field_name', 25)
 - text - $table->text('field_name')
 - Para enumerar datos, enum,Sun,Mon,Tue - $table->enum('field_name', ['Sun', 'Mon', 'Tue'])
 - integer,false,true - $table->integer('field_name',false,true)
 - string:unique - $table->string('field_name')->unique()
 - Para llaves foraneas:
    - integer:unsigned:foreign,table_name,id
    - $table->foreign('field_name')->references('id')->on('table_name')

- html_type - Tipo de Entrada de HTML, por ejemplo:
 - text
 - textarea
 - password
 - email
- Para mas ejemplos consultar: https://labs.infyom.com/laravelgenerator/docs/6.0/fields-input-guide

- options -  opciones para evitar que el campo se pueda buscar, rellenar, mostrar en forma e índice
    - s: especifique para que el campo no se pueda buscar
    - f: especifique para que el campo no se pueda rellenar
    - if: para omitir el campo de ser solicitado en el formulario
    - ii - para evitar que el campo se muestre en la vista de índice
    - iv - para evitar que el campo se muestre en todas las vistas
 - Ejemplos de las entradas por datos:
    - titulo string text
    - cuerpo text textarea s,ii
    - email string:unique email
    - usuario_id integer:unsigned:foreign,usuarios,id text s

Una vez colocado el campo a generar se coloca la validación especificando la validación que le aplica a cada campo a generar, por ejemplo:
- required
- min:5
- email
- numeric

Este formato debera de ser el mismo que toma Laravel en sus validaciones, por ejemplo:
- required|unique:posts|max:255
- required|min:5|max:255
- numeric

Una vez colocado todos los campos del CRUD(Datos), escribir "exit" en el comando para terminar.

3) Tras esto se generara el CRUD de la tabla de datos, y se procedera a correr el proyecto con el comando:
```
php artisan serve 
```
