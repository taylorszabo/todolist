<div class="bg-amber-300 p-8 flex float-left relative">
    <div class="absolute top-2.5 right-8">
        @if (!$isEditing)
            <button wire:click="enableEditing" class="p-0.5 font-bold text-black">Edit</button>
        @else
            <button wire:click="leaveEditing" class="p-0.5 font-bold text-black">View</button>
        @endif
    </div>
    <form @submit.prevent>
        <div>
            <input wire:model="newTodoName" type="text" class="bg-amber-300 w-full" placeholder="Add a new todo..." />
            <button wire:click="addTodo">Adds</button>
            <hr>
            <ul>
                @foreach ($todos as $index => $todo)
                    <div class="pt-1.5 pb-1.5" wire:key="{{$todo['id']}}">
                        <li>
                            @if ($isEditing)
                                <input wire:key="{{$todo['id']}}.name"
                                       aria-label="Todo name"
                                       wire:keydown.enter="leaveEditing"
                                       wire:model.live="todos.{{$index}}.name" class="bg-amber-100 h-full"/>
                                <button wire:click="deleteTodo({{ $todo['id'] }})" class="float-right p-0.5 font-bold text-red-600">X</button>
                            @else
                                <label class="{{ $todo['completed'] ? 'line-through' : '' }}">
                                    <input wire:key="{{$todo['id']}}.completed" aria-label="Todo completed" type="checkbox" class="mr-1 " wire:model.live="todos.{{$index}}.completed" />
                                    {{ $todo['name'] }}
                                </label>
                            @endif
                        </li>
                        <hr>
                    </div>
                @endforeach
            </ul>
        </div>
    </form>
</div>


