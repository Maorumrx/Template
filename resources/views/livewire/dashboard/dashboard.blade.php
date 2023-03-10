<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        {{-- <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg dark:bg-neutral-900"> --}}
            {{-- <div
                class="p-6 bg-white border-b border-gray-200 sm:px-20 dark:bg-neutral-800 dark:border-neutral-600"> --}}
                <div class="flex justify-between w-full pb-2 flex-nowrap">
                    <div>
                        {{-- Left --}}
                        @if($isForm)
                            <h3 class=" px-4 py-2 text-2xl font-black leading-6 text-gray-900 dark:text-neutral-300">วัดโนนสำราญ</h3>
                        @endif
                    </div>
                    <div>
                        {{-- Center --}}
                    </div>
                    <div>
                        {{-- Right --}}
                         @if(!$isForm)
                        {{-- <x-create-buttons /> --}}
                        @else
                        <x-back-buttons />
                        @endif
                    </div>
                </div>
                
                <div x-data="{ open: false }">
                    <div x-show="!$wire.isForm" style="@if($isForm) display: none; @endif">
                        {{-- Announce --}}
                        <x-jet-welcome />
                        
                        <div class="pt-5">
                            @include('livewire.dashboard._announce')
                        </div>
                        
                        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 pt-5">
                            <h3 id="directory" class="py-2 text-2xl font-black leading-6 text-gray-900 dark:text-neutral-300">ทำเนียบ</h3>
                            <div class="mt-2 text-sm text-gray-500 dark:text-neutral-400">
                                Laravel has wonderful documentation covering every aspect of the framework. Whether you're new to the framework or have previous experience, we recommend reading all of the documentation from beginning to end.
                            </div>
                        </div>
                    </div>
                </div>

                <div x-data="{ open: false }">
                    <div x-show="$wire.isForm" style="@if(!$isForm) display: none; @endif">
                        {{-- Form --}}
                        <div class="pt-5">
                            @include('livewire.dashboard._announcedetail')
                        </div>
                    </div>
                </div>
                {{--
            </div> --}}
            {{-- </div> --}}
    </div>
</div>
@push('scripts')
<script>
</script>
@endpush