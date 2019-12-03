<?php

namespace App\Delivery\deliveryclient;

use GuzzleHttp\Client;

class deliveryClient
{

    /**
     * @param string $parcelNumber
     * @return string
     */
    public function searchDelivery(string $parcelNumber): string
    {
        $response = $this->request('POST', '/api/retrieve?parcelNumber=' . $parcelNumber);

        $newsUrl = (string)$response->getBody();
    }
}