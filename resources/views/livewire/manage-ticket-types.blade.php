<div class="space-y-4">
    <div class="space-y-2">
        @forelse($ticketTypes as $type)
        <div class="flex justify-between items-center border rounded px-4 py-2">
            <div>
                <p class="font-medium">{{$type->name}}</p>
                <p class="text-sm text-grey-500">
                    #{{number_format($type->price, 2)}} - 
                    {{$type->quantity - $type->ticket_count}} of {{$type->quantity}} remaining
                </p>
            </div>
            <button 
            wire:click="deleteTicketType({{$type->id}})"
            wire:confirm="Delete this ticket type?"
            claass="bg-red-600 text-black px-3 py-1 rounded text-sm">
            Delete 
        </button>
        </div>
        @empty 
        <p class="text-sm text-grey-500">No ticket types yet. Add one below.</p>
        @endforelse 
    </div>
    <form wire:submit="addTicketType" class="grid grid-cols-3 gap-3 items-end border-t pt-4">
        <div>
            <label class="block text-sm font-medium text-grey-700">Name</label>
            <input type="text" wire:model="name" class="w-full border-grey-300 rounded-md" placeholder="e.g. VIP">
            @error('name') 
            <span class="text-red-600 text-xs">{{$message}}</span>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-grey-700">Price (#)</label>
            <input type="number" step=0.01 wire:model="price" class="w-full border-grey-300 rounded-md">
            @error('price')     
            <span class="text-red-600 text-xs">{{$message}}</span>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-grey-700">Quantity</label>
            <input type="number" wire:model="quantity" class="w-full border-grey-300 rounded-md">
            @error('quantity') 
            <span class="text-red-600 text-xs"></span>
            @enderror 

        </div>
        <div class="col-span-3">
            <button type="submit" class="bg-indigo-600 text-black px-4 py-2 rounded-md hover:bg-indigo-700">
                Add ticket Type 
        </button>
        </div>
    </form>
    
</div>
