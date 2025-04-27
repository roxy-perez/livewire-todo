<?php

namespace App\Livewire\Todos;

use App\Models\Todo;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class CreateTodo extends Component
{
    public string $title = '';
    public string $description = '';

    public bool $done = false;

    public function save()
    {
        Todo::create(
            $this->only(['title', 'description', 'done'])
        );

        session()->flash('status', '¡Tarea creada exitosamente!');

        $this->redirect(route('todos.index'));
    }

    public function render(): View
    {
        return view('livewire.todos.create-todo');
    }
}
