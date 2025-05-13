<?php

use App\Livewire\Todos\TodoList;
use App\Models\User;
use Livewire\Livewire;

// Testear que el componente TodoList se renderice correctamente
test('todo list can be rendered', function () {
    Livewire::actingAs(User::factory()->create())
        ->test(TodoList::class)
        ->assertSee('No hay tareas');
})->group('todo-list', 'todos');

// Testear que el componente TodoList se renderice creando un todo
test('todo list can be rendered with todos', function () {
    $user = User::factory()->create();
    $action = Livewire::actingAs($user);

    $user->todos()->create([
        'title' => 'Comprar pan',
        'description' => 'Comprar pan integral y de semillas en el supermercado',
        'done' => false,
    ]);

    $action->test(TodoList::class)
        ->assertSee('Comprar pan')
        ->assertSee('Comprar pan integral y de semillas en el supermercado');
})->group('todo-list', 'todos');

// Testear que la paginación (de 10 en 10) funcione correctamente
test('todo list can be paginated', function () {
    $user = User::factory()->create();
    $action = Livewire::actingAs($user);

    $user->todos()->createMany(
        collect(range(1, 20))->map(fn($i) => [
            'title' => "Tarea $i",
            'description' => "Tarea $i",
            'done' => false,
        ])->toArray(),
    );

    $action->test(TodoList::class)
        ->assertSee('Tarea 1')
        ->assertSee('Tarea 10')
        ->assertDontSee('Tarea 11')
        ->call('nextPage')
        ->assertSee('Tarea 11')
        ->assertDontSee('Tarea 10')
        ->call('previousPage')
        ->assertSee('Tarea 1');
})->group('todo-list', 'todos');

//Testear toggle de la tarea
test('todo list can be toggled', function () {
    $user = User::factory()->create();
    $action = Livewire::actingAs($user);

    $todo = $user->todos()->create([
        'title' => 'Comprar pan',
        'description' => 'Comprar pan integral y de semillas en el supermercado',
        'done' => false,
    ]);

    $action->test(TodoList::class)
        ->assertSee('Comprar pan')
        ->assertSee('Comprar pan integral y de semillas en el supermercado')
        ->assertSee('Marcar como completada')
        ->call('toggle', $todo->id)
        ->assertSee('Marcar como no completada');
})->group('todo-list', 'todos');

//Testear la eliminación de la tarea
test('todo list can be deleted', function () {
    $user = User::factory()->create();
    $action = Livewire::actingAs($user);

    $todo = $user->todos()->create([
        'title' => 'Comprar pan',
        'description' => 'Comprar pan integral y de semillas en el supermercado',
        'done' => false,
    ]);

    $action->test(TodoList::class)
        ->assertSee('Comprar pan')
        ->assertSee('Comprar pan integral y de semillas en el supermercado')
        ->call('preDelete', $todo->id)
        ->assertDispatched('open-modal', 'confirm-todo-deletion')
        ->dispatch('delete-todo')
        ->assertRedirect(route('todos.index'));

    // Verificar que la tarea haya sido eliminada en la base de datos
    $this->assertDatabaseMissing('todos', ['id' => $todo->id]);

})->group('todo-list', 'todos');
