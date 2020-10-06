<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><?=$title;?></li>
  </ol>
</nav>
<?php
$CI =& get_instance();
switch ($act) {
    case 'delete':
        $i=$this->db->get_where($table,array("id_slide"=>$id))->row();
		unlink("assets/ecom/img/slide/".$i->foto);
		$this->db->delete($table, array('id_slide' => $id));
		redirect("admin/mslide","refresh");
	break;
    case 'edit':
        form_open_col("method='post' enctype='multipart/form-data' ");
            echo "<div class='form-row'>";
                image_form_col("Foto sekarang",site_url("assets/ecom/img/slide/".$e->foto),"col-md-4");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Ganti Foto Slide (Resolusi 886x295px)","type='file' name='foto' autocomplete='off'","","col-md-3");
            echo "</div>";
            echo "<div class='form-row'>";
                $arrStatus=array("0"=>"Tidak Aktif","1"=>"Aktif");
                select_col("Status","name='status' required",$arrStatus,$e->status,"col-md-2");
            echo "</div>";
            btn_save_col();
        form_close();

        if(isset($_POST["save"])){            
            $nfoto=$_FILES["foto"]["name"];
            if($nfoto){
		        unlink("assets/ecom/img/slide/".$e->foto);
                $foto=date('dmHis').str_replace(" ", "", basename($_FILES["foto"]["name"]));
                upload_image($_FILES["foto"]["tmp_name"], "assets/ecom/img/slide/$foto", 80);             
            }
            else{
                $foto=$e->foto;
            }
            $data=array(
                "foto"=>$foto,
                "status"=>$_POST["status"]);
            $where=array("id_slide"=>$id);
            $CI->update_data($table,$data,$where);
            redirect("admin/mslide","refresh");
        }
    break;
    case 'add':
        form_open_col("method='post' enctype='multipart/form-data' ");
            echo "<h5>Tambah Slide</h5>";
            echo "<div class='form-row'>";
                input_col("Foto Slide (Resolusi 886x295px)","type='file' name='foto' autocomplete='off' required","","col-md-3");
            echo "</div>";
            echo "<div class='form-row'>";
                $arrStatus=array("0"=>"Tidak Aktif","1"=>"Aktif");
                select_col("Status","name='status' required",$arrStatus,"","col-md-2");
            echo "</div>";

            btn_save_col();
        form_close();

        if(isset($_POST["save"])){    
            $foto=date('dmHis').str_replace(" ", "", basename($_FILES["foto"]["name"]));
            upload_image($_FILES["foto"]["tmp_name"], "assets/ecom/img/slide/$foto", 80);              	
            $data=array(
                "foto"=>$foto,
                "status"=>$_POST["status"]);
            $CI->add_data($table,$data);
            redirect("admin/mslide","refresh");
            }
    break;
    
    default:
?>
        <a href="<?=current_url()."/add";?>" class="btn btn-success btn-sm"><i class="far fa-plus-square"></i> Tambah Data</a><br><br>
        <div class="table-responsive small">
            <table id="tb1" class="display strip compact nowrap">
                <thead>
                    <tr>
                        <th>Foto Slide</th>
                        <th>Status</th> 
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($d as $key => $v) {
                            echo "<tr>
                                        <td><img src='".base_url('assets/ecom/img/slide/'.$v->foto)."' class='img-fluid' style='max-height:140px;'></td>
                                        <td>";
                                            if($v->status==1){echo "Aktif";} else{ echo "Tidak Aktif";} echo "</td>
                                        <td>
                                            <a href='".current_url()."/edit/$v->id_slide'><span class='badge badge-info'><i class='fas fa-edit'></i> Edit</span></a> 
                                            <a href='".current_url()."/delete/$v->id_slide' onclick=\"return confirm('Hapus ?');\"><span class='badge badge-danger'> <i class='fas fa-trash-alt'></i> Hapus</span></a>
                                        </td>
                                    </tr>";
                        }
                    ?>
                </tbody>
            </table>
            <br>
            
        </div>
<?php
        # code...
        break;
}

?>  