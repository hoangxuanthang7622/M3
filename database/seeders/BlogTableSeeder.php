<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [
                'category_id' => 1,
                'description' => 'Van hoc',
                'name' => 'Chiec thuyen ngoai xa',
            ],
            [
                'category_id' => 2,
                'description' => 'Vat Ly',
                'name' => 'vu tru',
            ]
        ]);
    }
}
