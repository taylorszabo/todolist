<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Todo;

class TodoList extends Component
{
    public $todos;
    public $newTodo;

    public function mount()
    {
        $this->todos = Todo::all();
    }

    public function render()
    {
        return view('livewire.todo-list');
    }

    public function addTodo()
    {
        Todo::create(['name' => $this->newTodo, 'completed' => false]);
        $this->newTodo = '';
        $this->todos = Todo::all();
    }

    public function toggleCompleted($todoId)
    {
        $todo = Todo::find($todoId);
        $todo->update(['completed' => !$todo->completed]);
        $this->todos = Todo::all();
    }

    public function deleteTodo($todoId)
    {
        Todo::destroy($todoId);
        $this->todos = Todo::all();
    }
}

