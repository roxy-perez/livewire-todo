<?php

namespace App\Livewire\Todos;

use App\Models\Todo;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class UpdateTodo extends Component
{
    public Todo $todo;

    public string $title = '';
    public string $description = '';
    public bool $done = false;

    public function mount(Todo $todo): void
    {
        $this->todo = $todo;

        $this->title = $todo->title;
        $this->description = $todo->description;
        $this->done = $todo->done;
    }

    public function save(): void
    {
        $this->todo->update($this->only(['title', 'description', 'done']));

        session()->flash('status', 'La tarea ha sido actualizada.');

        $this->redirect(route('todos.index'));
    }

    public function render(): View
    {
        return view('livewire.todos.update-todo');
    }
}
