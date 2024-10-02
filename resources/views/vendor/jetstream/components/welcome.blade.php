<div class=" p-6 bg-orange-100 border-b-4 rounded-md sm:px-20 dark:bg-gray-800 border-yellow-400">
    <div class="mt-8 text-2xl dark:text-neutral-300">
        <div id="slider" class="rounded-lg">  
            @foreach ($galleries as $item)
                    @php
                        $file_name = $item['file_name'];
                    @endphp
                    <div class="slides">  
                        <img src="{{asset("presentation_file/$file_name")}}" width="100%" class="h-96 object-cover object-center" />
                    </div>
            @endforeach
        
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

        <div class="mt-6 text-xl text-gray-500 dark:text-neutral-400">
            วัดบ้านโนนสำราญ มีอายุประมาณ 40 ปี แต่เดิมในอดีตบริเวณแห่งนี้เป็นป่ารก ไม่มีผู้คนอาศัย มีสระน้ำ มีสัตว์ป่าอาศัยอยู่เป็นจำนวนมาก 
            และบริเวณที่ตั้งของวัดบ้านมีลักษณะเป็นเนินสูง มีบริเวณกว้างและเป็นพื้นที่ในเขตอันตราย หรือที่เรียกว่าพื้นที่สีชมพู ในปี พ.ศ. 2513 
            มีผู้คนมาอาศัยอยู่เพียง 9 หลังคาเรือน โดยตระกูลของนางอ่อนศรี ปิดตาละคะ เป็นผู้มาตั้งรกรากบ้านเรือน และตั้งชื่อหมู่บ้านว่า “ บ้านดอนแป๊ะ” ปี พ.ศ. 2515 
            มีผู้คนมาอาศัยอยู่เพิ่มขึ้นเป็น 20 หลังคาเรือน ชาวบ้านทุกคนที่มาอยู่อาศัยมีความเป็นอยู่อย่างมีความสุขและสุขสำราญ จึงเปลี่ยนชื่อหมู่บ้านใหม่ชื่อว่า “บ้านโนนสำราญ” ปี พ.ศ. 2533 
            มีชาวบ้านมาอาศัยเพิ่มเป็นจำนวน 160 หลังคาเรือน บ้านโนนสำราญ ได้แยกออกเป็นสองหมู่บ้าน คือ หมู่ที่ 11 บ้านซับพงโพด ซึ่งอยู่คนละฟากฝั่งถนน เหลือบ้านโนนสำราญ จำนวน 90 หลังคาเรือน 
            จนถึงปัจจุบัน บ้านโนนสำราญ มีจำนวน 148 หลังคาเรือน
        </div>
    </div>

    <div class="grid grid-cols-1 rounded-md bg-gray-200 bg-opacity-25 md:grid-cols-1 mt-2 dark:bg-gray-700">
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
                                    <div class="flex justify-between text-2xl font-medium dark:text-amber-300">
                                        <span>พระอาจารย์ ชูเชิด มหาวีโร</span>
                                    </div>
                                    <p class="mt-1 text-xl dark:text-amber-600 text-gray-600">
                                        พระอาจารย์นำ ครูบาอาจารย์ผู้เปี่ยมล้นด้วยเมตตา ท่านได้นิยมชมชอบส่งเสริมเกื้อกูลแก่เด็กผู้ยากไร้ และท่านได้ส่งเด็กผู้ยากไร้หลายคนได้มีการศึกษาเล่าเรียนจนจบปริญญาตรี ท่านชมชอบผู้ที่มีความขยันหมั่นเพียรเอาการเอางาน
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
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
    
    setTimeout(changeSlide,6000);
    
    }

    changeSlide();
</script> 
