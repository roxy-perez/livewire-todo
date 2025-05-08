<?php

namespace App\Livewire\Todos;

use Livewire\Component;
use Illuminate\Contracts\View\View;
use App\Livewire\Forms\Todos\TodoForm;

class CreateTodo extends Component
{
    public TodoForm $form;

    public function save()
    {

        $this->form->create();

        session()->flash('status', '¡Tarea creada exitosamente!');

        $this->redirect(route('todos.index'));
    }

    public function render(): View
    {
        return view('livewire.todos.todo-form', [
            'textButton' => __('Crear'),
        ]);
    }
}
