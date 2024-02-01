<?php

namespace Database\Seeders;

use App\Models\Comic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comic = config('dcomics_db');
        foreach ($comic as $comics_item) {
            $comics = new Comic();
            $comics->title = $comics_item['title'];
            $comics->description = $comics_item['description'];
            $comics->thumb = $comics_item['thumb'];
            $comics->price = $comics_item['price'];
            $comics->series = $comics_item['series'];
            $comics->sale_date = $comics_item['sale_date'];
            $comics->type = $comics_item['type'];
            $comics->artists = implode(', ',$comics_item['artists']);
            $comics->writers = implode(', ', $comics_item['writers']);
            $comics->save();
        }
    }
}
