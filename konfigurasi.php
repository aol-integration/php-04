<?php
    // API Token data usaha yang dituju
    $apiToken = "...";

    // Signature Secret dari Area Developer Anda
    $signatureSecret = "...";

    // Diambil dari hasil pemanggilan API /api-token
    $apiHost = "...";


    // Pemeriksaan konfigurasi sudah dilakukan
    if ($apiToken == '' || $signatureSecret == '' || $apiHost == '') {
        throw new Exception("File konfigurasi.php harus diisi sebelum dapat menjalankan contoh source code ini.");
    }
?>