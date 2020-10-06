<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <a class="navbar-brand" href="<?=site_url("p");?>">
    <img src="<?=base_url("assets/admin/img/perindustrian.png");?>" width="140" height="80" alt="logo_toko_ukm"><br>EKRAF SUMSEL
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?=site_url("p");?>"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kategori Produk
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
            $kategori=$this->db->get("kategori")->result();
            foreach ($kategori as $key => $vkat) {
              echo "<a class='dropdown-item' href='".site_url("p/kat_produk/view/".$vkat->id_kategori)."'>$vkat->nama_kategori</a>";
            }
          ?>
        </div>
      </li>
            
        <?php
          if($this->session->userdata("logged_in")){
            //echo "<a class='nav-link' href='".site_url("p/keluar")."'>Keluar</a>";
          }
          else{
            echo "<li class='nav-item'>
                    <a class='nav-link' href='".site_url("p/daftar")."'>Daftar</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='#' data-toggle='modal' data-target='#loginModal'>Login</a>
                  </li>";
          }
        ?>
      
    </ul>
    <form class="form-inline my-2 my-lg-0" action="<?=site_url('p/search/');?>" method="post">
      <input class="form-control mr-sm-2 input-sm" type="search" name='data_search' placeholder="Cari produk" aria-label="Search" required>
      <button class="btn btn-outline-default my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      <a class="btn btn-default" href="<?=site_url("p/cart");?>" title="Keranjang Belanja"><i class="fas fa-shopping-cart"></i></a>
    </form>
   
    <?php
       

      if($this->session->userdata("logged_in")){
         $nama_member = $this->session->userdata("nama_member");
        $data['user'] = $this->db->get_where('member',['nama_member'=>$nama_member])->row_array();

        if($data['user']['role']==0){
        //echo "<a class='nav-link' href='".site_url("p/keluar")."'>Keluar</a>";
        echo "<div class='dropdown'>
          <a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            <i class='far fa-user'></i>
          </a>

          <div class='dropdown-menu dropdown-menu-right' aria-labelledby='dropdownMenuLink'>
            <p class='ml-4 text-muted'><small>Hai,</small><br>
              <strong>".ucwords($this->session->userdata("nama_member"))."</strong>
            </p>
            <div class='dropdown-divider'></div>
            <a class='dropdown-item small' href='".site_url("p/c_transaksi/beli")."'>Transaksi</a>
            <a class='dropdown-item small' href='".site_url("p/c_setting/akun")."'>Pengaturan</a>
            <a class='dropdown-item small' href='".site_url("p/keluar")."'>Keluar</a>
          </div>
        </div>";
      }elseif($data['user']['role']==1)
      {
        //echo "<a class='nav-link' href='".site_url("p/keluar")."'>Keluar</a>";
        echo "<div class='dropdown'>
          <a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            <i class='far fa-user'></i>
          </a>

          <div class='dropdown-menu dropdown-menu-right' aria-labelledby='dropdownMenuLink'>
            <p class='ml-4 text-muted'><small>Hai,</small><br>
              <strong>".ucwords($this->session->userdata("nama_member"))."</strong>
            </p>
            <div class='dropdown-divider'></div>
            <a class='dropdown-item small' href='".site_url("p/c_toko/info")."'>Toko Saya</a>
            <a class='dropdown-item small' href='".site_url("p/c_transaksi/beli")."'>Transaksi</a>
            <a class='dropdown-item small' href='".site_url("p/c_setting/akun")."'>Pengaturan</a>
            <a class='dropdown-item small' href='".site_url("p/keluar")."'>Keluar</a>
          </div>
        </div>";
      }

      }
      else{
        //echo "<a class='nav-link' href='#' data-toggle='modal' data-target='#loginModal'>Masuk</a>";
      }
    ?>
    
  </div>
</nav>
<!-- Modal Login -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="emailInput">Email</label>
            <input type="email" name="emailMember" class="form-control" id="emailInput" aria-describedby="emailHelp" placeholder="Enter email">
            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
          </div>
          <div class="form-group">
            <label for="passwordInput">Password</label>
            <input type="password" name="passwordMember" class="form-control" id="passwordInput" placeholder="Password">
          </div>

      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="masukAct"><i class="fas fa-sign-in-alt"></i> Login</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
  if(isset($_POST["masukAct"])){
    $email=md5($_POST["emailMember"]);
    $pass=md5($_POST["passwordMember"]);
    $qc=$this->db->get_where("member",array("md5(email)"=>$email,"md5(password)"=>$pass));
    $hc=$qc->row();
    $jc=$qc->num_rows();
    if($jc==1){
      $dataLogin = array(
        'id_member'     => $hc->id_member,
        'nama_member'     => $hc->nama_member,
        'email'     => $email,
        'password'  => $pass,
        'logged_in' => TRUE
      );
      $this->session->set_userdata($dataLogin);
      redirect("p","refresh");
    }
    else{
      echo "<script>alert('Maaf, email atau password salah!');</script>";
      //redirect("p");
    }
  }
?>
