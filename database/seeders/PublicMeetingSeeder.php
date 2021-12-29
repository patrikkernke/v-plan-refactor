<?php

namespace Database\Seeders;

use App\Models\PublicMeeting;
use Illuminate\Database\Seeder;

class PublicMeetingSeeder extends Seeder
{
    public function run()
    {
        PublicMeeting::factory()->create([
            'start_at' => '2021-12-05 10:00:00',
            'end_at'   => '2021-12-05 11:45:00',
        ]);

        PublicMeeting::factory()->create([
            'start_at' => '2021-12-12 10:00:00',
            'end_at'   => '2021-12-12 11:45:00',
        ]);

        PublicMeeting::factory()->create([
            'start_at' => '2021-12-19 10:00:00',
            'end_at'   => '2021-12-19 11:45:00',
        ]);

        PublicMeeting::factory()->create([
            'start_at' => '2021-12-26 10:00:00',
            'end_at'   => '2021-12-26 11:45:00',
        ]);
    }
}
