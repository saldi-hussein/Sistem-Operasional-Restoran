<div>
    <select wire:model="currentStatus" class="text-sm rounded border-gray-300">
        <option value="Pending">Pending</option>
        <option value="Cancel">Cancel</option>
        <option value="Done">Done</option>
    </select>
    
    @if(session()->has('message'))
        <div class="text-green-500 text-sm mt-2">
            {{ session('message') }}
        </div>
    @endif
</div>