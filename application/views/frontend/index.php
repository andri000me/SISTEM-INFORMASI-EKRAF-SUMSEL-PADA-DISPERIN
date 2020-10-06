<!-- modal -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ultimatum E-Commerce UKM<br>Dinas Perindustrian Provinsi Sumatera Selatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Persyaratan Pendaftaran</h3>
        <ul>
            <li>1. Diri Pada KTP</li>
            <li>2. Dokumen Photo Diri, KTP, NPWP, Photo UKM. <br><small>* Format Dokumen Bentuk JPG,JPEG,PNG, Maks 2 Mb</small></li>
            <li>3. Koordinat Lokasi Usaha, Panduan Bisa Dilihat Link Berikut
                <br>Cara memasukan link Google :<br><center>
                <iframe width="450" height="300" src="https://www.youtube.com/embed/SatETmxwbcM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </li>
        </ul>
      </div>
      <div class="modal-footer">
        <a href="<?= base_url('Ukm/loginecom');?>" class="btn btn-primary">Login</a>
        <a href="<?= base_url('Ukm');?>" class="btn btn-primary">Daftar</a>
      </div>
    </div>
  </div>
</div>

    <!-- Start Banner -->
    <section id="ukm">
    <div class="ulockd-home-slider">
        <div class="container-fluid">
            <div class="row">
                <div class="pogoSlider" id="js-main-slider">
                  <?php foreach ($data_slide as $kl):?>
                    <div class="pogoSlider-slide" style="background-image:url(<?= base_url('assets/upload/slide/'.$kl['photo']) ?>);">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slide_text">
                                       <h3><span span class="theme_color">Punya UKM ??</span><br>Ayo Daftar</h3>
                                        <h4>Dibawah ini</h4>
                                        <br>
                                        <div class="full center">
										    <button class="contact_bt" data-toggle="modal" data-target="#exampleModal">Daftar E-Com</button>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php endforeach; ?>
                    
                </div>
                <!-- .pogoSlider -->
            </div>
        </div>
    </div>
    </section>
    <!-- End Banner -->
    <!-- section -->
	<div class="section tabbar_menu" >
	   <div class="container">
	      <div class="row">
		      <div class="col-md-12">
			     <div class="tab_menu">
                    <img src="<?=base_url("assets/ecom/img/card-list.png");?>" style="height: 50px;width: 1050px;margin-top: 30px">
				   
				 </div>
			  </div>
		  </div>
	   </div>
	</div>
	<!-- end section -->
   
	<!-- section -->
    <div class="section margin-top_50">
        <div class="container">
            <div class="row">
                <div class="col-md-6 layout_padding_2">
                    <div class="full">
                        <div class="heading_main text_align_left">
						   <h2><span>E-Commerce</span></h2>
                        </div>
						<div class="full">
						  <p>E-Commerce Adalah Salah Satu Platform Jual Beli Digital, Dinas Perindustrian Melalui Media Website Ini, Menawarkan Kepada Pelaku EKRAF Sumatera Selatan untuk melakukan registrasi UKM/ UKMK dihalaman Diatas</p>
						</div>
						<div class="full">
						   <a class="hvr-radial-out button-theme" href="#ukm">Registrasi</a>
						</div>
                    </div>
                </div>
				<div class="col-md-6">
                    <div class="full">
                        <img style="height: 330px" src="<?= base_url('assets/ecom/img/slide/') ?>s3.jpg" alt="#" />
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- end section -->
     <!-- peta persebaran UKM -->
          <div class="container">
            <div id="mapid" style="z-index: 2"></div>
          </div>
          <style type="text/css">
    #mapid { height: 480px; }
</style>
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>

   <script type="text/javascript">
    //setting map koordinat awal
    //level zoom pada map
      <?php $a= 12;?>
      var mymap = L.map('mapid').setView([-3.3848781, 104.8191939], <?= $a;?>);
      
      //setting token
      ACCESS_TOKEN = 'pk.eyJ1IjoiaWtobGFzdWwwNTA3IiwiYSI6ImNrOTY3cDJkNTBoeWYzcGwyeXhzMWR6c2wifQ.c3kroaKoyobXOSngsVKOTw';
      L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token='+ ACCESS_TOKEN, {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 20,
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1,
      accessToken: 'your.mapbox.access.token'
      }).addTo(mymap);

        //set icon untuk marker 
      var iconlogo = L.icon({
      iconUrl: '<?= base_url();?>assets/admin/icon/factory.svg',
      iconSize:     [38, 95], // size of the icon
      iconAnchor:   [22, 94], // point of the icon which will correcispond to marker's location
      popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnch
      });

        
      //pengulangan marker yang di ambil dari data base
    <?php foreach ($data_ukm as $key => $value){?>
        L.marker([<?= $value['latitude'];?>, <?= $value['longtitude'];?>],{icon:iconlogo})
        .bindPopup("<div><center><h4><?= $value['nama_usaha'];?></h4><br><img src='<?= base_url();?>assets/upload/dataukm/<?= $value['photo'];?>' width='200px' height='150px'><br><br><a href='<?= $value['link_usaha'];?>' class='btn btn-success' style='font-size:20px' target='_blank'><i class='fa fa-mail-forward'> Telusuri...</i></a></div>")
        .bindTooltip("<img src='<?= base_url();?>assets/upload/dataukm/<?= $value['photo'];?>' width='100px' height='50px' style='border-radius:100%'><br><table><tr><td>Nama Usaha</td><td>: <?= $value['nama_usaha'];?></td></tr><tr><td>Handphone</td><td>: <?= $value['handphone'];?></td></tr><tr><td>Kabupaten</td><td>: <?= $value['nama_kabupaten'];?></td></tr><tr><td>Kecamatan</td><td>: <?= $value['nama_kecamatan'];?></td></tr></table><br>").openTooltip()
        .addTo(mymap);  
    <?php } ?>

      //popup saat pertama kali di jalankan pada map
      //setting marker dan popup
      L.marker([-3.3920611,104.8300743],{icon:iconlogo}).addTo(mymap)
      .bindPopup("<center><img src='<?= base_url('assets/admin');?>/img/perindustrian.png' width='180px' height='150px'><br><h4>Persebaran Data <br>EKRAF SUMSEL</h4><br>Provinsi Sumatera Selatan")
      .openPopup();

      //popup ambil koordinat ketika peta diklik
      var popup = L.popup();
      function onMapClick(e) {
          popup
              .setLatLng(e.latlng)
              .setContent("Coordinate This Place is " + e.latlng.toString())
              .openOn(mymap);
      }
      mymap.on('click', onMapClick);
     </script>
     <section id="profil">
        <div class="section margin-top_50">
        <div class="container">
            <div class="row">
                <div class="col-md-12 layout_padding_2">
                    <div class="full">
                        <div class="heading_main text_align_left">
               <h2><span>Profil</span></h2>
                        </div>
            <div class="full">
             <img style="height: 200px;width:200px" src="<?= base_url('assets/admin');?>/img/perindustrian.png" alt="#" />
              <p>
               <h4> Makna Logo Kementerian Perindustrian</h4><br>
<small>
Bentuk logogram terinsipirasi dari gabungan stilasi daun, dengan sirkuit yang terdapat di dalam daun yang menghubungkan komponen elektronik satu sama lain tanpa kabel, dan roda gigi yang berjumlah 5 (lima) melambangkan 5 (lima) asas negara Indonesia dan 5 (lima) nilai inti (core value) Kementerian Perindustrian yaitu Integritas, Profesionalisme, Inovatif, Produktif, dan Kompetitif.<br>
</small>
<b>Kementerian Perindustrian diharapkan juga berperan dalam:<b><br>
<small>
peningkatan kesejahteraan rakyat;<br>
penciptaan lapangan kerja;<br>
peningkatan daya saing industri;<br>
kepedulian lingkungan;<br>
pengembangan inovasi pada pembangunan industri nasional.<br>
Bentuk huruf (typeface) yang bold dan dinamis merefleksikan kekuatan dan semangat dari Kementerian Perindustrian sebagai organisasi yang modern dan menjangkau seluruh masyarakat industri. Sedangkan warna biru pada huruf Kementerian Perindustrian menggambarkan pentingnya peran teknologi dalam pembangunan industri nasional.<br>
</small>
 

<b>Makna Warna Logo Kementerian Perindustrian<b><br>
<small>
Warna Merah Oranye melambangkan: Dinamis dan bijaksana.<br>

Warna Hijau melambangkan: Pertumbuhan, kesejahteraan dan berwawasan lingkungan.<br>

Warna Biru melambangkan: Percaya diri, kemandirian dan teknologi.<br>

Warna Abu-abu melambangkan: Sikap optimis dan berdaya guna.<br>
</small>
 

<b>Kode warna:<b><br>
<small>
PANTONE Red 032 C: RGB = 239, 65, 53; CMYK = 0, 90, 86, 0.<br>

PANTONE 368 C: RGB = 123, 193, 67; CMYK = 57, 0, 100, 0.<br>

PANTONE 287 C: RGB = 0, 83, 155; CMYK = 100, 68, 0, 12.<br>

PANTONE GRAY: RGB = 119, 120, 123; CMYK = 0, 0, 0, 65.
</small>
              </p>
            </div>
           
                    </div>
                </div>
    
            </div>
        </div>
    </div>
  <!-- end section -->
     </section>
    <!-- section -->
    <section id="galeri">
    <div class="section layout_padding padding_bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                           <h2><span>Galeri</span></h2>
                        </div>
                      </div>
                </div>
              </div>
               <div class="row">
                <div class="col-lg-12">
                    
                                <div class="row">
                                    <?php if ($data_galeri){?>
                                    <?php foreach ($data_galeri as $kl):?>
                                    <div class="col-md-3">
                                        <div class="full blog_img_popular">
                                           <img style="height: 180px" class="img-responsive" src="<?= base_url('assets/upload/galeri/'.$kl['photo_galeri']) ?>" alt="#" /> 
                                           <h6 class="text-center"><?= $kl['judul_galeri'];?></h6>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                <?php }else{?>
                                    <h2><span style="text-align: center;">Galeri Tidak Ada</span></h2>
                                <?php } ?>
                                </div>     
                </div>
            </div>            
           </div>
        </div>
    </section>

	<!-- section -->
    <section id="berita">
    <div class="section layout_padding padding_bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
						   <h2><span>Berita</span></h2>
                        </div>
					  </div>
                </div>
			  </div>
               <div class="row">
                <div class="col-lg-12">
                    <div id="demo" class="carousel slide" data-ride="carousel">
 <!-- The slideshow -->
                        <div class="carousel-inner">
                            
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                       <div class="full blog_img_popular">
                                          <img class="img-responsive" src="<?= base_url('assets/admin');?>/img/perindustrian.png" alt="#" />
                                          
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="full blog_img_popular">
                                          <h4 class="mt-2">Berita</h4>
                                          <p style="font-size: 30px;margin-top: 90px">Dinas Perindustrian <br>Provinsi Sumatera Selatan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            foreach ($berita as $kl) { ?> 
                             <div class="carousel-item">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                       <div class="full blog_img_popular">
                                          <img  class="img-responsive" style="height: 400px" src="<?= base_url('assets/upload/berita/'.$kl['photo_berita']) ?>" alt="#" />
                                          
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <div class="full blog_img_popular">
                                          <h4 class="mt-2"><?= $kl['judul_berita'];?></h4>
                                          <p><?= $kl['deskripsi_berita'];?><br><?= $kl['date_created'];?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>


                        </div>
                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                    </div>
                </div>

            </div>			  
           </div>
        </div>
    </section>
	<!-- end section -->
    <section id="pengaduan">
	<!-- section -->
    <div class="section layout_padding padding_bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
						   <h2><span>Pengaduan</span></h2>
                        </div>
					  </div>
                </div>
			  </div>
           </div>
        </div>
	<!-- end section -->
	<!-- section -->
    <div class="section contact_section" style="background:#12385b;">
        <div class="container">
               <div class="row">
                 <div class="col-lg-6 col-md-6 col-sm-12">
				    <div class="full float-right_img">
                        <img src="<?= base_url('assets/admin');?>/img/perindustrian.png" alt="#">
                        <h3 style="font-size: 20px; margin-left: 40px;color: white">Dinas Perindustrian Provinsi Sumatera Selatan</h3>
                    </div>
                 </div>
				 <div class="layout_padding col-lg-6 col-md-6 col-sm-12">
				    <div class="contact_form">
					    <form action="<?= base_url('Frontend/tambahpengaduan');?>" method="post" >
						   <fieldset>
						       <div class="full field">
							      <input type="text" placeholder="Nama" name="nama" required />
							   </div>
							   <div class="full field">
							      <input type="email" placeholder="Email" name="email"  required/>
							   </div>
							   <div class="full field">
							      <input type="phn" placeholder="Handphone" name="handphone"  required/>
							   </div>
							   <div class="full field">
							      <textarea placeholder="Pengaduan" name="pengaduan" required></textarea>
							   </div>
							   <div class="full field">
							      <div class="left"><button type="submit">Kirim</button></div>
							   </div>
						   </fieldset>
						</form>
					</div>
                 </div>
               </div>			  
           </div>
        </div>
	<!-- end section -->
    </section>
   