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
                        <x-jet-welcome :galleries="$Image_gallery"/>
                        
                        <div class="pt-5">
                            @include('livewire.dashboard._announce')
                        </div>
                        
                        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 pt-5">
                            <h3 id="directory" class="py-2 text-2xl font-black leading-6 text-gray-900 dark:text-neutral-300">พระลูกวัด</h3>

                            {{-- ภาพชุดที่ 1-3 --}}
                                <div class="grid grid-cols-3 gap-4 place-items-center">
                                    <div class="h-48 w-48 overflow-hidden rounded-full border border-gray-200">
                                        <img src="{{asset('img/ฟหก้ห้ดกดเ.jpg')}}" alt="" class="h-full w-full object-cover text-center object-center">
                                    </div>
                                    <div class="h-48 w-48  overflow-hidden rounded-full border border-gray-200">
                                        <img src="{{asset('img/asfghbwet.jpg')}}" alt="" class="h-full w-full object-cover object-center">
                                    </div>
                                    <div class="h-48 w-48  overflow-hidden rounded-full border border-gray-200">
                                        <img src="{{asset('img/ฟหดเๆไเ.jpg')}}" alt="" class="h-full w-full object-cover object-center">
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="mt-2 text-center text-sm text-gray-500 dark:text-neutral-400">
                                        หลวงตาใช้หรือหลวงตาหนิด
                                    </div>
                                    <div class="mt-2 text-center text-sm text-gray-500 dark:text-neutral-400">
                                        พระนาวินหรือพระหมึก
                                    </div>
                                    <div class="mt-2 text-center text-sm text-gray-500 dark:text-neutral-400">
                                        พระธีรพงศ์หรือพระแมน
                                    </div>
                                </div>
                            {{-- ภาพชุดที่ 1-3 --}}

                            {{-- ภาพชุดที่ 4-6 --}}
                                <div class="grid grid-cols-3 gap-4 place-items-center mt-5">
                                    <div class="h-48 w-48 overflow-hidden rounded-full border border-gray-200">
                                        <img src="{{asset('img/ฟหกด้-ๆพำไั.jpeg')}}" alt="" class="h-full w-full object-cover text-center object-center">
                                    </div>
                                    <div class="h-48 w-48  overflow-hidden rounded-full border border-gray-200">
                                        <img src="{{asset('img/หลวงพี่ต้อม.jpeg')}}" alt="" class="h-full w-full object-cover object-center">
                                    </div>
                                    <div class="h-48 w-48  overflow-hidden rounded-full border border-gray-200">
                                        <img src="{{asset('img/หลวงพี่ดิว.jpeg')}}" alt="" class="h-full w-full object-cover object-center">
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-4 ">
                                    <div class="mt-2 text-center text-sm text-gray-500 dark:text-neutral-400">
                                        พระพงศธรหรือพระใหญ่
                                    </div>
                                    <div class="mt-2 text-center text-sm text-gray-500 dark:text-neutral-400">
                                        พระวชิรญาโณหรือพระต้อม
                                    </div>
                                    <div class="mt-2 text-center text-sm text-gray-500 dark:text-neutral-400">
                                        พระทิวาหรือพระดิว
                                    </div>
                                </div>
                            {{-- ภาพชุดที่ 4-6 --}}

                            {{-- ภาพชุดที่ 7-9 --}}
                            <div class="grid grid-cols-3 gap-4 place-items-center mt-5">
                                <div class="h-48 w-48 overflow-hidden rounded-full border border-gray-200">
                                    <img src="{{asset('img/หลวงพี่น้อย.jpeg')}}" alt="" class="h-full w-full object-cover text-center object-center">
                                </div>
                                <div class="h-48 w-48  overflow-hidden rounded-full border border-gray-200">
                                    <img src="{{asset('img/พระต่วย.jpeg')}}" alt="" class="h-full w-full object-cover object-center">
                                </div>
                                <div class="h-48 w-48  overflow-hidden rounded-full border border-gray-200">
                                    <img src="{{asset('img/พระต่อ.jpeg')}}" alt="" class="h-full w-full object-cover object-center">
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-4 ">
                                <div class="mt-2 text-center text-sm text-gray-500 dark:text-neutral-400">
                                    พระชัยยาหรือพระน้อย
                                </div>
                                <div class="mt-2 text-center text-sm text-gray-500 dark:text-neutral-400">
                                    พระอธิยุตหรือพระต่วย
                                </div>
                                <div class="mt-2 text-center text-sm text-gray-500 dark:text-neutral-400">
                                    พระวันชนะหรือพระต่อ
                                </div>
                            </div>
                            {{-- ภาพชุดที่ 7-9 --}}

                            {{-- ภาพชุดที่ 7-9 --}}
                            <div class="grid grid-cols-3 gap-4 place-items-center mt-5">
                                <div class="h-48 w-48 overflow-hidden rounded-full border border-gray-200">
                                    <img src="{{asset('img/หลวงพี่วุฒิ.jpg')}}" alt="" class="h-full w-full object-cover text-center object-center">
                                </div>
                                <div class="h-48 w-48  overflow-hidden rounded-full border border-gray-200">
                                    <img src="{{asset('img/พระเต้ย.jpeg')}}" alt="" class="h-full w-full object-cover object-center">
                                </div>
                                <div class="h-48 w-48  overflow-hidden rounded-full border border-gray-200">
                                    <img src="{{asset('img/พระเคน.jpeg')}}" alt="" class="h-full w-full object-cover object-center">
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-4 ">
                                <div class="mt-2 text-center text-sm text-gray-500 dark:text-neutral-400">
                                    พระสราวุฒิหรือพระวุฒิ
                                </div>
                                <div class="mt-2 text-center text-sm text-gray-500 dark:text-neutral-400">
                                    พระวัชรพงศ์หรือพระเต้ย
                                </div>
                                <div class="mt-2 text-center text-sm text-gray-500 dark:text-neutral-400">
                                    พระสาครหรือพระเคน
                                </div>
                            </div>
                            {{-- ภาพชุดที่ 7-9 --}}

                             {{-- ภาพชุดที่ 10-12 --}}
                             <div class="grid grid-cols-3 gap-4 place-items-center mt-5">
                                <div class="h-48 w-48 overflow-hidden rounded-full border border-gray-200">
                                    <img src="{{asset('img/หลวงเชท.jpeg')}}" alt="" class="h-full w-full object-cover text-center object-center">
                                </div>
                                <div class="h-48 w-48  overflow-hidden rounded-full border border-gray-200">
                                    <img src="{{asset('img/พระโบ๊ท.jpeg')}}" alt="" class="h-full w-full object-cover object-center">
                                </div>
                                <div class="h-48 w-48  overflow-hidden rounded-full border border-gray-200">
                                    <img src="{{asset('img/พระแคน.jpeg')}}" alt="" class="h-full w-full object-cover object-center">
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-4 ">
                                <div class="mt-2 text-center text-sm text-gray-500 dark:text-neutral-400">
                                    พระธวัชชัยหรือพระเชท
                                </div>
                                <div class="mt-2 text-center text-sm text-gray-500 dark:text-neutral-400">
                                    พระศิริวัฒน์หรือพระโบ๊ท
                                </div>
                                <div class="mt-2 text-center text-sm text-gray-500 dark:text-neutral-400">
                                    พระเทวาหรือพระเเคน
                                </div>
                            </div>
                            {{-- ภาพชุดที่ 10-12 --}}

                            {{-- ภาพชุดที่ 13 --}}
                            <div class="grid grid-cols-3 gap-4 place-items-center mt-5">
                                <div class="h-48 w-48 overflow-hidden rounded-full border border-gray-200">
                                    <img src="{{asset('img/เณรคิง.jpeg')}}" alt="" class="h-full w-full object-cover text-center object-center">
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-4 ">
                                <div class="mt-2 text-center text-sm text-gray-500 dark:text-neutral-400">
                                    สามเณรรัฐมนตรีหรือเณรคิง
                                </div>
                            </div>
                            
                            {{-- ภาพชุดที่ 13 --}}

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