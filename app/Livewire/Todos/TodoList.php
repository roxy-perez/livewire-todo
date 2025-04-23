<?php

namespace App\Livewire\Todos;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;

class TodoList extends Component
{
    use WithPagination;

    public ?int $todoToDelete = null;

    public function edit(int $id) {}

    public function toggle(int $id) {}

    public function preDelete(int $id) {}

    public function delete() {}

    public function render(): View
    {
        $todos = auth()->user()->todos()->paginate(10);

        return view('livewire.todos.todo-list', compact('todos'));
    }
}
