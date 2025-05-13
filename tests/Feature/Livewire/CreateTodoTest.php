<?php


use App\Livewire\Todos\CreateTodo;
use App\Models\User;
use Livewire\Livewire;

// Testear que el componente CreateTodo se renderice correctamente
test('todo create can be rendered', function () {
    Livewire::actingAs(User::factory()->create())
        ->test(CreateTodo::class)
        ->assertSee('Título')
        ->assertSee('Descripción')
        ->assertSee('Completada')
        ->assertSee('Crear');
})->group('todo-create', 'todos');

// Testear validación al crear una tarea
test('todo create can be validated', function () {
    Livewire::actingAs(User::factory()->create())
        ->test(CreateTodo::class)
        ->call('save')
        ->assertHasErrors(['form.title', 'form.description'])
        ->set('form.title', 'Comprar pan')
        ->call('save')
        ->assertHasErrors(['form.description'])
        ->set('form.description', 'Comprar pan integral y de semillas en el supermercado')
        ->call('save')
        ->assertHasNoErrors('form');
})->group('todo-create', 'todos');

// Testear que se pueda crear una tarea
test('todo create can be created', function () {
    Livewire::actingAs(User::factory()->create())
        ->test(CreateTodo::class)
        ->set('form.title', 'Comprar pan')
        ->set('form.description', 'Comprar pan integral y de semillas en el supermercado')
        ->set('form.done', true)
        ->call('save')
        ->assertRedirect(route('todos.index'));

    $this->assertDatabaseHas('todos', [
        'title' => 'Comprar pan',
        'description' => 'Comprar pan integral y de semillas en el supermercado',
        'done' => true
    ]);
})->group('todo-create', 'todos');
