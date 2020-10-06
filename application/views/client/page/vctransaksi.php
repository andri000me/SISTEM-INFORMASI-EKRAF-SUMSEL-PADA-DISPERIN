<?php $CI =& get_instance();?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=site_url("p");?>">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
        </ol>
      </nav>
      <h4 class="mb-3"><strong>Transaksi</strong></h4>
        <?php
            if($pL=="konf_bayar" || $pL=="detail_beli" || $pL=="detail_jual" || $pL=="konf_terima"){}
            else{
        ?>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link <?php if($pL=="beli"){ echo "active";}else{};?>" href="<?=site_url("p/c_transaksi/beli");?>">Pembelian</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($pL=="jual"){ echo "active";}else{};?>" href="<?=site_url("p/c_transaksi/jual");?>">Penjualan</a>
                </li>
            </ul>
        <?php
            }
        ?>
    </div>
  </div>
    <div class="row">
        <div class="col-md-12 mt-3 mb-3">
            <?php
                switch ($pL) { 
                    case "konf_terima":
                        echo "<h5>Konfirmasi Penerimaan Barang</h5>
                        <form action='' method='post'>
                            <p>Apakah Anda sudah menerima pesanan ini?</p>
                            <div class=\"alert alert-warning\" role=\"alert\">
                                Lakukan konfirmasi hanya jika pesanan Anda sudah diterima, transaksi dianggap selesai dan dana akan diteruskan ke penjual.
                            </div>
                            <button name='terima' type='submit' class='btn btn-success btn-sm' onclick=\"return confirm('Konfirmasi terima pesanan ini?');\"> <i class=\"fas fa-check\"></i> Ya, pesanan sudah diterima</button> 
                            <button type='button' class='btn btn-primary btn-sm' onclick=\"self.history.back(-1);\"> Kembali</button>
                        </form>";
                        if(isset($_POST["terima"])){
                            $table="transaksi";
                            $table2="pencairan";
                            $i=$this->db->get_where($table,array("sha1(no_faktur)"=>$_GET["i"]))->row();
                            $DI=array("no_faktur"=>$i->no_faktur,"jumlah"=>$i->total_trf,"id_lapak"=>$i->id_lapak);
                            $CI->add_data($table2,$DI);

                            $data=array("status_trans"=>"selesai");                            
                            $where=array("sha1(no_faktur)"=>$_GET["i"]);
                            $save=$CI->update_data($table,$data,$where);
                            echo "<script>alert('Konfirmasi berhasil, terimakasih.');window.location='".site_url("p/c_transaksi/beli")."';</script>";
                        }
                        else{}
                    break;
                    case "detail_jual":
                        echo "<h5>Detail Transaksi</h5>
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
                            </tbody>
                        </table>";
                        if($info->status_trans!="selesai"){
                            form_open_col("method='post' enctype='multipart/form-data' action='' ");
                                echo "<h5>Update Pesanan</h5>";
                                echo "<div class='form-row'>";
                                    if($info->status_trans=="kirim"){
                                        $arrStat=array("kirim"=>"Kirim");
                                    }
                                    else{
                                        $arrStat=array("pending"=>"Pending","proses"=>"Proses","kirim"=>"Kirim");
                                    }
                                    
                                    select_col("Status Transaksi","name='status_trans' onchange='cek_status()' required",$arrStat,$info->status_trans,"col-md-3");
                                echo "</div>";
                                echo "<div class='form-row'>";
                                    input_col("No. Resi","type='text' name='no_resi' id='no_resi' autocomplete='off' value='$info->no_resi'","Silahkan diinput jika barang sudah dikirim","col-md-4");
                                echo "</div>";
                                btn_save_o_col();
                            form_close();
                            if(isset($_POST["save"])){
                                $table="transaksi";
                                $data=array(
                                            "status_trans"=>$_POST["status_trans"],
                                            "no_resi"=>$_POST["no_resi"]);
                                $where=array("sha1(no_faktur)"=>$_GET["i"]);
                                $save=$CI->update_data($table,$data,$where);
                                
                                echo "<script>alert('Update berhasil');window.location='".site_url("p/c_transaksi/detail_jual?i=".$_GET["i"])."';</script>";
                                
                                // redirect(current_url());
                            }
                        }
                        else{}
                        echo "<br><h5>Daftar Produk</h5>
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
                        <a href='".site_url("p/c_transaksi/jual")."' class='btn btn-success btn-sm'><i class=\"fas fa-arrow-left\"></i> Kembali</a>";
                    break;
                    case 'jual':                 

                        echo "
                            <h5>List Transaksi Penjualan</h5>
                            <table class='display small compact nowrap' id='tb1'>
                                <thead>
                                    <tr>
                                        <th>No. Faktur</th>
                                        <th>Status Transaksi</th>
                                        <th>Status Bayar</th>
                                        <th class='text-right'>Total Pembayaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>";
                                foreach ($lb as $key => $v) {
                                    echo "<tr>
                                            <td><a href='".site_url("p/c_transaksi/detail_jual")."?i=".sha1($v->no_faktur)."'>$v->no_faktur</a></td>
                                            <td>";if($v->status_trans=="selesai"){ echo "<span class='badge badge-success' style='font-size:12px;'>".ucwords($v->status_trans)."</span>"; }else{} echo "</td>
                                            <td>";
                                                if($v->status_bayar=="no_paid" && $v->konf_bayar=="0"){
                                                    echo "Belum dibayar";
                                                }
                                                elseif($v->status_bayar=="no_paid" && $v->konf_bayar!="0"){
                                                    echo "Pembayaran sedang diproses";
                                                }
                                                else{
                                                    echo "Sudah dibayar";
                                                }
                                            echo "</td>
                                            <td class='text-right'>Rp. ".number_format($v->total_trf)."</td>
                                            <td>";
                                                if($v->konf_bayar=="0"){
                                                    echo "<a href='".site_url("p/c_transaksi/konf_bayar")."?i=".sha1($v->no_faktur)."' title='Konfirmasi pembayaran' class='btn btn-sm btn-success'>Konfirmasi Pembayaran</a>";
                                                }
                                                else{
                                                    echo "-";
                                                }
                                                echo "</td>
                                        </tr>";
                                }

                                echo "</tbody>
                            </table>";  

                    break;
                    case 'beli':                 

                        echo "
                            <h5>List Transaksi Pembelian</h5>
                            <table class='display small compact nowrap' id='tb1'>
                                <thead>
                                    <tr>
                                        <th>No. Faktur</th>
                                        <th>Status Transaksi</th>
                                        <th>Status Bayar</th>
                                        <th class='text-right'>Total Pembayaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>";
                                foreach ($lb as $key => $v) {
                                    echo "<tr>
                                            <td><a href='".site_url("p/c_transaksi/detail_beli")."?i=".sha1($v->no_faktur)."'>$v->no_faktur</a></td>
                                            <td>";if($v->status_trans=="kirim"){echo ucwords($v->status_trans)."<br>No. Resi: $v->no_resi";} else{echo ucwords($v->status_trans);} echo"</td>
                                            <td>";
                                                if($v->status_bayar=="no_paid" && $v->konf_bayar=="0"){
                                                    echo "Belum dibayar";
                                                }
                                                elseif($v->status_bayar=="no_paid" && $v->konf_bayar!="0"){
                                                    echo "Pembayaran sedang diproses";
                                                }
                                                else{
                                                    echo "Sudah dibayar";
                                                }
                                            echo "</td>
                                            <td class='text-right'>Rp. ".number_format($v->total_trf)."</td>
                                            <td>";
                                                if($v->konf_bayar=="0"){
                                                    echo "<a href='".site_url("p/c_transaksi/konf_bayar")."?i=".sha1($v->no_faktur)."' title='Konfirmasi pembayaran' class='btn btn-sm btn-success'>Konfirmasi Pembayaran</a>";
                                                }
                                                else{
                                                    if($v->status_trans=="kirim" and $v->status_bayar=="paid"){
                                                        echo "<a href='".site_url("p/c_transaksi/konf_terima")."?i=".sha1($v->no_faktur)."' title='Konfirmasi terima barang' class='btn btn-sm btn-success'>Konfirmasi Terima Barang</a>";
                                                    }
                                                    else{
                                                        echo "-";
                                                    }
                                                    
                                                }
                                                echo "</td>
                                        </tr>";
                                }

                                echo "</tbody>
                            </table>";  

                    break;
                    case "detail_beli":
                        echo "<h5>Detail Transaksi</h5>
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
                        </div>
                        <a href='".site_url("p/c_transaksi/beli")."' class='btn btn-success btn-sm'><i class=\"fas fa-arrow-left\"></i> Kembali</a> 
                        <a href='".site_url("p/cetak_faktur/".$_GET["i"])."' class='btn btn-info btn-sm' target='_blank'><i class=\"fas fa-print\"></i> Cetak</a>";
                    break;
                    case 'konf_bayar':

                        form_open_col("method='post' enctype='multipart/form-data' action='' ");
                            echo "<h5>Konfirmasi Pembayaran</h5>";
                            echo "<div class='form-row'>";
                                input_col("Bank Tujuan Transfer","type='text' name='bank_trf' value='$info->nama_rek $info->no_rek A.n $info->an' autocomplete='off' readonly ","","col-md-4");
                            echo "</div>";
                            echo "<div class='form-row'>";
                                input_col("Nama Bank Pengirim","type='text' name='bank_kirim' autocomplete='off' required","","col-md-4");
                            echo "</div>";
                            echo "<div class='form-row'>";
                                input_col("No. Rek","type='text' name='no_rek' autocomplete='off' required","","col-md-3");
                            echo "</div>";
                            echo "<div class='form-row'>";
                                input_col("Atas Nama","type='text' name='an' autocomplete='off' required","","col-md-4");
                            echo "</div>";
                            echo "<div class='form-row'>";
                                input_col("Bukti Transfer","type='file' name='file_trf' autocomplete='off' required","","col-md-3");
                            echo "</div>";
                            btn_submit_col_v2();
                        form_close();
                        if(isset($_POST["submit"])){
                            $bukti_trf=date('dmYHis').str_replace(" ", "", basename($_FILES["file_trf"]["name"]));
                  		    upload_image($_FILES["file_trf"]["tmp_name"], "upload/konf_bayar/$bukti_trf", 80);
                            $table="konf_bayar";
                            // $_POST["password"]!="" ? $pass=$_POST["password"] : $pass=$Akun->password;
                            $data=array(
                                        "bank_kirim"=>$_POST["bank_kirim"],
                                        "no_rek"=>$_POST["no_rek"],
                                        "an"=>$_POST["an"],
                                        "file_trf"=>$bukti_trf,
                                        "no_faktur"=>$info->no_faktur);
                            $save=$CI->add_data($table,$data);
                            
                            echo "<script>alert('Upload bukti transfer berhasil');window.location='".base_url("p/c_transaksi/beli")."';</script>";
                            
                            // redirect(current_url());
                        }
                    break;
                    case 'akun':
                        form_open_col("method='post' enctype='multipart/form-data' ");
                            echo "<h3>Data Akun</h3>";
                            echo "<div class='form-row'>";
                                input_col("Nama Member","type='text' name='nama_member' value='$Akun->nama_member' autocomplete='off' ","","col-md-4");
                            echo "</div>";
                            echo "<div class='form-row'>";
                                input_col("No. Hp","type='text' name='no_hp' value='$Akun->no_hp' autocomplete='off' ","","col-md-2");
                            echo "</div>";
                            echo "<div class='form-row'>";
                                input_col("Email","type='text' name='email' value='$Akun->email' autocomplete='off' ","","col-md-3");
                            echo "</div>";
                            echo "<div class='form-row'>";
                                input_col("Alamat","type='text' name='alamat' value='$Akun->alamat' autocomplete='off' ","","col-md-7");
                            echo "</div>";
                            echo "<div class='form-row'>";
                                input_col("Password Baru","type='text' name='password' value='' autocomplete='off' ","Silahkan isi jika akan mengganti password baru","col-md-7");
                            echo "</div>";
                            // echo "<div class='form-row'>";
                            //     input_col("Foto","type='file' name='bukti_trf' value='' autocomplete='off'","","col-md-5");
                            // echo "</div>";
                            btn_save_o_col();
                        form_close();
                        if(isset($_POST["save"])){
                            $table="member";
                            $_POST["password"]!="" ? $pass=$_POST["password"] : $pass=$Akun->password;
                            $data=array(
                                        "nama_member"=>$_POST["nama_member"],
                                        "no_hp"=>$_POST["no_hp"],
                                        "email"=>$_POST["email"],
                                        "alamat"=>$_POST["alamat"],
                                        "password"=>$pass);
                            $where=array("id_member"=>$id_member);
                            $CI->update_data($table,$data,$where);
                            redirect(current_url());
                        }
                    break;
                }
                
            ?>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#provinsi').change(function(){
			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
			var prov = $('#provinsi').val();

      		$.ajax({
            	type : 'GET',
           		url : '<?=site_url("ongkir/cek_kabupaten");?>',
            	data :  'prov_id=' + prov,
					success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
					$("#kabupaten").html(data);
				}
          	});
		});
    });
    
</script>
    <script>
        function cek_status(){
            var status_trans=$("select[name='status_trans']").val();
            // alert(status_trans);
            if(status_trans=="kirim"){
                // alert(status_trans);
                $("input[name='no_resi']").attr("required","required");
            }
            else{
                //$("#no_resi").removeAttr('required');​​​​​
                document.querySelector('#no_resi').required = false;
            }   
        }
    </script>