<?php
// Load Composer's autoloader
require_once dirname(__DIR__) . '/vendor/autoload.php';

// Load environment variables from .env file
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

require_once dirname(__DIR__) . '/src/config.php';
require_once dirname(__DIR__) . '/src/weather_service.php';
require_once dirname(__DIR__) . '/src/translation_helper.php';

$city = isset($_GET['city']) && !empty(trim($_GET['city'])) ? trim($_GET['city']) : 'Bandung';
$days = isset($_GET['days']) ? (int)$_GET['days'] : 3; 

$result = getWeatherData($city, API_KEY, $days);

$weatherData = $result['data'];
$error = $result['error'];

if ($weatherData) {
    $weatherData->current->condition->text = translateWeatherCondition($weatherData->current->condition->text);
    
    foreach ($weatherData->forecast->forecastday as $day) {
        $day->day->condition->text = translateWeatherCondition($day->day->condition->text);
    }
}

require dirname(__DIR__) . '/views/header.php';
require dirname(__DIR__) . '/views/search_form.php';

if ($error) {
    require dirname(__DIR__) . '/views/error_alert.php';
}

if ($weatherData) {
    require dirname(__DIR__) . '/views/weather_card.php';
    require dirname(__DIR__) . '/views/forecast_display.php';
}
