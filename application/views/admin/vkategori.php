<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><?=$title;?></li>
  </ol>
</nav>
<?php
$CI =& get_instance();
switch ($act) {
    case 'delete':
		$this->db->delete($table, array('id_kategori' => $id));
		redirect("admin/mkategori","refresh");
	break;
    case 'edit':
        form_open_col("method='post' enctype='multipart/form-data' ");
            echo "<h5>Edit Data</h5>";
            echo "<div class='form-row'>";
                input_col("Nama Kategori","type='text' name='nama_kategori' value='$e->nama_kategori' autocomplete='off' required","","col-md-3");
            echo "</div>";
            btn_save_col();
        form_close();

        if(isset($_POST["save"])){            
            
            $data=array(
                        "nama_kategori"=>$_POST["nama_kategori"]);
            $where=array("id_kategori"=>$id);
            $CI->update_data($table,$data,$where);
            redirect("admin/mkategori","refresh");
        }
    break;
    case 'add':
        form_open_col("method='post' enctype='multipart/form-data' ");
            echo "<h5>Tambah Kategori</h5>";
            echo "<div class='form-row'>";
                input_col("Nama Kategori","type='text' name='nama_kategori' value='' autocomplete='off' required","","col-md-3");
            echo "</div>";
            btn_save_col();
        form_close();

        if(isset($_POST["save"])){
                  	
            $data=array(
                        "nama_kategori"=>$_POST["nama_kategori"],);
            $CI->add_data($table,$data);
            redirect("admin/mkategori","refresh");
            }
    break;
    
    default:
?>
        <a href="<?=current_url()."/add";?>" class="btn btn-success btn-sm"><i class="far fa-plus-square"></i> Tambah Data</a><br><br>
        <div class="table-responsive small">
            <table id="tb1" class="display strip compact nowrap">
                <thead>
                    <tr>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($d as $key => $v) {
                            echo "<tr>
                                        <td>$v->nama_kategori</td>
                                        <td>
                                            <a href='".current_url()."/edit/$v->id_kategori'><span class='badge badge-info'><i class='fas fa-edit'></i> Edit</span></a> 
                                            <a href='".current_url()."/delete/$v->id_kategori' onclick=\"return confirm('Hapus ?');\"><span class='badge badge-danger'> <i class='fas fa-trash-alt'></i> Hapus</span></a>
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