<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <div class="w-full bg-darkblue rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <div class="flex justify-center">
                <img class="mr-2" src="{{ asset('img/logo.png') }}" alt="simobile-logo" width="120">
            </div>
            <form wire:submit.prevent='login' class="space-y-4 md:space-y-6" action="#">
                <div>
                    <label for="username" class="block mb-2 text-sm font-semibold text-gray-50">
                        Username
                    </label>
                    <input wire:model='username' type="text" name="username" id="username"
                        class="bg-gray-50 border border-gray-300 text-darkblue sm:text-sm rounded-lg block w-full p-2.5">
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-semibold text-gray-50">Password</label>
                    <input wire:model='password' type="password" name="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-darkblue sm:text-sm rounded-lg block w-full p-2.5"
                        required="">
                </div>
                <div class="pb-7 pt-3">
                    <button type="submit"
                        class="w-full text-white button-darkyellow font-semibold rounded-lg text-sm px-5 py-2.5 text-center">Sign
                        in</button>
                </div>
            </form>
            @if (session('invalid'))
                <div id="alert-notification" class="mb-3 px-8 py-6 bg-red-500 text-white flex justify-between rounded">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28"
                            fill="currentColor">
                            <path
                                d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11.0026 16L6.75999 11.7574L8.17421 10.3431L11.0026 13.1716L16.6595 7.51472L18.0737 8.92893L11.0026 16Z">
                            </path>
                        </svg>
                        <p class="pl-3">{{ session('invalid') }}</p>
                    </div>
                    <button onclick="hideAlert()" class="text-red-100 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>
