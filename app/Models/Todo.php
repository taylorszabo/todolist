<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rules(): array
    {
        return [
            'todos.*.name' => 'string',
            'todos.*.completed' => 'bool'
        ];
    }
}
