<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-100">
            {{ __('Lista de tareas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-start mb-4">
                <a href="{{ route('todos.create') }}"
                    class="px-4 py-2 font-bold text-gray-100 bg-pink-600 rounded-full hover:bg-pink-700">
                    {{ __('Crear tarea') }}
                </a>
            </div>
            <div class="overflow-hidden bg-gray-800 shadow-sm sm:rounded-lg">
                <!-- Session Status -->
                @if (session('status'))
                    <div class="p-4 mb-4 text-white bg-pink-500">
                        {{ session('status') }}
                    </div>
                @endif
                <!--./ Session Status -->

                <div class="p-6 text-gray-100">
                    <livewire:todos.todo-list />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
