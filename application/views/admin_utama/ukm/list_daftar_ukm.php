
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
                      Data Pelanggan UKM
                    </p>

                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        
                        <tr>
                          <th>ID Member</th>
                          <th>Nama</th>
                          <th>Handphone</th>
                          <th>Email</th>
                          <th>Alamat</th>
                          <th>Photo</th>
                          <th>Tanggal Join</th>
                          <th>Status</th>
                        </tr>
                        
                      </thead>


                      <tbody>
                        <?php foreach ($data_daftar as $kl):?>
                        <tr>
                         
                          <td><?= $kl['id_member'];?></td>
                          <td><?= $kl['nama_member'];?></td>
                          <td><?= $kl['no_hp'];?></td>
                          <td><?= $kl['email']; ?></td>
                          <td><?= $kl['alamat']; ?></td>
                          <td><img src="<?= base_url('assets/ecom/member/img/'.$kl['foto_member']) ?>" alt="..." style="width: 180px;height: 120px; justify-content: center"></td>
                          <td><?= $kl['tgl_join'] ?></td>
                          <td>
                            <?php if($kl['role']==0){ ?>
                            <h6 class="badge badge-success">Pelanggan</h6>
                            <?php } ?>
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
