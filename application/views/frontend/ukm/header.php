
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Metas -->
    <title> <?=  $title; ?> </title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?= base_url('assets/frontend/images/i1.png');?>" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/bootstrap.min.css" />
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/pogo-slider.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/responsive.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/custom.css" />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
            <img src="<?= base_url('assets/frontend/') ?>images/loader.gif" alt="#" />
        </div>
    </div>
    <!-- end loader -->
    <!-- END LOADER -->

    <!-- Start header -->
    <header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html"><img src="<?= base_url('assets/admin');?>/img/perindustrian.png" alt="image"></a>
                PORTAL E-COMMERCE EKRAF PROVINSI SUMATERA SELATAN
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        
                        <li><a class="nav-link active" href="<?= base_url('Ukm/statusdaftar'); ?>">Status</a></li>

						<li><a class="nav-link" href="<?= base_url('Ukm/keluarecom'); ?>" onClick="return confirm('Yakin Keluar ?')">Keluar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->

    <!-- notifikasi -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<!-- end notifikasi -->
