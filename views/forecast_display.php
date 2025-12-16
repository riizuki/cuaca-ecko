<div class="forecast-container">
    <h3 class="forecast-title">Prakiraan Cuaca</h3>
    <?php foreach ($weatherData->forecast->forecastday as $day): ?>
        <div class="forecast-item">
            <div class="forecast-day">
                <?php
                    $timestamp = strtotime($day->date);
                    echo translateDay(date('D', $timestamp)) . date(', j M', $timestamp);
                ?>
            </div>
            <div class="forecast-condition">
                <img src="https://<?= ltrim($day->day->condition->icon, '/') ?>" alt="<?= $day->day->condition->text ?>">
                <span><?= $day->day->condition->text ?></span>
            </div>
            <div class="forecast-temp">
                <strong><?= round($day->day->maxtemp_c) ?>&deg;</strong> / <?= round($day->day->mintemp_c) ?>&deg;
            </div>
        </div>
    <?php endforeach; ?>
</div>