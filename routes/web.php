<?php



use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChatController;  // 여기로 이동



Route::get('/', [ChatController::class, 'index']);

Route::post('/chat', [ChatController::class, 'ask'])->name('chat.ask');
