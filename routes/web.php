<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\SwapController;
use App\Http\Controllers\UserController;
//Livewire
use App\Http\Livewire\CrudTickets;
use App\Http\Livewire\CrudUsers;
use App\Http\Livewire\CrudAccounts;
use App\Http\Livewire\CrudSwaps;
use App\Http\Livewire\Perfil;
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

Route::get('/admin/tickets', CrudTickets::class) 
    ->name ('admin.view_tickets');

Route::get('/admin/users', CrudUsers::class) 
    ->name ('admin.view_users');

Route::get('/admin/accounts', CrudAccounts::class) 
    ->name ('admin.view_accounts');

// Controllers

Route::get('/my-tickets', [TicketController::class, 'viewM'])
    ->name('my-tickets');

Route::get('user/perfil', [UserController::class, 'view'])
    ->name('perfil');

Route::get('/user/edit', [UserController::class, 'edit'])
    ->name('perfil.edit');

Route::put('/user/update/{id}', [UserController::class, 'update'])
    ->name('perfil.update');

Route::post('/admin/create', [TicketController::class, 'store'])
    ->name('admin.store');

Route::get('/admin/create', [TicketController::class, 'create'])
    ->name('admin.create');

Route::get('/swaps',[SwapController::class, 'viewS']) 
    ->name ('swaps');

Route::get('/awards',[Controller::class, 'viewA']) 
    ->name ('awards');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';