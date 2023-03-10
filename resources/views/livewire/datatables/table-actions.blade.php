@php
    $randomKey = time().$id;
@endphp
<div class="flex justify-around space-x-1">
    <button dusk="click_pencil" wire:click="table_edit({{$id}})" wire:key="edit_{{$id}}"    class="w-4 mr-2 transform hover:text-purple-500 hover:scale-150">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg>
    </button>
    <button dusk="click_trash" wire:click="table_delete({{$id}})" :delete_id="$id" wire:key="delete_{{$id}}"  class="w-4 mr-2 text-red-500 transform hover:text-purple-500 hover:scale-150">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
    </button>
</div>