<?php

namespace App\Livewire\Todos;

use App\Models\Todo;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;

class TodoList extends Component
{
    use WithPagination;

    public ?int $todoToDelete = null;

    public function edit(int $id): void
    {
        $this->redirect(route('todos.edit', ['todo' => $id]));
    }

    public function toggle(int $id)
    {

        /** @var Todo $todo */
        $todo = auth()->user()->todos()->findorFail($id);
        $todo->done = !$todo->done;
        $todo->save();
    }

    public function preDelete(int $id) {}

    public function delete() {}

    public function render(): View
    {
        $todos = auth()->user()->todos()->paginate(10);

        return view('livewire.todos.todo-list', compact('todos'));
    }
}
