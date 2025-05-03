<x-modal name="confirm-todo-deletion" :show="$show">
    <form wire:submit="delete" class="flex justify-between items-center p-4">
        <h2 class="mr-2 text-lg font-bold text-gray-700 dark:text-gray-200">¿Estás seguro de que quieres eliminar esta
            tarea?
        </h2>

        <p class="mr-2 text-gray-700 text-md dark:text-gray-400">Una vez eliminada, no se podrá recuperar.</p>

        <x-danger-button type="submit" class="px-4 py-2 mr-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">
            Eliminar
        </x-danger-button>
        <x-secondary-button type="button" x-on:click="$dispatch('close')"
            class="px-4 py-2 mr-2 font-bold text-black bg-gray-500 rounded hover:bg-gray-700 hover:text-white">
            Cancelar
        </x-secondary-button>
    </form>
</x-modal>
