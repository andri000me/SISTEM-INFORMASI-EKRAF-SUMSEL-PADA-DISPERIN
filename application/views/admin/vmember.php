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
    case 'edit':
        form_open_col("method='post' enctype='multipart/form-data' ");
            echo "<h5>Edit Data</h5>";
            echo "<div class='form-row'>";
                input_col("Nama Member","type='text' name='nama_member' value='$e->nama_member' autocomplete='off' required","","col-md-3");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("No. HP","type='text' name='no_hp' value='$e->no_hp' autocomplete='off' required","","col-md-2");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("EMail","type='email' name='email' value='$e->email' autocomplete='off' required","","col-md-3");
            echo "</div>";
            echo "<div class='form-row'>";
                input_col("Alamat","type='text' name='alamat' value='$e->alamat' autocomplete='off' required","","col-md-5");
            echo "</div>";
            btn_save_col();
        form_close();

        if(isset($_POST["save"])){            
            
            $data=array(
                        "nama_member"=>$_POST["nama_member"],
                        "no_hp"=>$_POST["no_hp"],
                        "email"=>$_POST["email"],
                        "alamat"=>$_POST["alamat"]);
            $where=array("id_member"=>$id);
            $CI->update_data($table,$data,$where);
            redirect("admin/mmember","refresh");
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
            redirect("admin/mmember","refresh");
            }
    break;
    
    default:
?>
        <!-- <a href="<?=current_url()."/add";?>" class="btn btn-success btn-sm"><i class="far fa-plus-square"></i> Tambah Data</a><br><br> -->
        <div class="table-responsive small">
            <table id="tb1" class="display strip compact nowrap">
                <thead>
                    <tr>
                        <th>Nama Member</th>
                        <th>No. HP</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Foto Member</th>
                        <th>Tgl. Join</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($d as $key => $v) {
                            echo "<tr>
                                        <td>$v->nama_member</td>
                                        <td>$v->no_hp</td>
                                        <td>$v->email</td>
                                        <td>$v->alamat</td>
                                        <td>";
                                            if($v->foto_member){
                                                echo "<img src='".base_url("assets/ecom/member/img/")."$v->foto_member' class='img-fluid' style='max-height:70px;'>";
                                            }
                                            else{ echo "-";} echo "</td>
                                        <td>$v->tgl_join</td>
                                        <td>
                                            <a href='".current_url()."/edit/$v->id_member'><span class='badge badge-info'><i class='fas fa-edit'></i> Edit</span></a> 
                                            <a href='".current_url()."/delete/$v->id_member' onclick=\"return confirm('Hapus ?');\"><span class='badge badge-danger'> <i class='fas fa-trash-alt'></i> Hapus</span></a>
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