<div class="container">
  <div class="row">
    <div class="col-md-12 mb-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=site_url("p");?>">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detail Produk</li>
        </ol>
      </nav>
      <h4 class=""><strong>Detail Produk</strong></h4>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-5">
              <img src="<?=base_url("produk/img/".$detailP->foto);?>" alt="<?=$detailP->nama_produk;?>" width="300" class="img-fluid">
            </div>
            <div class="col-md-7 mt-3">
              <h5><strong><?=$detailP->nama_produk;?></strong></h5>
              <hr>
              <h4><strong>Rp. <?=number_format($detailP->harga,0);?></strong></h4>
              <span class="badge badge-primary">Tersedia <?=$detailP->stok;?> stok barang</span><br>
              <small style="color:grey;">Berat: <?=number_format($detailP->berat,0);?> gram</small>

              <form action="" method="post">
                <input type="hidden" id="berat" name="berat" value="<?=$detailP->berat;?>">
                <input type="hidden" name='asal' id='asal' value="<?=$detailP->kota_id;?>">
                <input type="hidden" name='id_produk' id='id_produk' value="<?=$detailP->id_produk;?>">
                <input type="hidden" name='id_lapak' id='id_lapak' value="<?=$detailP->id_lapak;?>">
                <input type="hidden" name='harga' id='harga' value="<?=$detailP->harga;?>">
                <div class="form-group">
                  <label>Masukkan jumlah yang dinginkan</label>
                  <input type="number" name="jumlah" value="1" min="1" id="jumlah" class="form-control">
                </div>
                <!--<div class="form-group">
                  <button type="button" name="button" class="btn btn-success" onclick="buy_now()">Beli Sekarang</button>
                </div>-->
                <div class="form-group">
                  <?php
                    if($this->session->userdata("logged_in")==TRUE){
                      echo "<button type='submit' name='add_tocart' class='btn btn-outline-secondary'><i class='fas fa-cart-plus'></i> Tambah ke keranjang</button>";
                    }
                    else{
                      echo "<button type='button' name='add_tocart' class='btn btn-outline-secondary' onclick='buy_now()'><i class='fas fa-cart-plus'></i> Tambah ke keranjang</button>";
                    }
                  ?>

                </div>
              </form>
              <?php
                if(isset($_POST["add_tocart"])){
                    $CI =& get_instance();
                    //$sesKeranjang="$_POST[id_lapak]|$_POST[id_produk]|$_POST[jumlah]|$_POST[harga]";
                    //$_SESSION['raw_cart'][]=$sesKeranjang;
                    $data=array(
                      "id_lapak"=>$_POST["id_lapak"],
                      "id_produk"=>$_POST["id_produk"],
                      "id_member"=>$this->session->userdata("id_member"),
                      "jumlah"=>$_POST["jumlah"],
                      "harga"=>$_POST["harga"]);
                    $CI->add_data("keranjang",$data);
                    echo "<script>alert('Produk berhasil ditambahkan ke keranjang');</script>";
                    //print_r ($this->session->userdata("raw_cart"));
                }
                else{}
              ?>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
            <h5 style="color:grey;font-weight:200;"><strong>Penjual</strong></h5>
            <div class="media mt-3">
              <?php
                  if($detailP->foto_member){
                    echo "<img src='".base_url('assets/ecom/member/img/'.$detailP->foto_member)."' class='mr-3' alt='".$detailP->nama_lapak."' width='48'>";
                  }
                  else{
                    echo "<img src='".base_url('assets/ecom/member/img/def_store.png')."' class='mr-3' alt='".$detailP->nama_lapak."' width='48'>";
                  }

              ?>
              
              <div class="media-body">
                <h5 class="mt-0"><?=$detailP->nama_lapak;?></h5>
                <p><i class="fas fa-map-marked"></i> &nbsp;<?=$detailP->alamat_lapak;?></p>
              </div>
            </div>

        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 mt-3">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Deskripsi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Estimasi Ongkos Kirim</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="mt-2">
                <?=$detailP->deskripsi;?>
            </div>
            
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

              <div class="row mt-3">
        				<div class="col-md-4">
        					<div class="panel panel-success">
        						<div class="panel-body">
        								<div>
        									<?php
        									//Get Data Kabupaten
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

        									curl_close($curl);
        									echo "
        									<!--<div class= \"form-group\">
        									<label for=\"asal\">Kota/Kabupaten Asal </label>
        									<select class=\"form-control form-control-sm\" name='asalX' id='asalX'>";
        									echo "<option value=''>Pilih Kota Asal</option>";
        									$data = json_decode($response, true);
        									for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
        										echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
        									}
        									echo "</select>
        									</div>-->";
        									//Get Data Kabupaten
        									//-----------------------------------------------------------------------------

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

        										echo "
        										<div class= \"form-group\">
        											<label for=\"provinsi\">Provinsi Tujuan </label>
        											<select class=\"form-control form-control-sm\" name='provinsi' id='provinsi'>";
        												echo "<option value=''>Pilih Provinsi Tujuan</option>";
        												$data = json_decode($response, true);
        												for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
        													echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
        												}
        												echo "</select>
        											</div>";
        											//Get Data Provinsi
        											?>

        											<div class="form-group">
        												<label for="kabupaten">Kota/Kabupaten Tujuan</label><br>
        												<select class="form-control form-control-sm" id="kabupaten" name="kabupaten">
                                    <option value="">Pilih Kabupaten</option>
                                </select>
        											</div>
        											<div class="form-group">
        												<label for="kurir">Kurir</label><br>
        												<select class="form-control form-control-sm" id="kurir" name="kurir">
        													<option value="jne">JNE</option>
        													<option value="tiki">TIKI</option>
        													<option value="pos">POS INDONESIA</option>
        												</select>
        											</div>
        											<!--<div class="form-group">
        												<label for="berat">Berat (gram)</label><br>
        												<input class="form-control  form-control-sm" id="berat" type="text" name="berat" value="500" />
        											</div>-->
        											<button class="btn btn-success btn-sm" id="cek" type="submit" name="button">Cek Ongkir</button>
        										</div>
        								</div>
        							</div>
        						</div>
        						<div class="col-md-8">
        							<div class="panel panel-success">
        								<div class="panel-heading">
        									<h3 class="panel-title">&nbsp;</h3>
        								</div>
        								<div class="panel-body">
        										<div id="ongkir">&nbsp;</div>
        								</div>
        							</div>
        						</div>
        					</div>
        			</div>
              <!-- end -->
          </div>
        </div>
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

		$("#cek").click(function(){
			//Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax
			var asal = $('#asal').val();
			var kab = $('#kabupaten').val();
			var kurir = $('#kurir').val();
			var berat = $('#berat').val();
      if (asal=="" || kab=="" || kurir=="" || berat==""){
        alert("Data belum lengkap !");
      }
      else{
        $("#ongkir").html("Sedang menghitung biaya . . . . .");
        $.ajax({
            type : 'POST',
            url : '<?=site_url("ongkir/cek_ongkir");?>',
            data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
            success: function (data) {
              //jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
              $("#ongkir").html(data);
            }
        });
      }

		});
	});
</script>
<script type="text/javascript">
  function buy_now(){
    var ses_loggedIn="<?=$this->session->userdata("logged_in");?>";
    var jumlah=$("#jumlah")
    if(ses_loggedIn){

    }
    else{
      alert("Silahkan masuk untuk melanjutkan.");
    }
  }
</script>
