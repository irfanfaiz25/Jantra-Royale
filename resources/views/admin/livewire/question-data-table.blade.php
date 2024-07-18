<div>

    @if (session('success'))
        <div id="alert-notification" class="mb-3 px-8 py-6 bg-green-500 text-white flex justify-between rounded">
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">

        <div class="flex justify-between mb-4 items-start">
            <div class="font-semibold capitalize">{{ $category }}</div>
        </div>
        <form action="" class="flex items-center mb-4">
            <div class="relative w-full mr-2">
                <input wire:model.live.debounce.300ms='search_question' type="text"
                    class="py-2 pr-4 pl-10 bg-darkblue text-gray-50 w-full outline-none border border-blue-100 rounded-md text-sm focus:border-blue-500"
                    placeholder="Search...">
                <i class="ri-search-line absolute top-1/2 left-4 -translate-y-1/2 text-gray-400"></i>
            </div>
            <a href="{{ route('add-question') }}" type="button"
                class="flex text-sm py-2 px-4 button-darkblue text-gray-50 border border-blue-100 rounded-md focus:border-blue-500 outline-none appearance-none">Tambah
                <i class="ri-add-line"></i>
            </a>
        </form>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[540px]">
                <thead>
                    <tr>
                        <th
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-50 py-2 px-4 bg-darkblue text-left rounded-tl-md rounded-bl-md">
                            NO</th>
                        <th
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-50 py-2 px-4 bg-darkblue text-left">
                            PERTANYAAN</th>
                        <th
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-50 py-2 px-4 bg-darkblue text-left">
                            VARIABEL</th>
                        <th
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-50 py-2 px-4 bg-darkblue text-left rounded-tr-md rounded-br-md">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $index => $question)
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span
                                    class="text-[13px] font-medium text-gray-700">{{ $questions->firstItem() + $index }}</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-700">{{ $question->text }}</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span
                                    class="text-[13px] font-medium text-gray-700 capitalize">{{ $question->category->name }}</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="dropdown">
                                    <button type="button"
                                        class="dropdown-toggle text-gray-50 text-sm w-6 h-6 rounded flex items-center justify-center bg-darkblue"><i
                                            class="ri-more-2-fill"></i></button>
                                    <ul
                                        class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-darkblue border border-gray-100 w-full max-w-[140px]">
                                        <li>
                                            <a href="{{ route('edit-question', $question->id) }}"
                                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-50 hover:bg-yellow-400 hover:text-blue-900">Edit</a>
                                        </li>
                                        <li>
                                            <a wire:click.prevent='deleteQuestion({{ $question->id }})'
                                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-50 hover:bg-yellow-400 hover:text-blue-900">Hapus</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $questions->links() }}
            </div>

        </div>

    </div>

</div>

@push('script')
    <script>
        function hideAlert() {
            var alert = document.getElementById("alert-notification")
            alert.classList.add("hidden")
        }
    </script>
@endpush
