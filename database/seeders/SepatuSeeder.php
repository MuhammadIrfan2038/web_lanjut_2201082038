<?php

namespace Database\Seeders;

use App\Models\Sepatu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SepatuSeeder extends Seeder
{
    public function run(): void
    {
        $sepatus =  [
            [
                'id' => 'tt1746090',
                'nama' => 'VANS SK8 Black White',
                'deskripsi' => 'Sepatu VANS SK8 dengan Warna Hitam Putih, memiliki ukuran 36 - 44, Dengan bahan sepatu kain, kulit, dan karet',
                'harga' => 450000,
                'category_id' => 4,
                'brand' => 'Guido van Rossum',
                'foto_sampul' => 'vans_sk8.jpeg',
            ],
            [
                'id' => 'tt1746091',
                'nama' => 'Nike Air Max Red',
                'deskripsi' => 'Sepatu Nike Air Max dengan Warna Merah, memiliki ukuran 38 - 45, Dengan bahan sepatu kain, sintetis, dan karet',
                'harga' => 600000,
                'category_id' => 2,
                'brand' => 'Nike',
                'foto_sampul' => 'nike_air_max_red.jpeg',
            ],
            [
                'id' => 'tt1746092',
                'nama' => 'Adidas Ultraboost Blue',
                'deskripsi' => 'Sepatu Adidas Ultraboost dengan Warna Biru, memiliki ukuran 37 - 43, Dengan bahan sepatu rajut, mesh, dan karet',
                'harga' => 700000,
                'category_id' => 1,
                'brand' => 'Adidas',
                'foto_sampul' => 'adidas_ultraboost_blue.jpeg',
            ],
            [
                'id' => 'tt1746093',
                'nama' => 'Puma Suede Classic Black',
                'deskripsi' => 'Sepatu Puma Suede Classic dengan Warna Hitam, memiliki ukuran 35 - 41, Dengan bahan sepatu kulit, kain, dan karet',
                'harga' => 550000,
                'category_id' => 3,
                'brand' => 'Puma',
                'foto_sampul' => 'puma_suede_classic_black.jpeg',
            ]
            
        ];
        foreach ($sepatus as $sepatu) {
            Sepatu::create([
                'id' => $sepatu['id'],
                'nama' => $sepatu['nama'],
                'deskripsi' => $sepatu['deskripsi'],
                'harga' => $sepatu['harga'],
                'category_id' => $sepatu['category_id'],
                'brand' => $sepatu['brand'],
                'foto_sampul' => $sepatu['foto_sampul'],
            ]);
        }
    }
}
