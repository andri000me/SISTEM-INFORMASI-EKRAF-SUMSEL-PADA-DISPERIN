<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><?=$title;?></li>
  </ol>
</nav>
<?php
$CI =& get_instance();
switch ($act) {
    case 'delete':
		$this->db->delete($table, array('id_rek_bayar' => $id));
		redirect("admin/mrek","refresh");
	break;
    case 'edit':
        form_open_col("method='post' enctype='multipart/form-data' ");
            echo "<h5>Edit Data</h5>";
            echo "<div class='form-row'>";
                input_col("Nama Bank","type='text' name='nama_rek' value='$e->nama_rek' autocomplete='off' required","","col-md-3");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("No. Rekening","type='text' name='no_rek' value='$e->no_rek' autocomplete='off' required","","col-md-2");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Atas Nama","type='text' name='an' value='$e->an' autocomplete='off' required","","col-md-3");
            echo "</div>";
            btn_save_col();
        form_close();

        if(isset($_POST["save"])){            
            
            $data=array(
                        "nama_rek"=>$_POST["nama_rek"],
                        "no_rek"=>$_POST["no_rek"],
                        "an"=>$_POST["an"]);
            $where=array("id_rek_bayar"=>$id);
            $CI->update_data($table,$data,$where);
            redirect("admin/mrek","refresh");
        }
    break;
    case 'add':
        form_open_col("method='post' enctype='multipart/form-data' ");
            echo "<h5>Tambah Kategori</h5>";
            echo "<div class='form-row'>";
                input_col("Nama Bank","type='text' name='nama_rek'  autocomplete='off' required","","col-md-3");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("No. Rekening","type='text' name='no_rek'  autocomplete='off' required","","col-md-2");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Atas Nama","type='text' name='an'  autocomplete='off' required","","col-md-3");
            echo "</div>";

            btn_save_col();
        form_close();

        if(isset($_POST["save"])){                  	
            $data=array(
                "nama_rek"=>$_POST["nama_rek"],
                "no_rek"=>$_POST["no_rek"],
                "an"=>$_POST["an"]);
            $CI->add_data($table,$data);
            redirect("admin/mrek","refresh");
            }
    break;
    
    default:
?>
        <a href="<?=current_url()."/add";?>" class="btn btn-success btn-sm"><i class="far fa-plus-square"></i> Tambah Data</a><br><br>
        <div class="table-responsive small">
            <table id="tb1" class="display strip compact nowrap">
                <thead>
                    <tr>
                        <th>Nama Bank</th>
                        <th>No. Rekening</th>
                        <th>Atas Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($d as $key => $v) {
                            echo "<tr>
                                        <td>$v->nama_rek</td>
                                        <td>$v->no_rek</td>
                                        <td>$v->an</td>
                                        <td>
                                            <a href='".current_url()."/edit/$v->id_rek_bayar'><span class='badge badge-info'><i class='fas fa-edit'></i> Edit</span></a> 
                                            <a href='".current_url()."/delete/$v->id_rek_bayar' onclick=\"return confirm('Hapus ?');\"><span class='badge badge-danger'> <i class='fas fa-trash-alt'></i> Hapus</span></a>
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