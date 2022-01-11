<div>
    <div class="flex justify-center pb-4 px-4">
        <h2 class="text-lg   pb-4">Add Steps for Task</h2>
        <span wire:click="increment" class="fas fa-plus text-2xl px-2 py-1 cursor-pointer"></span>
    </div>
    @foreach ($steps as $step)
    <div class="py-2" wire:key="{{ $step }}">
        <input type="text" name="step[]" class="py-2 px-2 border rounded" id="" placeholder="Describe Step {{ $step+1 }}">
        <span wire:click="remove({{ $step }})" class="fas fa-times text-red-400"></span>
    </div>
    @endforeach
</div>
