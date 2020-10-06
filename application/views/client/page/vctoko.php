<?php $CI =& get_instance();?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=site_url("p");?>">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Toko Saya</li>
        </ol>
      </nav>
      <h4 class="mb-3"><strong>Toko Saya</strong></h4>
        <ul class="nav nav-tabs">
            <?php
                if($pL=="add" || $pL=="del_produk" || $pL=="edit"){}
                else{
            ?>
                <li class="nav-item">
                    <a class="nav-link <?php if($pL=="info"){ echo "active";}else{};?>" href="<?=site_url("p/c_toko/info");?>">Info Toko</a>
                </li>
                <?php
                    if($ST===0){}
                    else{
                ?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($pL=="produk"){ echo "active";}else{};?>" href="<?=site_url("p/c_toko/produk");?>">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($pL=="saldo_jual"){ echo "active";}else{};?>" href="<?=site_url("p/c_toko/saldo_jual");?>">Hasil Penjualan</a>
                        </li>
                <?php
                    }
                ?>
            <?php
                }
            ?>
        </ul>     
    </div>
  </div>
    <div class="row">
        <div class="col-md-12 mt-3 mb-3">
            <?php
                switch ($pL) {
                    case 'saldo_jual':
                        echo "<h5 class='mb-3'>Hasil Penjualan</h5>";
                        echo "<div class='small'>
                                <table class='table table-sm table-striped mt-2'>
                                    <thead>
                                        <tr>
                                            <th class='text-center'>Nomor Faktur</th>
                                            <th class='text-center'>Tanggal Transaksi</th>
                                            <th class='text-right'>Jumlah</th>
                                            <th class='text-center'>Status Pencairan</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                                        foreach ($data as $key => $v) {
                                            $info=$this->db->get_where("pencairan",array("no_faktur"=>$v->no_faktur))->row();
                                            echo "<tr>
                                                        <td class='text-center'>$v->no_faktur</td>
                                                        <td class='text-center'>$v->tgl_transaksi</td>
                                                        <td class='text-right'>Rp. ".number_format($v->total_trf,0)."</td>
                                                        <td class='text-center'>";
                                                            // if($info->no_faktur==""){}
                                                            // else{
                                                                echo "<span class='badge badge-info'>$info->status</span>";
                                                            // }
                                                            echo"
                                                        </td>
                                                    </tr>";
                                        }
                                    echo "</tbody>
                                </table>
                            </div>";
                    break;
                    case 'produk':
                        echo "<h5 class='mb-3'>List Produk</h5>";
                        echo "<a href='".site_url("p/c_toko/add")."' class='btn btn-sm btn-success'><i class='far fa-plus-square'></i> Tambah Produk</a>
                            <div class='small'>
                                <table class='table table-sm table-striped mt-2'>
                                    <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th class='text-center'>Berat Satuan (gram)</th>
                                            <th class='text-right'>Harga</th>
                                            <th class='text-center'>Stok</th>
                                            <th class='text-center'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                                        foreach ($lp as $key => $vLP) {
                                            echo "<tr>
                                                        <td>
                                                            <img class='pic-1' src='".base_url("produk/img/".$vLP->foto)."' style='height:50px;'><br>
                                                            $vLP->nama_produk
                                                        </td>
                                                        <td class='text-center'>".number_format($vLP->berat,0)."</td>
                                                        <td class='text-right'>Rp. ".number_format($vLP->harga,0)."</td>
                                                        <td class='text-center'>$vLP->stok</td>
                                                        <td class='text-center'>
                                                            <a href='".site_url("p/c_toko/edit/".$vLP->id_produk)."' class='badge badge-info'><i class='far fa-edit'></i> Edit</a> 
                                                            <a href='".site_url("p/c_toko/del_produk/".$vLP->id_produk)."' class='badge badge-danger' onclick=\"return confirm('Hapus produk ini?')\"><i class='far fa-trash-alt'></i> Hapus</a>
                                                        </td>
                                                    </tr>";
                                        }
                                    echo "</tbody>
                                </table>
                            </small>";
                    break;
                    case "del_produk":
                            $table="produk";
                            $data=array("is_del"=>"1");
                            $where=array("id_produk"=>$id);
                            $CI->update_data($table,$data,$where);
                        echo "<script>alert('Produk berhasil dihapus.');window.location='".base_url("p/c_toko/produk")."';</script>";

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
                            
                            $table="produk";
                            $data=array(
                                        "id_kategori"=>$_POST["id_kategori"],
                                        "nama_produk"=>$_POST["nama_produk"],
                                        "berat"=>$_POST["berat"],
                                        "stok"=>$_POST["stok"],
                                        "harga"=>$_POST["harga"],
                                        "deskripsi"=>$_POST["deskripsi"],
                                        "foto"=>$foto);
                            
                            $where=array("id_produk"=>$id);
                            $CI->update_data($table,$data,$where);
                            
                            echo "<script>alert('Produk berhasil diupdate');window.location='".base_url("p/c_toko/produk")."';</script>";
                            
                            // redirect(current_url());
                        }
                        
                    break;
                    case "add":
                    
                        form_open_col("method='post' enctype='multipart/form-data' ");
                            echo "<h5>Tambah Produk</h5>";
                            echo "<div class='form-row'>";
                                foreach ($kat as $key => $vkat) {
                                    $katArr[$vkat->id_kategori]=$vkat->nama_kategori;
                                }
                                select_col("Kategori","name='id_kategori'",$katArr,"","col-md-4");
                            echo "</div>";
                            echo "<div class='form-row'>";
                                input_col("Nama Produk","type='text' name='nama_produk' autocomplete='off' required","","col-md-4");
                            echo "</div>";
                            echo "<div class='form-row'>";
                                input_col("Berat (gram)","type='number' name='berat' autocomplete='off' required","","col-md-2");
                            echo "</div>";
                            echo "<div class='form-row'>";
                                input_col("Stok","type='number' name='stok' autocomplete='off' required","","col-md-2");
                            echo "</div>";
                            echo "<div class='form-row'>";
                                input_col("Harga","type='number' name='harga' autocomplete='off' required","","col-md-3");
                            echo "</div>";
                            echo "<div class='form-row'>";
                                text_col("Deskripsi","name='deskripsi' required","","","col-md-5");
                            echo "</div>";
                            echo "<div class='form-row'>";
                                input_col("Foto Produk","type='file' name='foto' autocomplete='off' required","","col-md-3");
                            echo "</div>";
                            btn_save_col(); 
                        form_close();
                        if(isset($_POST["save"])){
                            $foto=date('dmYHis').str_replace(" ", "", basename($_FILES["foto"]["name"]));
                  		    upload_image($_FILES["foto"]["tmp_name"], "produk/img/$foto", 80);
                            $table="produk";
                            $IDL=$this->session->userdata("IDL");
                            // $_POST["password"]!="" ? $pass=$_POST["password"] : $pass=$Akun->password;
                            $data=array(
                                        "id_kategori"=>$_POST["id_kategori"],
                                        "nama_produk"=>$_POST["nama_produk"],
                                        "berat"=>$_POST["berat"],
                                        "stok"=>$_POST["stok"],
                                        "harga"=>$_POST["harga"],
                                        "deskripsi"=>$_POST["deskripsi"],
                                        "foto"=>$foto,
                                        "id_lapak"=>$IDL);
                            $save=$CI->add_data($table,$data);
                            
                            echo "<script>alert('Produk berhasil ditambahkan');window.location='".base_url("p/c_toko/produk")."';</script>";
                            
                            // redirect(current_url());
                        }
                    break;
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
                            </table>";  
                            if(isset($_GET["i"])){
                                $this->db->delete("alamat_kirim", array('sha1(id_alamat_kirim)' => $_GET["i"]));
                                redirect("p/c_setting/alamat","refresh");
                            }
                            else{}

                    break;
                    
                    case 'info':
                        if($ST===0){
                            echo "
                                <div class='alert alert-info' role='alert'>
                                    Saat ini Anda belum memili toko, silahkan isi form berikut untuk mulai berjualan.
                                </div>

                            ";
                            form_open_col("method='post' enctype='multipart/form-data' ");
                                echo "<h5>Info Toko</h5>";
                                echo "<div class='form-row'>";
                                    input_col("Nama Toko","type='text' name='nama_lapak' value='' autocomplete='off' required","","col-md-4");
                                echo "</div>";
                                $curl = curl_init();

                                    curl_setopt_array($curl, array(
                                    CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
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
                                        <div class='mb-3 col-md-3'>
                                            <label>Kota</label>
                                            <select class='form-control form-control-sm' name='kota_id' required>";
                                                echo "<option value=''>Pilih Kota</option>";
                                                $data = json_decode($response, true);
                                                for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
                                                    if($data['rajaongkir']['results'][$i]['city_id']==$info_toko->kota_id){
                                                        echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."' selected>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
                                                    }
                                                    else{
                                                        echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
                                                    }
                                                    
                                                }
                                            echo "</select>
                                        </div>
                                    </div>";
                                echo "<div class='form-row'>";
                                    input_col("Alamat Lengkap Toko","type='text' name='alamat_lapak' value='' autocomplete='off' required","","col-md-7");
                                echo "</div>";
                                echo "<h5>Info Bank</h5>";
                                echo "<div class='form-row'>";
                                    $arrBank=array("BNI"=>"BNI","MANDIRI"=>"MANDIRI","BRI"=>"BRI","BCA"=>"BCA");
                                    select_col("Nama Bank","name='nama_bank' required", $arrBank,"","col-md-3");
                                echo "</div>";
                                echo "<div class='form-row'>";
                                    input_col("No. Rekening","type='text' name='no_rek' value='' autocomplete='off' required","","col-md-7");
                                echo "</div>";
                                echo "<div class='form-row'>";
                                    input_col("Atas Nama","type='text' name='an' value='' autocomplete='off' required","b>* Pastikan data bank diisi dengan benar. Semua hasil penjualan akan di transfer ke rekening tersebut.</b>","col-md-7");
                                echo "</div>";
                                btn_save_o_col();
                            form_close();
                            
                            if(isset($_POST["save"])){
                                $table="lapak";
                                // $_POST["password"]!="" ? $pass=$_POST["password"] : $pass=$Akun->password;
                                $data=array("kota_id"=>$_POST["kota_id"],
                                            "nama_lapak"=>$_POST["nama_lapak"],
                                            "alamat_lapak"=>$_POST["alamat_lapak"],
                                            "nama_bank"=>$_POST["nama_bank"],
                                            "no_rek"=>$_POST["no_rek"],
                                            "an"=>$_POST["an"],
                                            "id_member"=>$id_member);
                                //$where=array("id_member"=>$id_member);
                                $CI->add_data($table,$data);
                                echo "<script>alert('Selamat, pembuatan toko berhasil. Silahkan tambahkan produk untuk mulai berjualan');window.location='".site_url("p/c_toko/produk")."';</script>";
                                //redirect(current_url());
                            }
                        }
                        elseif($ST===1){
                            form_open_col("method='post' enctype='multipart/form-data' ");
                                echo "<h5>Info Toko</h5>";
                                echo "<div class='form-row'>";
                                    input_col("Nama Toko","type='text' name='nama_lapak' value='$info_toko->nama_lapak' autocomplete='off' required","","col-md-4");
                                echo "</div>";
                                $curl = curl_init();

                                    curl_setopt_array($curl, array(
                                    CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
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
                                        <div class='mb-3 col-md-3'>
                                            <label>Kota</label>
                                            <select class='form-control form-control-sm' name='kota_id' required>";
                                                echo "<option value=''>Pilih Kota</option>";
                                                $data = json_decode($response, true);
                                                for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
                                                    if($data['rajaongkir']['results'][$i]['city_id']==$info_toko->kota_id){
                                                        echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."' selected>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
                                                    }
                                                    else{
                                                        echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
                                                    }
                                                    
                                                }
                                            echo "</select>
                                        </div>
                                    </div>";
                                echo "<div class='form-row'>";
                                    input_col("Alamat Lengkap Toko","type='text' name='alamat_lapak' value='$info_toko->alamat_lapak' autocomplete='off' required","","col-md-7");
                                echo "</div>";
                                echo "<h5>Info Bank</h5>";
                                echo "<div class='form-row'>";
                                    $arrBank=array("BNI"=>"BNI","MANDIRI"=>"MANDIRI","BRI"=>"BRI","BCA"=>"BCA");
                                    select_col("Nama Bank","name='nama_bank' required", $arrBank,$info_toko->nama_bank,"col-md-3");
                                echo "</div>";
                                echo "<div class='form-row'>";
                                    input_col("No. Rekening","type='text' name='no_rek' value='$info_toko->no_rek' autocomplete='off' required","","col-md-4");
                                echo "</div>";
                                echo "<div class='form-row'>";
                                    input_col("Atas Nama","type='text' name='an' value='$info_toko->an' autocomplete='off' required","<b>* Pastikan data bank diisi dengan benar. Semua hasil penjualan akan di transfer ke rekening tersebut.</b>","col-md-5");
                                echo "</div>";
                                btn_save_o_col();
                            form_close();
                            if(isset($_POST["save"])){
                                $table="lapak";
                                // $_POST["password"]!="" ? $pass=$_POST["password"] : $pass=$Akun->password;
                                $data=array("kota_id"=>$_POST["kota_id"],
                                            "nama_lapak"=>$_POST["nama_lapak"],
                                            "alamat_lapak"=>$_POST["alamat_lapak"],
                                            "nama_bank"=>$_POST["nama_bank"],
                                            "no_rek"=>$_POST["no_rek"],
                                            "an"=>$_POST["an"]);
                                $where=array("id_member"=>$id_member);
                                $CI->update_data($table,$data,$where);
                                redirect(current_url());
                            }
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