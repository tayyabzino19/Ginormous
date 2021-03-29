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
        $item->skills()->sync([1785,1616,1483,1286,1033,1008,997,979,647,581,308,290,228,54,52,39,33,7,1,15,72,320]);
        $item->industries()->sync([1,2,4]);
        $item->types()->sync([1,3,4]);

        $item = new Item;
        $item->name = 'Buy Right portal';
        $item->url = 'https://zino.brhythym.com/';
        $item->details = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
        $item->status = 'active';
        $item->save();
        $item->skills()->sync([1785,1616,1483,1286,1033,1008,997,979,647,581,308,290,228,54,52,39,33,7,1,15,72,320]);
        $item->industries()->sync([1,2,4]);
        $item->types()->sync([1,3,4]);

        $item = new Item;
        $item->name = 'Wolfiz';
        $item->url = 'https://zino.wolfiz.com/';
        $item->details = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
        $item->status = 'active';
        $item->save();
        $item->skills()->sync([1785,1616,1483,1286,1033,1008,997,979,647,581,308,290,228,54,52,39,33,7,1,15,72,320]);
        $item->industries()->sync([1,2,4]);
        $item->types()->sync([1,3,4]);

        $item = new Item;
        $item->name = 'Planting Tree Portal';
        $item->url = 'http://gocarbonneutral.org/';
        $item->details = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
        $item->status = 'active';
        $item->save();
        $item->skills()->sync([1785,1616,1483,1286,1033,1008,997,979,647,581,308,290,228,54,52,39,33,7,1,15,72,320]);
        $item->industries()->sync([1,2,4]);
        $item->types()->sync([1,3,4]);

        $item = new Item;
        $item->name = 'NCLEX NOTES';
        $item->url = 'https://nclexnotesnow.com/';
        $item->details = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
        $item->status = 'active';
        $item->save();
        $item->skills()->sync([1785,1616,1483,1286,1033,1008,997,979,647,581,308,290,228,54,52,39,33,7,1,15,72,320]);
        $item->industries()->sync([1,2,4]);
        $item->types()->sync([1,3,4]);
    }
}
