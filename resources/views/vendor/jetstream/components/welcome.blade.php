<div class=" p-6 bg-white border-b border-gray-200 sm:px-20 dark:bg-neutral-800 dark:border-yellow-600">
    <div class="mt-8 text-2xl dark:text-neutral-300">
        {{-- LOGO --}}
        {{-- <x-jet-application-logo class="block w-auto h-12 dark:text-neutral-300" /> --}}
        {{-- <h2 class="w3-center">Manual Slideshow</h2> --}}
        
    {{-- <span id="heading">Simple automatic slider</span> --}}
    <div id="slider">  
            {{-- {{dd($galleries)}} --}}
        @foreach ($galleries as $item)
            {{-- {{dd($galleries)}} --}}
                {{-- @if ($item['file_type'] == 'png') --}}
                @php
                    $file_name = $item['file_name'];
                    // dd($item);
                @endphp
                    <div class="slides">  
                        <img src="{{asset("presentation_file/$file_name")}}" width="100%" class="h-96 object-cover object-center" />
                    </div>
                {{-- @endif --}}
        @endforeach
        
    
        {{-- <div class="slides">  
            <img src="{{asset('img/walk_2.jfif')}}" width="100%" class="h-96 object-cover object-center"/>
        </div>
    
        <div class="slides">  
            <img src="{{asset('img/walk_3.jfif')}}" width="100%" class="h-96 object-cover object-center"/>
        </div> 
    
        <div class="slides">  
            <img src="{{asset('img/walk_4.jfif')}}" width="100%" class="h-96 object-cover object-center"/>
        </div> 
    
        <div class="slides">  
            <img src="{{asset('img/walk_5.jfif')}}" width="100%" class="h-96 object-cover object-center"/>
        </div>   --}}
    
        <div id="dot">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>


    <div class="mt-8 text-2xl dark:text-neutral-300">
        {{-- Welcome to your Jetstream application! --}}
        ประวัติสำนักสงฆ์โนนสำราญ
    </div>

    <div class="mt-6 text-gray-500 dark:text-neutral-400">
        สำนักสงฆ์หรือที่ชาวบ้านแรกกันว่าวัดโนนสำราญก่อตั้งอยู่ที่ตำบลโนนสมบูรณ์ อำเภอเสิงสาง จังหวัดนครราชสีมา ในอดีตมีพระจำอยู่ที่วัดจำนวน 1 รูป และได้นิมนต์พระอาจารย์ชูเชิดเข้ามาจำพรรษาอยู่ที่วัด รวมเป็น 2 รูป พอออกพรรษาในปี 2552 อดีตพระอธิการก็ได้ลาสิกขา เหลือไว้แต่เพียงพระอาจารย์ชูเชิดแต่เพียงรูปเดียวเท่านั้นและได่เป็นพระอธิการดูแล ได้สร้างและบำรุงมาจำถึงปัจจุบัน
    </div>
</div>

<div class="grid grid-cols-1 bg-gray-200 bg-opacity-25 md:grid-cols-2 dark:bg-neutral-800">
    <div class="p-6">
        <div class="flex items-center">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                class="w-8 h-8 text-red-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
            </svg> --}}
            <div class="h-8 w-8 flex-shrink-0 overflow-hidden rounded-full">
                <img src="{{asset('/img/monk.png')}}" alt="" class="h-full w-full object-cover object-center">
            </div>
            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
            class="w-8 h-8 text-red-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg> --}}
            <div class="ml-4 text-2xl font-semibold leading-7 text-gray-600 dark:text-neutral-300">
                <a href="#directory">พระอธิการหรือเจ้าอาวาส</a>
            </div>
        </div>
        {{-- รูปภาพ --}}
        <div class="mt-8">
            <div class="flow-root">
                <ul role="list" class="-my-6 divide-y divide-gray-200">
                    <li class="flex py-6">
                        <div class="h-48 w-48 flex-shrink-0 overflow-hidden rounded-full border border-gray-200">
                            <img src="{{asset('img/download.jpg')}}" alt="" class="h-full w-full object-cover object-center">
                        </div>
                        <div class="ml-4 flex flex-1 flex-col">
                            <div>
                                <div class="flex justify-between text-xl font-medium dark:text-amber-300">
                                    <h3>
                                        <a href="#">พระอาจารย์ ชูเชิด มหาวีโร</a>
                                    </h3>
                                    {{-- <p class="ml-4">
                                        $90.00
                                    </p> --}}
                                </div>
                                <p class="mt-1 text-base text-amber-600">
                                    พระอาจารย์นำ ครูบาอาจารย์ผู้เปี่ยมล้นด้วยเมตตา ท่านได้นิยมชมชอบส่งเสริมเกื้อกูลแก่เด็กผู้ยากไร้ และท่านได้ส่งเด็กผู้ยากไร้หลายคนได้มีการศึกษาเล่าเรียนจนจบปริญญาตรี ท่านชมชอบผู้ที่มีความขยันหมั่นเพียรเอาการเอางาน
                                </p>
                            </div>
                            {{-- <div class="flex flex-1 items-end justify-between text-sm">
                                <p class="text-gray-500">
                                    facebook
                                </p>

                                <div class="flex">
                                    <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">
                                        ไปต่อ
                                    </button> --}}
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        {{-- รูปภาพ --}}

        {{-- <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500 dark:text-neutral-400">
                Laravel has wonderful documentation covering every aspect of the framework. Whether you're new to the framework or have previous experience, we recommend reading all of the documentation from beginning to end.
            </div>

            <a href="https://laravel.com/docs">
                <div class="flex items-center mt-3 text-sm font-semibold text-indigo-700 dark:text-indigo-300">
                    <div>Explore the documentation</div>

                    <div class="ml-1 text-indigo-500 dark:text-indigo-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </div>
                </div>
            </a>
        </div> --}}
    </div>

    {{-- <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l dark:border-neutral-600">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-400"><path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" /></svg>
            <div class="ml-4 text-lg font-semibold leading-7 text-gray-600 dark:text-neutral-300">
                <a href="https://laracasts.com">Laracasts</a>
            </div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500 dark:text-neutral-400">
                Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
            </div>

            <a href="https://laracasts.com">
                <div class="flex items-center mt-3 text-sm font-semibold text-indigo-700 dark:text-indigo-300">
                    <div>Start watching Laracasts</div>

                    <div class="ml-1 text-indigo-500 dark:text-indigo-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </div>
                </div>
            </a>
        </div>
    </div> --}}

    {{-- <div class="p-6 border-t border-gray-200 dark:border-neutral-600">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-400"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
            <div class="ml-4 text-lg font-semibold leading-7 text-gray-600 dark:text-neutral-300">
                <a href="https://tailwindcss.com/">Tailwind</a>
            </div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500 dark:text-neutral-400">
                Laravel Jetstream is built with Tailwind, an amazing utility first CSS framework that doesn't get in your way. You'll be amazed how easily you can build and maintain fresh, modern designs with this wonderful framework at your fingertips.
            </div>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-l dark:border-neutral-600">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-400"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" /></svg>
            <div class="ml-4 text-lg font-semibold leading-7 text-gray-600 dark:text-neutral-300">Authentication</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500 dark:text-neutral-400">
                Authentication and registration views are included with Laravel Jetstream, as well as support for user email verification and resetting forgotten passwords. So, you're free to get started what matters most: building your application.
            </div>
        </div>
    </div>
</div>--}}
<script>
    var index = 0;
    var slides = document.querySelectorAll(".slides");
    var dot = document.querySelectorAll(".dot");

    function changeSlide(){

    if(index<0){
        index = slides.length-1;
    }
    
    if(index>slides.length-1){
        index = 0;
    }
    
    for(let i=0;i<slides.length;i++){
        slides[i].style.display = "none";
        dot[i].classList.remove("active");
    }
    
    slides[index].style.display= "block";
    dot[index].classList.add("active");
    
    index++;
    
    setTimeout(changeSlide,2000);
    
    }

    changeSlide();
</script> 
