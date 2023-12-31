
## Custom Data Lists Aplication

A continuación, relato como crearía el sistema solicitado:

#### 1.Diseño de la Base de Datos

-Creacion de sistema de migraciones:
```
  Schema::create('custom_data_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
```
```
 Schema::create('custom_data_columns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('list_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('list_id')->references('id')->on('custom_data_lists')->onDelete('cascade');
        });
```
```
Schema::create('custom_data_rows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('list_id');
            $table->unsignedBigInteger('column_id');
            $table->int('fila');
            $table->text('value');

            $table->timestamps();

            $table->foreign('list_id')->references('id')->on('custom_data_lists')->onDelete('cascade');
            $table->foreign('column_id')->references('id')->on('custom_data_columns')->onDelete('cascade');
        });
```

-Creacion de modelos

```
    protected $table = 'custom_data_lists';

    protected $fillable = [
       'name'
    ];
```

```
    protected $table = 'custom_data_columns';

    protected $fillable = [
        'list_id',
        'data',
    ];
```


```
    protected $table = 'custom_data_row';

    protected $fillable = [
        'list_id',
        'column_id',
        'fila',
        'value'
    ];
```

#### 2.Creacion de CRUD 

CRUD Operations:

Crear: Importar un archivo CSV para crear una nueva lista.

Leer: Obtener datos de una lista basados en criterios de búsqueda.

Actualizar: Actualizar los datos de una lista existente. PROXIMO

Eliminar: Eliminar una lista. PROXIMO

-Creacion de rutas

```
Route::post('/upload-excel', [CustomDataUploadController::class, 'uploadExcel'])->name('upload.excel');
Route::post('/search', [SearchController::class, 'search'])->name('search');
```

-Creacion de CustomDataUploadController

```
public function importCSV($filePath, $nombreLista) {
    // Leer el archivo CSV y determinar con el nombre del archivo el tipo de lista en caso de que ahí este el nombre.
    // Insertar datos en CustomLists
    // Recorrer las columnas y almancer el nombre de las columnas en custom_data_columns y el valor en custom_data_row
}

```

-Creacion de SearchController

```
public function search($request) {
    // Creacion de un sistema que busque atraves de cualquiera de la listas y pueda obtener un resultado atraves de la fila obtenida
}

```

## LEVANTAR EL PROYECTO:

 Run `php artisan migrate`to create the necessary database tables.
 Run `php artisan servee` to run the local server.

 That's it! You should now be able to access the application at http://127.0.0.1:8000

![image](https://github.com/GabrielLimardo/TechnicalTest_CustomDataList/assets/60992367/e42c6e27-3bcd-4c1b-9228-8892eeb4b21e)

## DETALLES:

contextualizar como funcionaria el sistema, pero no refleja el código final que haría para un deploy.

1- Corregir el sistema de datos obtenidos actualmente con acentos no lo va a tomar y debería mejorar el sistema validando el dato y cambiándolo en caso de que sea necesario o en caso contrario mostrar un mensaje de error.

2- En las búsquedas actualmente está tomando únicamente el primer dato de lista o columna obtenido cuando debería tomar todas en caso de que haya una repetición en nombre de columna o lista.

3- El sistema de importaciones está usando WHILE en este momento debería usar un INSERT masivo porque actualmente por cada vez que pasa está usando un INSERT cuando debería ser un solo INSERT con un array de datos para insertar en la base de datos eso mejoraría la optimización del código

