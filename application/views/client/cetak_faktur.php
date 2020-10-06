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
    <title>Cetak Faktur - TOKO UKM</title>
    <style>
      body{
        font-family: 'Roboto', sans-serif;
      }
    </style>
  </head>
  <body onload="window.print();">
    <div class="container">
      <div class="row">
        <div class="col-12 mt-5">
            <?php 
                echo "<h4>TOKO UKM</h4>
                <h5>Faktur $info->no_faktur</h5>
                <div class='card mt-3 rounded-0'>
                
                    <div class='card-body'>
                        <table class='table table-sm table-striped small'>
                            <tbody>
                                <tr>
                                    <td>Tanggal Beli:</td>
                                    <td>$info->tgl_ts</td>
                                </tr>
                                <tr>
                                    <td>Alamat Pengiriman:</td>
                                    <td>$info->alamat</td>
                                </tr>
                                <tr>
                                    <td>Kurir:</td>
                                    <td>".ucwords($info->kurir)."</td>
                                </tr>
                                <tr>
                                    <td>No. Resi:</td>
                                    <td>$info->no_resi</td>
                                </tr>
                                <tr>
                                    <td>Pembayaran:</td>
                                    <td>";
                                        if($info->status_bayar=="no_paid"){
                                            echo "<strong>BELUM LUNAS</strong>";
                                        }
                                        else{
                                            echo "<strong>LUNAS</strong>";
                                        }
                                    echo "</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h5 class='mt-3'>Daftar Produk</h5>
                <div class='card mb-3 rounded-0'>
                    <div class='card-body'>
                        <table class='table table-sm table-striped small'>
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th class='text-right'>Total</th>
                                </tr>
                            </thead>
                            <tbody>";
                                foreach ($dp as $key => $v) {
                                    $st[]=$v->total;
                                    echo "<tr>
                                            <td>$v->nama_produk</td>
                                            <td>$v->jumlah</td>
                                            <td>Rp. ".number_format($v->harga,0)."</td>
                                            <td class='text-right'>Rp. ".number_format($v->total,0)."</td>
                                        </tr>";
                                }
                            echo "<tr style='font-weight:bold;'>
                                    <td colspan='3'>SUB TOTAL</td>
                                    <td class='text-right'>Rp. ".number_format(array_sum($st),0)."</td>
                                </tr>
                                <tr style='font-weight:bold;'>
                                    <td colspan='3'>BIAYA KIRIM</td>
                                    <td class='text-right'>Rp. ".number_format($info->ongkir,0)."</td>
                                </tr>
                                <tr style='font-weight:bold;'>
                                    <td colspan='3'>TOTAL PEMBAYARAN</td>
                                    <td class='text-right'>Rp. ".number_format($info->ongkir+array_sum($st),0)."</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>";
            ?>
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
