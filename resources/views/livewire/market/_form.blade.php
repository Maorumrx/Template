<div class="px-2 pt-2 ">
    {{-- detail --}}
    <div class="mt-10 sm:mt-0 ">
        <div class="md:grid md:grid-cols-3 md:gap-6 ">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-neutral-300"> </h3>
                    {{-- <p class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                        ระบุข้อมูลลงในช่องว่างที่กำหนดให้ หากพบ 
                        <span class="text-red-500 ">*</span>
                        จำเป็นต้องระบุข้อมูล
                    </p> --}}
                    <div class="relative text-sm text-center group">
                    </div>
                </div>
            </div>
            <div class="overflow-hidden rounded-lg shadow">
                <div class="px-4 py-5 space-y-6 bg-neutral-300 sm:p-6 dark:bg-neutral-800">
                    <div class="grid grid-cols-4 gap-4 text-center">
                        <div class="col-span-4 mt-2 sm:col-span-4">
                            <label class="block text-xl font-medium text-gray-900 dark:text-neutral-300 required">รับเข้า (ไม้) </label>
                            <input type="number" wire:model="receive_qty" min="0" @if($state === "เปิดร้าน") disabled @else @endif
                                class="block w-full mt-1 text-xl text-center border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                            @error('receive_qty') <span class="text-red-500 error-message">{{ $message }}</span> @enderror
                        </div>
                        @if($state === "เปิดร้าน")
                            <div class="col-span-4 mt-2 sm:col-span-4">
                                <label class="block text-xl font-medium text-gray-900 dark:text-neutral-300 required">คงเหลือ (ไม้) </label>
                                <input type="number" wire:model="remain" min="0"
                                    class="block w-full mt-1 text-xl border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                @error('remain') <span class="text-red-500 error-message">{{ $message }}</span> @enderror
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>