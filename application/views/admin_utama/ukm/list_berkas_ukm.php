
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
                      Data Berkas UKM
                    </p>

                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        
                        <tr>
                          <th>ID Berkas</th>
                          <th>NIK</th>
                          <th>Nama</th>
                          <th>Photo Diri</th>
                          <th>Photo KTP</th>
                          <th>Photo NPWP</th>
                          <th>Photo UKM</th>
                          <th>Status Berkas</th>
                          <th>Aksi</th>
                        </tr>
                        
                      </thead>


                      <tbody>
                        <?php foreach ($data_berkas as $kl):?>
                        <tr>
                         
                          <td><?= $kl['id_berkas'];?></td>
                          <td><?= $kl['nik'];?></td>
                          <td><?= $kl['nama_pemilik'];?></td>
                          <td><img src="<?= base_url('assets/upload/dataukm/'.$kl['photo_diri']) ?>" alt="..." style="width: 180px;height: 120px; justify-content: center"></td>
                          <td><img src="<?= base_url('assets/upload/dataukm/'.$kl['photo_ktp']) ?>" alt="..." style="width: 180px;height: 120px; justify-content: center"></td>
                          <td><img src="<?= base_url('assets/upload/dataukm/'.$kl['photo_npwp']) ?>" alt="..." style="width: 180px;height: 120px; justify-content: center"></td>
                          <td><img src="<?= base_url('assets/upload/dataukm/'.$kl['photo']) ?>" alt="..." style="width: 180px;height: 120px; justify-content: center"></td>
                        
                          <td>
                            <?php if($kl['statusb']==0){ ?>
                            <h6 class="badge badge-success">Terverifikasi</h6>
                            <?php } ?>
                          </td>
                          <td>
                               <a class="btn btn-social-icon btn-google btn-danger" href="<?= base_url('ControllerAdmin/HapusBerkasUkm/')?><?= $kl['id_berkas'];?>" style="margin-right: 5px"  title='Hapus' onclick="return confirm('Yakin, Data Di Hapus ?');"><i class="fa fa-trash">Hapus</i>
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
