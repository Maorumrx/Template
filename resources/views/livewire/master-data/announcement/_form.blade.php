<div class="px-2 pt-2 ">
    {{-- detail --}}
    <div class="mt-10 sm:mt-0 ">
        <div class="md:grid md:grid-cols-3 md:gap-6 ">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-neutral-300">ข้อมูลข่าวสารและประกาศ</h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                        ระบุข้อมูลลงในช่องว่างที่กำหนดให้ หากพบ <span class="text-red-500 ">*</span>
                        จำเป็นต้องระบุข้อมูล
                    </p>
                    <div class="relative text-sm text-center group">
                        
                    </div>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2 ">
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="px-4 py-5 space-y-6 bg-white sm:p-6 dark:bg-neutral-800">
                        <div class="grid grid-cols-4 gap-4">
                            <div class="col-span-4 mt-2 sm:col-span-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-900 dark:text-neutral-300">รูปภาพ</label>
                                    <label for="file-upload" class="cursor-pointer">
                                        <div class="flex justify-center px-6 pt-5 pb-6 mt-1 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                                                    aria-hidden="true">
                                                    <path
                                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div x-data="{ isUploading: false, progress: 0 }"
                                                x-on:livewire-upload-start="isUploading = true"
                                                x-on:livewire-upload-finish="isUploading = false"
                                                x-on:livewire-upload-error="isUploading = false"
                                                x-on:livewire-upload-progress="progress = $event.detail.progress" >
                                                    <div class="flex text-sm text-gray-600">
                                                        <label for="file-upload"
                                                            class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer ">
                                                            {{-- focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500
                                                            focus-within:ring-offset-2
                                                            hover:text-indigo-500 sr-only--}}
                                                            <span class="px-2 py-4 ">Upload a file</span>
                                                            <input id="file-upload" wire:model="image_file" name="file-upload" type="file" class="sr-only"
                                                                multiple enctype="multipart/fprm-data" accept="">
                                                        </label>
                                                        <p class="pl-1 dark:text-neutral-400">Even</p>
                                                    </div>
                                                    <p class="text-xs text-gray-500">PNG, JPG up to 10MB</p>
                                                    <div x-show="isUploading">
                                                        <progress max="100" x-bind:value="progress"></progress>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-span-4 mt-2 sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-900 dark:text-neutral-300 required">หัวข้อ </label>
                                <input type="text" wire:model="announcement_header"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                @error('announcement_header') <span class="text-red-500 error-message">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-span-4 mt-2 sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-900 dark:text-neutral-300 ">รายละเอียด</label>
                                <textarea rows="3" wire:model.defer="announcement_desc"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="">
                                </textarea>
                                @error('announcement_desc') <span class="text-red-500 error-message">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-span-4 mt-2 sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-900 dark:text-neutral-300 required">ปักหมุด</label>
                                <div class="checkbox-rect">
                                    <input type="checkbox" id="checkbox-rect" wire:model="flag" value="1" name="check">
                                    <label for="checkbox-rect"></label>
                                </div>
                            </div>
                            <div class="col-span-4 mt-2 sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-900 dark:text-neutral-300 required">ใช่งาน / ไม่ใช่งาน</label>
                                <div class="checkbox-rect">
                                    <input type="checkbox" id="checkbox-rect" wire:model="active" value="1" name="check">
                                    <label for="checkbox-rect"></label>
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
    
    <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
        <label class="py-2 text-sm font-medium text-gray-900 dark:text-neutral-300">ภาพวีดีโอตัวอย่าง </label>
        <div class="flex flex-wrap ">
            
            @foreach ($gallery as $item)
                {{-- {{dd($gallery)}} --}}
                @if ($item->file_type == 'mp4')
                    <div class="flex flex-wrap w-1/3">
                        <div class="w-full p-1 md:p-2">
                        <video autoplay loop muted class="block object-cover object-center w-full h-full rounded-lg" >
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
    <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
        <label class="py-2 text-sm font-medium text-gray-900 dark:text-neutral-300">ภาพตัวอย่าง </label>
        <div class="flex flex-wrap">
            @foreach ($gallery as $item)
                {{-- {{dd($gallery)}} --}}
                @if ($item->file_type != 'mp4')
                    <div class="flex flex-wrap w-1/3">
                        <div class="w-full p-1 md:p-2">
                        <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                            src="{{asset("announce_file/$item->file_name")}}">
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>