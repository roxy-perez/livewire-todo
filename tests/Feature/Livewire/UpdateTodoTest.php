<?php

use App\Livewire\Todos\UpdateTodo;
use App\Models\User;
use Livewire\Livewire;

// Teastear que el componente UpdateTodo se renderice correctamente
test('update todo can be rendered', function () {
    $user = User::factory()->create();

    $action = Livewire::actingAs($user);

    $todo = $user->todos()->create([
        'title' => 'Comprar pan',
        'description' => 'Comprar pan integral y de semillas en el supermercado',
        'done' => false,
    ]);

    $action->test(UpdateTodo::class, ['todo' => $todo])
        ->assertSee('Título');
})->group('todo-update', 'todos');

// Testear validación al actualizar una tarea
test('todo update can be validated', function () {
    $user = User::factory()->create();

    $action = Livewire::actingAs($user);

    $todo = $user->todos()->create([
        'title' => 'Comprar pan',
        'description' => 'Comprar pan integral y de semillas en el supermercado',
        'done' => false,
    ]);

    $action->test(UpdateTodo::class, ['todo' => $todo])
        ->set('form.title', '')
        ->call('save')
        ->assertHasErrors(['form.title'])
        ->set('form.title', 'Comprar pan otra vez')
        ->call('save')
        ->assertHasNoErrors(['form.title', 'form.description'])
        ->set('form.description', '')
        ->call('save')
        ->assertHasErrors(['form.description'])
        ->set('form.description', 'Comprar pan integral y de semillas en el supermercado otra vez')
        ->call('save')
        ->assertHasNoErrors(['form.title', 'form.description'])
        ->set('form.done', true)
        ->call('save')
        ->assertHasNoErrors(['form.title', 'form.description']);
})->group('todo-update', 'todos');

//Testear actualización de la tarea
test('todo update can be updated', function () {
    $user = User::factory()->create();

    $action = Livewire::actingAs($user);

    $todo = $user->todos()->create([
        'title' => 'Comprar pan',
        'description' => 'Comprar pan integral y de semillas en el supermercado',
        'done' => false,
    ]);

    $action->test(UpdateTodo::class, ['todo' => $todo])
        ->set('form.title', 'Comprar pan otra vez')
        ->set('form.description', 'Comprar pan integral y de semillas en el supermercado otra vez')
        ->set('form.done', true)
        ->call('save')
        ->assertRedirect(route('todos.index'));

    $this->assertDatabaseHas('todos', [
        'title' => 'Comprar pan otra vez',
        'description' => 'Comprar pan integral y de semillas en el supermercado otra vez',
        'done' => true
    ]);
})->group('todo-update', 'todos');
