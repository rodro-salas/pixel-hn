<?php

use Illuminate\Database\Seeder;

class ActivityStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activity_statuses')->insert([
            'name' => "Pending"
        ]);

        DB::table('activity_statuses')->insert([
            'name' => "Completed"
        ]);
    }
}
