<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $language = new Language;
        $language->name = 'English';
        $language->code = 'en';
        $language->save();

        $language = new Language;
        $language->name = 'Português';
        $language->code = 'pt';
        $language->save();

        $language = new Language;
        $language->name = 'Français';
        $language->code = 'fr';
        $language->save();

        $language = new Language;
        $language->name = 'Türkçe';
        $language->code = 'tr';
        $language->save();
    }
}
