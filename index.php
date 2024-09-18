<?php 
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BARANG</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop"><source src="assets/mp4/bg.mp4" type="video/mp4" /></video>
        <div class="masthead">
            <div class="masthead-content text-white">
                <div class="container-fluid px-4 px-lg-0">
                    <h1 class="fst-italic lh-1 mb-5">STOCK BARANG</h1>
                    <form action="index.php" id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <div class="row input-group-newsletter">
                            <div class="col"><input class="form-control" id="cari" type="text" placeholder="Code Barang" aria-label="Search" data-sb-validations="Search" name="cari"/></div>
                            <div class="col-auto"><button class="btn btn-outline-primary" id="submitButton" type="submit" value="Cari">SEARCH</button></div>
                        </div>
                    </form>
                    <p class="mb-4"></p>
                    <?php 

                        //jika di alamat url ada cari 
                        if (isset($_GET["cari"])) {

                            //buat varibel cari yang isinya adalah nilai di alamat url
                            $cari = $_GET["cari"];
                            echo "<p class='mb-3'>Kode Barang : " . $cari . "</p>";

                            //buat variabel url nilainya adalah endpoint plus cari
                            $endpoint = "/accurate/api/item/get-stock.do?no={$cari}";

                            try {
                                //buat varibel data yang isinya adalah hasil ambil nilai accurate
                                $data = executeApi($endpoint);

                                //membuat hasil atau menyetak
                                echo "<p>Stok Barang : " . $data->availableStock . "</p>";
                            }
                            catch(Exception $e) {
                                // Jika gagal, tampilkan pesan error
                                echo "<p class='text-danger'>" . $e->getMessage() . "</p>";
                            }
                        }

                    ?>  
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
