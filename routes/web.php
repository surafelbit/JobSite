<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
Route::get('/', [ListingController::class , 'index']);

Route::get('/search', function(Request $request){
    return $request->name;
});
Route::get('/listing/create',[ListingController::class , 'create'])->middleware('auth');
Route::get("/listing/manage",[ListingController::class, "manage"])->middleware('auth');

Route::get('/listing/{listing}', [ListingController::class , 'show']);
Route::post('/listing', [ListingController::class , 'store']);
Route::get('/listing/{listing}/edit', [ListingController::class ,"edit"])->middleware('auth');
Route::put('/listing/{listing}',[ListingController::class ,"update"])->middleware('auth');
Route::delete('/listing/{listing}',[ListingController::class, "destroy"])->middleware('auth');
Route::get('/register',[UserController::class, "manage"])->middleware('guest');
Route::post('/users',[UserController::class, "store"]);
Route::post("/logout", [UserController::class, "logout"]);
Route::get("/login", [UserController::class, "login"])->name('login')->middleware('guest');
Route::post("/users/login",[UserController::class, "authenticate"]);
Route::prefix('api')->group(base_path('routes/api.php'));
