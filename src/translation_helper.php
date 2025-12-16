<?php
function translateWeatherCondition(string $englishCondition): string
{
    $condition = strtolower($englishCondition);

    if ($condition == 'sunny') {
        return 'Cerah';
    } else if ($condition == 'clear') {
        return 'Cerah (Malam Hari)';
    } else if ($condition == 'partly cloudy') {
        return 'Berawan Sebagian';
    } else if ($condition == 'cloudy') {
        return 'Berawan';
    } else if ($condition == 'overcast') {
        return 'Mendung';
    } else if ($condition == 'mist' || $condition == 'fog' || $condition == 'freezing fog') {
        return 'Berkabut';
    } 

    else if (str_contains($condition, 'rain')) {
        if (str_contains($condition, 'light')) {
            return 'Hujan Ringan';
        } else if (str_contains($condition, 'moderate')) {
            return 'Hujan Sedang';
        } else if (str_contains($condition, 'heavy')) {
            return 'Hujan Lebat';
        } else if (str_contains($condition, 'patchy')) {
            return 'Hujan Lokal';
        } else {
            return 'Hujan';
        }
    }

    else if (str_contains($condition, 'snow') || str_contains($condition, 'sleet') || str_contains($condition, 'ice pellets')) {
        if (str_contains($condition, 'light')) {
            return 'Salju Ringan';
        } else if (str_contains($condition, 'heavy')) {
            return 'Salju Lebat';
        } else if (str_contains($condition, 'patchy')) {
            return 'Salju Lokal';
        } else {
            return 'Bersalju';
        }
    }
    else if (str_contains($condition, 'thunder')) {
        return 'Badai Petir';
    } else if (str_contains($condition, 'drizzle')) {
        return 'Gerimis';
    } else if (str_contains($condition, 'blizzard')) {
        return 'Badai Salju';
    }
    else {
        return $englishCondition;
    }
}

function translateDay(string $englishDay): string
{
    $dayMap = [
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu'
    ];

    return $dayMap[$englishDay] ?? $englishDay;
}