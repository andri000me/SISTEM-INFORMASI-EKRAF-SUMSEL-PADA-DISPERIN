 <!-- Start Footer -->
    <footer class="footer-box mt-6">
        <div class="container">
		
		   <div class="row mt-5">
				 <div class="col-6" style="position: center">
				 <div class="footer_blog full white_fonts">
						     <h3>Login E-Commerce</h3>
							 <div class="newsletter_form">
							    <form action="<?= base_url('ukm/loginecom'); ?>" method="post">
								   <input type="text" placeholder="NIK" name="nik" autocomplete>
								   <small><?= form_error('nik'); ?></small>
								   <input type="text" placeholder="Handphone" name="handphone" autocomplete>
								   <small><?= form_error('handphone'); ?></small>
								    <input type="text" placeholder="Email" name="email" autocomplete>
								   <small><?= form_error('email'); ?></small>
								   <input type="password" placeholder="Password" name="password" autocomplete>
								   <small><?= form_error('password'); ?></small>
								   
								   <button class="btn btn-warning">Masuk</button>
								   <button type="reset" class="btn btn-danger">Reset</button>

								</form>
								<small>Belum Punya Akun, Daftar Disini <a href="<?= base_url('Ukm') ?>" class="badge badge-warning">Daftar</a></small><br>
								<small>Lupa Password, Klik Disini <a href="<?= base_url('Ukm/lupapas') ?>" class="badge badge-danger">Lupa</a></small><br>

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