@extends('admin.layouts.main')

@section('content')
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-100 min-h-screen transition-all main">
        <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
            <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>
            <ul class="flex items-center text-sm ml-4">
                <li class="text-gray-600 mr-2 font-semibold">Dashboard</li>
            </ul>
        </div>
        <div class="p-6">

            @livewire('card-dashboard')

            <div class="grid grid-cols-1 gap-6 mb-6">
                <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                    <div class="flex justify-center mb-6">
                        <p class="font-bold text-2xl">JANTRA ROYALE</p>
                    </div>
                    <div class="text-md font-normal justify-center">
                        <p>
                            “Jantra Royale by Jantra Al-Rasyid” resmi diperkenalkan dan telah menjadi aplikasi sangat
                            efisien yang dikembangkan dan diterbitkan oleh PT Jantra Group Indonesia sejak tahun 2017.
                            Jantra Royale adalah aplikasi untuk pelanggan dan fans Jantra Kakikaki. Aplikasi ini memberikan
                            kemudahan dalam menghubungi bengkel, membuat reservasi online, mendapatkan kupon, member /
                            loyalty card dan inisiatif promosi lainnya dari Jantra Kakikaki. Jantra Kakikaki, bagian dari
                            Janta Group, adalah spesialis Workshop profesional untuk sistem suspensi mobil. Rekondisi
                            suspensi seperti Tie-rod, Long Tie-rod, Link-Stabil, Shock Absorbers, EPS (Electric Power
                            Steering). Jantra Kakikaki juga menyediakan layanan Speed Balancing dan spooring.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
