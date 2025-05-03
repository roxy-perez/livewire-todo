<?php

namespace App\Livewire\Todos;

use App\Livewire\Todos\TodoList;
use Livewire\Component;

class ConfirmTodoDeletion extends Component
{

    public bool $show = false;

    public function delete()
    {
        $this->dispatch('delete-todo')->to(TodoList::class);
    }


    public function render()
    {
        return view('livewire.todos.confirm-todo-deletion');
    }
}
