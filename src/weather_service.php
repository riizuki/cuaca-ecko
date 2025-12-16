<?php
// src/weather_service.php

/**
 * Mengambil data cuaca saat ini dan prakiraan dari WeatherAPI.
 *
 * @param string $city Nama kota yang akan dicari.
 * @param string $apiKey Kunci API untuk WeatherAPI.
 * @param int $days Jumlah hari prakiraan yang diminta.
 * @return array Berisi ['data' => object] jika berhasil, atau ['error' => string] jika gagal.
 */
function getWeatherData(string $city, string $apiKey, int $days): array
{
    // URL diubah ke forecast.json dan ditambahkan parameter &days
    $apiUrl = "http://api.weatherapi.com/v1/forecast.json?key=" . $apiKey . "&q=" . urlencode($city) . "&days=" . $days . "&aqi=no&alerts=no";

    $json_data = @file_get_contents($apiUrl);

    if ($json_data === FALSE) {
        return ['data' => null, 'error' => 'Gagal mengambil data. Periksa koneksi internet Anda.'];
    }

    $data = json_decode($json_data);

    if (isset($data->error)) {
        return ['data' => null, 'error' => 'Kota tidak ditemukan: "' . htmlspecialchars($city) . '"'];
    }

    return ['data' => $data, 'error' => null];
}