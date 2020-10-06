<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><?=$title;?></li>
  </ol>
</nav>
<?php
$CI =& get_instance();
switch ($act) {
    case 'delete':
        $i=$this->db->get_where($table,array("id_member"=>$id))->row();
		unlink("assets/ecom/member/img/".$i->foto_member);
		$this->db->delete($table, array('id_member' => $id));
		redirect("admin/mmember","refresh");
	break;
    case "edit":
                    
        form_open_col("method='post' enctype='multipart/form-data' ");
            echo "<h5>Edit Produk</h5>";
            echo "<div class='form-row'>";
                foreach ($kat as $key => $vkat) {
                    $katArr[$vkat->id_kategori]=$vkat->nama_kategori;
                }
                select_col("Kategori","name='id_kategori'",$katArr,$dp->id_kategori,"col-md-4");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Nama Produk","type='text' name='nama_produk' value='$dp->nama_produk' autocomplete='off' required","","col-md-4");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Berat (gram)","type='number' name='berat' value='$dp->berat' autocomplete='off' required","","col-md-2");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Stok","type='number' name='stok' value='$dp->stok' autocomplete='off' required","","col-md-2");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Harga","type='number' name='harga' value='$dp->harga' autocomplete='off' required","","col-md-3");
            echo "</div>";
            echo "<div class='form-row'>";
                text_col("Deskripsi","name='deskripsi' required",$dp->deskripsi,"","col-md-5");
            echo "</div>";
            echo "<div class='form-row'>";
                image_form_col("Foto sekarang",site_url("produk/img/".$dp->foto),"col-md-4");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Ganti Foto Produk (optional)","type='file' name='foto' autocomplete='off'","","col-md-3");
            echo "</div>";

            echo "<div class='form-row'>";
                $arrStatus=array("1"=>"Tidak Aktif","0"=>"Aktif");
                
                select_col("Status","name='is_del'",$arrStatus,$dp->is_del,"col-md-2");
            echo "</div>";
            btn_save_col();
        form_close();
        if(isset($_POST["save"])){
            $nfoto=$_FILES["foto"]["name"];
            if($nfoto){
                $foto=date('dmYHis').str_replace(" ", "", basename($_FILES["foto"]["name"]));
                upload_image($_FILES["foto"]["tmp_name"], "produk/img/$foto", 80);
            }
            else{
                $foto=$dp->foto;
            }
            
            $data=array(
                        "id_kategori"=>$_POST["id_kategori"],
                        "nama_produk"=>$_POST["nama_produk"],
                        "berat"=>$_POST["berat"],
                        "stok"=>$_POST["stok"],
                        "harga"=>$_POST["harga"],
                        "deskripsi"=>$_POST["deskripsi"],
                        "foto"=>$foto,
                        "is_del"=>$_POST["is_del"]);
            
            $where=array("id_produk"=>$id);
            $CI->update_data($table,$data,$where);
            
            echo "<script>alert('Produk berhasil diupdate');window.location='".base_url("admin/mproduk")."';</script>";
            
            // redirect(current_url());
        }
        echo "<br><br>";
    break;
    case "detail_jual":
        echo "<h5>Detail Transaksi</h5>
        <div class='card mt-3'>
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
                    </tbody>
                </table>
            </div>
        </div>";
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
        echo "<br>
        <h5>Daftar Produk</h5>
        <div class='card mt-3 mb-3'>
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
        <!--<a href='".site_url("admin/dtransaksi")."' class='btn btn-success btn-sm'><i class=\"fas fa-arrow-left\"></i> Kembali</a>-->
        <button href='#' onclick=\"window.history.back()\" class='btn btn-success btn-sm'><i class=\"fas fa-arrow-left\"></i> Kembali</button>";
    break;
    default:
        echo "
            <h5 class='mb-3'>Daftar Transaksi</h5>
            <div class='card'>
                <div class='card-body'>
                    <table class='display small compact nowrap mt-4' id='tb1'>
                        <thead>
                            <tr>
                                <th>No. Faktur</th>
                                <th>Penjual</th>
                                <th>Pembeli</th>
                                <th>Status Transaksi</th>
                                <th>Status Bayar</th>
                                <th class='text-right'>Total Belanja</th>
                                <th class='text-right'>Ongkos Kirim</th>
                                <th class='text-right'>Total Bayar</th>
                            </tr>
                        </thead>
                        <tbody>";
                        foreach ($d as $key => $v) {
                            echo "<tr>
                                    <td><a href='".site_url("admin/dtransaksi/detail_jual")."?i=".sha1($v->no_faktur)."'>$v->no_faktur</a></td>
                                    <td>$v->nama_lapak</td>
                                    <td>$v->nama_member</td>
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
                                    <td class='text-right'>Rp. ".number_format($v->tot_belanja)."</td>
                                    <td class='text-right'>Rp. ".number_format($v->ongkir)."</td>
                                    <td class='text-right'>Rp. ".number_format($v->total_trf)."</td>
                                </tr>";
                        }

                        echo "</tbody>
                    </table>
                </div>
            </div>";  
    break;
}

?>  