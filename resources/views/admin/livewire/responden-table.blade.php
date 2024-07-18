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
            <div class="font-semibold capitalize">Data Responden</div>
            <button wire:click='exportReport' type="button"
                class="bg-darkblue hover:bg-blue-900 text-gray-50 font-bold py-2 px-6 mr-2 rounded">Export</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[540px]" wire:poll.keep-alive.10s='refreshData'>
                <thead>
                    <tr>
                        <th rowspan="2"
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-50 py-2 px-4 bg-darkblue text-left">
                            NO</th>
                        <th rowspan="2"
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-50 py-2 px-4 bg-darkblue text-left">
                            Nama
                        </th>
                        @foreach ($questionsGroupedByCategory as $category => $questions)
                            <th colspan="{{ $questions->count() }}"
                                class="text-[12px] uppercase tracking-wide font-medium text-gray-50 py-2 px-4 bg-darkblue text-center">
                                {{ $category }}</th>
                        @endforeach
                        <th rowspan="2"
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-50 py-2 px-4 bg-darkblue text-left">
                        </th>
                    </tr>
                    <tr>
                        @foreach ($questionsGroupedByCategory as $category => $questions)
                            @foreach ($questions as $index => $question)
                                <th
                                    class="text-[12px] uppercase tracking-wide font-medium text-gray-50 py-2 px-4 bg-darkblue text-left">
                                    P{{ $index + 1 }}</th>
                            @endforeach
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php $serialNumber = 1; @endphp
                    @foreach ($respondents as $respondent)
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-700">{{ $serialNumber++ }}</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span
                                    class="text-[13px] font-medium text-gray-700 flex space-x-1 md:space-x-0 justify-between">
                                    <p>{{ $respondent['respondent_name'] }}</p>
                                    <button wire:click="setDetailsModalOpen({{ $respondent['respondent_id'] }})"
                                        class="text-xs py-1 px-1.5 button-darkblue text-white rounded-md">
                                        <i class="ri-information-line"></i>
                                    </button>
                                </span>
                            </td>
                            @foreach ($questionsGroupedByCategory as $category => $questions)
                                @foreach ($questions as $question)
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span
                                            class="text-[13px] font-medium text-gray-700">{{ $respondent['Q' . $question->id] ?? 'N/A' }}</span>
                                    </td>
                                @endforeach
                            @endforeach
                            {{-- @dd($respondent['respondent_code']) --}}
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <button wire:click="setConfirmationModalOpen('{{ $respondent['respondent_code'] }}')"
                                    class="text-[13px] font-medium text-white bg-red-500 px-2 py-1 rounded-md"><i
                                        class="ri-delete-bin-line"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

    @if ($isConfirmationModalShow)
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow-lg max-w-sm w-full relative z-10 mx-2 lg:mx-0">
                <h2 class="text-lg font-bold mb-4">Konfirmasi Hapus</h2>
                <p>Anda yakin akan menghapus data responden tersebut?</p>
                <div class="mt-4 flex justify-end space-x-2">
                    <button wire:click="setConfirmationModalClose"
                        class="px-4 py-1.5 bg-gray-300 rounded text-sm font-medium">Cancel</button>
                    <button wire:click='deleteRespondent'
                        class="px-4 py-1.5 bg-red-500 text-white rounded text-sm font-medium">Hapus</button>
                </div>
            </div>
            <!-- Background overlay -->
            <div wire:click="setConfirmationModalClose" class="fixed inset-0 bg-black opacity-50 z-0">
            </div>
        </div>
    @endif

    @if ($isDetailsModalShow)
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow-lg max-w-sm w-full relative z-10 mx-2 lg:mx-0">
                <h2 class="text-lg font-bold mb-4">Detail Responden</h2>
                <table class="text-left font-medium">
                    <tbody>
                        <tr>
                            <td class="flex justify-between">
                                <p>
                                    Nama
                                </p>
                                <p>
                                    :
                                </p>
                            </td>
                            <td class="pl-1">
                                {{ $detailName }}
                            </td>
                        </tr>
                        <tr>
                            <td class="flex justify-between">
                                <p>
                                    Jenis Kelamin
                                </p>
                                <p>
                                    :
                                </p>
                            </td>
                            <td class="pl-1 capitalize">
                                {{ $detailGender }}
                            </td>
                        </tr>
                        <tr>
                            <td class="flex justify-between">
                                <p>
                                    Email
                                </p>
                                <p>
                                    :
                                </p>
                            </td>
                            <td class="pl-1">
                                {{ $detailEmail }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-4 flex justify-end space-x-2">
                    <button wire:click="setDetailsModalClose"
                        class="px-4 py-1.5 bg-darkblue text-white rounded text-sm font-medium">Done</button>
                </div>
            </div>
            <!-- Background overlay -->
            <div wire:click="setDetailsModalClose" class="fixed inset-0 bg-black opacity-50 z-0">
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
