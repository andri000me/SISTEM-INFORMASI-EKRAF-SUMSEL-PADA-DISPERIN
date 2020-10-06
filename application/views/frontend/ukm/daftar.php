 <!-- Start Footer -->
    <footer class="footer-box mt-6">
        <div class="container">
		
		   <div class="row mt-5">
				 <div class="col-6" style="position: center">
				 <div class="footer_blog full white_fonts">
						     <h3>Pendaftaran E-Commerce</h3>
							 <div class="newsletter_form">
							    <form action="<?= base_url('ukm/daftarecom'); ?>" method="post">
								   <input type="text" placeholder="NIK" name="nik">
								   <small><?= form_error('nik'); ?></small>
								   <input type="text" placeholder="Nama Lengkap" name="nama_pemilik">
								   <small><?= form_error('nama_pemilik'); ?></small>			
								   <input type="text" placeholder="Handphone" name="handphone">
								   <small><?= form_error('handphone'); ?></small>
								   <input type="text" placeholder="Email" name="email">
								   <small><?= form_error('email'); ?></small>
								   <input type="password" placeholder="Password" name="password">
								   <small><?= form_error('password'); ?></small>
								   <input type="hidden" name="status" value='1'>
								   <button>Daftar</button>
								   <button type="reset" class="btn btn-danger">Reset</button>
								</form>
								<small>Sudah Punya Akun, Login Disini <a href="<?= base_url('Ukm/loginecom') ?>" class="badge badge-warning">Login</a></small><br>
							 </div>
						 </div>
					</div>
				<div class="col-6" style="position: center">
				 <div class="footer_blog full white_fonts">
							 <p>Dinas Perindustrian Sumatera Selatan</p>
							 <div class="newsletter_form">
							    <img src="<?= base_url('assets/admin');?>/img/perindustrian.png" style="width: 400px;height: 300px">
							 </div>
						 </div>
					</div>	 
			  
			
		   </div>
		
        </div>
    </footer>
    <!-- End Footer -->