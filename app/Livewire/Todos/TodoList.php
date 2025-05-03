<?php

namespace App\Livewire\Todos;

use App\Models\Todo;
use Livewire\Component;
use Livewire\Attributes\On;
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

    public function preDelete(int $id): void
    {
        $this->todoToDelete = $id;
        $this->dispatch('open-modal', 'confirm-todo-deletion');
    }

    #[On('delete-todo')]
    public function delete()
    {
        /** @var Todo $todo */
        $todo = auth()->user()->todos()->findOrFail($this->todoToDelete);
        $todo->delete();
        $this->todoToDelete = null;

        session()->flash('status', 'La tarea se ha eliminado correctamente');

        $this->redirect(route('todos.index'));
    }

    public function render(): View
    {
        $todos = auth()->user()->todos()->paginate(10);
        return view('livewire.todos.todo-list', [
            'todos' => $todos,
        ]);
    }
}
