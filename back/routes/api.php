<?php

use App\Events\MyEvent;
use App\Http\Controllers\RemarkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/submit-remarq', [RemarkController::class, 'submit']);
Route::get('/send-event', function () {
    broadcast(new MyEvent('Hello, world!'));
    return 'Event has been sent!';
});

Route::get('/messages', [RemarkController::class, 'messages']);
Route::post('/messages', [RemarkController::class, 'storeMessage']);
