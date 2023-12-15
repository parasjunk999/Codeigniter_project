<?php

namespace App\Services;

use Config\Pixabay;

class PixabayService
{
    public function searchImages($query, $perPage = 10)
    {
        $apiKey = Pixabay::$apiKey;
        $url = "https://pixabay.com/api/?key=$apiKey&q=$query&per_page=$perPage";


        return json_decode(file_get_contents($url), true);
    }
}
