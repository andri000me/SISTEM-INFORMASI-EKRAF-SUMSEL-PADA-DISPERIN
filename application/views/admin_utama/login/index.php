
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title; ?></title>

    <!-- Bootstrap -->
    <link href=".<?= base_url('assets/admin');?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/admin');?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="<?= base_url('assets/admin');?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url('assets/admin');?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('assets/admin');?>/build/css/custom.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="<?= base_url('assets/sweetalert/');?>js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/sweetalert/');?>js/myscript.js"></script>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <!-- notifikasi -->
<?php  if($this->session->flashdata('pesan')): ?>   
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><?= $this->session->flashdata('pesan');?></strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php  endif; ?>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <img src="<?= base_url('assets/admin');?>/img/perindustrian.png" alt="..." style="width: 180px;height: 120px; justify-content: center">
            <form method="post" action="<?= base_url('Auth/login');?>">

              <h1>Silahkan Masuk</h1>
              <div >
               <h6 style="text-align: left">Email</h6>
                <input type="text" class="form-control" placeholder="Email" required="" name="email" />
                <small><?= form_error('email'); ?></small>
              </div>
              <div>
                <h6 style="text-align: left">Tanggal Lahir</h6>
                <input type="date" class="form-control" placeholder="Tanggal Lahir" required="" name="ttl" />
                <small><?= form_error('ttl'); ?></small>
              </div>
              <div>
                <h6 style="text-align: left;margin-top: 20px">Password</h6>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
                <small><?= form_error('password'); ?></small>
              </div>

              <div style="justify-content: left">
                <button class="btn btn-primary" type="submit" >Masuk</button>
                <button class="btn btn-warning" type="reset" >Reset</button>
                <a type="button" class="reset_pass" data-toggle="modal" data-target="#exampleModal">Lupa Password ?</a>

              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Buat Akun Baru?
                  <a href="#signup" class="to_register"> Buat Akun </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <p>©<?= date('Y');?> All Rights Reserved.  Dinas Perindustrian Provinsi Sumatera Selatan</p>
                </div>
              </div>
            </form>
          </section>
        </div>

       <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Lupa Password</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="<?= base_url('Auth/lupapass');?>">
                <div>
                <h6 style="text-align: left">Email</h6>
                <input type="email" class="form-control" name="email" placeholder="Email" required/>
              </div>
              <div class="mb-2 mt-2">
                <h6 style="text-align: left">Tanggal Lahir</h6>
                <input type="date" class="form-control" name="ttl" placeholder="tanggal lahir" required />
              </div>
              <button type="reset" class="btn btn-secondary">Reset</button>
              <button type="submit" class="btn btn-primary">Kirim</button>
              </form>
            </div>
          </div>
        </div>
      </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <img src="<?= base_url('assets/admin');?>/img/perindustrian.png" alt="..." style="width: 180px;height: 120px; justify-content: center">
            <form method="post" action="<?=  base_url('Auth/daftar');?>" enctype="multipart/form-data">
              <h1>Akun Baru</h1>
              <div>
                <h6 style="text-align: left">Nama</h6>
                <input type="text" name="nama" class="form-control" placeholder="Nama" required="" />
                <small><?= form_error('nama'); ?></small>
              </div>
              <div>
                <h6 style="text-align: left">Email</h6>
                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
                <small><?= form_error('email'); ?></small>
              </div>
              <div>
                <h6 style="text-align: left">Tanggal Lahir</h6>
                <input type="date" name="ttl" class="form-control" placeholder="Tanngal Lahir" required="" />
                <small><?= form_error('ttl'); ?></small>
              </div>
              <div>
                <h6 style="text-align: left; margin-top: 20px">Photo</h6>
                <input type="file" name="photo" class="form-control" placeholder="Photo" required="" />
                <small><?= form_error('photo'); ?></small>
              </div>
              <div>
                <h6 style="text-align: left; margin-top: 20px">Password</h6>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                <small><?= form_error('password'); ?></small>
                <input type="hidden" name="status" value="0">
              </div>
              <div>
                <button class="btn btn-primary" type="submit" >Daftar</button>
                <button class="btn btn-warning" type="reset" >Reset</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Sudah Punya Akun ?
                  <a href="#signin" class="to_register"> Masuk</a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <p>©<?= date('Y');?> All Rights Reserved.  Dinas Perindustrian Provinsi Sumatera Selatan</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>


  <script src="<?= base_url('assets/sweetalert/');?>js/sweetalert2.all.min.js"></script>
  <script src="<?= base_url('assets/sweetalert/');?>js/myscript.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>
