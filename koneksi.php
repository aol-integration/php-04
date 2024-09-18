<?php

function executeApi($endpoint) 
{
    // Membaca konfigurasi
    include 'konfigurasi.php';

    // Membuat nilai timestamp
    date_default_timezone_set('Asia/jakarta');
    $timestamp = date('d/m/Y H:i:s');

    // Membuat signature
    $signature = hash_hmac('sha256', $timestamp, $signatureSecret);

    // Header
    $header = array(
        'Authorization: Bearer ' . $apiToken,
        'X-Api-Timestamp:'.$timestamp,
        'X-Api-Signature:'.$signature
    );

    // Alamat URL
    $url = $apiHost . $endpoint;

    // Eksekusi pemanggilan API
    $opts = array('http' =>
        array(
            'method' => 'GET',
            'header' => $header,
            'ignore_errors' => true,
        )
    );
    $context  = stream_context_create($opts);
    $response = file_get_contents($url, false, $context);

    // Membaca data  response JSON
    $data = json_decode($response);
    if ($data->s) {
        return $data->d;
    } else {
        // var_dump($response);
        throw new Exception(json_encode($data->d)); 
    }
    
}

?>