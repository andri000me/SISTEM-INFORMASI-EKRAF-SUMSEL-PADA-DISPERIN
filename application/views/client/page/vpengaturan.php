<?php $CI =& get_instance();?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=site_url("p");?>">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Pengaturan</li>
        </ol>
      </nav>
      <h4 class="mb-3"><strong>Pengaturan</strong></h4>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link <?php if($pL=="akun"){ echo "active";}else{};?>" href="<?=site_url("p/c_setting/akun");?>">Akun</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($pL=="alamat"){ echo "active";}else{};?>" href="<?=site_url("p/c_setting/alamat");?>">Alamat</a>
            </li>
        </ul>     
    </div>
  </div>
    <div class="row">
        <div class="col-md-12 mt-3 mb-3">
            <?php
                switch ($pL) {
                    case 'alamat':
                    form_open_col("method='post' enctype='multipart/form-data' ");
                            echo "<h3>Alamat Pengiriman</h3>";
                            echo "<div class='form-row'>";
                                input_col("Nama Alamat","type='text' name='nama_alamat' value='' autocomplete='off' ","","col-md-4");
                            echo "</div>";
                            //Get Data Provinsi
                                $curl = curl_init();

                                curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "GET",
                                CURLOPT_HTTPHEADER => array(
                                "key:268eb35fc82635dbe5898e64db024091"
                                ),
                                ));

                                $response = curl_exec($curl);
                                $err = curl_error($curl);


                                echo "<div class='form-row'>
                                    <div class='mb-3 col-md-4'>
                                        <label>Provinsi</label>
                                        <select class='form-control form-control-sm' name='provinsi' id='provinsi' required>";
                                            echo "<option value=''>Pilih Provinsi</option>";
                                            $data = json_decode($response, true);
                                            for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
                                                echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
                                            }
                                        echo "</select>
                                    </div>
                                </div>";
                                echo "<div class='form-row'>
                                    <div class='mb-3 col-md-4'>
                                        <label for='kabupaten'>Kota/Kabupaten</label><br>
                                        <select class='form-control form-control-sm' id='kabupaten' name='kabupaten' required>
                                            <option value=''>Pilih Kabupaten</option>
                                        </select>
                                    </div>
                                </div>";
                                echo "<div class='form-row'>";
                                    input_col("Alamat Detail","type='text' name='alamat' value='' autocomplete='off' ","","col-md-8");
                                echo "</div>";
                            btn_save_o_col();
                        form_close();
                        
                        if(isset($_POST["save"])){
                            $table="alamat_kirim";
                            $data=array(
                                        "nama_alamat"=>$_POST["nama_alamat"],
                                        "alamat"=>$_POST["alamat"],
                                        "kota_id"=>$_POST["kabupaten"],
                                        "id_member"=>$id_member
                            );
                            $CI->add_data($table,$data);
                            redirect(current_url());
                        }

                        echo "
                            <h5 class='mt-5'>List Alamat</h5>
                            <div class='small'>
                                <table class='display compact nowrap' id='tb1'>
                                    <thead>
                                        <tr>
                                            <th>Nama Alamat</th>
                                            <th>Alamat Detail</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                                    foreach ($LA as $key => $v) {
                                        echo "<tr>
                                                <td>$v->nama_alamat</td>
                                                <td>$v->alamat</td>
                                                <td><a href='".site_url("p/c_setting/alamat")."?i=".sha1($v->id_alamat_kirim)."' title='Hapus Alamat' onclick=\"return confirm('Hapus alamat ini?');\"><i class='far fa-trash-alt'></i></a></td>
                                            </tr>";
                                    }

                                    echo "</tbody>
                                </table>
                            </div>";  
                            if(isset($_GET["i"])){
                                $this->db->delete("alamat_kirim", array('sha1(id_alamat_kirim)' => $_GET["i"]));
                                redirect("p/c_setting/alamat","refresh");
                            }
                            else{}

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
                            if($Akun->foto_member){
                                echo "<div class='form-row'>";
                                    image_form_col("Foto sekarang",site_url("assets/ecom/member/img/".$Akun->foto_member),"col-md-4");
                                echo "</div>";
                            }
                            else{}
                            echo "<div class='form-row'>";
                                input_col("Foto","type='file' name='foto_member' autocomplete='off' required","","col-md-3");
                            echo "</div>";
                            btn_save_o_col();
                        form_close();
                        if(isset($_POST["save"])){
                            $nfoto=$_FILES["foto_member"]["name"];
                            if($nfoto){
                                $foto=date('dmHis').str_replace(" ", "", basename($_FILES["foto_member"]["name"]));
                  		        upload_image($_FILES["foto_member"]["tmp_name"], "assets/ecom/member/img/$foto", 80);
                            }
                            else{
                                $foto=$Akun->foto_member;
                            }
                            $table="member";
                            $_POST["password"]!="" ? $pass=$_POST["password"] : $pass=$Akun->password;
                            $data=array(
                                        "nama_member"=>$_POST["nama_member"],
                                        "no_hp"=>$_POST["no_hp"],
                                        "email"=>$_POST["email"],
                                        "alamat"=>$_POST["alamat"],
                                        "foto_member"=>$foto,
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