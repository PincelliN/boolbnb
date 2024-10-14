<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Apartment;
use App\Functions\Helper;
use Illuminate\Support\Facades\DB;

class ApartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apartments = config('apartments');
        foreach ($apartments as $apartment) {
            $new_apartment = new Apartment();
            $new_apartment->title = $apartment['title'];
            $new_apartment->slug = Helper::generateSlug($new_apartment->title, Apartment::class);
            $new_apartment->user_id = rand(2, 8);
            $new_apartment->description = $apartment['description'];
            $new_apartment->room = rand(1, 6);
            $new_apartment->bed = $new_apartment->room * 2;
            $new_apartment->bathroom = rand(1, 3);
            $new_apartment->sqm = (($new_apartment->room * 20) + ($new_apartment->bathroom * 10));
            $new_apartment->address = $apartment['address'];

            $encoded_address = urlencode($new_apartment->address);
            $data_coordinate = file_get_contents('https://api.tomtom.com/search/2/geocode/' . $encoded_address . '.json?key=PmDZl7vx3YsaUvAjiu8WRKIDvd4SGoNG');
            $coordinate_long_lat = json_decode($data_coordinate);

            if (!empty($coordinate_long_lat->results[0])) {
                $lon = $coordinate_long_lat->results[0]->position->lon;
                $lat = $coordinate_long_lat->results[0]->position->lat;
                // Imposta coordinate_long_lat usando ST_PointFromText
                $new_apartment->coordinate_long_lat = DB::raw("ST_PointFromText('POINT($lon $lat)')");
            }

            $new_apartment->img_path;
            $new_apartment->img_name;
            $new_apartment->is_visible = true;
            $new_apartment->save();
        }
    }
}
