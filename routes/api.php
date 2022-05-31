<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('items')->group(function () {
    Route::delete('/{id}/delete', [ItemController::class, 'api_delete'])->name('api_delete_item');
    Route::post('/{id}/update-or-create', [ItemController::class, 'api_update_or_create'])->name('api_update_or_create_item');
});


Route::post('/change-profile', [AdminController::class, 'process_profile'])->name('process_profile');
Route::post('/change-contact', [AdminController::class, 'process_contact'])->name('process_contact');
Route::post('/send-messages', [MainController::class, 'process_messages'])->name('process_messages');


Route::prefix('gallaries')->group(function () {
    Route::post('/add', [GalleryController::class, 'store'])->name('add_galleries');
    Route::delete('/delete', [GalleryController::class, 'deleteAll'])->name('delete_galleries');
});
