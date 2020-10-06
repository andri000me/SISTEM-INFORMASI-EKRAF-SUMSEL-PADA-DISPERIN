 <!-- Start Footer -->
    <footer class="footer-box mt-6">
        <div class="container">

		<form action="<?= base_url('ukm/perbaharui/'.$user['id_daftar']); ?>" method="POST" enctype="multipart/form-data">
		   <div class="row mt-5">
				 <div class="col-6" style="position: center">
				 <div class="footer_blog full white_fonts">
						     <h3>Data Diri</h3>
							 <div class="newsletter_form">
							    	<h5>NIK</h5>
								   <input type="text" placeholder="NIK" name="nik" value="<?= $user['nik'];?>">
								   <small><?= form_error('nik'); ?></small>
								   <h5>Nama</h5>
								   <input type="text" placeholder="Nama Lengkap" name="nama_pemilik" value="<?= $user['nama_pemilik'];?>">
								   <small><?= form_error('nama_pemilik'); ?></small>
								   <h5>Tanggal Lahir</h5>
								   <input type="date" placeholder="Nama Lengkap" name="ttl" value="" required>
								   <small><?= form_error('nama_pemilik'); ?></small>	
								   <h5>Handphone</h5>
								   <input type="text" placeholder="Handphone" name="handphone" value="<?= $user['handphone'];?>">
								   <small><?= form_error('handphone'); ?></small>
								   <h5>Email</h5>
								   <input type="text" placeholder="Email" name="email" value="<?= $user['email'];?>">
								   <small><?= form_error('email'); ?></small>

								   <input type="hidden" name="password" value="<?= $user['password'];?>">
								   <input type="hidden" name="status" value='2'>

							 </div>
						 </div>
					</div>
					<div class="col-6" style="position: center">
				 	<div class="footer_blog full white_fonts">
						     <h3>Data Berkas</h3>
							 <div class="newsletter_form">
							 	<div class="row">
							 		<div class="col-6">
							 			<h5 >*Photo Diri<br> (JPG|JPEG|PNG) Maks 2 Mb</h5>
							    		
							 		</div>
							 		<div class="col-6">
							 			<input type="file" id="first-name" name="photo_diri" class="form-control" />
							 		</div>
							 		<div class="col-6">
							 			<h5 >*Photo KTP <br> (JPG|JPEG|PNG) Maks 2 Mb</h5>
							    		
							 		</div>
							 		<div class="col-6">
							 			<input type="file" id="first-name" name="photo_ktp" class="form-control" />
							 		</div>
							 		<div class="col-6">
							 			<h5 >*Photo NPWP <br> (JPG|JPEG|PNG) Maks 2 Mb</h5>
							    		
							 		</div>
							 		<div class="col-6">
							 			<input type="file" id="first-name" name="photo_npwp" class="form-control">
							 		</div>
							 		<div class="col-6">
							 			<h5 >*Photo UKM <br> (JPG|JPEG|PNG) Maks 2 Mb</h5>
							    		
							 		</div>
							 		<div class="col-6">
							 			<input type="file" id="first-name" name="photo" class="form-control">
							 		</div>
							 	</div>
							 </div>
						 </div>
					</div>
					<div class="col-6" style="position: center">
				 	<div class="footer_blog full white_fonts">
						     <h3>Data UKM</h3>
							 <div class="newsletter_form">

							 		<h5>Pilih Klasterisasi</h5>
			                        <select class="select2_single form-control" required tabindex="-1" name="id_klasterisasi">
			                           <option selected disabled="disabled" value="">--Pilih klasterisasi--</option>
			                    
			                            <?php foreach ($data_klasterisasi as $k):?>
			                            <option value="<?= $k['id_klasterisasi'];?>"><?= $k['nama_klasterisasi'];?></option>
			                            <?php endforeach; ?>
			                        </select>
			                     
			                     	<h5 class="mt-2">Pilih Kategori</h5>
			                        <select class="select2_single form-control" required tabindex="-1" name="id_bekraf">
			                           <option selected disabled="disabled" value="">--Pilih Kategori--</option>
			                           
			                            <?php foreach ($data_kategoribek as $kk):?>
			                            <option value="<?= $kk['id_bekraf'];?>"><?= $kk['nama_bekraf'];?></option>
			                            <?php endforeach; ?>
			                        </select>
			                     	<h5 class="mt-2">Pilih Daerah</h5>
			                        <select class="select2_single form-control" required tabindex="-1" name="id_daerah">
			                          <option selected disabled="disabled" value="">--Pilih Daerah--</option>
			                           
			                            <?php foreach ($data_daerah as $kkk):?>
			                            <option value="<?= $kkk['id_daerah'];?>"><?= $kkk['nama_daerah'];?></option>
			                            <?php endforeach; ?>
			                        </select>
			                        <h5 class="mt-2">Pilih Kabupaten</h5>
			                        <select class="select2_single form-control" required tabindex="-1" name="kabupaten">
			                          <option selected disabled="disabled" value="">--Pilih Kabupaten--</option>
			                            <?php foreach ($data_kabupaten as $kkk):?>
			                            <option value="<?= $kkk['id_kabupaten'];?>"><?= $kkk['nama_kabupaten'];?></option>
			                            <?php endforeach; ?>
			                        </select>
			                        <h5 class="mt-2">Pilih Kecamatan</h5>
			                        <select class="select2_single form-control" required tabindex="-1" name="kecamatan">
			                          <option selected disabled="disabled" value="">--Pilih Kecamatan--</option>
			                            <?php foreach ($data_kecamatan as $kkk):?>
			                            <option value="<?= $kkk['id_kecamatan'];?>"><?= $kkk['nama_kecamatan'];?></option>
			                            <?php endforeach; ?>
			                        </select>

			                        <h5 class="mt-2">Pilih Kelurahan/Desa</h5>
			                        <select class="select2_single form-control" required tabindex="-1" name="desa">
			                          <option selected disabled="disabled" value="">--Pilih Kelurahan/Desa--</option>
			                            <?php foreach ($data_desa as $kkk):?>
			                            <option value="<?= $kkk['id_desa'];?>"><?= $kkk['nama_desa'];?></option>
			                            <?php endforeach; ?>
			                        </select>

			                       
							 </div>
						 </div>
					</div>


					<div class="col-6" style="position: center">
				 	<div class="footer_blog full white_fonts">
						     <h3>Data UKM</h3>
							 <div class="newsletter_form">
							 	 	<h5 class="mt-2">Pilih Pekerjaan</h5>
			                        <select class="select2_single form-control" required tabindex="-1" name="pekerjaan">
			                          <option selected disabled="disabled" value="">--Pilih Pekerjaan--</option>
			                            <?php foreach ($data_pekerjaan as $kkk):?>
			                            <option value="<?= $kkk['id_pekerjaan'];?>"><?= $kkk['nama_pekerjaan'];?></option>
			                            <?php endforeach; ?>
			                        </select>
							    	<h5 class="mt-2">Nama Usaha</h5>
								   <input type="text" placeholder="Nama Usaha" name="nama_usaha" value="" required>
								  
								   <h5>Alamat Lengkap</h5>
								   <textarea type="text" placeholder="Alamat Lengkap" style="width: 100%" name="alamat" value="" required></textarea>
							
								   	
								   <h5>Koordinat Latitude</h5>
								   <input type="text" placeholder="Latitude" name="latitude" value="" required>
								
								   <h5>Koordinat Longtitude</h5>
								   <input type="text" placeholder="Longtitude" name="longtitude" value="" required>
								
								   <input type="hidden" name="link_usaha" value="0">
								   <input type="hidden" name="status_pemilik" value="1">
								   <input type="hidden" name="status_usaha" value='0'>
										
							 </div>

						 </div>
					</div>
				
				<button class="btn btn-warning ml-3 mt-4" type="submit">Perbaharui Data</button>
		   </div>
		</form>
        </div>
    </footer>
    <!-- End Footer -->
