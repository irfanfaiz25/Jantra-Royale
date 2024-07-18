<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- logo title --}}
    <link rel="icon" href="{{ asset('img/jantra-royale.png') }}">

    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    {{-- icon --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    {{-- style --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>

    <title>Admin Dashboard</title>
</head>

<body class="text-gray-800 font-inter">

    @include('admin.layouts.sidebar')

    @yield('content')

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    <script src="{{ asset('assets/admin/js/script.js') }}"></script>

    {{-- script link --}}
    @stack('script')
</body>

</html>
