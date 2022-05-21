<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TicketController;

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
    return view('welcome');
});

Route::get('/admin/tickets',[TicketController::class, 'view']) 
    ->name ('admin.view');

Route::post('/admin/create', [TicketController::class, 'store'])
    ->name('admin.store');

Route::get('/admin/create', [TicketController::class, 'create'])
    ->name('admin.create');

Route::delete('/admin/delete/{id}', [TicketController::class, 'delete'])
    ->name ('admin.delete');

Route::get('/admin/edit', [TicketController::class, 'edit'])
    ->name ('admin.edit');

Route::put('/admin/update/{id}', [TicketController::class, 'update'])
    ->name ('admin.update');

Route::get('/admin/edit-ticket/{id}',[TicketController::class, 'edit']) 
    ->name ('admin.editar');

// -----------------

Route::get('/swaps',[Controller::class, 'view']) 
    ->name ('swaps');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';