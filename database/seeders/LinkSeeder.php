<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Link;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Link::factory(30)->create();
    }
}
