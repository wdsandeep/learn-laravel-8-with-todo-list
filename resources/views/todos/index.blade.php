@extends('todos.layout')

@section('content')
<div class="flex justify-between border-b pb-4 px-4">
    <h1 class="text-2xl">All your Todos!</h1>
    <a href="{{ route('todo.create') }}" class=" mx-5 py-2 px-1 text-blue-400 text-white cursor-pointer">
    <span class="fas fa-plus-circle text-2xl"></span>
    </a>
</div>
    <ul class="my-5">
    <x-alert />
        
        @forelse ($todos as $todo )
        <li class="flex justify-between py-2 border">
        <div>
            @include('todos.complete-button')
        </div>

            @if ($todo->completed)
            <p class="pl-4 line-through">
                {{ $todo->title }}
            </p>
            @else
            <a class="pl-4 cursor-pointer" href="{{ route('todo.show', $todo->id) }}">
                {{ $todo->title }}
            </a>
            @endif

            <div>
            <a href="{{ route('todo.edit',$todo->id) }}">
            <span class="fas fa-pen px-2 text-green-400 "></span>
            </a>

            <span class="fas fa-trash px-2 text-red-400 cursor-pointer" onclick="event.preventDefault(); if(confirm('Are you really want to delete?')){ document.getElementById('form-delete-{{ $todo->id }}').submit(); }">
            <form id="{{ 'form-delete-'.$todo->id }}" method="post" action="{{ route('todo.destroy', $todo->id) }}" style="display: none;">
            @csrf
            @method('delete')
            </form>
            </span>

            </div>

        </li>
        @empty
            <p>No task available create new one.</p>
        @endforelse
    </ul>
@endsection