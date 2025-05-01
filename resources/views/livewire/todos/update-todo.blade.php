<form wire:submit="save">
    <div class="mb-4">
        <label for="title" class="font-bold text-gray-700 dark:text-gray-200 text-md">
            Título
        </label>

        <input wire:model="title" type="text" id="title"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('form.title') border-red-500 @enderror" />

        @error('form.title')
            <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="description" class="font-bold text-gray-700 dark:text-gray-200 text-md">
            Descripción
        </label>

        <textarea wire:model="description" id="description"
            class="shadow appearance-none border rounded w-full font-mono py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline @error('form.description') border-red-500 @enderror"></textarea>

        @error('form.description')
            <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex items-center mb-4">
        <label for="done" class="font-bold text-gray-700 dark:text-gray-200 text-md">
            Completada
        </label>

        <input class="m-2 w-4 h-4 text-lime-500" wire:model="done" type="checkbox" id="done" />
    </div>

    <button type="submit"
        class="px-4 py-2 font-bold text-gray-100 bg-blue-500 rounded-full hover:bg-blue-700 dark:text-gray-200 dark:bg-blue-700">
        {{ __('Actualizar') }}
    </button>
</form>
