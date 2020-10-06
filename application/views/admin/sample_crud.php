<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><?=$title;?></li>
  </ol>
</nav>
<?php
$CI =& get_instance();
switch ($act) {
    case 'delete':
		$i=$this->db->get_where($table,array("id_asset_rig"=>$id))->row();
		unlink('assets/ecom/foto_asset/'.$i->foto);
		$this->db->delete($table, array('id_asset_rig' => $id));
		redirect("p/aset_rig","refresh");
	break;
    case 'edit':
        form_open_col("method='post' enctype='multipart/form-data' ");
            echo "<h5>Edit Data</h5>";
            echo "<div class='form-row'>";
                $arrP=array(""=>"-- select --");
                foreach ($raw_kat as $key => $v) {
                    $arrP[$v->id_kategori_rig_asset]="$v->nama_rig - $v->nama_kategori";
                }
                select_col("Kategori Rig Asset","name='id_kat' required",$arrP,"$e->id_kategori_rig_asset","col-md-3");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Nama Asset","type='text' name='nama_asset' value='$e->nama_asset' autocomplete='off' required","","col-md-3");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Brand","type='text' name='brand' value='$e->brand' autocomplete='off' required","","col-md-3");
                input_col("Model","type='text' name='model' value='$e->model' autocomplete='off' required","","col-md-3");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("PN / SN","type='text' name='pn_sn' value='$e->pn_sn' autocomplete='off' required","","col-md-3");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Qty","type='text' name='qty' value='$e->qty' autocomplete='off' required","","col-md-2");
                input_col("Unit","type='text' name='unit' value='$e->unit' autocomplete='off' required","","col-md-4");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Lokasi","type='text' name='lokasi' value='$e->lokasi' autocomplete='off' required","","col-md-3");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Kondisi","type='text' name='kondisi' value='$e->kondisi' autocomplete='off'","","col-md-3");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Perkiraan Harga / Nilai","type='text' name='harga' value='$e->harga' autocomplete='off'","","col-md-3");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Keterangan","type='text' name='keterangan' value='$e->keterangan' autocomplete='off'","","col-md-6");
            echo "</div>";
            if($e->foto){
                echo "<div class='form-row'>";
                    image_form_col("Foto Sekarang",base_url('assets/ecom/foto_asset/'.$e->foto),"col-md-3");
                echo "</div>";
            }
            else{}

            echo "<div class='form-row'>";
                input_col("Ganti Foto (optional)","type='file' name='foto' value='' autocomplete='off'","","col-md-5");
            echo "</div>";
            btn_save_col();
        form_close();

        if(isset($_POST["save"])){
            $file_foto=$_FILES["foto"]["name"];
            
            $foto=date('dmYHis').str_replace(" ", "", basename($_FILES["foto"]["name"]));
            
            if($file_foto){
                $foto=$foto;
                unlink('assets/ecom/foto_asset/'.$e->foto); 
                upload_image($_FILES["foto"]["tmp_name"], "assets/ecom/foto_asset/$foto", 80);
            }
            else{
                $foto=$e->foto;
            }
            $data=array(
                        "id_kategori_rig_asset"=>$_POST["id_kat"],
                        "nama_asset"=>$_POST["nama_asset"],
                        "brand"=>$_POST["brand"],
                        "model"=>$_POST["model"],
                        "pn_sn"=>$_POST["pn_sn"],
                        "qty"=>$_POST["qty"],
                        "unit"=>$_POST["unit"],
                        "lokasi"=>$_POST["lokasi"],
                        "kondisi"=>$_POST["kondisi"],
                        "harga"=>$_POST["harga"],
                        "keterangan"=>$_POST["keterangan"],
                        "foto"=>$foto);
            $where=array("id_asset_rig"=>$id);
            $CI->update_data($table,$data,$where);
            redirect("p/aset_rig","refresh");
        }
    break;
    case 'add':
        form_open_col("method='post' enctype='multipart/form-data' ");
            echo "<h5>New Data</h5>";
            echo "<div class='form-row'>";
                $arrP=array(""=>"-- select --");
                foreach ($raw_kat as $key => $v) {
                    $arrP[$v->id_kategori_rig_asset]="$v->nama_rig - $v->nama_kategori";
                }
                select_col("Kategori Rig Asset","name='id_kat' required",$arrP,"","col-md-3");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Nama Asset","type='text' name='nama_asset' value='' autocomplete='off' required","","col-md-3");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Brand","type='text' name='brand' value='' autocomplete='off' required","","col-md-3");
                input_col("Model","type='text' name='model' value='' autocomplete='off' required","","col-md-3");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("PN / SN","type='text' name='pn_sn' value='' autocomplete='off' required","","col-md-3");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Qty","type='text' name='qty' value='' autocomplete='off' required","","col-md-2");
                input_col("Unit","type='text' name='unit' value='' autocomplete='off' required","","col-md-4");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Lokasi","type='text' name='lokasi' value='' autocomplete='off' required","","col-md-3");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Kondisi","type='text' name='kondisi' value='' autocomplete='off'","","col-md-3");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Perkiraan Harga / Nilai","type='text' name='harga' value='' autocomplete='off'","","col-md-3");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Keterangan","type='text' name='keterangan' value='' autocomplete='off'","","col-md-6");
            echo "</div>";
            

            echo "<div class='form-row'>";
                input_col("Foto","type='file' name='foto' value='' autocomplete='off'","","col-md-5");
            echo "</div>";
            btn_save_col();
        form_close();

        if(isset($_POST["save"])){
            $foto=date('dmYHis').str_replace(" ", "", basename($_FILES["foto"]["name"]));
            upload_image($_FILES["foto"]["tmp_name"], "assets/ecom/foto_asset/$foto", 80);
                  	
            $data=array(
                        "id_kategori_rig_asset"=>$_POST["id_kat"],
                        "nama_asset"=>$_POST["nama_asset"],
                        "brand"=>$_POST["brand"],
                        "model"=>$_POST["model"],
                        "pn_sn"=>$_POST["pn_sn"],
                        "qty"=>$_POST["qty"],
                        "unit"=>$_POST["unit"],
                        "lokasi"=>$_POST["lokasi"],
                        "kondisi"=>$_POST["kondisi"],
                        "harga"=>$_POST["harga"],
                        "keterangan"=>$_POST["keterangan"],
                        "foto"=>$foto);
            $CI->add_data($table,$data);
            redirect("p/aset_rig","refresh");
            }
    break;
    
    default:
?>
        <form class="form-inline" method="post" action="">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">RIG</label>
            <select class=" my-1 mr-sm-2 form-control form-control-sm" name="rig" id="inlineFormCustomSelectPref" required>
                    <option value="">-- pilih --</option>
                <?php
                    
                    foreach ($raw_rig as $key => $vRig) {
                        if($_POST["rig"]==$vRig->id_rig){
                            echo "<option value='$vRig->id_rig' selected>$vRig->nama_rig</option>";
                        }
                        else{
                            echo "<option value='$vRig->id_rig'>$vRig->nama_rig</option>";
                        }
                        
                    }
                ?>
            </select>
                    

            <button type="submit" class="btn btn-primary my-1 btn-sm">Submit</button>
        </form>
        <br>
        <h5><?=$h_table;?></h5>
        <a href="<?=current_url()."/add";?>" class="btn btn-success btn-sm">New Data</a><br><br>
        <div class="table-responsive small">
            <table id="std" class="display strip compact nowrap">
                <thead>
                    <tr>
                        <th>Rig</th>
                        <th>Kategori</th>
                        <th>Nama Asset</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>PN / SN</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Lokasi</th>
                        <th>Kondisi</th>
                        <th>Perkiraan Harga / Nilai</th>
                        <th>Keterangan</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($raw_aset as $key => $v) {
                            $tot[]=$v->total;
                            echo "<tr>
                                        <td>$v->nama_rig</td>
                                        <td>$v->nama_kategori</td>
                                        <td>$v->nama_asset</td>
                                        <td>$v->brand</td>
                                        <td>$v->model</td>
                                        <td>$v->pn_sn</td>
                                        <td>$v->qty</td>
                                        <td>$v->unit</td>
                                        <td>$v->lokasi</td>
                                        <td>$v->kondisi</td>
                                        <td>Rp. ".number_format($v->harga,0)."</td>
                                        <td>$v->keterangan</td>
                                        <td>";
                                            if($v->foto){
                                                echo "<a href='".base_url("assets/ecom/foto_asset/".$v->foto)."' target='_blank'><img src='".base_url("assets/ecom/foto_asset/".$v->foto)."' height='80'></a>";
                                            }
                                            else{}
                                            echo "</td>
                                        <td>
                                            <a href='".current_url()."/edit/$v->id_asset_rig'>Edit</a>|
                                            <a href='".current_url()."/delete/$v->id_asset_rig' onclick=\"return confirm('Hapus ?');\">Hapus</a>
                                        </td>
                                    </tr>";
                        }
                    ?>
                    <!-- <tr style="font-weight:bold;">
                        <td colspan="11">TOTAL</td>
                        <td class="text-right">Rp.<?= number_format(array_sum($tot),0);?></td>
                    </tr> -->
                </tbody>
            </table>
            <br>
            
        </div>
<?php
        # code...
        break;
}

?>  