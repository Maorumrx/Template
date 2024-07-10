<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between w-full pb-2 flex-nowrap">
            <div>
                {{-- Left --}}
            </div>
            <div>
                {{-- Center --}}
                @if ($isForm)
                    @if (!$state)
                        
                        @if ($this->order_type === "LOOKCHIN")
                            <x-action-buttons-confirm />
                        @elseif ($this->order_type === "MOOKRATA")
                            <x-back-buttons />
                        @endif
                    @else
                        <x-action-buttons-close />
                    @endif
                @endif
            </div>
            <div>
                {{-- Right --}}
            </div>
        </div>
        <x-alert-box />

        <div x-data="{ open: false }">
            <div x-show="!$wire.isForm" style="@if($isForm) display: none; @endif">
                {{-- Datatables --}}
                
                <div class="flex justify-between w-full pb-2 flex-nowrap">
                    <div>
                        {{-- Left --}}
                    </div>
                    <div class="rounded-lg justify-items-center">
                        {{-- Center --}}
                        <div class="flex items-center justify-center mb-2">
                            <x-open-buttons-1 />
                        </div>
                        <div class="flex items-center justify-center">
                            <x-open-buttons-2 />
                        </div>
                    </div>
                    <div>
                        {{-- Right --}}
                    </div>
                </div>
            </div>
        </div>

        <div x-data="{ open: false }">
            <div x-show="$wire.isForm" style="@if(!$isForm) display: none; @endif">
                {{-- Form --}}
                {{-- @if ($this->order_type == "LOOKCHIN") --}}
                    @include('livewire.market.lookchin')
                {{-- @elseif ($this->order_type == "MOOKRATA")
                    @include('livewire.market.mookrata')
                @endif --}}
                
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>

</script>
@endpush