<?php $CI =& get_instance();?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=site_url("p");?>">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Checkout</li>
        </ol>
      </nav>
      <h4 class="mb-3"><strong>Checkout</strong></h4>
    </div>
  </div>
    <div class="row">
        <div class="col-md-12 mt-3 mb-3">
            <?php
                switch ($pL) {
                    case "checkout":
                        echo "
                            <h6>Alamat Pengiriman</h6>";

                            form_open_col("method='post' enctype='multipart/form-data' action='".site_url("p/c_bayar/bayar")."' ");
                                echo "<div class='form-row'>";
                                    $iL=array(""=>"-- pilih alamat --");
                                    foreach ($list_alamat as $key => $vlist) {
                                       $iL[$vlist->id_alamat_kirim]=$vlist->nama_alamat;
                                    }
                                    select_col("Pilih Alamat","name='id_alamat' id='alamat' required",$iL,"","col-md-4");
                                echo "</div>";
                                
                                echo "<div class='form-row'>";
                                    input_col("Alamat","type='text' name='alamat' value='' autocomplete='off' readonly ","","col-md-7");
                                echo "</div>";
                                echo "<div class='form-row'>";
                                    $arrKurir=array(""=>"-- pilih kurir --","jne"=>"JNE","tiki"=>"TIKI","pos"=>"POS");
                                    select_col("Pilih Kurir","name='kurir' id='check'",$arrKurir,"","col-md-2");
                                echo "</div>";
                                echo '<div id="ongkir"></div>';

                                $d=$this->db->query("SELECT sum(a.berat*a.jumlah) as berat, a.kota_id FROM v_keranjang AS a where a.id_member='$id_member' and id_lapak='$idL' and a.is_check='0'")->row();
                                echo "
                                <input type='hidden' name='id_lapak' value='$idL'>
                                <input type='hidden' name='id_member' value='$id_member'>
                                <input type='hidden' name='kota_id'>
                                <input type='hidden' name='l_kota_id' value='$d->kota_id'>
                                <input type='hidden' name='berat' value='$d->berat'>";
                                // btn_save_o_col();
                            // form_close();


                                echo "<h6 class='mt-3'>Detail Belanja</h6>
                                <table class='table table-sm table-striped'>
                                    <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th class='text-center'>Jumlah</th>
                                        <th class='text-right'>Harga</th>
                                        <th class='text-right'>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>";
                                    $id=1;
                                    $q=$this->db->query("select * from v_keranjang where id_lapak='$idL' and id_member='$id_member'");
                                    foreach ($q->result() as $key => $vQ) {
                                        $subTot[$id]=$vQ->jumlah*$vQ->harga;
                                        echo "<tr>
                                                <td style='vertical-align:top;'>
                                                    <div class='media'>
                                                    <img src='".base_url("produk/img/".$vQ->foto)."' width='50' class='mr-3'>
                                                    <div class='media-body'>
                                                        <h6 class='mt-0'>$vQ->nama_produk</h6>
                                                    </div>
                                                    </div>
                                                </td>
                                                <td class='text-center'>$vQ->jumlah</td>
                                                <td class='text-right'>".number_format($vQ->harga,0)."</td>
                                                <td class='text-right'>".number_format($vQ->jumlah*$vQ->harga,0)."</td>
                                            </tr>";
                                        $id++;
                                    }
                                    echo "<tr>
                                            <td colspan='3'><strong>Sub Total</strong></td>
                                            <td class='text-right'><strong>".number_format(array_sum($subTot),0)."</strong> 
                                            <input type='hidden' name='ST' value='".array_sum($subTot)."'></td>
                                        </tr>
                                        <tr id='eb'></tr>";
                                    echo"</tbody>
                                </table>";
                                // form_open_col("method='post' enctype='multipart/form-data' id='fBayar' action='".site_url("p/c_bayar")."'");
                                // echo "<hr>
                                // <h6>Pembayaran</h6>";
                                echo "<div id='fBayar'>
                                        <hr>
                                        <h6>Pembayaran</h6>
                                        <div class='form-row'>";
                                            $iB=array(""=>"-- pilih alamat --");
                                            foreach ($list_bank as $key => $vlist) {
                                            $iB[$vlist->id_rek_bayar]="$vlist->nama_rek - $vlist->no_rek a.n $vlist->an";
                                            }
                                            select_col("Pilih Bank Tujuan Transfer","name='id_bank' id='id_rek_bayar' required",$iB,"","col-md-4");
                                        echo "</div>
                                    </div>";
                                btn_bayar_col();
                            form_close();
                            //echo $this->session->userdata("kurir");
                    break;
                }
                
            ?>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){        
		$("#check").change(function(){
			//Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax
			var asal = $("input[name='l_kota_id']").val();
			var kab = $("input[name='kota_id']").val();
			var kurir = $("select[name='kurir']").val();
			var berat = $("input[name='berat']").val();
            if (asal=="" || kab=="" || kurir=="" || berat==""){
                alert("Silahkan pilih alamat !");
            }
            else{
                $("#ongkir").html("Sedang menghitung biaya . . . . .");
                $.ajax({
                    type : 'POST',
                    url : '<?=site_url("ongkir/cek_ongkir2");?>',
                    data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
                    success: function (data) {
                    //jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
                    $("#ongkir").html(data);
                    }
                });
            }
		});

        $('#alamat').change(function(){
			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
			var id_alamat = $('#alamat').val();

      		$.ajax({
            	type : 'GET',
           		url : '<?=site_url("ongkir/get_alamat");?>',
            	data :  'id_alamat=' + id_alamat,
					success: function (data) {
                        $("input[name='kota_id']").val(data.list_alamat[0].kota_id);
                        $("input[name='alamat']").val(data.list_alamat[0].alamat);

					//jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
					//$("#kabupaten").html(data);
				}
          	});
		});
    });
    $("#fBayar").hide();
    $("button[name='bayar']").hide();
    function hitung(){
        //alert(sessionStorage.getItem("id_member"));
        var split = $("select[name='layanan']").val().split("#");
        var ST=$("input[name='ST']").val();
        var EB=parseInt(ST)+parseInt(split[1]);
        var ongkir=split[1];
        var id_alamat=$("select[name='id_alamat']").val();
        var kurir = $("select[name='kurir']").val()+" "+split[0];
        $("#eb").html("<td colspan='3'><strong>Estimasi Total Bayar (Sub Total + Biaya Ongkir)</strong></td><td class='text-right'><strong>"+EB.toLocaleString()+"</strong></td>");
        $.ajax({
            type : 'POST',
            url : '<?=site_url("ongkir/set_session");?>',
            data :  {'kurir' : kurir, 'eb' : EB,'ongkir':ongkir,'id_alamat':id_alamat},
                success: function (data) {
                    $("#fBayar").show();
                    $("button[name='bayar']").show();
            }
        });
    }
</script>