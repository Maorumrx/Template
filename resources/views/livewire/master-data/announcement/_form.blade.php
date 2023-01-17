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
                        @if($image_file)
                        <div
                            class="inline-block w-full h-full px-1 py-1 overflow-hidden bg-gray-300 border-2 border-dashed rounded-lg shadow-sm aspect-w-1 aspect-h-1 group-hover:opacity-75">
                            <img src="{{$image_file->temporaryUrl()}}"
                                alt="Models sitting back to back, wearing Basic Tee in black and bone." class="object-cover object-center">
                        </div>
                        @else
                        <div
                            class="inline-block w-full h-full overflow-hidden {{$image_file_url ? 'px-1 py-1 bg-gray-300 border-2 border-dashed' : ''}} rounded-lg shadow-sm aspect-w-1 aspect-h-1 group-hover:opacity-75">
                            @if($image_file_url)
                            <img src="{{url("vehicle_file/$image_file_url")}}"
                                alt="Models sitting back to back, wearing Basic Tee in black and bone." class="object-cover object-center">
                            {{-- @else --}}
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-full h-full px-20 py-20 text-gray-400"
                                aria-hidden="true" stroke="none" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M11 11v-3h1.247c.882 0 1.235.297 1.828.909.452.465 1.925 2.091 1.925 2.091h-5zm-1-3h-2.243c-.688 0-1.051.222-1.377.581-.316.348-.895.948-1.506 1.671 1.719.644 4.055.748 5.126.748v-3zm14 5.161c0-2.823-2.03-3.41-2.794-3.631-1.142-.331-1.654-.475-3.031-.794-.55-.545-2.052-2.036-2.389-2.376l-.089-.091c-.666-.679-1.421-1.269-3.172-1.269h-7.64c-.547 0-.791.456-.254.944-.534.462-1.944 1.706-2.34 2.108-1.384 1.402-2.291 2.48-2.291 4.603 0 2.461 1.361 4.258 3.179 4.332.41 1.169 1.512 2.013 2.821 2.013 1.304 0 2.403-.838 2.816-2h6.367c.413 1.162 1.512 2 2.816 2 1.308 0 2.409-.843 2.82-2.01 1.934-.056 3.181-1.505 3.181-3.829zm-18 4.039c-.662 0-1.2-.538-1.2-1.2s.538-1.2 1.2-1.2 1.2.538 1.2 1.2-.538 1.2-1.2 1.2zm12 0c-.662 0-1.2-.538-1.2-1.2s.538-1.2 1.2-1.2 1.2.538 1.2 1.2-.538 1.2-1.2 1.2zm2.832-2.15c-.399-1.188-1.509-2.05-2.832-2.05-1.327 0-2.44.868-2.836 2.062h-6.328c-.396-1.194-1.509-2.062-2.836-2.062-1.319 0-2.426.857-2.829 2.04-.586-.114-1.171-1.037-1.171-2.385 0-1.335.47-1.938 1.714-3.199.725-.735 1.31-1.209 2.263-2.026.34-.291.774-.432 1.222-.43h5.173c1.22 0 1.577.385 2.116.892.419.393 2.682 2.665 2.682 2.665s2.303.554 3.48.895c.84.243 1.35.479 1.35 1.71 0 1.196-.396 1.826-1.168 1.888z"
                                    stroke-width="0" stroke-linecap="round" stroke-linejoin="round" />
                            </svg> --}}
                            @endif
                        </div>
                        @endif
                        {{-- <a href="#" class="block mt-6 font-medium text-gray-900">
                            <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                            New Arrivals
                        </a> --}}
                        <p aria-hidden="true" class="pt-5 mt-1 font-bold">{{$old_vehicle_number ?? ''}}</p>
                    </div>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2 ">
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="px-4 py-5 space-y-6 bg-white sm:p-6 dark:bg-neutral-800">
                        <div class="grid grid-cols-4 gap-4">
                            <div class="col-span-4 mt-2 sm:col-span-2">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">รูปรถยนต์</label>
                                    <label for="file-upload" class="cursor-pointer">
                                        <div class="flex justify-center px-6 pt-5 pb-6 mt-1 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                                                    aria-hidden="true">
                                                    <path
                                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600">
                                                    <label for="file-upload"
                                                        class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer ">
                                                        {{-- focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500
                                                        focus-within:ring-offset-2
                                                        hover:text-indigo-500 sr-only--}}
                                                        <span>Upload a file</span>
                                                        <input id="file-upload" wire:model="image_file" name="file-upload" type="file" class="sr-only"
                                                            accept="image/jpeg, image/png">
                                                    </label>
                                                    <p class="pl-1">Vehicle</p>
                                                </div>
                                                <p class="text-xs text-gray-500">PNG, JPG up to 10MB</p>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-span-4 mt-2 sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-900 dark:text-neutral-300 ">หัวข้อ <span class="text-red-500">*</span></label>
                                <input type="text" wire:model="announcement_header"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                @error('announcement_header') <span class="text-red-500 error-message">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-span-4 mt-2 sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-900 dark:text-neutral-300 ">รายละเอียด <span class="text-red-500">*</span></label>
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