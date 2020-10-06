
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="" class="site_title"><i class="fa fa-home"></i> <span>EKRAF SUMSEL</span></a>
            </div>
            <div class="inline"><center>
                <img src="<?= base_url('assets/admin');?>/img/perindustrian.png" alt="..." style="width: 180px;height: 120px; justify-content: center">
              </div>
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?= base_url('assets/admin');?>/icon/factory.svg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Adminstator</span>
                <h2>Ikhlasul Amal</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a href="<?= base_url('ControllerAdmin');?>"><i class="fa fa-home"></i> Home </a>
                    
                  </li>
                  <li><a><i class="fa fa-edit"></i> Data Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('ControllerAdmin/KategoriBek');?>">Kategori Bekraf</a></li>
                      <li><a href="<?= base_url('ControllerAdmin/klasterisasi');?>">Klasterisasi</a></li>
                      <li><a href="<?= base_url('ControllerAdmin/Pekerjaan');?>">Pekerjaan</a></li>
                      <li><a href="<?= base_url('ControllerAdmin/Data_Daerah');?>">Data Daerah</a></li>
                      <li><a href="<?= base_url('ControllerAdmin/Data_Kabupaten');?>">Data Kabupaten</a></li>
                      <li><a href="<?= base_url('ControllerAdmin/Data_Kecamatan');?>">Data Kecamatan</a></li>
                      <li><a href="<?= base_url('ControllerAdmin/Data_Desa');?>">Data Desa</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Data UKM <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('ControllerAdmin/PendaftaranUkm');?>">Pendaftaran UKM</a></li>
                      <li><a href="<?= base_url('ControllerAdmin/DataEcomUkm'); ?>">Data E-Commerce</a></li>
                      <li><a href="<?= base_url('ControllerAdmin/DataDaftarUkm'); ?>">Akun Daftar E-Commerce</a></li>
                      <li><a href="<?= base_url('ControllerAdmin/DataMemberUkm'); ?>">Akun Member E-Commerce</a></li>
                      <li><a href="<?= base_url('ControllerAdmin/DataBerkasUkm'); ?>">Data Berkas E-Com</a></li>
                      <li><a href="<?= base_url('ControllerAdmin/DataMasterUkm'); ?>">Data Master UKM</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Data Informasi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('ControllerAdmin/Berita'); ?>">Data Berita</a></li>
                      <li><a href="<?= base_url('ControllerAdmin/Pengaduan'); ?>">Data Pengaduan</a></li>
                      <li><a href="<?= base_url('ControllerAdmin/Galeri'); ?>">Data Galeri</a></li>
                      <li><a href="<?= base_url('ControllerAdmin/Slide'); ?>">Data Slide</a></li>
                      <li><a href="<?= base_url('ControllerAdmin/Pengunjung'); ?>">Data Pengunjung</a></li>
                      
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-users"></i> Data Akun <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('ControllerAdmin/DataAdmin'); ?>">Akun Admin Dinas</a></li>
                      <li><a href="<?= base_url('ControllerAdmin/DataAdminEcom'); ?>">Akun Admin E-Commerce</a></li>
                    </ul>
                  </li>
                </ul>
                <center>
                
              </div>
           

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a style="width: 100%" data-toggle="tooltip" data-placement="top" title="Logout" onclick="return confirm('Yakin Keluar ?');" href="<?= base_url('Auth/logout') ?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
