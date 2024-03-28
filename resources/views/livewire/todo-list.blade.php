
<div>
    <form>
        <input wire:model="newTodo" type="text" placeholder="Add a new todo...">
        <button wire:click="addTodo">Add</button>

        <ul>
            @foreach ($todos as $todo)
                <li >
                    <input type="checkbox" wire:click="toggleCompleted({{ $todo->id }})" {{ $todo->completed ? 'checked' : '' }}>
                    {{ $todo->name }}
                    <button wire:click="deleteTodo({{ $todo->id }})">Delete</button>
                </li>
            @endforeach
        </ul>
    </form>
</div>

