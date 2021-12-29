<?php

namespace App\Models;

use Illuminate\Support\Carbon;

class Calendar
{
    public static function getMonth()
    {
        $today = now();
        $month = $today->month;
        $year = $today->year;

        $days = collect();

        for ($i = 1; $i <= $today->daysInMonth; $i++) {
            $day = Carbon::create($year, $month, $i);

            $days->add([
                'date' => [
                    'iso'            => "$day->year-$day->month-$day->day",
                    'day'            => $day->day,
                    'month'          => $day->month,
                    'year'           => $day->year,
                    'monthName'      => $day->getTranslatedMonthName(),
                    'monthNameShort' => $day->getTranslatedShortMonthName(),
                    'weekday'        => $day->getTranslatedDayName(),
                    'weekdayShort'   => $day->getTranslatedShortDayName(),
                    'isWeekend'      => $day->isWeekend(),
                    'isToday'        => $day->isToday(),
                    'isSaturday'     => $day->isSaturday(),
                    'isSunday'       => $day->isSunday()
                ],
                'events' => PublicMeeting::whereDate('start_at', '=', $day)
                    ->get()
                    ->map(function ($meeting){
                        return [
                            'startTime' => $meeting->start_at->format('H:i'),
                        ];
                    })
            ]);
        }

        return $days;
    }
}
