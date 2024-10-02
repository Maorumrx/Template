<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between w-full pb-2 flex-nowrap">
            <div>
                {{-- Left --}}
                @if($isForm)
                    <span class=" px-4 py-2 text-2xl font-black leading-6 text-gray-900 dark:text-neutral-300">วัดโนนสำราญ</span>
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
                
                <div class="mx-auto mt-5 max-w-7xl sm:p-6 lg:p-8 p-5 bg-orange-100 rounded-md dark:bg-gray-800 border-b-4 border-yellow-400">
                    <div class=" px-4 py-2 font-semibold rounded-md text-2xl dark:text-white w-full">
                        <div class="flex justify-between w-full pb-2 flex-nowrap">
                            <div>
                                {{-- Left --}}
                                <div class="inline-flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                    </svg>
                                    วีดีโอ
                                </div>
                            </div>
                            <div>
                                {{-- Center --}}
                            </div>
                            <div>
                                {{-- Right --}}
                                <a href="{{ route('moralize') }}">
                                <div class="inline-flex text-lg items-center justify-center shadow-lg px-4 py-2 text-white bg-green-400 rounded-lg cursor-pointer" >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                    ดูทั้งหมด
                                </div>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="flex flex-wrap items-center justify-center">
                        @foreach ($gallery as $item)
                            
                            @if ($item->file_type == 'mp4')
                                {{-- <div class=" rounded-xl overflow-auto  p-8"> --}}
                                    <div class="lg:w-1/4 w-full m-5 overflow-auto flex items-center justify-center flex-col rounded-lg text-white text-sm font-bold bg-orange-200 dark:bg-gray-700 shadow-lg">
                                        <div class="p-4 w-full flex items-center justify-center  dark:bg-gray-700">
                                            <div class="w-full p-1 md:p-2">
                                                <video controls class="block object-cover object-center w-full h-60 rounded-lg" >
                                                    <source src="{{asset("moralize_file/$item->file_name")}}" type="video/mp4"/>
                                                </video>
                                            </div>
                                        </div>
                                        <div class="p-4 text-xl flex items-start justify-start ">
                                            <span class="flex-warp text-neutral-700 dark:text-white font-bold">{{ $item->moralize_name }}</span>
                                        </div>
                                        <div class="p-4 text-base flex items-start justify-start h-32">
                                                <span class="flex-warp text-neutral-700 dark:text-white">
                                                    {{ $item->moralize_desc }}
                                                
                                                </span>
                                            {{-- @endif --}}
                                        </div>
                                    </div>
                                {{-- </div> --}}
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="mx-auto mt-5 max-w-7xl sm:p-6 lg:p-8 p-5 bg-orange-100 rounded-md dark:bg-gray-800 border-b-4 border-yellow-400">
                    <section class="overflow-hidden text-gray-700 dark:text-gray-100 ">
                        <div class="container">
                            <div class="flex justify-between w-full pb-2 flex-nowrap">
                                <div>
                                    {{-- Left --}}
                                    <div class="inline-flex items-center justify-start px-4 py-2 font-semibold rounded-md text-2xl dark:text-white w-full">
                                        บทสวดมนต์
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 h-10 w-10">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    {{-- Center --}}
                                </div>
                                <div>
                                    {{-- Right --}}
                                    <a href="{{ route('prayer') }}">
                                    <div class="inline-flex text-lg items-center justify-center shadow-lg px-4 py-2 text-white bg-green-400 rounded-lg cursor-pointer" >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                        ดูทั้งหมด
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="bg-orange-100 dark:bg-gray-700 rounded-lg">
                                <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                                    <h2 class="sr-only">-</h2>

                                    <div class="grid grid-cols-1 text-center font-bold gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                                        <a href="{{asset('document/pdf/คาถาชินบัญชร.pdf')}}" target="_blank" class="group">
                                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                                <img src="{{asset('document/img/ชินบัญชร.jpg')}}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                                            </div>
                                            <span class="mt-4 text-lg text-gray-700  dark:text-gray-100">ชินบันชร พร้อมคำแปล</span>
                                        </a>
                                        <a href="{{asset('document/pdf/บทสวดถวายพรพระ.pdf')}}" target="_blank" class="group">
                                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                                <img src="{{asset('document/img/บทถวายพรพระ.jpg')}}" alt="Olive drab green insulated bottle with flared screw lid and flat top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                                            </div>
                                            <span class="mt-4 text-lg text-gray-700 dark:text-gray-100">บทถวายพรพระ</span>
                                        </a>
                                        <a href="{{asset('document/pdf/บทสวดทำวัตรเช้า-แปล.pdf')}}" target="_blank" class="group">
                                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                                <img src="{{asset('document/img/ทำวัตรเช้า.jpg')}}" alt="Person using a pen to cross a task off a productivity paper card." class="h-full w-full object-cover object-center group-hover:opacity-75">
                                            </div>
                                            <span class="mt-4 text-lg text-gray-700 dark:text-gray-100">ทำวัตรเช้า-แปล</span>
                                        </a>
                                        <a href="{{asset('document/pdf/บทสวดทำวัตรเย็น-แปล.pdf')}}" target="_blank" class="group">
                                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                                <img src="{{asset('document/img/ทำวัตรเย็น.jpg')}}" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                                            </div>
                                            <span class="mt-4 text-lg text-gray-700 dark:text-gray-100">ทำวัตรเย็น-แปล</span>
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="mx-auto mt-5 max-w-7xl sm:p-6 lg:p-8 p-5 bg-orange-100 rounded-md dark:bg-gray-800 border-b-4 border-yellow-400">
                    <section class="overflow-hidden text-gray-700 dark:text-gray-100 ">
                        <div class="container">
                            <div class="flex justify-between w-full pb-2 flex-nowrap">
                                <div>
                                    {{-- Left --}}
                                    <div class="flex flex-col mx-auto space-y-4  dark:text-white font-bold leading-6 max-w-xs">
                                        <div class="rounded-lg flex items-center justify-start font-semibold  text-2xl">
                                            ติดต่อเรา
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 h-10 w-10">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                            </svg>
                                        </div>
                                        <div class="rounded-lg flex items-center justify-start text-lg">
                                            วัดบ้านโนนสำราญ ตำบลโนนสมบูรณ์ อำเภอเสิงสาง จังหวัดนครราชสีมา 30330
                                        </div>
                                        <div class="rounded-lg flex items-center justify-start text-lg">
                                            เบอร์โทรติดต่อ 0934743069
                                        </div>
                                        <div class="rounded-lg flex items-center justify-start">
                                            <a href="https://www.facebook.com/teerawongso" target="_blank">
                                                PAGE FACEBOOK
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="h-20 w-20" viewBox="0 0 48 48">
                                                    <path fill="#3F51B5" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5V37z"></path><path fill="#FFF" d="M34.368,25H31v13h-5V25h-3v-4h3v-2.41c0.002-3.508,1.459-5.59,5.592-5.59H35v4h-2.287C31.104,17,31,17.6,31,18.723V21h4L34.368,25z"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    {{-- Center --}}
                                </div>
                                <div >
                                    {{-- Right --}}
                                    <iframe class="rounded-lg shadow-lg bg-orange-200 dark:bg-gray-600" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7730.325831123808!2d102.4397178!3d14.359982!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311bc0278f3bf039%3A0x6ed53e7cae4fbb77!2z4Lin4Lix4LiU4LmC4LiZ4LiZ4Liq4Liz4Lij4Liy4LiN!5e0!3m2!1sth!2sth!4v1727882093071!5m2!1sth!2sth" width="450" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </section>
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
    </div>
</div>
@push('scripts')
<script>
</script>
@endpush