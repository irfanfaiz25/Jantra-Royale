<div>

    <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">

        <div class="flex justify-between mb-4 items-start">
            <div class="font-semibold capitalize">Data Responden</div>
            <button wire:click='exportAnalyze' type="button"
                class="button-darkblue text-gray-50 font-bold py-2 px-6 mr-2 rounded">Export</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[540px]">
                <thead>
                    <tr>
                        <th rowspan="2"
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-50 py-2 px-4 bg-darkblue text-left">
                            NO</th>
                        <th rowspan="2"
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-50 py-2 px-4 bg-darkblue text-left">
                            Pertanyaan
                        </th>
                        <th rowspan="2"
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-50 py-2 px-4 bg-darkblue text-left">
                            Variabel
                        </th>
                        <th colspan="5"
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-50 py-2 px-4 bg-darkblue text-center">
                            Total Skor
                        </th>
                        <th rowspan="2"
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-50 py-2 px-4 bg-darkblue text-center">
                            Average
                        </th>
                        <th rowspan="2"
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-50 py-2 px-4 bg-darkblue text-left">
                            Kesimpulan
                        </th>
                    </tr>
                    <tr>
                        <th
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-50 py-2 px-4 bg-darkblue text-left">
                            5
                        </th>
                        <th
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-50 py-2 px-4 bg-darkblue text-left">
                            4
                        </th>
                        <th
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-50 py-2 px-4 bg-darkblue text-left">
                            3
                        </th>
                        <th
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-50 py-2 px-4 bg-darkblue text-left">
                            2
                        </th>
                        <th
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-50 py-2 px-4 bg-darkblue text-left">
                            1
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php $serialNumber = 1; @endphp
                    @foreach ($categories as $category)
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-600">
                                <span class="text-[13px] font-medium text-gray-700">{{ $serialNumber++ }}</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-600">
                                <span class="text-[13px] font-medium text-gray-700">
                                    <ul class="list-disc space-y-1">
                                        @foreach ($category->questions as $question)
                                            <li>{{ $question->text }}</li>
                                        @endforeach
                                    </ul>
                                </span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-600">
                                <span class="text-[13px] font-medium text-gray-700">
                                    {{ $category->name }}
                                </span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-600">
                                <span class="text-[13px] font-medium text-gray-700">
                                    {{ $answerCounts[$category->id][5] }}
                                </span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-600">
                                <span class="text-[13px] font-medium text-gray-700">
                                    {{ $answerCounts[$category->id][4] }}
                                </span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-600">
                                <span class="text-[13px] font-medium text-gray-700">
                                    {{ $answerCounts[$category->id][3] }}
                                </span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-600">
                                <span class="text-[13px] font-medium text-gray-700">
                                    {{ $answerCounts[$category->id][2] }}
                                </span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-600">
                                <span class="text-[13px] font-medium text-gray-700">
                                    {{ $answerCounts[$category->id][1] }}
                                </span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-600 text-center">
                                <span class="text-[13px] font-medium text-gray-700">
                                    {{ number_format($results[$category->id] ?? 0, 2) }}
                                </span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-600 text-center">
                                <span class="font-medium text-gray-700">
                                    <div
                                        class="text-xs px-1 py-0.5 flex justify-center items-center text-white rounded-full
                                    {{ $results[$category->id] !== null ? $this->getConclusionColor($results[$category->id]) : 'bg-gray-900' }}
                                    ">
                                        {{ $results[$category->id] !== null ? $this->getConclusion($results[$category->id]) : 'No data yet' }}
                                    </div>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

</div>
