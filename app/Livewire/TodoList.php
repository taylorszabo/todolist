<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Livewire\Component;
use App\Models\Todo;

class TodoList extends Component
{
    public array $todos;

    public string $newTodoName;

    public bool $isEditing = false;

    public function rules(): array
    {
        return [
            'todos.*.name' => 'string',
            'todos.*.completed' => 'bool' // TODO: Using is_completed might be better since this is a boolean column
        ];
    }

    public function mount()
    {
        $this->todos = Todo::all()->toArray();
    }

    public function render()
    {
        return view('livewire.todo-list');
    }

    public function addTodo() :void
    {
        if (empty($this->newTodoName)) {
            return;
        }

        $newTodo = Todo::query()->create(['name' => $this->newTodoName, 'completed' => false]);
        $this->newTodoName = '';
        $this->todos[] = $newTodo->toArray();
    }

    public function updated(): void
    {
        Todo::query()->upsert($this->todos, ['id']);
    }

    public function deleteTodo(Todo $todoToDelete) :void
    {
        $this->todos = collect($this->todos)->reject(fn(array $todo) => $todo['id'] === $todoToDelete->id)->toArray();
        $todoToDelete->delete();
    }

    public function enableEditing() :void
    {
        $this->isEditing = true;
    }

    public function leaveEditing() :void
    {
        $this->isEditing = false;
    }
}

