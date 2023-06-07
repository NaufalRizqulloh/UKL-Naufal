<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TugasTodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $todos = [
            [
                'name' => 'Belum',
                'slug' => 'belum',
            ],
            [
                'name' => 'Proses',
                'slug' => 'proses',
            ],
            [
                'name' => 'Selesai',
                'slug' => 'selesai',
            ],
        ];

        foreach($todos as $todo){
            $class = new Todo();

            $class->name = $todo['name'];
            $class->name = $todo['slug'];

            $class->save();

        }
    }
}
