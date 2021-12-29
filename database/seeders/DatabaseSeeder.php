<?php

namespace Database\Seeders;

use App\Models\PublicMeeting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'firstname' => 'Patrik',
            'lastname' => 'Kernke',
            'email' => 'patrik@kernke.net',
            'password' => Hash::make('password'),
            'can_login' => true,
            'can_manage_users' => true,
        ]);
        \App\Models\User::factory(10)->create();
        (new PublicMeetingSeeder())->run();
    }
}
