<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class TodoController extends Controller
{
    public function index(): View
    {
        return view('todo.index');
    }

    public function create(): View
    {
        return view('todo.create');
    }
}
