<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url("assets/ecom/fontawesome/css/all.min.css");?>">
    <link rel="stylesheet" href="<?=base_url("assets/ecom/mycustom/myproduct.css");?>">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
    <title>TOKO UKM</title>
    <style>
      body{
        font-family: 'Roboto', sans-serif;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <!-- <div class="row">
        <div class="col-12 mb-0 mt-3" align="right">
           <div id="google_translate_element"></div>
        </div>
      </div> -->
      <div class="row">
        <div class="col-12">
          <?php 
              $this->load->view("client/inc/navbar");
              // include "inc/navbar.php";?>
        </div>
      </div>
    </div>
    <?php
      $this->load->view("client/page/".$page);
    ?>
    <hr>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 mt-4">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="" align="center">
                  <img src="<?=base_url("assets/ecom/img/");?>protect.png" alt="protect">
                  <!-- <img src="<?=base_url("assets/ecom/img/icon-verify.svg");?>" alt=""> -->
                </div>
                <h5 align="center"><strong>Perlindungan Konsumen</strong></h5>
                <p align="center">Kami akan mengembalikan uang Anda secara penuh, jika barang tidak sesuai dengan deskripsi.</p>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="" align="center">
                  <img src="<?=base_url("assets/ecom/img/");?>transport.png">
                  <!-- <img src="<?=base_url("assets/ecom/img/icon-pengiriman.svg");?>" alt=""> -->
                </div>
                <h5 align="center"><strong>Jaminan Pengiriman</strong></h5>
                <p align="center">Kami akan mengembalikan uang Anda secara penuh, jika barang tidak terkirim.</p>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="" align="center">
                  <img src="<?=base_url("assets/ecom/img/");?>card-security.png">
                  <!-- <img src="<?=base_url("assets/ecom/img/icon-aman.svg");?>" alt=""> -->
                </div>
                <h5 align="center"><strong>Pembayaran Aman</strong></h5>
                <p align="center">Kami menghadirkan pilihan metode pembayaran yang aman dan bervariasi</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <img src="<?=base_url("assets/ecom/img/card-list.png");?>" alt="" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 mt-3">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 mb-4" align="center">
                <small style="color:grey;" class="mt-5">&copy; <?= date("Y");?> Hak Cipta Terpelihara tokoukm.com</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tb_cart').DataTable();
        } );
        $(document).ready(function() {
            $('#tb1').DataTable();
        } );
    </script>
    <script type="text/javascript">
        // function googleTranslateElementInit() {
        //   new google.translate.TranslateElement({pageLanguage: 'id', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        // }
    </script>

    
    
  </body>
</html>
