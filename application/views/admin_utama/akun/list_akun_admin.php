
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
                      Report Data Admin
                    </p>

                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        
                        <tr>
                          <th>Id</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Tanggal Lahir</th>
                          <th>Photo</th>
                          <th>Password</th>
                          <th>Kode</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                        
                      </thead>


                      <tbody>
                        <?php foreach ($data_admin as $kl):?>
                        <tr>
                          <td><?= $kl['id_user'];?></td>
                          <td><?= $kl['nama'];?></td>
                          <td><?= $kl['email'];?></td>
                          <td><?= $kl['ttl'];?></td>
                          <td><img style=" width: 100px;height: 100px; border-radius: 100%"src="<?= base_url('assets/upload/akun/'.$kl['photo']) ?>"></td>
                          <td><input type="password" value="<?= $kl['password'];?>" readonly></td>
                          <td><?= $kl['kode'];?></td>
                          <td>
                            <?php if($kl['status']==0){ ?>
                            <p class="badge badge-warning">Belum Terverifikasi</p>
                            <a href="<?= base_url('Auth/useraktif/'.$kl['id_user']) ?>">Change</a>
                            <?php }else{ ?>
                            <p class="badge badge-success">Terverifikasi</p>
                            <a href="<?= base_url('Auth/usernonaktif/'.$kl['id_user']) ?>">Change</a>
                            <?php } ?>

                          </td>
                          <td>
                              <a class="btn btn-social-icon btn-google btn-danger" href="<?= base_url('ControllerAdmin/HapusAdmin/')?><?= $kl['id_user'];?>"  onclick="return confirm('Yakin, Data Di Hapus ?');" style="margin-right: 5px"  title='Hapus'><i class="fa fa-trash"></i>
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
