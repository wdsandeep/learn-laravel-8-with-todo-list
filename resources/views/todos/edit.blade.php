@extends('todos.layout')

@section('content')
<div class="flex justify-between border-b pb-4 px-4">
    <h1 class="text-2xl  pb-4">Update this todo list</h1>
    <a href="{{ route('todo.index') }}" class=" mx-5 py-2 px-1 text-gray-400 text-white cursor-pointer">
    <span class="fas fa-arrow-left text-2xl"></span>
    </a>
</div>


    <x-alert />
    <form action="{{ route('todo.update', $todo->id) }}" method="post" class="py-5 ">
        @csrf
        @method('patch')
        <div class="py-1">
            <input type="text" value="{{ $todo->title }}" name="title" class="py-2 px-2 border rounded" id="" placeholder="Title">
        </div>
        <div class="py-1">
            <textarea name="description" id=""  class="p-2 rouded border" placeholder="Description">{{ $todo->description }}</textarea>
        </div>
        <div class="py-2">
        @livewire('edit-step', ['steps' => $todo->steps])
        </div>
        <div class="py-1">
            <input type="submit" value="Update" class="p-2 border rounded" id="">
        </div>
    </form>

@endsection