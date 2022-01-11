@extends('todos.layout')

@section('content')

<div class="flex justify-between border-b pb-4 px-4">
    <h1 class="text-2xl   pb-4">{{ $todo->title }}</h1>
    <a href="{{ route('todo.index') }}" class=" mx-5 py-2 px-1 text-gray-400 text-white cursor-pointer">
    <span class="fas fa-arrow-left text-2xl"></span>
    </a>
</div>

    <div class="py-4">
    <h3 class="text-lg">Description</h3>
        <p>
            {{ $todo->description }}
        </p>
    </div>

    @if($todo->steps->count() > 0)
    <div class="py-4">
        <h3 class="text-lg">Steps for this task</h3>
        @foreach ($todo->steps as $step)
            <p>{{ $step->name }}</p>
        @endforeach
    </div>
    @endif
@endsection
