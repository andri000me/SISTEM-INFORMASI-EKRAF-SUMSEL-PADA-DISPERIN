<div class="container">
    <h3 class="h3">Semua Produk</h3>
    <div class="row">
        <?php
          $list1=$this->db->get_where("produk",array("is_del"=>"0"));
          foreach ($list1->result() as $key => $vlist1) {
            echo "<div class='col-6 col-md-3 col-lg-3 col-sm-6 mt-3'>
                <div class='product-grid4'>
                    <div class='product-image4'>
                        <a href='#'>
                            <img class='pic-1 img-fluid' src='".base_url("produk/img/".$vlist1->foto)."' style='max-height:210px';>
                            <img class='pic-2 img-fluid' src='".base_url("produk/img/".$vlist1->foto)."' style='max-height:210px';>
                        </a>
                        <ul class='social'>
                            <!--<li><a href='#' data-tip='Quick View'><i class='fa fa-eye'></i></a></li>
                            <li><a href='#' data-tip='Add to Wishlist'><i class='fa fa-shopping-bag'></i></a></li>
                            <li><a href='#' data-tip='Tambahkan ke keranjang'><i class='fa fa-shopping-cart'></i></a></li>-->
                        </ul>
                        <!--<span class='product-new-label'>New</span>
                        <span class='product-discount-label'>-10%</span>-->
                    </div>
                    <div class='product-content'>
                        <h3 class='title'>$vlist1->nama_produk</h3>
                        <div class='price'>
                            Rp. ".number_format($vlist1->harga,0)."
                            <!--<span>$16.00</span> untuk potongan harga-->
                        </div>
                        <a class='add-to-cart' href='".site_url("p/detail_produk/".$vlist1->id_produk)."'>Lihat detail</a>
                    </div>
                </div>
            </div>";
          }
        ?>

    </div>
</div>
