<div class="px-2 pt-2 ">
    {{-- detail --}}
    <div class="mt-2 sm:mt-0 ">
        <div class="md:grid md:grid-cols-3 md:gap-6 ">
            {{-- <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-neutral-300"> </h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                        ระบุข้อมูลลงในช่องว่างที่กำหนดให้ หากพบ 
                        <span class="text-red-500 ">*</span>
                        จำเป็นต้องระบุข้อมูล
                    </p>
                    <div class="relative text-sm text-center group">
                    </div>
                </div>
            </div> --}}
            <div class="overflow-hidden rounded-lg shadow md:col-span-3">
                <div class="px-4 py-5 space-y-6 bg-neutral-300 sm:p-6 dark:bg-neutral-800">
                    <div class="grid grid-cols-4 gap-4 text-center">
                        {{-- @if(!$state) --}}
                            <div class="col-span-4 mt-2 sm:col-span-4">
                                <label class="block text-xl font-medium text-gray-900 dark:text-neutral-300 required">เงินทอน </label>
                                <input type="number" wire:model.defer="investment" min="0" placeholder="กรุณาระบุ"
                                    @if($state === "เปิดร้าน") disabled @else @endif
                                    class="block w-full mt-1 text-xl text-center border-gray-300 rounded-md shadow-sm dark:text-slate-100 text-slate-800 bg-slate-50 dark:bg-slate-500 disabled:opacity-75 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm placeholder:italic placeholder:text-slate-400" />
                                @error('investment') <span class="text-red-500 error-message">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-span-4 mt-2 sm:col-span-4">
                                <label class="block text-xl font-medium text-gray-900 dark:text-neutral-300 required">รับเข้า (ไม้) </label>
                                <input type="number" wire:model.defer="receive_qty" min="0" placeholder="กรุณาระบุ"
                                    @if($state === "เปิดร้าน") disabled @else @endif
                                    class="block w-full mt-1 text-xl text-center border-gray-300 rounded-md shadow-sm dark:text-slate-100 text-slate-800 bg-slate-50 dark:bg-slate-500 disabled:opacity-75 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm placeholder:italic placeholder:text-slate-400" />
                                @error('receive_qty') <span class="text-red-500 error-message">{{ $message }}</span> @enderror
                            </div>
                        @if ($state === "เปิดร้าน" || $state === "ปิดร้าน")
                                <div class="col-span-4 mt-2 sm:col-span-4">
                                    <label class="block text-xl font-medium text-gray-900 dark:text-neutral-300 required">คงเหลือ (ไม้) </label>
                                    <input type="number" wire:model.debounce.500ms="remain" min="0" placeholder="กรุณาระบุ"
                                        class="block w-full mt-1 text-xl text-center border-gray-300 rounded-md shadow-sm dark:text-slate-100 text-slate-800 bg-slate-50 dark:bg-slate-500 disabled:opacity-75 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm placeholder:italic placeholder:text-slate-400" />
                                    @error('remain') <span class="text-red-500 error-message">{{ $message }}</span> @enderror
                                </div>
                            
                            <div class="col-span-4 mt-2 sm:col-span-4">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                                    <thead class="text-gray-700 uppercase text-md bg-gray-50 dark:bg-gray-700 dark:text-gray-400 ">
                                        <tr>
                                            <th colspan="3" scope="col" class="px-4 py-3 text-center rounded-t-lg"> สรุปยอด </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="px-4 py-3 text-left text-white bg-neutral-500"> สินค้าคงคลัง </td>
                                            <td class="px-4 py-3 text-right text-white bg-neutral-500"> {{ number_format($receive_qty ?? 0) }} / ไม้</td>
                                            <td rowspan="4" class="px-4 py-3 text-center text-white bg-neutral-800 rounded-br-md"> ยอดขาย
                                                <div class="px-4 py-3 text-lg text-center text-white bg-blue-500 rounded-full">
                                                    {{ number_format($total_sales ?? 0) }} บาท
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 text-left text-white bg-neutral-600"> ขายได้ </td>
                                            <td class="px-4 py-3 text-right text-white bg-neutral-600"> {{ number_format($qty ?? 0) }} / ไม้</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 text-left text-white bg-orange-500"> เงินทอน </td>
                                            <td class="px-4 py-3 text-right text-white bg-orange-500"> {{ number_format($investment ?? 0) }} บาท</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 text-left text-white bg-green-500 rounded-bl-md"> เงินทอน + ยอดขาย </td>
                                            <td class="px-4 py-3 text-right text-white bg-green-500"> {{ number_format($total_all ?? 0) }} บาท</td>
                                        </tr>
                                        {{-- <tr>
                                            <td class="px-4 py-3 text-center text-white bg-blue-500"> ทุน + ยอดขาย </td>
                                            <td class="px-4 py-3 text-center text-white bg-blue-500"> {{ number_format($total_all ?? 0) }} </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>