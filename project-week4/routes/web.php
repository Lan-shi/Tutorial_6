<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Lat1Controller;
use App\Http\Controllers\ProductController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/lat1', [Lat1Controller::class, 'index']);
Route::get('/lat1/m2', [Lat1Controller::class, 'method2']);
Route::get('/query-builder', function() {
    $prods = DB::table('products')->get();
    foreach ($prods as $prod) {
        echo "ID: {$prod->id}, Name: {$prod->name}, Description: {$prod->price} <br/>";
    }
});
Route::get('/login', function() {
    if (Auth::check()) return redirect('/products');
    return view('login');
})->name('login');
Route::resource('products', ProductController::class)->middleware('auth');