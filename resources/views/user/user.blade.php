@extends('user.layouts.main')

@section('content')
    <div class="bg-darkblue-user flex justify-center">
        <div class="my-5 container mx-auto">
            <div class="lg:max-w-2xl mx-6 md:mx-auto bg-white rounded-md shadow-md overflow-hidden border-top">
                <div class="px-6 py-4">
                    <h2 class="text-3xl text-center font-semibold text-gray-800">KUISIONER</h2>
                    <p class="mt-6 text-gray-600">
                        <strong>“Jantra Royale by Jantra Al-Rasyid”</strong> resmi diperkenalkan dan telah menjadi
                        aplikasi sangat efisien yang dikembangkan dan diterbitkan oleh PT Jantra Group Indonesia sejak tahun
                        2017. Jantra Royale adalah aplikasi untuk pelanggan dan fans Jantra Kakikaki. Aplikasi ini
                        memberikan kemudahan dalam menghubungi bengkel, membuat reservasi online, mendapatkan kupon, member
                        / loyalty card dan inisiatif promosi lainnya dari Jantra Kakikaki. Jantra Kakikaki, bagian dari
                        Janta Group, adalah spesialis Workshop profesional untuk sistem suspensi mobil. Rekondisi suspensi
                        seperti Tie-rod, Long Tie-rod, Link-Stabil, Shock Absorbers, EPS (Electric Power Steering). Jantra
                        Kakikaki juga menyediakan layanan Speed Balancing dan spooring.
                    </p>

                    <p class="mt-4 text-gray-600 font-bold">
                        KUESIONER SURVEY KEPUASAN PENGGUNA JANTRA ROYALE
                    </p>
                    <p class="mt-4 text-gray-600">
                        Assalamualaikum Wr.Wb
                        Salam Sejahtera
                        Dengan Hormat,
                    </p>

                    <p class="mt-4 text-gray-600">
                        Perkenalkan saya Rismanda Pramudya Kusuma, mahasiswa jurusan S1-Sistem Informasi STMIK Sinar
                        Nusantara Surakarta. Saat ini saya sedang melakukan penelitian untuk menyelesaikan tugas akhir
                        skripsi. Oleh karena itu, saya mengharapkan bantuan dan kesediaan saudara/i untuk menjadi responden
                        dalam penelitian ini.
                    </p>

                </div>
            </div>

            @livewire('user-questions')

            <div class="lg:max-w-2xl mx-auto rounded-md overflow-hidden">
                <div class="px-6 py-4">
                    <div class="px-6 py-4 flex justify-center text-darkblue">
                        <span><i class="fa fa-copyright pr-1"></i>Jantra Royale</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
