<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'project_id'           => 1,
            'project_name'         => 'Abuja Light Rail',
            'project_location'     => 'Abuja, FCT',
            'project_client_id'    => '5',
            'project_price'        => '2650000000',
            'project_status'       => '1',
            'project_description'  => 'The fourth mainland bridge will join three other bridges connecting the Island of Lagos to the mainland.',
            'project_image'        => 'http://localhost:8000/storage/photos/1/Lagos_Island.jpg',
            'project_date'         => '1 January 2020',
            'project_total_member' => '100',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);

        DB::table('projects')->insert([
            'project_id'           => 2,
            'project_name'         => 'Fourth Mainland Bridge',
            'project_location'     => 'Ikorodu to Lekki, Lagos State',
            'project_client_id'    => '5',
            'project_price'        => '4200000000',
            'project_status'       => '2',
            'project_description'  => 'The Abuja Light Rail project is a light rail transport system that is underway in Abuja in Federal Capital Territory.',
            'project_image'        => 'http://localhost:8000/storage/photos/1/Lagos_Island.jpg',
            'project_date'         => '1 January 2020',
            'project_total_member' => '100',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);

        DB::table('projects')->insert([
            'project_id'           => 3,
            'project_name'         => 'Lagos–Calabar Railway',
            'project_location'     => 'From Lagos, Lagos to Calabar, Cross River',
            'project_client_id'    => '5',
            'project_price'        => '26506512000',
            'project_status'       => '3',
            'project_description'  => 'The Lagos–Kano Standard Gauge Railway is a standard gauge railway across Nigeria, from the port of Lagos to Kano, near the Niger border.',
            'project_image'        => 'http://localhost:8000/storage/photos/1/Lagos_Island.jpg',
            'project_date'         => '1 January 2020',
            'project_total_member' => '100',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);

        DB::table('projects')->insert([
            'project_id'           => 4,
            'project_name'         => 'Lagos Rail Mass Transit',
            'project_location'     => 'Lagos, Lagos',
            'project_client_id'    => '5',
            'project_price'        => '2655152000',
            'project_status'       => '4',
            'project_description'  => 'The Lagos Rail Mass Transit is an urban rail system being developed and under construction in Lagos.',
            'project_image'        => 'http://localhost:8000/storage/photos/1/Lagos_Island.jpg',
            'project_date'         => '1 January 2020',
            'project_total_member' => '100',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);
    }
}
