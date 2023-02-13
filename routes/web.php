<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\LeavelistController;
use App\Http\Controllers\OffleavesController;
use App\Http\Controllers\CongesDetailsController;
use App\Http\Controllers\LeaveApplicationController;
use App\Http\Controllers\CongesAttachmentsController;


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
Route::any('/register', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('conges', LeaveApplicationController::class);
Route::post('conges/{conge}', [LeaveApplicationController::class, 'update'])->name('conges.update');

Route::post('/conges/calculateWorkingDays', [LeaveApplicationController::class, 'calculateWorkingDays'])->name('conges.calculateWorkingDays');

Route::resource('leaves', LeavelistController::class);
Route::resource('products', ProductsController::class);
Route::resource('CongesAttachments', CongesAttachmentsController::class);


Route::get('/leave/{id}',  [LeaveApplicationController::class, 'getproducts']);
Route::get('/CongesDetails/{id}',  [CongesDetailsController::class, 'edit']);
Route::get('/View_file/{employee_number}/{file_name}',  [CongesDetailsController::class, 'open_file']);
Route::get('/download_file/{employee_number}/{file_name}',  [CongesDetailsController::class, 'get_file']);
Route::post('delete_file',  [CongesDetailsController::class, 'destroy'])->name('delete_file');
Route::get('/edit_conge/{id}',  [LeaveApplicationController::class, 'edit']);
Route::get('/status_show/{id}',  [LeaveApplicationController::class, 'show'])->name('status_show');
Route::post('/status_update/{id}',  [LeaveApplicationController::class, 'status_update'])->name('status_update');
require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
   
});

Route::get('MarkAsRead_all',  [LeaveApplicationController::class, 'MarkAsRead_all'])->name('MarkAsRead_all');
Route::get('/{page}', [AdminController::class,'index']);
