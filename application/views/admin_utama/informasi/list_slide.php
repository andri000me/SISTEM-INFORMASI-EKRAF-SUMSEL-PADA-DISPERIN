
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
                          <form class="form-horizontal" action=" <?= base_url('ControllerAdmin/TambahSlide');?>" method="post" enctype="multipart/form-data">
                         
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Photo 
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="file" id="first-name" name="photo" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus>
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
                  <p class="text-muted font-13 m-b-30">
                      Report Data Slide
                    </p>

                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        
                        <tr>
                          <th>Id</th>
                          <th>Aksi</th>
                        </tr>
                        
                      </thead>


                      <tbody>
                        <?php foreach ($data_slide as $kl):?>
                        <tr>
                          <td><?= $kl['id'];?></td>
                          <td><img style=" width: 100px;height: 100px; border-radius: 100%"src="<?= base_url('assets/upload/slide/'.$kl['photo']) ?>"></td>
                         
                          <td>
                             
                              <a class="btn btn-social-icon btn-google btn-danger" href="<?= base_url('ControllerAdmin/HapusSlide/')?><?= $kl['id'];?>"  onclick="return confirm('Yakin, Data Di Hapus ?');" style="margin-right: 5px"  title='Hapus'><i class="fa fa-trash"></i>
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
