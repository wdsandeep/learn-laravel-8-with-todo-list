@if ($todo->completed)
<span onclick="event.preventDefault();document.getElementById('form-incomplete-{{ $todo->id }}').submit();" class="fas fa-check px-2 text-green-400 cursor-pointer">
<form id="{{ 'form-incomplete-'.$todo->id }}" method="post" action="{{ route('todo.incomplete', $todo->id) }}" style="display: none;">
@csrf
@method('put')
</form>
</span>
@else
<span onclick="event.preventDefault();document.getElementById('form-complete-{{ $todo->id }}').submit();" class="fas fa-check px-2 text-gray-300 cursor-pointer">
<form id="{{ 'form-complete-'.$todo->id }}" method="post" action="{{ route('todo.complete', $todo->id) }}" style="display: none;">
@csrf
@method('put')
</form>
</span>
@endif