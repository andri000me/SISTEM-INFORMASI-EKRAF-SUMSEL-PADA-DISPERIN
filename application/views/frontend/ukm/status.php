 <!-- Start Footer -->

    <footer class="footer-box mt-6">
        <div class="container">
		   <div class="row mt-5">
		   		<table class="table full white_fonts table-striped table-bordered" style="color: black; background-color: white">
		   			<thead style="background-color: blue">
		   				<td colspan="2" align="center">IDENTITAS</td>
		   				<td align="center">STATUS</td>
		   			</thead>
		   			<tbody>
		   				<tr>
			   				<td>NIK</td>
			   				<td><?= $master['nik'];?></td>
			   				<td><?php if ($master['status_usaha']==1): ?>
			   					<p class="btn btn-success">Telah Di Verifikasi</p>
			   					<?php elseif ($master['status_usaha']==0):?>
			   					<p class="btn btn-warning">Belum Verifikasi</p>
			   					<?php endif; ?>
			   				</td>
		   				</tr>
		   				<tr>
			   				<td>Nama Pemilik</td>
			   				<td><?= $master['nama_pemilik']; ?></td>
			   				<td><?php if ($master['status_usaha']==1): ?>
			   					<p class="btn btn-success">Telah Di Verifikasi</p>
			   					<?php elseif ($master['status_usaha']==0):?>
			   					<p class="btn btn-warning">Belum Verifikasi</p>
			   					<?php endif; ?>
			   				</td>
		   				</tr>
		   				<tr>
			   				<td>Tanggal Lahir</td>
			   				<td><?= $master['ttl']; ?></td>
			   				<td><?php if ($master['status_usaha']==1): ?>
			   					<p class="btn btn-success">Telah Di Verifikasi</p>
			   					<?php elseif ($master['status_usaha']==0):?>
			   					<p class="btn btn-warning">Belum Verifikasi</p>
			   					<?php endif; ?>
			   				</td>
		   				</tr>
		   				<tr>
			   				<td>Pekerjaan</td>
			   				<td><?= $pekerjaan['nama_pekerjaan']; ?></td>
			   				<td><?php if ($master['status_usaha']==1): ?>
			   					<p class="btn btn-success">Telah Di Verifikasi</p>
			   					<?php elseif ($master['status_usaha']==0):?>
			   					<p class="btn btn-warning">Belum Verifikasi</p>
			   					<?php endif; ?>
			   				</td>
		   				</tr>
		   				<tr>
			   				<td>Email</td>
			   				<td><?= $user['email']; ?></td>
			   				<td><?php if ($master['status_usaha']==1): ?>
			   					<p class="btn btn-success">Telah Di Verifikasi</p>
			   					<?php elseif ($master['status_usaha']==0):?>
			   					<p class="btn btn-warning">Belum Verifikasi</p>
			   					<?php endif; ?>
			   				</td>
		   				</tr>
		   				<tr>
			   				<td>Handphone</td>
			   				<td><?= $master['handphone']; ?></td>
			   				<td><?php if ($master['status_usaha']==1): ?>
			   					<p class="btn btn-success">Telah Di Verifikasi</p>
			   					<?php elseif ($master['status_usaha']==0):?>
			   					<p class="btn btn-warning">Belum Verifikasi</p>
			   					<?php endif; ?>
			   				</td>
		   				</tr>
		   				<tr>
			   				<td>Alamat</td>
			   				<td><?= $master['alamat']; ?> Keluarahan  <?= $desa['nama_desa'];?> Kec <?= $kecamatan['nama_kecamatan'];?> Kab <?= $kabupaten['nama_kabupaten'];?></td>
			   				<td><?php if ($master['status_usaha']==1): ?>
			   					<p class="btn btn-success">Telah Di Verifikasi</p>
			   					<?php elseif ($master['status_usaha']==0):?>
			   					<p class="btn btn-warning">Belum Verifikasi</p>
			   					<?php endif; ?>
			   				</td>
		   				</tr>

		   				<tr>
			   				<td>*Photo Diri<br></td>
			   				<td><img  src="<?= base_url('assets/upload/dataukm/'.$berkas['photo_diri']);?>" style="width: 100px;height: 100px" ></td>
			   				<td><?php if ($master['status_usaha']==1): ?>
			   					<p class="btn btn-success">Telah Di Verifikasi</p>
			   					<?php elseif ($master['status_usaha']==0):?>
			   					<p class="btn btn-warning">Belum Verifikasi</p>
			   					<?php endif; ?>
			   				</td>
		   				</tr>
		   				<tr>
			   				<td>*Photo KTP<br></td>
			   				<td><img  src="<?= base_url('assets/upload/dataukm/'.$berkas['photo_ktp']);?>" style="width: 100px;height: 100px" ></td>
			   				<td><?php if ($master['status_usaha']==1): ?>
			   					<p class="btn btn-success">Telah Di Verifikasi</p>
			   					<?php elseif ($master['status_usaha']==0):?>
			   					<p class="btn btn-warning">Belum Verifikasi</p>
			   					<?php endif; ?>
			   				</td>
		   				</tr>
		   				<tr>
			   				<td>*Photo NPWP<br></td>
			   				<td><img  src="<?= base_url('assets/upload/dataukm/'.$berkas['photo_npwp']);?>" style="width: 100px;height: 100px" ></td>
			   				<td><?php if ($master['status_usaha']==1): ?>
			   					<p class="btn btn-success">Telah Di Verifikasi</p>
			   					<?php elseif ($master['status_usaha']==0):?>
			   					<p class="btn btn-warning">Belum Verifikasi</p>
			   					<?php endif; ?>
			   				</td>
		   				</tr>
		   				<tr>
			   				<td>*Photo UKM<br></td>
			   				<td><img  src="<?= base_url('assets/upload/dataukm/'.$berkas['photo']);?>" style="width: 100px;height: 100px" ></td>
			   				<td>
			   					<?php if ($master['status_usaha']==1): ?>
			   					<p class="btn btn-success">Telah Di Verifikasi</p>
			   					<?php elseif ($master['status_usaha']==0):?>
			   					<p class="btn btn-warning">Belum Verifikasi</p>
			   					<?php endif; ?>
			   				</td>
		   				</tr>

		   				
		   			</tbody>
		   		</table>
		   		<?php if ($master['status_usaha']==1): ?>
		   			
		   		
				<table class="table full white_fonts" style="color: black; background-color: white">
					<tbody>
						<tr>
							<td colspan="2">Akun E-Commerce</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>: <?= $member['email'];?></td>
						</tr>
						<tr>
							<td>Password</td>
							<td>: <?= $member['password']; ?></td>
						</tr>
						<tr>
							<td>Link</td>
							<td>: <a href="<?= base_url('p');?>" target="_blank" class="btn btn-warning">Telusuri...</a></td>
						</tr>
					</tbody>
				</table>

				<?php endif ?>
		   </div>
		</form>
        </div>
    </footer>
    <!-- End Footer -->
