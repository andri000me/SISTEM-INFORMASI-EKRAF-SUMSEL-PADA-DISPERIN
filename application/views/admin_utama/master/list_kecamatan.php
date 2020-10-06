
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
                          <form class="form-horizontal" action=" <?= base_url('ControllerAdmin/TambahKecamatan');?>" method="post">
                            <div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align">Pilih Kabupaten</label>
                              <div class="col-md-6 col-sm-6 ">
                                <select class="select2_single form-control" tabindex="-1" name="id_kabupaten" required oninvalid="this.setCustomValidity('Data Harus Dipilih !')" oninput="setCustomValidity('')">
                                  <option selected disabled="disabled" value="">--Nama Kabupaten--</option>
                                  <?php foreach ($data_kabupaten as $k):?>
                                  <option value="<?= $k['id_kabupaten'];?>"><?= $k['nama_kabupaten'];?></option>
                                  <?php endforeach; ?>

                                </select>
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Kecamatan
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" name="nama_kecamatan" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')" autocomplete autofocus>
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
                  <?php foreach ($data_kecamatan as $k) :
                    $id_kecamatan= $k['id_kecamatan'];
                    $id_kabupaten= $k['id_kabupaten'];
                    $nama_kecamatan = $k['nama_kecamatan'];
                  ?>

                    <div class="modal fade bs-example-modal-lg" id="modal-edit<?php echo $k['id_kecamatan'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Form Edit <?= $link2; ?></h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" action=" <?= base_url('ControllerAdmin/EditKecamatan');?>/<?= $k['id_kecamatan'];?>" method="post">
                             <div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align">Pilih Kabupaten</label>
                              <div class="col-md-6 col-sm-6 ">
                                <select class="select2_single form-control" name="id_kabupaten" required oninvalid="this.setCustomValidity('Data Harus Dipilih !')" oninput="setCustomValidity('')">
                                  <option selected disabled="disabled" value="">--Nama Kabupaten--</option>
                                  <?php foreach ($data_kabupaten as $kk):?>
                                    <?php 
                                     if ($k['id_kabupaten']==$kk['id_kabupaten']) {
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
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Kecamatan
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" name="nama_kecamatan" value="<?= $k['nama_kecamatan'];?>" class="form-control" required oninvalid="this.setCustomValidity('Data Harus Diisi Dan Tidak Boleh Sama !')">
                                <input type="hidden" name="id_kecamatan" value="<?= $k['id_kecamatan'];?>">
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
                      Report Data Kecamatan
                    </p>

                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        
                        <tr>
                          <th>Id</th>
                          <th>Nama Kecamatan</th>
                          <th>Nama Kabupaten</th>
                          <th>Aksi</th>
                        </tr>
                        
                      </thead>


                      <tbody>
                        <?php foreach ($data_kecamatan as $kl):?>
                        <tr>
                          <td><?= $kl['id_kecamatan'];?></td>
                          <td><?= $kl['nama_kecamatan'] ?></td>
                          <td><?= $kl['nama_kabupaten'];?></td>
                          <td>
                             <a class="btn btn-social-icon btn-bitbucket btn-primary"  title='Edit' data-toggle="modal" data-target="#modal-edit<?= $kl['id_kecamatan'];?>" type="button"><i class="fa fa-edit "></i>
                             </a>
                              <a class="btn btn-social-icon btn-google btn-danger" href="<?= base_url('ControllerAdmin/HapusKecamatan/')?><?= $kl['id_kecamatan'];?>"  onclick="alert('Yakin, Data Di Hapus ?');" style="margin-right: 5px"  title='Hapus'><i class="fa fa-trash"></i>
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
