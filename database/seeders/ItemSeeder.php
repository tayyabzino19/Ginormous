<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new Item;
        $item->name = 'Digican';
        $item->url = 'https://realestate.brhythym.com/';
        $item->details = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
        $item->status = 'active';
        $item->save();

        $item = new Item;
        $item->name = 'Buy Right portal';
        $item->url = 'https://zino.brhythym.com/';
        $item->details = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
        $item->status = 'inactive';
        $item->save();
    }
}
