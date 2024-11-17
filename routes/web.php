<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*
|LOgin registro
|
*/
Route::get('/login', 'Auth\LoginController@show')->name('login.show');
Route::get('/login', 'Auth\LoginController@login')->name('login.perform');
Route::get('/register', 'Auth\RegisterController@show')->name('register.show');
Route::post('/register', 'Auth\RegisterController@register')->name('register.perform');
Route::get('/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('reset');
Route::post('/reset', 'App\Http\Controllers\Auth\ResetPasswordController@resetPost')->name('reset.post');



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/perform-logout', 'App\Http\Controllers\LogoutController@perform')->name('logout.perform');

use App\Http\Controllers\MiuserController;

// Rutas de miuser
Route::prefix('miuser')->group(function () {
    Route::get('/', [MiuserController::class, 'index'])->name('miuser.index'); // Listar usuarios
    Route::get('/create', [MiuserController::class, 'create'])->name('miuser.create'); // Mostrar formulario de creación
    Route::post('/', [MiuserController::class, 'store'])->name('miuser.store'); // Almacenar nuevo usuario
    Route::get('/{id}/edit', [MiuserController::class, 'edit'])->name('miuser.edit'); // Mostrar formulario de edición
    Route::put('/{id}', [MiuserController::class, 'update'])->name('miuser.update'); // Actualizar usuario
    Route::delete('/{id}', [MiuserController::class, 'destroy'])->name('miuser.destroy'); // Eliminar usuario

    // Rutas para cambiar contraseña y restablecer contraseña
    Route::post('/cambiar-contraseña', [MiuserController::class, 'updatePassword'])->name('cambiar.contraseña'); // Cambiar contraseña
    Route::post('/reset-password', [MiuserController::class, 'resetPassword'])->name('reset.password'); // Restablecer contraseña
});
use App\Http\Controllers\DocumentController;

Route::get('/documentos', [DocumentController::class, 'index'])->name('importar.index');
Route::post('/documentos/importar', [DocumentController::class, 'importar'])->name('documentos.importar');

use App\Http\Controllers\UserController;

Route::post('/users/toggle-status/{id}', [UserController::class, 'toggleStatus'])->name('users.toggleStatus');
Route::put('/users/{id}/update-status', [UserController::class, 'updateStatus'])->name('users.updateStatus');
// Ruta para mostrar todos los usuarios
Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Ruta para actualizar el estado del usuario usando PATCH
Route::patch('/users/{id}/update-status', [UserController::class, 'updateStatus'])->name('users.updateStatus');

Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
Route::post('/usuarios', [UserController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{id}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');
Route::patch('/users/{id}/update-status', [UserController::class, 'updateStatus'])->name('users.updateStatus');


use App\Http\Controllers\ListausuarioController;

// Rutas de lista de usuarios
Route::prefix('listausuario')->group(function () {
    Route::get('/', [ListausuarioController::class, 'index'])->name('listausuario.index'); // Listar usuarios
    Route::post('/', [ListausuarioController::class, 'store'])->name('listausuario.store'); // Almacenar nuevo usuario
    Route::get('/{id}/edit', [ListausuarioController::class, 'edit'])->name('listausuario.edit'); // Mostrar formulario de edición
    Route::put('/{id}', [ListausuarioController::class, 'update'])->name('listausuario.update'); // Actualizar usuario
    Route::delete('/{id}', [ListausuarioController::class, 'destroy'])->name('listausuario.destroy'); // Eliminar usuario
    Route::get('/{id}', [ListausuarioController::class, 'show'])->name('listausuario.show'); // Mostrar un usuario específico
});

use App\Http\Controllers\InstrumentoslegalesController;

Route::get('/instrumentoslegales', [InstrumentoslegalesController::class, 'index'])->name('instrumentoslegales.index');
Route::post('/instrumentoslegales', [InstrumentoslegalesController::class, 'store'])->name('instrumentoslegales.store');
Route::delete('/instrumentoslegales/{fileName}', [InstrumentoslegalesController::class, 'destroy'])->name('instrumentoslegales.destroy');

use App\Http\Controllers\GasetasController;

Route::get('/gasetas', [GasetasController::class, 'index'])->name('gasetas.index');
Route::post('/gasetas', [GasetasController::class, 'store'])->name('gasetas.store');
Route::delete('/gasetas/{fileName}', [GasetasController::class, 'destroy'])->name('gasetas.destroy');
Route::get('/gasetas/download/{fileName}', [GasetasController::class, 'download'])->name('gasetas.download');

use App\Http\Controllers\OrdenanzasController;

Route::get('/ordenanzas', [OrdenanzasController::class, 'index'])->name('ordenanzas.index');
Route::post('/ordenanzas', [OrdenanzasController::class, 'store'])->name('ordenanzas.store');
Route::delete('/ordenanzas/{fileName}', [OrdenanzasController::class, 'destroy'])->name('ordenanzas.destroy');
Route::get('/ordenanzas/download/{fileName}', [OrdenanzasController::class, 'download'])->name('ordenanzas.download');


use App\Http\Controllers\ResolucionesController;

// Ruta para mostrar el índice de resoluciones
Route::get('/resoluciones', [ResolucionesController::class, 'index'])->name('resoluciones.index');

// Ruta para almacenar una nueva resolución
Route::post('/resoluciones/store', [ResolucionesController::class, 'store'])->name('resoluciones.store');
// Ruta para eliminar una resolución
Route::delete('/resoluciones/{fileName}', [ResolucionesController::class, 'destroy'])->name('resoluciones.destroy');
// Ruta para descargar una resolución
Route::get('/resoluciones/download/{fileName}', [ResolucionesController::class, 'download'])->name('resoluciones.download');

use App\Http\Controllers\AcuerdosController; // Cambiado a AcuerdosController

// Ruta para mostrar el índice de acuerdos
Route::get('/acuerdos', [AcuerdosController::class, 'index'])->name('acuerdos.index');
// Ruta para almacenar un nuevo acuerdo
Route::post('/acuerdos/store', [AcuerdosController::class, 'store'])->name('acuerdos.store');
// Ruta para eliminar un acuerdo
Route::delete('/acuerdos/{fileName}', [AcuerdosController::class, 'destroy'])->name('acuerdos.destroy');
// Ruta para descargar un acuerdo
Route::get('/acuerdos/download/{fileName}', [AcuerdosController::class, 'download'])->name('acuerdos.download');



use App\Http\Controllers\OrdinariasController;

Route::get('/ordinarias', [OrdinariasController::class, 'index'])->name('ordinarias.index');
Route::post('/ordinarias', [OrdinariasController::class, 'store'])->name('ordinaria.store');
Route::delete('/ordinarias/{fileName}', [OrdinariasController::class, 'destroy'])->name('ordinarias.destroy');
Route::get('/ordinarias/download/{fileName}', [OrdinariasController::class, 'download'])->name('ordinarias.download');
Route::get('/ordinarias/view/{fileName}', [OrdinariasController::class, 'view'])->name('ordinarias.view');
Route::get('/ordinarias/print/{fileName}', [OrdinariasController::class, 'print'])->name('ordinarias.print');

use App\Http\Controllers\ExtraordinariasController;

Route::get('/extraordinarias', [ExtraordinariasController::class, 'index'])->name('extraordinarias.index');
Route::post('/extraordinarias', [ExtraordinariasController::class, 'store'])->name('extraordinaria.store');
Route::delete('/extraordinarias/{fileName}', [ExtraordinariasController::class, 'destroy'])->name('extraordinarias.destroy');
Route::get('/extraordinarias/download/{fileName}', [ExtraordinariasController::class, 'download'])->name('extraordinarias.download');
Route::get('/extraordinarias/view/{fileName}', [ExtraordinariasController::class, 'view'])->name('extraordinarias.view');
Route::get('/extraordinarias/print/{fileName}', [ExtraordinariasController::class, 'print'])->name('extraordinarias.print');

use App\Http\Controllers\SolemneController; // Cambiado a SolemnesController

Route::get('/solemnes', [SolemneController::class, 'index'])->name('solemnes.index'); // Cambiado a solemnes
Route::post('/solemnes', [SolemneController::class, 'store'])->name('solemne.store'); // Cambiado a solemne
Route::delete('/solemnes/{fileName}', [SolemneController::class, 'destroy'])->name('solemnes.destroy'); // Cambiado a solemnes
Route::get('/solemnes/download/{fileName}', [SolemneController::class, 'download'])->name('solemnes.download'); // Cambiado a solemnes
Route::get('/solemnes/view/{fileName}', [SolemneController::class, 'view'])->name('solemnes.view'); // Cambiado a solemnes
Route::get('/solemnes/print/{fileName}', [SolemneController::class, 'print'])->name('solemnes.print'); // Cambiado a solemnes

use App\Http\Controllers\EspecialesController; // Cambiado a EspecialesController

Route::get('/especiales', [EspecialesController::class, 'index'])->name('especiales.index'); // Cambiado a especiales
Route::post('/especiales', [EspecialesController::class, 'store'])->name('especiales.store'); // Cambiado a especiales
Route::delete('/especiales/{fileName}', [EspecialesController::class, 'destroy'])->name('especiales.destroy'); // Cambiado a especiales
Route::get('/especiales/download/{fileName}', [EspecialesController::class, 'download'])->name('especiales.download'); // Cambiado a especiales
Route::get('/especiales/view/{fileName}', [EspecialesController::class, 'view'])->name('especiales.view'); // Cambiado a especiales
Route::get('/especiales/print/{fileName}', [EspecialesController::class, 'print'])->name('especiales.print'); // Cambiado a especiales






use App\Http\Controllers\ExpedienteController;

// Rutas de recursos para el controlador de expedientes
Route::resource('expedientes', ExpedienteController::class);

// Rutas adicionales
Route::get('/expedientes/create', [ExpedienteController::class, 'create'])->name('expedientes.create');
Route::delete('/expedientes/{id}', [ExpedienteController::class, 'destroy'])->name('expedientes.destroy');
Route::get('/expedientes/{id}/edit', [ExpedienteController::class, 'edit'])->name('expedientes.edit');
Route::get('/expedientes/{id}/pdf', [ExpedienteController::class, 'generatePDF'])->name('expedientes.generatePDF');
Route::put('/expedientes/{id}', [ExpedienteController::class, 'update'])->name('expedientes.update');
Route::get('/expedientes/{id}', [ExpedienteController::class, 'show'])->name('expedientes.show');
Route::get('/expedientes/{id}/download', [ExpedienteController::class, 'download'])->name('expedientes.download');

// Ruta para ver un expediente específico (opcional, ya que show puede cumplir esta función)
Route::get('/expedientes/ver/{id}', [ExpedienteController::class, 'ver'])->name('expedientes.ver');
