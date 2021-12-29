<?php

namespace Database\Factories;

use App\Models\PublicMeeting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PublicMeetingFactory extends Factory
{
    protected $model = PublicMeeting::class;

    public function definition():array
    {
        $date = Carbon::instance($this->faker->dateTimeBetween('- 1 months', '+ 1 months'));
        $date->setHour(10);
        $date->setMinute(0);
        $date->setSecond(0);

        return [
            'start_at' => $date,
            'end_at'   => $date->copy()->addMinutes(105)
        ];
    }
}
