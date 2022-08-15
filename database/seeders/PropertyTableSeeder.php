<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Property::query()->truncate();

        Property::create([
            'property' => 'رنگ',
            'detail' => 'سبز',
        ]);

        Property::create([
            'property' => 'اندازه',
            'detail' => 'کوچک',
        ]);

        Property::create([
            'property' => 'جنس',
            'detail' => 'چوب',
        ]);

        Property::create([
            'property' => 'سایز',
            'detail' => '1',
        ]);
    }
}
