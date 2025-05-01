<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Formulario para editar tareas') }}
        </h2>

        <br />

        <a href="{{ route('todos.index') }}"
            class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700">
            Volver
        </a>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:todos.update-todo :todo="$todo" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
