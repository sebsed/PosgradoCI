<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LineasInvController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DocumentosController;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

// User Profile Route
Route::get('/dashboard', [UserController::class,'myProfile'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/{user_id}', [UserController::class,'userProfile'])->name('dashboard');


// Users Routes
/*
Route::get('/profile', function(){
    return Interia::render('/Users/Profile');
})->name('profile');
*/

// Documentos
Route::get('/documentos', function(){
    return Inertia::render('Documentos/DocumentosIndex');
})->name('documentos');

// Lineas de Investigacion
Route::get('/lineasInv',[LineasInvController::class,'getAll'])->name('lineasinv');
Route::get('/lineaInv/{id}',[LineasInvController::class,'getLineaInvestigacion'])->name('lineainv');
Route::get('/lineaInv/getmembers/{lid}',[LineasInvController::class,'getLineMembers']);
Route::get('/lineaInv/getnucleo',[LineasInvController::class, 'getNucleo']);

// Documents
Route::get('/documents/all',[DocumentosController::class, 'getAllDocuments']);

// Credentials
Route::get('/user/credentials/{id}',[UserController::class, 'getCredentials']);
Route::post('/user/credentials/update',[UserController::class, 'updateCredentials']);

// User Contact
Route::get('/user/contact/{id}',[UserController::class, 'getContactInfo']);
Route::post('/user/contact/update', [UserController::class, 'updateContactData']);

// User Productivity
Route::post('/user/productivity/new',[UserController::class, 'addNewPublication']);
Route::get('/user/productivity/getAll/{uid}',[UserController::class, 'getAllPublications']);
Route::post('/user/productivity/update',[UserController::class, 'updatePublication']);
Route::get('/user/productivity/delete/{pub_id}',[UserController::class, 'destroyPublication']);

// Aspiring Visitors
Route::get('/aspirantes', function(){
    return Inertia::render('Informacion/Aspirantes/AspirantesIndex');
})->name('Aspirantes');

// Admin Routes
Route::get('/admin/carrusel/imgs',[AdminController::class, 'getCarruselImages']);
Route::post('/admin/update_carousel',[AdminController::class, 'updateCarruselImages']);
Route::post('/admin/uploadfile',[AdminController::class, 'uploadFile']);

require __DIR__.'/auth.php';
