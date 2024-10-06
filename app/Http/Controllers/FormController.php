<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        Form::create($validated); //отправка в БД

        Mail::to('laravel22@mail.ru')->send(new ContactFormSubmitted($validated));

        return back()->with('success', 'Форма успешно отправлена, данные сохранены и письмо отправлено администратору.');
    }
}
