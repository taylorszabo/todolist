<div class="bg-amber-300 p-8 flex float-left">
    <form @submit.prevent>
        <input wire:model="newTodo" type="text" class="bg-amber-300 " placeholder="Add a new todo...">
        <button wire:click="addTodo" hidden>Add</button>
        <hr>
        <ul>
            @foreach ($todos as $todo)
                <li class="pt-1.5 pb-1.5">
                    <input type="checkbox" class="mr-1 " wire:click="toggleCompleted({{ $todo->id }})" {{ $todo->completed ? 'checked' : '' }}>
                    <span class="{{ $todo->completed ? 'line-through' : '' }}">
                       {{ $todo->name }}
                    </span>
                    <button wire:click="deleteTodo({{ $todo->id }})" class="float-right p-0.5 font-bold">X</button>
                </li>
                <hr>
            @endforeach
        </ul>
    </form>
</div>

