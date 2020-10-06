
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
                <a class="navbar-brand" href="<?= base_url('assets/admin');?>/img/perindustrian.png"><img src="<?= base_url('assets/admin');?>/img/perindustrian.png" alt="image"></a>
                DINAS PERINDUSTRIAN<BR> PROVINSI SUMATERA SELATAN
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link active" href="<?= base_url(); ?>">Beranda</a></li>
                        <li><a class="nav-link" href="#profil">Profil</a></li>
                        <li><a class="nav-link" href="#berita">Berita</a></li>
                        <li><a class="nav-link" href="<?= base_url('p'); ?>" target="_blank">E-Com</a></li>
                        <li><a class="nav-link" href="#galeri">Galeri</a></li>
						<li><a class="nav-link" href="#pengaduan">Pengaduan</a></li>
                    </ul>
                </div>
                <div id="google_translate_element" style="margin-left: 30px; margin-top: 5px"></div>
                    <script type="text/javascript">
                    function googleTranslateElementInit() {
                      new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                    }
                    </script>
                    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

            </div>
        </nav>
    </header>
    <!-- End header -->

    <!-- notifikasi -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<!-- end notifikasi -->
