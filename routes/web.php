<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FormController::class, 'index']);

Route::post('/submit', [FormController::class, 'submit']);

use Illuminate\Support\Facades\Mail;

Route::get('/test-mail', function() {
    Mail::raw('Test message', function ($message) {
        $message->to('laravel22@mail.ru')
            ->subject('Test email');
    });

    return 'Test email sent!';
});
