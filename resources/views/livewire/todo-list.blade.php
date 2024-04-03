<div class="bg-amber-300 p-8 flex float-left relative">
    <div class="absolute top-2.5 right-8">
        @if (!$isEditing)
            <button wire:click="enableEditing" class="p-0.5 font-bold text-black">Edit</button>
        @else
            <button wire:click="cancelEditing" class="p-0.5 font-bold text-red-600">Cancel</button>
        @endif
    </div>
    <form @submit.prevent>
        <div>
            <input wire:model="newTodo" type="text" class="bg-amber-300 w-full" placeholder="Add a new todo..." />
            <button wire:click="addTodo" disabled>Add</button>
            <hr>
            <ul>
                @foreach ($todos as $todo)
                    <div class="pt-1.5 pb-1.5">
                        <li>
                            @if (!$isEditing)
                                <input type="checkbox" class="mr-1 " wire:click="toggleCompleted({{ $todo->id }})" {{ $todo->completed ? 'checked' : '' }} />
                                <span class="{{ $todo->completed ? 'line-through' : '' }}">
                               {{ $todo->name }}
                            </span>
                            @else
                                <input id="updateTodo{{$todo->id}}" name="updateTodo{{$todo->id}}" value="{{ $todo->name }}" class="bg-amber-100 h-full"/>
                                <button wire:click="editTodo({{ $todo->id }}, document.getElementById('updateTodo{{$todo->id}}').value)" class="float-right p-0.5 font-bold text-black">edit</button>
                                <button wire:click="deleteTodo({{ $todo->id }})" class="float-right p-0.5 font-bold text-red-600">X</button>
                            @endif
                        </li>
                        <hr>
                    </div>
                @endforeach
            </ul>
        </div>
    </form>
</div>


