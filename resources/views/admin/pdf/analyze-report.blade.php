<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            font-size: 12px;
            margin: 0px;
        }

        .table-border {
            border: 1.5px solid #292929;
        }

        .table-text-center {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .column-6 {
            flex: 1;
            padding: 7px;
            /* margin: 5px; */
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .text-header {
            margin-top: -13px;
        }

        .text-first-header {
            margin-top: 0px;
        }

        .header-bottom {
            margin-bottom: -7px;
            padding-bottom: 0px;
        }

        .kode-row {
            width: fit-content;
        }

        .table-patroli {
            height: 30px;
        }

        .table-sign {
            height: 75px;
        }

        .date-footer {
            margin-top: -32px;
        }

        .footer-note {
            margin-top: -10px;
        }

        .footer-name {
            margin-top: 25px;
            margin-bottom: -20px;
        }

        .footer {
            display: flex;
            flex-wrap: wrap;
        }

        /* .grid-container {
                display: grid;
                grid-template-columns: auto auto auto;
                margin-top: 0px;
            }

            .grid-item {
                text-align: left;
            } */

        .note-1 {
            position: fixed;
            left: 69.7% !important;
        }

        .footer-head-1 {
            position: fixed;
            margin-top: -18px;
            left: 68% !important;
        }

        .note-2 {
            position: fixed;
            left: 79.7% !important;
        }

        .footer-head-2 {
            position: fixed;
            margin-top: -18px;
            left: 78% !important;
        }

        .text-red {
            font-weight: 500;
            color: #ef4444;
        }

        .text-yellow {
            font-weight: 500;
            color: #ffd312;
        }

        .text-blue {
            font-weight: 500;
            color: #1275ff;
        }

        .text-gray {
            font-weight: 600;
            color: #1d1d1d;
        }

        .text-green {
            font-weight: 500;
            color: #00d037;
        }
    </style>
</head>

<body>
    <table class="table-border">
        <thead>
            <tr class="table-border table-text-center">
                <th rowspan="2" class="table-border">
                    NO
                </th>
                <th rowspan="2" class="table-border">
                    Pertanyaan
                </th>
                <th rowspan="2" class="table-border">
                    Variabel
                </th>
                <th colspan="5" class="table-border">
                    Total Skor
                </th>
                <th rowspan="2" class="table-border">
                    Average
                </th>
                <th rowspan="2" class="table-border">
                    Kesimpulan
                </th>
            </tr>
            <tr class="table-border table-text-center">
                <th class="table-border">
                    5
                </th>
                <th class="table-border">
                    4
                </th>
                <th class="table-border">
                    3
                </th>
                <th class="table-border">
                    2
                </th>
                <th class="table-border">
                    1
                </th>
            </tr>
        </thead>
        <tbody>
            @php $serialNumber = 1; @endphp
            @foreach ($categories as $category)
                <tr class="table-border table-text-left">
                    <td class="table-border table-text-center">
                        <span>{{ $serialNumber++ }}</span>
                    </td>
                    <td class="table-border">
                        <span>
                            <ul>
                                @foreach ($category->questions as $question)
                                    <li>{{ $question->text }}</li>
                                @endforeach
                            </ul>
                        </span>
                    </td>
                    <td class="table-border table-text-center">
                        <span>{{ $category->name }}</span>
                    </td>
                    <td class="table-border table-text-center">
                        <span>{{ $answerCounts[$category->id][5] }}</span>
                    </td>
                    <td class="table-border table-text-center">
                        <span>{{ $answerCounts[$category->id][4] }}</span>
                    </td>
                    <td class="table-border table-text-center">
                        <span>{{ $answerCounts[$category->id][3] }}</span>
                    </td>
                    <td class="table-border table-text-center">
                        <span>{{ $answerCounts[$category->id][2] }}</span>
                    </td>
                    <td class="table-border table-text-center">
                        <span>{{ $answerCounts[$category->id][1] }}</span>
                    </td>
                    <td class="table-border table-text-center">
                        <span>{{ number_format($results[$category->id] ?? 0, 2) }}</span>
                    </td>
                    <td class="table-border table-text-center">
                        <span>
                            @switch($results[$category->id])
                                @case($results[$category->id] <= 1.79)
                                    <p class="text-gray">
                                        Sangat Tidak Puas
                                    </p>
                                @break

                                @case($results[$category->id] <= 2.59)
                                    <p class="text-gray">
                                        Tidak Puas
                                    </p>
                                @break

                                @case($results[$category->id] <= 3.3)
                                    <p class="text-gray">
                                        Cukup Puas
                                    </p>
                                @break

                                @case($results[$category->id] <= 4.91)
                                    <p class="text-gray">
                                        Puas
                                    </p>
                                @break

                                @default
                                    <p class="text-gray">
                                        Sangat Puas
                                    </p>
                            @endswitch
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
