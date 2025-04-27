<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-700 dark:text-gray-200">
            {{ __('Crear tarea') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-start mb-4">
                <a href="{{ route('todos.index') }}"
                    class="px-4 py-2 font-bold text-gray-100 bg-lime-600 rounded-full text-md hover:bg-lime-700 dark:text-gray-200 dark:bg-lime-700">
                    {{ __('<< Volver') }}
                </a>
            </div>
            <div class="overflow-hidden bg-gray-200 shadow-sm dark:bg-gray-800 dark:shadow-lg dark:sm:rounded-lg">
                <div class="p-6 text-gray-700 dark:text-gray-200 text-md">
                    <livewire:todos.create-todo />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
