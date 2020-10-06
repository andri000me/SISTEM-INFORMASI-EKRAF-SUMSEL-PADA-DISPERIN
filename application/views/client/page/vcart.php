<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=site_url("p");?>">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Keranjang Belanja</li>
        </ol>
      </nav>
      <h4 class=""><strong>Keranjang Belanja</strong></h4>

          <?php
            //id_lapak|id_produk|jumlah|harga
            $gL=$this->db->query("select a.id_lapak, b.nama_lapak from keranjang a inner join lapak b on a.id_lapak=b.id_lapak where a.id_member='$id_member' group by id_lapak");
            $jdata=$gL->num_rows();
            if($jdata==0){
              echo "<div class='card mt-3'>
                      <div class='card-body small'>
                        <table id='tb_cart' class='compact display'>
                          <thead>
                            <tr>                            
                              <th class='text-center'>Aksi</th>
                              <th>Nama Produk</th>
                              <th class='text-center'>Jumlah</th>
                              <th class='text-right'>Harga</th>
                              <th class='text-right'>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </div>";
            }
            else{
                foreach ($gL->result() as $key => $vgL) {
                  echo "<div class='card mt-3'>
                    <div class='card-header'>
                            <strong>$vgL->nama_lapak</strong>
                    </div>
                    <div class='card-body'>
                      <table class='table table-sm small'>
                        <thead>
                          <tr>                            
                            <th class='text-center'>Aksi</th>
                            <th>Nama Produk</th>
                            <th class='text-center'>Jumlah</th>
                            <th class='text-right'>Harga</th>
                            <th class='text-right'>Total</th>
                          </tr>
                        </thead>
                        <tbody>";
                          $id=1;
                          $q=$this->db->query("select * from v_keranjang where id_lapak='$vgL->id_lapak' and id_member='$id_member'");
                          foreach ($q->result() as $key => $vQ) {
                            $subTot[$id]=$vQ->jumlah*$vQ->harga;
                            echo "<tr>
                                    <td class='text-center'><a href='".site_url("p/cart/".$vQ->id_keranjang)."' onclick=\"return confirm('Hapus ?');\"><i class='fas fa-trash-alt'></i></a></td>
                                    <td style='vertical-align:top;'>
                                        <div class='media'>
                                          <img src='".base_url("produk/img/".$vQ->foto)."' width='50' class='mr-3'>
                                          <div class='media-body'>
                                            <h6 class='mt-0'>$vQ->nama_produk</h6>
                                          </div>
                                        </div>
                                    </td>
                                    <td class='text-center'><input type='number' value='$vQ->jumlah' name='j_$vQ->id_keranjang' id='j_$vQ->id_keranjang' style='width:50px;text-align:center' onchange=\"update_qty($vQ->id_keranjang)\"></td>
                                    <td class='text-right'>".number_format($vQ->harga,0)."</td>
                                    <td class='text-right'>".number_format($vQ->jumlah*$vQ->harga,0)."</td>
                                    
                                  </tr>";
                            $id++;
                          }
                          echo "<tr>
                                  <td>&nbsp;</td>
                                  <td colspan='3'><strong>Sub Total</strong></td>
                                  <td class='text-right'><strong>".number_format(array_sum($subTot),0)."</strong></td>
                                </tr>
                                <tr>
                                  <td colspan='5' class='text-right'><a href='".site_url("p/c_checkout/checkout/".$vgL->id_lapak)."' class='btn btn-success btn-sm'>Checkout</a></td>
                                </tr>";
                        echo"</tbody>
                      </table>
                    </div>
                  </div>";
                }
            }
          ?>


    </div>
  </div>
</div>
<script>

function update_qty(id){
  // var nj=$("input[name='j_"+id+"'").value;
  var nj=document.getElementById("j_"+id).value;
  //alert("jumlah "+nj+" "+id);
  $.post("<?=site_url("p/update_jq");?>",
  {
    id_keranjang: id,
    nj: nj
  },
  function(data, status){
    // alert("Data: " + data + "\nStatus: " + status);
    // alert("Sukses update "+status);
    location.reload(true);
  });
}
</script>
