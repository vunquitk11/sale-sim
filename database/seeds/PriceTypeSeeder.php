<?php

use Illuminate\Database\Seeder;

class PriceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('price_types')->insert([
            'name' => 'Sim dưới 500 ngàn',
            'slug' => 'sim-duoi-500-ngan',
            'from' => '0',
            'to' => '500000',
            'position' => 0,
            'status' => 1,
        ]);
        DB::table('price_types')->insert([
            'name' => 'Sim từ 500 ngàn đến 1 triệu',
            'slug' => 'sim-tu-500-ngan-den-1-trieu',
            'from' => '500000',
            'to' => '1000000',
            'position' => 1,
            'status' => 1,
        ]);
        DB::table('price_types')->insert([
            'name' => 'Sim từ 1 triệu đến 3 triệu',
            'slug' => 'sim-tu-1-trieu-den-3-trieu',
            'from' => '1000000',
            'to' => '3000000',
            'position' => 2,
            'status' => 1,
        ]);
        DB::table('price_types')->insert([
            'name' => 'Sim từ 3 triệu đến 5 triệu',
            'slug' => 'sim-tu-3-trieu-den-5-trieu',
            'from' => '3000000',
            'to' => '5000000',
            'position' => 3,
            'status' => 1,
        ]);
        DB::table('price_types')->insert([
            'name' => 'Sim từ 5 triệu đến 10 triệu',
            'slug' => 'sim-tu-5-trieu-den-10-trieu',
            'from' => '5000000',
            'to' => '10000000',
            'position' => 4,
            'status' => 1,
        ]);
        DB::table('price_types')->insert([
            'name' => 'Sim trên 10 triệu',
            'slug' => 'sim-tren-10-trieu',
            'from' => '10000000',
            'to' => 'max',
            'position' => 5,
            'status' => 1,
        ]);
    }
}
