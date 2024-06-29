<?php

use App\Models\TimeZone;

function getApplicationTimezone()
{
    $timezone = TimeZone::first(); // Assuming you only have one timezone entry
    return $timezone ? $timezone->name : config('app.timezone');
}