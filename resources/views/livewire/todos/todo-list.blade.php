<div>
    @forelse($todos as $todo)
        <div class="flex justify-between">
            <div>
                <h3 class="text-lg font-bold">{{ $todo->title }}</h3>

                <p class="text-sm {{ $todo->done ? 'line-through' : '' }}">
                    {{ $todo->description }}
                </p>
            </div>
            <div>
                <button wire:click="toggle({{ $todo->id }})"
                    class="{{ $todo->done ? 'bg-red-500 hover:bg-red-700' : 'bg-green-500 hover:bg-green-700' }} text-white font-bold py-2 px-4 rounded">
                    Marcar como {{ $todo->done ? 'no completada' : 'completada' }}
                </button>
                <button wire:click="edit({{ $todo->id }})"
                    class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                    Editar
                </button>
                <button wire:click="preDelete({{ $todo->id }})"
                    class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">
                    Eliminar
                </button>
            </div>
        </div>
        <hr class="my-4">
    @empty
        <p class="text-lg">No hay tareas</p>
    @endforelse

    {{-- <livewire:todos.confirm-todo-deletion :show="!!$todoToDelete" /> --}}

    {{ $todos->links() }}
</div>
