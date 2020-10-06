<?php 
    $user= $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
 ?>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?= base_url('assets/upload/akun/'.$user['photo']);?>" alt=""><?= $user['nama'];?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> <?= $user['email'];?></a>
                    <a class="dropdown-item"  href="javascript:;"> <?= $user['ttl'];?></a>
                    <a class="dropdown-item"  href="javascript:;"> <?= $user['kode'];?></a>
                    <a class="dropdown-item" onclick="return confirm('Yakin Keluar ?');" href="<?= base_url('Auth/logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->