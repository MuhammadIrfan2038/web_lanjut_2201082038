<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'nama_kategori' => 'Sport',
                'keterangan' => 'Sepatu Olahraga'
            ],
            [
                'nama_kategori' => 'Slippers',
                'keterangan' => 'Sendal Selop'
            ],
            [
                'nama_kategori' => 'Heels',
                'keterangan' => 'Sepatu Heels'
            ],
            [
                'nama_kategori' => 'Sneakers',
                'keterangan' => 'Sepatu Sneakers'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
