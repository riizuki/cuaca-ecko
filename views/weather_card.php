<div class="weather-card">
    <div class="text-center">
        <p class="location mb-0"><?= $weatherData->location->name ?>, <?= $weatherData->location->country ?></p>
        <p class="time">Update Terakhir: <?= date('d M Y, H:i', strtotime($weatherData->current->last_updated)) ?></p>
    </div>

    <div class="weather-main">
        <div class="temp"><?= round($weatherData->current->temp_c) ?>&deg;C</div>
    </div>

    <p class="weather-condition"><?= $weatherData->current->condition->text ?></p>

    <div class="weather-details">
        <div class="row">
            <div class="col-4">
                <div class="detail-label">Angin</div>
                <div class="detail-value"><?= $weatherData->current->wind_kph ?> km/j</div>
            </div>
            <div class="col-4">
                <div class="detail-label">Kelembapan</div>
                <div class="detail-value"><?= $weatherData->current->humidity ?>%</div>
            </div>
            <div class="col-4">
                <div class="detail-label">Terasa</div>
                <div class="detail-value"><?= round($weatherData->current->feelslike_c) ?>&deg;C</div>
            </div>
        </div>
    </div>
</div>
