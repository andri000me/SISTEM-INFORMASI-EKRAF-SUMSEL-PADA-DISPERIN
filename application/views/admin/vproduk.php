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
    
    default:
            echo "<h5 class='mb-3'>List Produk</h5>";
            echo "<!--<a href='".site_url("p/c_toko/add")."' class='btn btn-sm btn-success'><i class='far fa-plus-square'></i> Tambah Produk</a>-->
            <div class='small'>
                <table id='tb1' class='table table-sm table-striped mt-2'>
                    <thead>
                        <tr>
                            <th>Kategori Produk</th>
                            <th>Nama Produk</th>
                            <th class='text-center'>Berat Satuan (gram)</th>
                            <th class='text-right'>Harga</th>
                            <th class='text-center'>Stok</th>
                            <th class='text-center'>Terjual</th>
                            <th class='text-center'>Lapak</th>
                            <th class='text-center'>Status</th>
                            <th class='text-center'>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>";
                        foreach ($d as $key => $vLP) {
                            echo "<tr>
                                        <td>$vLP->nama_kategori</td>
                                        <td>
                                            <img class='pic-1' src='".base_url("produk/img/".$vLP->foto)."' style='height:50px;'><br>
                                            $vLP->nama_produk
                                        </td>
                                        <td class='text-center'>".number_format($vLP->berat,0)."</td>
                                        <td class='text-right'>Rp. ".number_format($vLP->harga,0)."</td>
                                        <td class='text-center'>$vLP->stok</td>
                                        <td class='text-center'>$vLP->terjual</td>
                                        <td class='text-center'>$vLP->nama_lapak</td>
                                        <td class='text-center'>";
                                            if($vLP->is_del==0){
                                                echo "<span class=\"badge badge-pill badge-success\">Aktif</span>";
                                            }
                                            else{
                                                echo "<span class=\"badge badge-pill badge-danger\">Tidak Aktif</span>";
                                            }
                                        echo "</td>
                                        <td class='text-center'>
                                            <a href='".site_url("admin/mproduk/edit/".$vLP->id_produk)."' class='badge badge-info'><i class='far fa-edit'></i> Edit</a> 
                                            <!--<a href='".site_url("admin/mproduk/del_produk/".$vLP->id_produk)."' class='badge badge-danger' onclick=\"return confirm('Hapus produk ini?')\"><i class='far fa-trash-alt'></i> Hapus</a>-->
                                        </td>
                                    </tr>";
                        }
                    echo "</tbody>
                </table>
            </div>";
    break;
}

?>  