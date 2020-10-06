
<!-- notifikasi -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<!-- end notifikasi -->

        <!-- page content -->
        <div class="right_col" role="main">

          <div class="container">
  <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= $link1; ?><small><?= $link2; ?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                              <!-- Large modal -->
                 
                    <p class="text-muted font-13 m-b-30">
                      <?= $title; ?> <a class="badge badge-warning" style="color: white" href="<?= base_url('ControllerAdmin/PendaftaranUkm'); ?>">Kembali</a>
                    </p>
                    <!-- detail -->
                    <div class="row">
                      <div class="col-md-6">
                        <table class="table">
                          <tr>
                            <td>ID Pendaftaran</td>
                            <td>A</td>
                          </tr>
                          <tr>
                            <td>NIK</td>
                            <td><?= $master['nik'];?></td>
                          </tr>
                          <tr>
                            <td>Nama Pemilik</td>
                            <td><?= $master['nama_pemilik']; ?></td>
                          </tr>
                          <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td><?= $desa['nama_desa'];?> , <?= $master['ttl']; ?></td>
                          </tr>
                           <tr>
                            <td>Pekerjaan</td>
                            <td><?= $pekerjaan['nama_pekerjaan']; ?></td>
                          </tr>
                          <tr>
                            <td>Email</td>
                            <td><?= $user['email']; ?></td>
                          </tr>
                          <tr>
                            <td>Handphone</td>
                            <td><?= $master['handphone']; ?></td>
                          </tr>
                          <tr>
                            <td>Nama UKM</td>
                            <td><?= $master['nama_usaha']; ?></td>
                          </tr>
                          <tr>
                            <td>Alamat Lengkap</td>
                            <td><?= $master['alamat']; ?> Keluarahan  <?= $desa['nama_desa'];?> Kec <?= $kecamatan['nama_kecamatan'];?> Kab <?= $kabupaten['nama_kabupaten'];?></td>
                          </tr>
                          <tr>
                            <td>Latitude</td>
                            <td><?= $master['latitude']; ?></td>
                          </tr>
                          <tr>
                            <td>Longtitude</td>
                            <td><?= $master['latitude']; ?></td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col">
                            <h6>*Photo Diri</h6>
                            <a href="<?= base_url('assets/upload/dataukm/'.$berkas['photo_diri']);?>" target="_blank">
                            <img  src="<?= base_url('assets/upload/dataukm/'.$berkas['photo_diri']);?>" style="width: 200px;height: 200px" ></a>
                          </div>
                          <div class="col">
                            <h6>*Photo KTP</h6>
                            <a href="<?= base_url('assets/upload/dataukm/'.$berkas['photo_ktp']);?>" target="_blank">
                            <img  src="<?= base_url('assets/upload/dataukm/'.$berkas['photo_ktp']);?>" style="width: 200px;height: 200px" ></a>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <h6>*Photo NPWP</h6>
                            <a href="<?= base_url('assets/upload/dataukm/'.$berkas['photo_npwp']);?>" target="_blank">
                            <img  src="<?= base_url('assets/upload/dataukm/'.$berkas['photo_npwp']);?>" style="width: 200px;height: 200px" ></a>
                          </div>
                          <div class="col">
                            <h6>*Photo UKM</h6>
                            <a href="<?= base_url('assets/upload/dataukm/'.$berkas['photo']);?>" target="_blank">
                            <img  src="<?= base_url('assets/upload/dataukm/'.$berkas['photo']);?>" style="width: 200px;height: 200px" ></a>
                          </div>
                        </div>
                        <form action="<?= base_url('ControllerAdmin/VerifikasiEcom/');?><?= $user['id_daftar'];?>" method="post">
                          <input type="hidden" name="nama_member" value="<?= $master['nama_pemilik']; ?>">
                          <input type="hidden" name="no_hp" value="<?= $master['handphone']; ?>">
                          <input type="hidden" name="email" value="<?= $user['email']; ?>">
                          <input type="hidden" name="alamat" value="<?= $master['alamat']; ?> Keluarahan  <?= $desa['nama_desa'];?> Kec <?= $kecamatan['nama_kecamatan'];?> Kab <?= $kabupaten['nama_kabupaten'];?>">
                          <input type="hidden" name="status" value="3">
                          <input type="hidden" name="status_usaha" value="1">
                        <button class="btn btn-danger mt-4 ml-3 col-12">Verifikasi Data</button>
                        </form>
                        
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            </div>
              </div>
</div>


        
        </div>
        <!-- /page content -->
