
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
                              
                  <!-- end tambah data -->
                  <p class="text-muted font-13 m-b-30">
                      Report Data Galeri
                    </p>

                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        
                        <tr>
                          <th>Id</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Handphone</th>
                          <th>Pengaduan</th>
                          <th>Aksi</th>
                        </tr>
                        
                      </thead>


                      <tbody>
                        <?php foreach ($data_pengaduan as $kl):?>
                        <tr>
                          <td><?= $kl['id_pengaduan'];?></td>
                          <td><?= $kl['nama'];?></td>
                          <td><?= $kl['email'];?></td>
                          <td><?= $kl['handphone'];?></td>
                          <td><?= $kl['pengaduan'];?></td>
                          <td>
                              <a class="btn btn-social-icon btn-google btn-success" href="<?= base_url('ControllerAdmin/EmailPengaduan/')?><?= $kl['id_pengaduan'];?>"style="margin-right: 5px"  title='Kirim Email'><i class="fa fa-envelope"></i>
                              </a>
                              <a class="btn btn-social-icon btn-google btn-danger" href="<?= base_url('ControllerAdmin/HapusPengaduan/')?><?= $kl['id_pengaduan'];?>"  onclick="return confirm('Yakin, Data Di Hapus ?');" style="margin-right: 5px"  title='Hapus'><i class="fa fa-trash"></i>
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
