<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Todo;

class TodoList extends Component
{
    public $todos;
    public $newTodo;

    public $updateTodo;

    public bool $isEditing = false;

    public function mount()
    {
        $this->todos = Todo::all();
    }

    public function render()
    {
        return view('livewire.todo-list');
    }

    public function addTodo() :void
    {
        if($this->newTodo !== '' && $this->newTodo !== null)
        {
            Todo::create(['name' => $this->newTodo, 'completed' => false]);
            $this->newTodo = '';
            $this->todos = Todo::all();
        }

    }

    public function toggleCompleted($todoId) :void
    {
        $todo = Todo::find($todoId);
        $todo->update(['completed' => !$todo->completed]);
        $this->todos = Todo::all();
    }

    public function deleteTodo($todoId) :void
    {
        Todo::destroy($todoId);
        $this->todos = Todo::all();
    }

    public function editTodo($todoId, $todoName) :void
    {
        $todo = Todo::find($todoId);
        $todo->update(['name' => $todoName]);
        $this->todos = Todo::all();
        $this->isEditing = false;
    }

    public function enableEditing() :void
    {
        $this->isEditing = true;
    }

    public function cancelEditing() :void
    {
        $this->isEditing = false;
    }
}

