<div>
    @forelse($todos as $todo)
        <div class="flex justify-between items-center py-4 border-b border-gray-300  dark:border-gray-600">
            <div>
                <h3 class="text-lg font-bold text-gray-700 dark:text-gray-200">{{ $todo->title }}</h3>

                <p class="text-md text-gray-700 dark:text-gray-400 {{ $todo->done ? 'line-through text-lime-600 dark:text-red-400' : '' }}">
                    {{ $todo->description }}
                </p>
            </div>
            <div>
                <button wire:click="toggle({{ $todo->id }})"
                    class="{{ $todo->done ? 'bg-pink-500 hover:bg-pink-700' : 'bg-lime-500 hover:bg-lime-700' }} text-white font-bold py-2 px-4 rounded">
                    Marcar como {{ $todo->done ? 'no completada' : 'completada' }}
                </button>
                <button wire:click="edit({{ $todo->id }})"
                    class="px-4 py-2 font-bold text-white bg-gray-500 rounded hover:bg-gray-700">
                    Editar
                </button>
                <button wire:click="preDelete({{ $todo->id }})"
                    class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">
                    Eliminar
                </button>
            </div>
        </div>
    @empty
        <p class="text-lg text-gray-700 dark:text-gray-200">No hay tareas</p>
    @endforelse

    {{-- <livewire:todos.confirm-todo-deletion :show="!!$todoToDelete" /> --}}

    {{ $todos->links() }}
</div>
