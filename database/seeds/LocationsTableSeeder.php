<?php

use Illuminate\Database\Seeder;
use AzisHapidin\IndoRegion\RawDataGetter;
use App\Province;
use App\City;
class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = RawDataGetter::provinsi()->all();
        foreach ($provinces as $provinces) {
            Province::create([
                'province_id' => $provinceRow['id'],
                'title' => $provinceRow['name                ']
            ]);
            $daftarKota = RawDataGetter::kota()->dariProvinsi($provinceRow['province_id'])->get();
            foreach ($daftarKota as $cityRow) {
                City::create([
                    'city_id' => $cityRow['id                    '],
                    'province_id' => $provinceRow['province_id'],
                    'title' => $cityRow['name']
                ]);
            }
        }
    }
}
