<div class="px-6 py-4">

    <form wire:submit.prevent='submit'>
        <div class="lg:max-w-2xl mx-auto bg-white rounded-md shadow-md overflow-hidden mb-4">
            <div class="px-3 py-3">
                <div class="flex-none p-4 w-3/12 items-center">
                    <label class="block text-gray-700 text-sm font-medium text-lg" for="name">
                        Nama <span class="text-red-500">*</span></label>
                    </label>
                </div>
                <div class="flex-grow p-4">
                    <input wire:model='respondentName'
                        class="@error('respondentName') border-red-500 @enderror appearance-none bg-transparent w-full text-gray-700 mr-3 py-1 px-2 border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        id="name" type="text" placeholder="Masukkan nama">
                    @error('respondentName')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="lg:max-w-2xl mx-auto bg-white rounded-md shadow-md overflow-hidden mb-4">
            <div class="px-3 py-3">
                <div class="flex-none p-4 w-3/12 items-center">
                    <label class="block text-gray-700 text-sm font-medium text-lg" for="email">
                        Email <span class="text-red-500">*</span></label>
                    </label>
                </div>
                <div class="flex-grow p-4">
                    <input wire:model='email'
                        class="@error('email') border-red-500 @enderror appearance-none bg-transparent w-full text-gray-700 mr-3 py-1 px-2 border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        id="email" type="text" placeholder="Masukkan email">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="lg:max-w-2xl mx-auto bg-white rounded-md shadow-md overflow-hidden mb-4">
            <div class="px-3 py-3">
                <div class="flex-none p-4 w-3/12 items-center">
                    <label class="block text-gray-700 text-sm font-medium text-lg" for="gender">
                        Jenis Kelamin <span class="text-red-500">*</span></label>
                    </label>
                </div>
                <div class="flex-grow p-4">
                    <select wire:model='respondentGender'
                        class="@error('respondentGender') border-red-500 @enderror appearance-none bg-transparent w-full text-gray-700 mr-3 py-1 px-2 border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        id="gender" type="text">
                        <option value="" selected>-- Pilih --</option>
                        <option value="laki-laki">laki-laki</option>
                        <option value="perempuan">perempuan</option>
                    </select>
                    @error('respondentGender')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="lg:max-w-2xl mx-auto bg-white rounded-md shadow-md overflow-hidden mb-4">
            <div class="px-7 py-6 font-bold">
                <h2 class="text-xl text-center font-bold text-gray-800 mb-3">PERTANYAAN</h2>
                <p>
                    Berikan penilaian Bapak/Ibu terhadap pernyataan berikut dengan memilih salah satu option pada
                    pilihan
                    ranking yang tersedia :
                </p>
                <p class="mt-2">
                    1. STS = Sangat Tidak Setuju
                </p>
                <p class="mt-2">
                    2. TS = Tidak Setuju
                </p>
                <p class="mt-2">
                    3. R = Ragu-ragu
                </p>
                <p class="mt-2">
                    4. S = Setuju
                </p>
                <p class="mt-2">
                    5. SS = Sangat Setuju
                </p>
                <p class="italic font-medium mt-2">
                    Semua identitas dan jawaban yang saudara/i berikan terjamin kerahasiannya dan murni digunakan hanya
                    untuk penelitian.
                </p>
                <p class="mt-2 font-medium">
                    Terima kasih atas kesediaan saudara/i dalam mengisi skala ini.
                </p>
            </div>
        </div>

        <div class="lg:max-w-2xl mx-auto bg-white rounded-md shadow-md overflow-hidden mb-4">
            <div class="px-7 py-6">
                <div class="mb-4 text-left">
                    <label class="block text-lg font-medium">Apakah sebelumnya Anda pernah menggunakan aplikasi Jantra
                        Royale? <span class="text-red-500">*</span></label>
                </div>
                <div class="flex flex-col space-y-4">
                    <div class="flex flex-col space-y-2">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input wire:model='questionUsing' id="using-1" type="radio" name="using"
                                value="ya" class="form-radio text-green-500" />
                            <span>Ya</span>
                        </label>
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input wire:model='questionUsing' id="using-2" type="radio" name="using"
                                value="tidak" class="form-radio text-green-500" />
                            <span>Tidak</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:max-w-2xl mx-auto bg-white rounded-md shadow-md overflow-hidden mb-4">
            <div class="px-7 py-6">
                <div class="mb-4 text-left">
                    <label class="block text-lg font-medium">Jika memilih "Tidak" pada pertanyaan sebelumnya, Apakah
                        Anda berminat menggunakan Aplikasi Jantra Royale?</label>
                </div>
                <div class="flex flex-col space-y-4">
                    <div class="flex flex-col space-y-2">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input wire:model='questionInterest' type="radio" id="interest-1" value="ya"
                                name="interest" class="form-radio text-green-500" />
                            <span>Ya</span>
                        </label>
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input wire:model='questionInterest' type="radio" id="interest-2" value="tidak"
                                name="interest" class="form-radio text-green-500" />
                            <span>Tidak</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:max-w-2xl mx-auto bg-white rounded-md shadow-md overflow-hidden mb-4">
            <div class="px-7 py-6">
                <div class="mb-4 text-left">
                    <label class="block text-lg font-medium">Berapa lama Anda menggunakan aplikasi Jantra Royale? <span
                            class="text-red-500">*</span>
                    </label>
                </div>
                <div class="flex flex-col space-y-4">
                    <div class="flex flex-col space-y-2">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input wire:model='questionLong' type="radio" id="long-1" name="long"
                                value="< 5 (bulan)" class="form-radio text-green-500" />
                            <span>
                                < 5 (bulan)</span>
                        </label>
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input wire:model='questionLong' type="radio" id="long-2" name="long"
                                value="5 - 12 (bulan)" class="form-radio text-green-500" />
                            <span>5 - 12 (bulan)</span>
                        </label>
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input wire:model='questionLong' type="radio" id="long-3" name="long"
                                value="> 1 (tahun)" class="form-radio text-green-500" />
                            <span>> 1 (tahun)</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($categories as $category)
            <div class="lg:max-w-2xl mx-auto bg-white rounded-md shadow-md overflow-hidden mb-4">
                <div class="px-5 py-3">
                    <h2 class="text-xl text-left font-semibold text-gray-800 capitalize">Penilaian Terhadap
                        {{ $category->name }} Aplikasi</h2>
                </div>
            </div>
            @foreach ($category->questions as $question)
                <div class="lg:max-w-2xl mx-auto bg-white rounded-md shadow-md overflow-hidden mb-4">
                    <div class="px-7 py-6">
                        <div class="mb-4 text-left">
                            <label class="block text-lg font-medium">
                                {{ $question->text }} <span class="text-red-500">*</span></label>
                        </div>
                        <div
                            class="flex flex-col md:flex-row md:justify-center space-y-4 md:space-y-0 md:space-x-5 mt-6">
                            <span class="text-base">Sangat Tidak Setuju</span>
                            <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-4 text-lg">
                                <label class="flex items-center space-x-2 md:space-x-1 cursor-pointer">
                                    <input wire:model='answers.{{ $question->id }}' type="radio"
                                        id="option1{{ $question->id }}" value="1"
                                        class="form-radio text-green-500" />
                                    <span>1</span>
                                </label>
                                <label class="flex items-center space-x-2 md:space-x-1 cursor-pointer">
                                    <input wire:model='answers.{{ $question->id }}' type="radio"
                                        id="option1{{ $question->id }}" value="2"
                                        class="form-radio text-green-500" />
                                    <span>2</span>
                                </label>
                                <label class="flex items-center space-x-2 md:space-x-1 cursor-pointer">
                                    <input wire:model='answers.{{ $question->id }}' type="radio"
                                        id="option1{{ $question->id }}" value="3"
                                        class="form-radio text-green-500" />
                                    <span>3</span>
                                </label>
                                <label class="flex items-center space-x-2 md:space-x-1 cursor-pointer">
                                    <input wire:model='answers.{{ $question->id }}' type="radio"
                                        id="option1{{ $question->id }}" value="4"
                                        class="form-radio text-green-500" />
                                    <span>4</span>
                                </label>
                                <label class="flex items-center space-x-2 md:space-x-1 cursor-pointer">
                                    <input wire:model='answers.{{ $question->id }}' type="radio"
                                        id="option1{{ $question->id }}" value="5"
                                        class="form-radio text-green-500" />
                                    <span>5</span>
                                </label>
                            </div>
                            <span class="text-base">Sangat Setuju</span>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach

        <div class="lg:max-w-2xl mx-auto rounded-md overflow-hidden mb-4">
            <div class="px-3 py-3">
                <div class="flex justify-end">
                    <button wire:click='resetForm' type="button"
                        class="bg-red-500 text-gray-50 hover:bg-red-700 font-medium py-2 px-6 mr-2 rounded">Reset</button>
                    <button type="submit"
                        class="button-darkblue text-gray-50 font-medium py-2 px-6 shadow-sm rounded">Submit</button>
                </div>
            </div>
        </div>
    </form>

    @if (session('success'))
        <div class="lg:max-w-2xl mx-auto rounded-md overflow-hidden mb-4">
            <div class="px-3 py-3">
                <div id="alert-notification"
                    class="mb-3 px-8 py-6 bg-green-500 text-white flex justify-between rounded">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28"
                            fill="currentColor">
                            <path
                                d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11.0026 16L6.75999 11.7574L8.17421 10.3431L11.0026 13.1716L16.6595 7.51472L18.0737 8.92893L11.0026 16Z">
                            </path>
                        </svg>
                        <p class="pl-3">{{ session('success') }}</p>
                    </div>
                    <button onclick="hideAlert()" class="text-green-100 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    @endif

</div>

@push('script')
    <script>
        function hideAlert() {
            var alert = document.getElementById("alert-notification")
            alert.classList.add("hidden")
        }
    </script>
@endpush
