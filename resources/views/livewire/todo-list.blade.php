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
            <button wire:click="addTodo" hidden>Add</button>
            <hr>
            <ul>
                @foreach ($todos as $index => $todo)
                    <div class="pt-1.5 pb-1.5">
                        <li wire:key="{{$todo['id']}}">
                            @if (!$isEditing)
                                <input type="checkbox" class="mr-1 "  wire:click="toggleCompleted({{ $todo['id'] }})" {{ $todo['completed'] ? 'checked' : '' }} />
                                <span class="{{ $todo['completed'] ? 'line-through' : '' }}">
                                {{ $todo['name'] }}
                            </span>
                            @else
                                <input wire:model.live="todos.{{ $index }}.name" class="bg-amber-100 h-full"/>
                                <button wire:click="editTodo({{ $index }}" class="float-right p-0.5 font-bold text-black">Save</button>
                                <button wire:click="deleteTodo({{ $todo['id'] }})" class="float-right p-0.5 font-bold text-red-600">X</button>
                            @endif
                        </li>
                        <hr>
                    </div>
                @endforeach
            </ul>
        </div>
    </form>
</div>


