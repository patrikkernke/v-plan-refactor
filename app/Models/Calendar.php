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
                'isSunday'       => $day->isSunday(),
            ]);
        }

        return $days;
    }
}
