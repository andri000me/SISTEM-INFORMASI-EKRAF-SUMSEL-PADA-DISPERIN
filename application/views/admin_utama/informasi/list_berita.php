
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
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="fa fa-plus mr-2">Tambah Data</button>
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
                          <form class="form-horizontal" action=" <?= base_url('ControllerAdmin/TambahBerita');?>" method="post" enctype="multipart/form-data">
                            
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Judul Berita
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" name="judul_berita" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus>
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Photo Berita
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="file" id="first-name" name="photo_berita" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus>
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Deskripsi Berita
                              </label>
                              <div class="col-md-8 col-sm-12 ">
                                <textarea id="first-name" name="deskripsi_berita" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus style="height: 200px"></textarea>
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
                  <?php foreach ($data_berita as $k) :
                    $id_berita= $k['id_berita'];
                    $judul_berita = $k['judul_berita'];
                    $photo_berita = $k['photo_berita'];
                    $deskripsi_berita = $k['deskripsi_berita'];
                  ?>

                    <div class="modal fade bs-example-modal-lg" id="modal-edit<?php echo $k['id_berita'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Form Edit <?= $link2; ?></h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" action=" <?= base_url('ControllerAdmin/EditBerita');?>/<?= $k['id_berita'];?>" method="post" enctype="multipart/form-data" >
                            
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Judul Berita
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" name="judul_berita" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus value="<?= $k['judul_berita']; ?>">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Photo Berita
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <small>*Biarkan Saja Jika Tidak Diganti</small><br>
                                <img src="<?= base_url('assets/upload/berita/'.$k['photo_berita'])?>" style="width: 80px;height: 80px; border-radius: 100%">
                                <input type="file" id="first-name" name="photo_berita" class="form-control" autocomplete autofocus value="<?= $k['photo_berita'];?>">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Deskripsi Berita
                              </label>
                              <div class="col-md-8 col-sm-12 ">
                                <textarea id="first-name" name="deskripsi_berita" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus style="height: 200px"><?= $k['deskripsi_berita'];?></textarea>
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


                  <!-- end edit data -->

                    <p class="text-muted font-13 m-b-30">
                      Report Data Berita
                    </p>

                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        
                        <tr>
                          <th>Id</th>
                          <th>Judul Berita</th>
                          <th>Photo Berita</th>
                          <th>Deskripsi</th>
                          <th>Date Created</th>
                          <th>Status Berita</th>
                          <th>Aksi</th>
                        </tr>
                        
                      </thead>


                      <tbody>
                        <?php foreach ($data_berita as $kl):?>
                        <tr>
                          <td><?= $kl['id_berita'];?></td>
                          <td><?= $kl['judul_berita'];?></td>
                          <td><img style=" width: 100px;height: 100px; border-radius: 100%"src="<?= base_url('assets/upload/berita/'.$kl['photo_berita']) ?>"></td>
                          <td><?= $kl['deskripsi_berita'];?></td>
                          <td><?= $kl['date_created'];?></td>
                          <td>
                            <?php if($kl['status_berita']==0){ ?>
                            <p class="badge badge-success">Tidak Aktif</p>
                            <a href="<?= base_url('ControllerAdmin/Beritanon/'.$kl['id_berita']) ?>" class="badge badge-danger">Change</a>
                            <?php }else{ ?>
                            <p class="badge badge-warning">Aktif</p>
                            <a href="<?= base_url('ControllerAdmin/Beritaaktif/'.$kl['id_berita']) ?>" class="badge badge-danger">Change</a>
                            <?php } ?>
                          <td>
                             <a class="btn btn-social-icon btn-bitbucket btn-primary"  title='Edit' data-toggle="modal" data-target="#modal-edit<?= $kl['id_berita'];?>" type="button"><i class="fa fa-edit "></i>
                             </a>
                              <a class="btn btn-social-icon btn-google btn-danger" href="<?= base_url('ControllerAdmin/HapusBerita/')?><?= $kl['id_berita'];?>"  onclick="return confirm('Yakin, Data Di Hapus ?');" style="margin-right: 5px"  title='Hapus'><i class="fa fa-trash"></i>
                              </a>
                            </td>
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
