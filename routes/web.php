<?php
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ReservationController;
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/admin', function(){
//     return view('NotAdmin');
// });
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function(){
   Route::get('/',[AdminController::class, 'index'])->name('index');
   Route::resource('/categories',CategoryController::class);
   Route::resource('/menus',MenuController::class);
   Route::resource('/tables',TableController::class);
   Route::resource('/reservation',ReservationController::class);
});
require __DIR__.'/auth.php';