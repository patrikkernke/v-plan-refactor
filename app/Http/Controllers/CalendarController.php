<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Inertia\Inertia;

class CalendarController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Calendar', [
            'days' => Calendar::getMonth()
        ]);
    }
}
