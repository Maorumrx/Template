<div class="px-2 pt-2 ">
    {{-- detail --}}
    <div class="mt-10 sm:mt-0 ">
        <div class="md:grid md:grid-cols-3 md:gap-6 ">
            {{-- <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-neutral-300">ข้อมูลข่าวสารและประกาศ</h3>
                </div>
            </div> --}}
            <div class="mt-5 md:mt-0 md:col-span-3 ">
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="px-4 py-5 space-y-6 bg-white sm:p-6 dark:bg-neutral-800">
                        <div class="grid grid-cols-4 gap-4">
                            <div class="col-span-4 mt-2 sm:col-span-4">
                                <label class="py-4 block text-sm font-medium text-gray-900 dark:text-neutral-300 ">
                                    หัวข้อ 
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                                    </svg>
                                    @if ($flag == 0)
                                  
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="inline-block w-5 h-5 text-yellow-400">
                                            <path fill-rule="evenodd"
                                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                </label>
                                <div class="pl-4 text-xs dark:text-neutral-400">
                                    {{$announcement_header ?? ''}}
                                </div>
                            </div>
                            <div class="col-span-4 mt-2 sm:col-span-4">
                                <label class="py-4 block text-sm font-medium text-gray-900 dark:text-neutral-300 ">
                                    รายละเอียด 
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>

                                </label>
                                <div class="pl-4  text-xs dark:text-neutral-400">
                                    {{$announcement_desc ?? ''}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 text-right bg-gray-50 sm:px-6 dark:bg-neutral-700">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="overflow-hidden text-gray-700 ">
    <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-2">
        <label class=" text-sm font-medium text-gray-900 dark:text-neutral-300 ">ภาพวีดีโอตัวอย่าง </label>
        <div class="flex flex-wrap -m-1 md:-m-2">
            
            @foreach ($gallery as $item)
                {{-- {{dd($gallery)}} --}}
                @if ($item->file_type == 'mp4')
                    <div class="flex flex-wrap w-1/3">
                        <div class="w-full p-1 md:p-2">
                        <video controls autoplay muted loop class="block object-cover object-center w-full h-full rounded-lg " >
                            <source src="{{asset("announce_file/$item->file_name")}}" type="video/mp4"/>
                        </video>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

<section class="overflow-hidden text-gray-700 ">
    <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-2">
        <label class=" text-sm font-medium text-gray-900 dark:text-neutral-300 ">ภาพตัวอย่าง </label>
        <div class="flex flex-wrap -m-1 md:-m-2">
            @foreach ($gallery as $item)
                {{-- {{dd($gallery)}} --}}
                @if ($item->file_type != 'mp4')
                    @if ($item->file_type == 'png')
                        <div class="flex flex-wrap w-1/3">
                            <div class="w-full p-1 md:p-2">
                            <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg transition duration-150 ease-out hover:scale-125 "
                                src="{{asset("announce_file/$item->file_name")}}">
                            </div>
                        </div>
                    @elseif(($item->file_type == 'jpg'))
                    <div class="flex flex-wrap w-1/3">
                            <div class="w-full p-1 md:p-2">
                            <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg transition duration-150 ease-out hover:scale-125"
                                src="{{asset("announce_file/$item->file_name")}}">
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
        </div>
    </div>
</section>