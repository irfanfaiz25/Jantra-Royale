<div class="flex justify-center">
    <div class="my-5 container mx-auto">
        <div class="lg:max-w-2xl mx-auto bg-white rounded-md shadow-md overflow-hidden border-top">
            <div class="px-6 py-4">
                <div class="flex justify-start">
                    <button class="pl-1" onclick="window.history.back();">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30"
                            fill="currentColor">
                            <path
                                d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z">
                            </path>
                        </svg>
                    </button>
                </div>
                <form wire:submit.prevent='addQuestion' class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="question"
                                class="block mb-2 text-sm font-medium text-gray-900">Pertanyaan</label>
                            <textarea wire:model='question' id="question" rows="4"
                                class="bg-gray-50 border-2 
                                @error('question')
                                    border-red-500
                                @enderror border-gray-300 text-gray-900 text-sm rounded-lg focus:border-blue-800 focus:outline-none focus:ring-0 block w-full p-2.5"
                                placeholder="Masukkan pertanyaan"></textarea>
                            @error('question')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Variabel</label>
                            <select wire:model.change='category_id' id="category"
                                class="bg-gray-50 border-2 capitalize 
                                @error('category_id')
                                    border-red-500
                                @enderror border-gray-300 text-gray-900 text-sm rounded-lg focus:border-blue-800 focus:outline-none focus:ring-0 block w-full p-2.5">
                                <option selected value="">-Pilih variabel-</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end mb-2 mt-6">
                        <button onclick="window.history.back();" type="button"
                            class="bg-red-500 text-gray-50 hover:bg-red-700 font-bold py-2 px-6 mr-2 rounded">Batal</button>
                        <button type="submit"
                            class="button-darkblue text-white font-bold py-2 px-6 rounded">Tambah</button>
                    </div>
                </form>
            </div>
            <hr>
        </div>
    </div>
</div>
