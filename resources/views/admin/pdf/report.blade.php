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

        .capitalize {
            text-transform: capitalize;
        }
    </style>
</head>

<body>
    <table class="table-border">
        <thead>
            <tr class="table-border table-text-center">
                <th rowspan="2" class="table-border">
                    NO</th>
                <th rowspan="2" class="table-border">
                    Nama</th>
                @foreach ($questionsGroupedByCategory as $category => $questions)
                    <th colspan="{{ $questions->count() }}" class="table-border capitalize">
                        {{ $category }}</th>
                @endforeach
            </tr>
            <tr class="table-border table-text-center">
                @foreach ($questionsGroupedByCategory as $category => $questions)
                    @foreach ($questions as $index => $question)
                        <th class="table-border">
                            P{{ $index + 1 }}</th>
                    @endforeach
                @endforeach
            </tr>
        </thead>
        <tbody>
            @php $serialNumber = 1; @endphp
            @foreach ($respondents as $respondent)
                <tr class="table-border table-text-center">
                    <td class="table-border">
                        <span>{{ $serialNumber++ }}</span>
                    </td>
                    <td class="table-border">
                        <span>{{ $respondent['respondent_name'] }}</span>
                    </td class="table-border">
                    @foreach ($questionsGroupedByCategory as $category => $questions)
                        @foreach ($questions as $question)
                            <td class="table-border">
                                <span>{{ $respondent['Q' . $question->id] ?? 'N/A' }}</span>
                            </td>
                        @endforeach
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
