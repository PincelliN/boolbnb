<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Apartment;
use App\Models\Sponsor;
use Illuminate\Support\Carbon;



class ApartmentSponsorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     /*    for ($i = 0; $i < 10; $i++) {
            $apartment = Apartment::inRandomOrder()->first();
             $sponsor_id = Sponsor::inRandomOrder()->first()->id;
            if (!$apartment->sponsor()) {
                $apartment->sponsor()->attach($sponsor_id);
            }



            1)se (end_date != null && end_date>currentdate) allora end_date +=duration
            2) end_date = create_date + duration

        }
    } */
}