<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>Login page - Toko UKM Administrator</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <style type="text/css">
         body {
         font-family: "Lato", sans-serif;
         }
         .main-head{
         height: 150px;
         background: #FFF;
         }
         .sidenav {
         height: 100%;
         /* background-color: #000; */
         background-color: rgba(0, 0, 0, 0.6);
         overflow-x: hidden;
         padding-top: 20px;
         }
         .main {
         padding: 0px 10px;
         }
         @media screen and (max-height: 450px) {
         .sidenav {padding-top: 15px;}
         }
         @media screen and (max-width: 450px) {
         .login-form{
         margin-top: 10%;
         }
         .register-form{
         margin-top: 10%;
         }
         }
         @media screen and (min-width: 768px){
         .main{
         margin-left: 40%; 
         }
         .sidenav{
         width: 40%;
         position: fixed;
         z-index: 1;
         top: 0;
         left: 0;
         }
         .login-form{
         margin-top: 80%;
         }
         .register-form{
         margin-top: 20%;
         }
         }
         .login-main-text{
         margin-top: 20%;
         padding: 60px;
         color: #fff;
         }
         .login-main-text h2{
         font-weight: 300;
         }
         .btn-black{
         background-color: #000 !important;
         color: #fff;
         }
      </style>
      <style>body{font-family:'Open Sans';font-style:normal;font-weight:700;font-display:swap;src:local('Open Sans Bold'),local('OpenSans-Bold'),url(https://fonts.gstatic.com/s/opensans/v17/mem5YaGs126MiZpBA-UN7rgOUuhpKKSTjw.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}</style>
    
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   </head>
   <body>
      <div class="sidenav">
         <div class="login-main-text">
            <h2><strong>TOKO UKM</strong><br> Administrator</h2>
            <p>Silahkan login untuk masuk kehalaman Admin.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form method="post">
                  <div class="form-group">
                     <label>Username</label>
                     <input type="text" name="username" class="form-control" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" class="form-control" placeholder="Password" required>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary">Login</button>
                  <button type="reset" class="btn">Reset</button>
               </form>
                <?php
                    if(isset($_POST["submit"])){
                        $uname=$_POST["username"];
                        $passwd=$_POST["password"];
                        $cek=$this->db->get_where("admin",array("username"=>$uname,"password"=>$passwd));
                        $jc=$cek->num_rows();
                        $hc=$cek->row();
                        if($jc>0){
                            $newdata = array(
                                'username'  => $uname,
                                'id_admin'  => $hc->id_admin,
                                'logged_in' => TRUE
                            );
                            
                            $this->session->set_userdata($newdata);
                            redirect("admin/dtransaksi","refresh");
                        }
                        else{
                            echo "<script>alert('Username atau Password salah, silahkan coba lagi');</script>";
                        }
                    }

                ?>
            </div>
         </div>
      </div>
      <script type="text/javascript"></script>
   </body>
</html>