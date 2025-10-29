<?php

namespace Database\Seeders;
use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        for($i=1; $i<=20; $i++){
            Buku::create([
                'judul' => fake()->sentence(3),
                'penulis' => fake()->name(),
                'harga' => rand(50000, 150000),
                'tgl_terbit' => fake()->date(),
            ]);
        }
    }
}
