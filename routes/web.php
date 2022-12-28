<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PermissionController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(UserController::class)->prefix('user')->group(function () {
    Route::get('index',  'index');
    Route::post('add', 'create');
    Route::get('edit/{id}', 'edit');
    Route::put('update/{id}', 'update');
    Route::delete('delete/{id}', 'destroy');
});

Route::controller(RoleController::class)->prefix('role')->group(function () {
    Route::get('index',  'index');
    Route::post('add', 'create');
    Route::get('edit/{id}', 'edit');
    Route::put('update/{id}', 'update');
    Route::delete('delete/{id}', 'destroy');
});
Route::controller(PermissionController::class)->prefix('permission')->group(function () {
    Route::get('index',  'index');
    Route::post('add', 'create');
    Route::get('edit/{id}', 'edit');
    Route::put('update/{id}', 'update');
    Route::delete('delete/{id}', 'destroy');
});
Route::controller(ModuleController::class)->prefix('module')->group(function () {
    Route::get('index',  'index');
    Route::post('add', 'create');
    Route::get('edit/{id}', 'edit');
    Route::put('update/{id}', 'update');
    Route::delete('delete/{id}', 'destroy');
});


// Route::get('/index1', [RoleController::class, 'index1']);
// Route::get('addRole', [RoleController::class, 'addRole']);
// Route::get('showRole/{id}', [RoleController::class, 'showRole']);
// Route::get('editRole/{id}', [RoleController::class, 'updateRole']);
// Route::get('deleteRole/{id}', [RoleController::class, 'deleteRole']);

// Route::get('/index2', [PermissionController::class, 'index2']);
// Route::get('addPermission', [PermissionController::class, 'addPermission']);
// Route::get('showPermission/{id}', [PermissionController::class, 'showPermission']);
// Route::get('editPermission/{id}', [PermissionController::class, 'updatePermission']);
// Route::get('deletePermission/{id}', [PermissionController::class, 'deletePermission']);


// Route::get('index4', [ModuleController::class, 'index4']);
// Route::get('addModule', [ModuleController::class, 'addModule']);
// Route::get('showModule/{id}', [ModuleController::class, 'showModule']);
// Route::get('editModule/{id}', [ModuleController::class, 'updateModule']);
// Route::get('deleteModule/{id}', [ModuleController::class, 'deleteModule']);

// Route::get('permissionAdd', [RoleController::class, 'permissionAdd']);
