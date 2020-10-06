
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
                    <!-- Large modal -->
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="fa fa-plus mr-2"></span>Tambah Data</button>
                  <!-- tambah data -->
                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Form Tambah <?= $link2; ?></h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" action=" <?= base_url('ControllerAdmin/TambahMasterukm');?>" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align">Pilih Klasterisasi</label>
                              <div class="col-md-6 col-sm-6 ">
                                <select class="select2_single form-control" tabindex="-1" name="id_klasterisasi" required oninvalid="this.setCustomValidity('Data Harus Dipilih !')" oninput="setCustomValidity('')">
                                  <option selected disabled="disabled" value="">--Pilih Klasterisasi--</option>
                                  <?php foreach ($data_klasterisasi as $k):?>
                                  <option value="<?= $k['id_klasterisasi'];?>"><?= $k['nama_klasterisasi'];?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align">Pilih Jenis Bekraf</label>
                              <div class="col-md-6 col-sm-6 ">
                                <select class="select2_single form-control" tabindex="-1" name="id_bekraf" required oninvalid="this.setCustomValidity('Data Harus Dipilih !')" oninput="setCustomValidity('')">
                                  <option selected disabled="disabled" value="">--Pilih Jenis Bekraf--</option>
                                  <?php foreach ($data_kategoribek as $k):?>
                                  <option value="<?= $k['id_bekraf'];?>"><?= $k['nama_bekraf'];?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIK
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="number" id="first-name" name="nik" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus>
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" name="nama_pemilik" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus>
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tanggal Lahir
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="date" id="first-name" name="ttl" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align">Pilih Pekerjaan</label>
                              <div class="col-md-6 col-sm-6 ">
                                <select class="select2_single form-control" tabindex="-1" name="pekerjaan" required oninvalid="this.setCustomValidity('Data Harus Dipilih !')" oninput="setCustomValidity('')">
                                  <option selected disabled="disabled" value="">--Pilih Pekerjaan--</option>
                                  <?php foreach ($data_pekerjaan as $kk):?>
                                  <option value="<?= $kk['id_pekerjaan'];?>"><?= $kk['nama_pekerjaan'];?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Pilih Foto UKM 
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="file" id="first-name" name="photo" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus>
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Usaha
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" name="nama_usaha" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus>
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <textarea type="text" id="first-name" name="alamat" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus></textarea>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align">Pilih Kabupaten</label>
                              <div class="col-md-6 col-sm-6 ">
                                <select class="select2_single form-control" tabindex="-1" name="kabupaten" required oninvalid="this.setCustomValidity('Data Harus Dipilih !')" oninput="setCustomValidity('')">
                                  <option selected disabled="disabled" value="">--Nama Kabupaten--</option>
                                  <?php foreach ($data_kabupaten as $k):?>
                                  <option value="<?= $k['id_kabupaten'];?>"><?= $k['nama_kabupaten'];?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align">Pilih Kecamatan</label>
                              <div class="col-md-6 col-sm-6 ">
                                <select class="select2_single form-control" tabindex="-1" name="kecamatan" required oninvalid="this.setCustomValidity('Data Harus Dipilih !')" oninput="setCustomValidity('')">
                                  <option selected disabled="disabled" value="">--Nama Kecamatan--</option>
                                  <?php foreach ($data_kecamatan as $k):?>
                                  <option value="<?= $k['id_kecamatan'];?>"><?= $k['nama_kecamatan'];?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align">Pilih Desa</label>
                              <div class="col-md-6 col-sm-6 ">
                                <select class="select2_single form-control" tabindex="-1" name="desa" required oninvalid="this.setCustomValidity('Data Harus Dipilih !')" oninput="setCustomValidity('')">
                                  <option selected disabled="disabled" value="">--Nama Desa--</option>
                                  <?php foreach ($data_desa as $k):?>
                                  <option value="<?= $k['id_desa'];?>"><?= $k['nama_desa'];?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Handphone
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="number" id="first-name" name="handphone" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus>
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Latitude
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" name="latitude" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus>
                              </div>
                            </div>
                          <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Longtitude
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" name="longtitude" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus>
                                <input type="hidden" name="id_daftar" value="0">
                                <input type="hidden" name="link_usaha" value="<?= base_url('p');?>">
                                <input type="hidden" name="status_pemilik" value="1">
                                <input type="hidden" name="status_usaha" value="0">
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                  <!-- end tambah data -->

                   <!-- edit data -->
                  <?php foreach ($data_master as $k) :
                    $id_ukm= $k['id_ukm'];
                    $id_daftar = $k['id_daftar'];
                    $id_klasterisasi = $k['id_klasterisasi'];
                    $id_bekraf = $k['id_bekraf'];
                    $nik = $k['nik'];
                    $nama_pemilik = $k['nama_pemilik'];
                    $ttl = $k['ttl'];
                    $pekerjaan = $k['pekerjaan'];
                    $photo = $k['photo'];
                    $nama_usaha = $k['nama_usaha'];
                    $alamat = $k['alamat'];
                    $kabupaten = $k['kabupaten'];
                    $kecamatan = $k['kecamatan'];
                    $desa = $k['desa'];
                    $handphone = $k['handphone'];
                    $latitude = $k['latitude'];
                    $longtitude = $k['longtitude'];
                    $link_usaha = $k['link_usaha'];
                  ?>

                    <div class="modal fade bs-example-modal-lg" id="modal-edit<?php echo $k['id_ukm'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Form Edit <?= $link2; ?></h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" action=" <?= base_url('ControllerAdmin/EditMasterukm/'.$k['id_ukm']);?>" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align">Pilih Klasterisasi</label>
                              <div class="col-md-6 col-sm-6 ">
                                <select class="select2_single form-control" tabindex="-1" name="id_klasterisasi" required oninvalid="this.setCustomValidity('Data Harus Dipilih !')" oninput="setCustomValidity('')">
                                  <option selected disabled="disabled" value="">--Pilih Klasterisasi--</option>
                                  <?php foreach ($data_klasterisasi as $kk):?>
                                    <?php 
                                     if ($k['id_klasterisasi']==$kk['id_klasterisasi']) {
                                         $select="selected";
                                        }else{
                                         $select="";
                                        }
                                        echo "<option $select value =".$kk['id_klasterisasi'].">".$kk['nama_klasterisasi']."</option>";
                                     ?>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align">Pilih Jenis Bekraf</label>
                              <div class="col-md-6 col-sm-6 ">
                                <select class="select2_single form-control" tabindex="-1" name="id_bekraf" required oninvalid="this.setCustomValidity('Data Harus Dipilih !')" oninput="setCustomValidity('')">
                                  <option selected disabled="disabled" value="">--Pilih Jenis Bekraf--</option>
                                  <?php foreach ($data_kategoribek as $kk):?>
                                    <?php 
                                     if ($k['id_bekraf']==$kk['id_bekraf']) {
                                         $select="selected";
                                        }else{
                                         $select="";
                                        }
                                        echo "<option $select value =".$kk['id_bekraf'].">".$kk['nama_bekraf']."</option>";
                                     ?>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIK
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="number" id="first-name" name="nik" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus value="<?= $k['nik'] ?>">
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" name="nama_pemilik" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus value="<?= $k['nama_pemilik'];?>">
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tanggal Lahir
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="date" id="first-name" name="ttl" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus value="<?= $k['ttl']; ?>">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align">Pilih Pekerjaan</label>
                              <div class="col-md-6 col-sm-6 ">
                                <select class="select2_single form-control" tabindex="-1" name="pekerjaan" required oninvalid="this.setCustomValidity('Data Harus Dipilih !')" oninput="setCustomValidity('')">
                                  <option selected disabled="disabled" value="">--Pilih Pekerjaan--</option>
                                  <?php foreach ($data_pekerjaan as $kk):?>
                                    <?php 
                                     if ($k['pekerjaan']==$kk['id_pekerjaan']) {
                                         $select="selected";
                                        }else{
                                         $select="";
                                        }
                                        echo "<option $select value =".$kk['id_pekerjaan'].">".$kk['nama_pekerjaan']."</option>";
                                     ?>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Pilih Foto UKM 
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <small>*Biarkan Saja Jika Tidak Diganti</small><br>
                                <img src="<?= base_url('assets/upload/dataukm/'.$k['photo'])?>" style="width: 80px;height: 80px; border-radius: 100%">
                                <input type="file" id="first-name" name="photo" class="form-control" autocomplete autofocus value="<?= $k['photo']; ?>">
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Usaha
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" name="nama_usaha" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus value="<?= $k['nama_usaha']; ?>">
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <textarea type="text" id="first-name" name="alamat" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus><?=$k['alamat']; ?></textarea>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align">Pilih Kabupaten</label>
                              <div class="col-md-6 col-sm-6 ">
                                <select class="select2_single form-control" tabindex="-1" name="kabupaten" required oninvalid="this.setCustomValidity('Data Harus Dipilih !')" oninput="setCustomValidity('')">
                                  <option selected disabled="disabled" value="">--Nama Kabupaten--</option>
                                  <?php foreach ($data_kabupaten as $kk):?>
                                    <?php 
                                     if ($k['kabupaten']==$kk['id_kabupaten']) {
                                         $select="selected";
                                        }else{
                                         $select="";
                                        }
                                        echo "<option $select value =".$kk['id_kabupaten'].">".$kk['nama_kabupaten']."</option>";
                                     ?>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align">Pilih Kecamatan</label>
                              <div class="col-md-6 col-sm-6 ">
                                <select class="select2_single form-control" tabindex="-1" name="kecamatan" required oninvalid="this.setCustomValidity('Data Harus Dipilih !')" oninput="setCustomValidity('')">
                                  <option selected disabled="disabled" value="">--Nama Kecamatan--</option>
                                  <?php foreach ($data_kecamatan as $kk):?>
                                    <?php 
                                     if ($k['kecamatan']==$kk['id_kecamatan']) {
                                         $select="selected";
                                        }else{
                                         $select="";
                                        }
                                        echo "<option $select value =".$kk['id_kecamatan'].">".$kk['nama_kecamatan']."</option>";
                                     ?>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align">Pilih Desa</label>
                              <div class="col-md-6 col-sm-6 ">
                                <select class="select2_single form-control" tabindex="-1" name="desa" required oninvalid="this.setCustomValidity('Data Harus Dipilih !')" oninput="setCustomValidity('')">
                                  <option selected disabled="disabled" value="">--Nama Desa--</option>
                                  <?php foreach ($data_desa as $kk):?>
                                    <?php 
                                     if ($k['desa']==$kk['id_desa']) {
                                         $select="selected";
                                        }else{
                                         $select="";
                                        }
                                        echo "<option $select value =".$kk['id_desa'].">".$kk['nama_desa']."</option>";
                                     ?>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Handphone
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="number" id="first-name" name="handphone" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus value="<?= $k['handphone'];?>">
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Latitude
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" name="latitude" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus value="<?= $k['latitude']; ?>">
                              </div>
                            </div>
                          <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Longtitude
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" name="longtitude" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus value="<?= $k['longtitude'] ?>">
                                <input type="hidden" name="id_daftar" value="<?= $k['id_daftar'];?>">
                                <input type="hidden" name="link_usaha" value="<?= base_url('p');?>">
                                <input type="hidden" name="status_pemilik" value="<?= $k['status_pemilik'] ?>">
                                <input type="hidden" name="status_usaha" value="<?= $k['status_usaha'];?>">
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                          <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>

                  <?php endforeach; ?>
                    <p class="text-muted font-13 m-b-30">
                      Data Master UKM
                    </p>

                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        
                        <tr>
                          <th>ID UKM</th>
                          <th>ID Daftar</th>
                          <th>Klasterisasi</th>
                          <th>Jenis Bekraf</th>
                          <th>NIK</th>
                          <th>Nama</th>
                          <th>Tanggal Lahir</th>
                          <th>Pekerjaan</th>
                          <th>Photo</th>
                          <th>Nama Usaha</th>
                          <th>Alamat</th>
                          <th>Kabupaten</th>
                          <th>Kecamatan</th>
                          <th>Desa</th>
                          <th>Handphone</th>
                          <th>Latitude</th>
                          <th>Longtitude</th>
                          <th>Link Usaha</th>
                          <th>Status Pemilik</th>
                          <th>Status Usaha</th>
                          <th>Aksi</th>
                        </tr>
                        
                      </thead>


                      <tbody>
                        <?php foreach ($data_master as $kl):?>
                        <tr>
                          <td>Detail ID-<?= $kl['id_ukm'];?></td>
                          <td><?= $kl['id_daftar'];?></td>
                          <td><?= $kl['nama_klasterisasi'];?></td>
                          <td><?= $kl['nama_bekraf'];?></td>
                          <td><?= $kl['nik'];?></td>
                          <td><?= $kl['nama_pemilik'];?></td>
                          <td><?= $kl['ttl'];?></td>
                          <td><?= $kl['nama_pekerjaan'];?></td>
                          <td><img src="<?= base_url('assets/upload/dataukm/'.$kl['photo']) ?>" alt="..." style="width: 180px;height: 120px; justify-content: center"></td>
                          <td><?= $kl['nama_usaha'];?></td>
                          <td><?= $kl['alamat'];?></td>
                          <td><?= $kl['nama_kabupaten'];?></td>
                          <td><?= $kl['nama_kecamatan'];?></td>
                          <td><?= $kl['nama_desa'];?></td>
                          <td><?= $kl['handphone'];?></td>
                          <td><?= $kl['latitude'];?></td>
                          <td><?= $kl['longtitude'];?></td>
                          <td><a href="<?= $kl['link_usaha'];?>" target="_blank" class="badge badge-info">Telusuri</a></td>
                          <td>
                            <?php if($kl['status_pemilik']==1){ ?>
                            <h6 class="badge badge-success">Aktif</h6>
                            <a href="<?= base_url('ControllerAdmin/spnon/'.$kl['id_ukm']);?>" class="badge badge-danger">Change</a>
                            <?php }elseif($kl['status_pemilik']==0){?>
                            <p class="badge badge-danger">Tidak Aktif</p>
                            <a href="<?= base_url('ControllerAdmin/spaktif/'.$kl['id_ukm']);?>" class="badge badge-danger">Change</a>
                            <?php } ?>
                          </td>
                          <td>
                            <?php if($kl['status_usaha']==1){ ?>
                            <h6 class="badge badge-success">Terverifikasi</h6>
                            <?php }elseif($kl['status_usaha']==0){?>
                            <p class="badge badge-danger">Belum Verifikasi</p>
                            <?php } ?>
                          </td>
                          <td>

                              <a class="btn btn-social-icon btn-google btn-primary" data-toggle="modal" data-target="#modal-edit<?= $kl['id_ukm'];?>" type="button" style="margin-right: 5px"  title='Edit'><i class="fa fa-pencil">Edit</i>
                              </a>
                               <a class="btn btn-social-icon btn-google btn-danger" href="<?= base_url('ControllerAdmin/HapusMasterUkm/')?><?= $kl['id_ukm'];?>" style="margin-right: 5px"  title='Hapus' onclick="return confirm('Yakin, Data Di Hapus ?');"><i class="fa fa-trash">Hapus</i>
                              </a>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </div>
              </div>
</div>
</div>
        <!-- /page content -->
