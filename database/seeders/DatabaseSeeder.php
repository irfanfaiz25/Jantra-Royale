<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('categories')->insert([
            'name' => 'performance',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'name' => 'information & data',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'name' => 'economy',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'name' => 'control & security',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'name' => 'efficiency',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'name' => 'service',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('questions')->insert([
            'text' => 'Apakah Anda Puas dengan layanan Aplikasi Jantra Royale yang diberikan oleh Jantra Kakikaki?',
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('questions')->insert([
            'text' => 'Fitur-fitur yang tersedia pada Jantra Royale mudah dipahami cara penggunaannya dan mudah di akses oleh pengguna.',
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('questions')->insert([
            'text' => 'Aplikasi Jantra Royale memberikan informasi yang tepat dan akurat.',
            'category_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('questions')->insert([
            'text' => 'Apakah penggunaan aplikasi Jantra Royale tidak membutuhkan penggunaan data yang banyak?',
            'category_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('questions')->insert([
            'text' => 'Pengamanan yang terdapat pada Jantra Royale sudah dapat menjaga data atau informasi dari berbagai bentuk kecurangan atau kejahatan.',
            'category_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('questions')->insert([
            'text' => 'Aplikasi Jantra Royale dapat diakses diberbagai perangkat dan media.',
            'category_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('questions')->insert([
            'text' => 'Aplikasi Jantra Royale dapat memberikan kepuasan dalam memenuhi kebutuhan informasi guna meningkatkan kinerja/pelayanan.',
            'category_id' => 6,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Jantra Royale',
            'username' => 'jantraroyale',
            'password' => Hash::make('jantra123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
