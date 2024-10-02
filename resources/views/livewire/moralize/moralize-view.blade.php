<div>
    <div class="py-12">
        <div class="mx-auto max-w-7xl">
            <section class="overflow-hidden text-gray-700 ">
                <div class="container">
                    <div class="inline-flex items-center justify-center px-4 py-2 font-semibold rounded-md text-2xl dark:text-white w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                            </svg>
                        วีดีโอ
                    </div>
                    <div class="flex flex-wrap items-center justify-center">
                        @foreach ($gallery as $item)
                            
                            @if ($item->file_type == 'mp4')
                                {{-- <div class=" rounded-xl overflow-auto  p-8"> --}}
                                    <div class="lg:w-1/3 w-full m-5 overflow-auto flex items-center justify-center flex-col rounded-lg font-mono text-white text-sm font-bold bg-orange-200 dark:bg-gray-700 shadow-lg">
                                        <div class="p-4 w-full flex items-center justify-center  dark:bg-gray-700">
                                            <div class="w-full p-1 md:p-2">
                                                <video controls class="block object-cover object-center w-full h-60 rounded-lg" >
                                                    <source src="{{asset("moralize_file/$item->file_name")}}" type="video/mp4"/>
                                                </video>
                                            </div>
                                        </div>
                                        <div class="p-4 text-2xl flex items-start justify-start ">
                                            <span class="flex-warp text-neutral-700 dark:text-white font-extrabold">{{ $item->moralize_name }}</span>
                                        </div>
                                        <div class="p-4 text-xl flex items-start justify-start h-32">
                                            {{-- @if (mb_strlen($item->moralize_desc) > 50)
                                                @php
                                                    $truncatedText = mb_substr($item->moralize_desc,0,50). '...';
                                                @endphp
                                                <div class="tooltip-container">
                                                    <span data-text="{{ $item->moralize_desc }}" class="text-tooltip flex-warp text-neutral-700 dark:text-white">
                                                        {{ $truncatedText }}
                                                    </span>
                                                </div>
                                            @else --}}
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
            </section>
        </div>
    </div>
</div>

@push('scripts')
<script>

</script>
@endpush
