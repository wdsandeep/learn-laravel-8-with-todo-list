<div>
    <div class="flex justify-center pb-4 px-4">
        <h2 class="text-lg   pb-4">Add Steps for Task</h2>
        <span wire:click="increment" class="fas fa-plus text-2xl px-2 py-1 cursor-pointer"></span>
    </div>
    @foreach ($steps as $step)
    <div class="py-2" wire:key="{{ $loop->index }}">
        <input type="text" name="stepName[]" value="@isset($step['name']){{ $step['name'] }}@endisset" class="py-2 px-2 border rounded" placeholder="Describe Step  {{ $loop->index+1 }}">
        <input type="hidden" name="stepId[]" value="@isset($step['id']){{ $step['id'] }}@endisset">
        
        <span wire:click="remove({{ $loop->index }})" class="fas fa-times text-red-400"></span>
    </div>
    @endforeach
</div>
