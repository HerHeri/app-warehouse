<?php

use Illuminate\Support\Facades\Log;

function salam($text)
{
    $b = Carbon\Carbon::now()->format('H');
    $hour = (int) $b;
    $hasil = "";
    if ($hour >= 0 && $hour < 10) {
        $hasil = "Pagi";
    } elseif ($hour >= 10 && $hour < 15) {
        $hasil = "Siang";
    } elseif ($hour >= 15 && $hour <= 17) {
        $hasil = "Sore";
    } else {
        $hasil = "Malam";
    }

    $text = str_replace(['Pagi', 'Siang', 'Sore', 'Malam'], $hasil, $text);
    return $text;
}
?>
