<!-- notifikasi -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<!-- end notifikasi -->


        <!-- page content -->
        <div class="right_col" role="main">

          
        
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-2 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Master UKM</span>
              <div class="count">
                <?php 
                    $a = $this->db->query("SELECT *FROM tbl_master_ukm");
                    $hasil= $a->num_rows();
                    echo $hasil;      
                ?>
           </div>
              <span class="count_bottom"><i class="green">100% </i> Real Time</span>
            </div>
           
            <div class="col-md-2 tile_stats_count ml-2 mr-3">
              <span class="count_top"><i class="fa fa-user"></i> Total E-Commerce</span>
              <div class="count green">
                <?php 
                    $a = $this->db->query("SELECT *FROM tbl_master_ukm WHERE status_usaha='1'");
                    $hasil= $a->num_rows();
                    echo $hasil;      
                ?>
              </div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>100% </i> Real Time</span>
            </div>
            <div class="col-md-2 tile_stats_count ml-2 mr-3">
              <span class="count_top"><i class="fa fa-user"></i> Total Bekraf</span>
              <div class="count">
                <?php 
                    $a = $this->db->query("SELECT *FROM tbl_master_ukm");
                    $hasil= $a->num_rows();
                    echo $hasil;      
                ?>
              </div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>100% </i> Real Time</span>
            </div>
            <div class="col-md-2 tile_stats_count ml-2 mr-3">
              <span class="count_top"><i class="fa fa-user"></i> Total Klasterisasi</span>
              <div class="count">
                 <?php 
                    $a = $this->db->query("SELECT *FROM tbl_master_ukm");
                    $hasil= $a->num_rows();
                    echo $hasil;      
                ?>
              </div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>100% </i> Real Time</span>
            </div>
            <div class="col-md-2 tile_stats_count ml-2 mr-3">
              <span class="count_top"><i class="fa fa-user"></i> Total Daerah</span>
              <div class="count">
                 <?php 
                    $a = $this->db->query("SELECT *FROM tbl_daerah");
                    $hasil= $a->num_rows();
                    echo $hasil;      
                ?>
              </div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>100% </i> Real Time</span>
            </div>
            
           
          </div>
        </div>
          <!-- /top tiles -->
          <hr>
          <div class="row">
            <div class="col-12">
              <form method="get" action="<?= base_url();?>ControllerAdmin/CariBeranda">
              <div class="form-group row">
                      <div class="col-md-3 col-sm-3 ">
                        <select class="select2_single form-control" tabindex="-1" name="id_klasterisasi">
                           <option selected disabled="disabled" value="">--Pilih klasterisasi--</option>
                           <option value="0">Semua Klasterisasi</option>
                            <?php foreach ($data_klasterisasi as $k):?>
                            <option value="<?= $k['id_klasterisasi'];?>"><?= $k['nama_klasterisasi'];?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-3 ">
                        <select class="select2_single form-control" tabindex="-1" name="id_bekraf">
                           <option selected disabled="disabled" value="">--Pilih Kategori--</option>
                           <option value="0">Semua Kategori</option>
                            <?php foreach ($data_kategoribek as $kk):?>
                            <option value="<?= $kk['id_bekraf'];?>"><?= $kk['nama_bekraf'];?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-3 ">
                        <select class="select2_single form-control" tabindex="-1" name="id_daerah">
                          <option selected disabled="disabled" value="">--Pilih Daerah--</option>
                           <option value="0">Semua Daerah</option>
                            <?php foreach ($data_daerah as $kkk):?>
                            <option value="<?= $kkk['id_daerah'];?>"><?= $kkk['nama_daerah'];?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-3 ">
                        <button type="submit" class="btn btn-success col-md-12">Cari</button>
                      </div>
                    </div>
                    </form>
            </div>
           
          </div>


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

      //koordinat kecamatan
      // var circle = L.circle([51.508, -0.11], {
      // color: 'red',
      // fillColor: '#f03',
      // fillOpacity: 0.5,
      // radius: 500
      // }).addTo(mymap);

      //set icon untuk marker 
      var iconlogo = L.icon({
      iconUrl: '<?= base_url();?>assets/admin/icon/factory.svg',
      iconSize:     [38, 95], // size of the icon
      iconAnchor:   [22, 94], // point of the icon which will correcispond to marker's location
      popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnch
      });

      //set icon untuk marker
      // var iconsrn = L.icon({
      // iconUrl: '<?= base_url();?>assets/users/img/svg_icon/hotel.svg',
      // iconSize:     [38, 95], // size of the icon
      // iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
      // popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnch
      // });
      // //set icon untuk marker
      // var iconlogo = L.icon({
      // iconUrl: '<?= base_url();?>assets/users/img/svg_icon/logo.svg',
      // iconSize:     [38, 95], // size of the icon
      // iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
      // popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnch
      // });
      //  //set icon untuk marker
      // var iconbdy = L.icon({
      // iconUrl: '<?= base_url();?>assets/users/img/svg_icon/dance.svg',
      // iconSize:     [38, 95], // size of the icon
      // iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
      // popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnch
      // });
      
      
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




          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Grafik Persebaran UKM</h3>
                  </div>
                  <div class="col-md-6">
                   
                  </div>
                </div>

                <div class="col-md-9 col-sm-9 ">
                  <canvas id="myChart"></canvas>
                </div>
                <div class="col-md-3 col-sm-3  bg-white">
                  <div class="x_title">
                    <h2>Klasterisasi</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-12 col-sm-12 ">
                    <div>
                      <p>Modal Kerja</p>
                      <?php 
                            $c = $this->db->query("SELECT * FROM tbl_master_ukm");
                            $a = $this->db->query("SELECT * FROM tbl_master_ukm WHERE id_klasterisasi='1'");
                            $f = $this->db->query("SELECT * FROM tbl_master_ukm WHERE id_klasterisasi='2'");
                            $b = $a->num_rows();
                            $h = $f->num_rows();
                            $d = $c->num_rows();
                            $g = $b*100/$d;
                            $i = $h*100/$d;


                       ?>
                      <div class="">
                        <small>Kalkulasi : <?= $g;?>% </small>
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?= $g;?>" title="<?= $g;?>%"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>Tenaga Kerja</p>
                      <div class="">
                        <small>Kalkulasi : <?= $i;?>% </small>
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?= $i;?>" title="<?= $i;?>%"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 ">
                  
                  </div>

                </div>

                <div class="clearfix"></div>
              </div>
            </div>

              <div class="col-md-6 col-sm-6 mt-4 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Grafik Klasterisasi</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="klasterisasi"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 mt-4  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Grafik Kategori Ekraf</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="bekraf"></canvas>
                  </div>
                </div>
              </div>
          </div>
          <br />
        </div>
        <!-- /page content -->
<?php
   
    //total ukm perkabupaten
    $kabupaten= "";
    $jumlahukm=null;
    //Query SQL
    $sql=$this->db->query("select kabupaten,COUNT(*) as 'total' from tbl_master_ukm GROUP by kabupaten ")->result_array();


    foreach ($sql as $data) {
      //Mengambil nilai jurusan dari database
        if ($data['kabupaten']==10){
            $cb = $this->db->query("SELECT * FROM tbl_master_ukm");
            $ab = $this->db->query("SELECT * FROM tbl_master_ukm WHERE kabupaten='10'");
            $bb = $cb->num_rows();
            $db = $ab->num_rows();
            $gb = ($db/$bb)*100;
            $kb = substr($gb, 0,4);
            $kab="Banyuasin : ".$kb."%";
        }elseif ($data['kabupaten']==11){ 
            $ca = $this->db->query("SELECT * FROM tbl_master_ukm");
            $aa = $this->db->query("SELECT * FROM tbl_master_ukm WHERE kabupaten='11'");
            $ba = $ca->num_rows();
            $da = $aa->num_rows();
            $ga = ($da/$ba)*100;
            $ka = substr($ga, 0,4);
            $kab="Empat Lawang : ".$ka."%";
        }elseif ($data['kabupaten']==12){ 
            $cc = $this->db->query("SELECT * FROM tbl_master_ukm");
            $ac = $this->db->query("SELECT * FROM tbl_master_ukm WHERE kabupaten='12'");
            $bc = $cc->num_rows();
            $dc = $ac->num_rows();
            $gc = ($dc/$bc)*100;
            $kc = substr($gc, 0,4);
            $kab="Lahat : ".$kc."%";
        }elseif ($data['kabupaten']==13){ 
            $cd = $this->db->query("SELECT * FROM tbl_master_ukm");
            $ad = $this->db->query("SELECT * FROM tbl_master_ukm WHERE kabupaten='13'");
            $bd = $cd->num_rows();
            $dd = $ad->num_rows();
            $gd = ($dd/$bd)*100;
            $kd = substr($gd, 0,4);
            $kab="Muara Enim : ".$kd."%";
        }elseif ($data['kabupaten']==14){ 
            $ce = $this->db->query("SELECT * FROM tbl_master_ukm");
            $ae = $this->db->query("SELECT * FROM tbl_master_ukm WHERE kabupaten='14'");
            $be = $ce->num_rows();
            $de = $ae->num_rows();
            $ge = ($de/$be)*100;
            $ke = substr($ge, 0,4);
            $kab="Musi Banyuasin : ".$ke."%";
        }elseif ($data['kabupaten']==15){ 
            $cf = $this->db->query("SELECT * FROM tbl_master_ukm");
            $af = $this->db->query("SELECT * FROM tbl_master_ukm WHERE kabupaten='15'");
            $bf = $cf->num_rows();
            $df = $af->num_rows();
            $gf = ($df/$bf)*100;
            $kf = substr($gf, 0,4);
            $kab="Musi Rawas : ".$kf."%";
        }elseif ($data['kabupaten']==16){ 
            $cg = $this->db->query("SELECT * FROM tbl_master_ukm");
            $ag = $this->db->query("SELECT * FROM tbl_master_ukm WHERE kabupaten='16'");
            $bg = $cg->num_rows();
            $dg = $ag->num_rows();
            $gg = ($dg/$bg)*100;
            $kg = substr($gg, 0,4);
            $kab="Musi Rawas Utara : ".$kg."%";
        }elseif ($data['kabupaten']==17){ 
            $ch = $this->db->query("SELECT * FROM tbl_master_ukm");
            $ah = $this->db->query("SELECT * FROM tbl_master_ukm WHERE kabupaten='17'");
            $bh = $ch->num_rows();
            $dh = $ah->num_rows();
            $gh = ($dh/$bh)*100;
            $kh = substr($gh, 0,4);
            $kab="Ogan Ilir : ".$kh."%";
        }elseif ($data['kabupaten']==18){ 
            $ci = $this->db->query("SELECT * FROM tbl_master_ukm");
            $ai = $this->db->query("SELECT * FROM tbl_master_ukm WHERE kabupaten='18'");
            $bi = $ci->num_rows();
            $di = $ai->num_rows();
            $gi = ($di/$bi)*100;
            $ki = substr($gi, 0,4);
            $kab="Ogan Komering Ilir : ".$ki."%";
        }elseif ($data['kabupaten']==19){ 
            $cj = $this->db->query("SELECT * FROM tbl_master_ukm");
            $aj = $this->db->query("SELECT * FROM tbl_master_ukm WHERE kabupaten='19'");
            $bj = $cj->num_rows();
            $dj = $aj->num_rows();
            $gj = ($dj/$bj)*100;
            $kj = substr($gj, 0,4);
            $kab="Ogan Komering Ulu : ".$kj."%";
        }elseif ($data['kabupaten']==20){ 
            $ck = $this->db->query("SELECT * FROM tbl_master_ukm");
            $ak = $this->db->query("SELECT * FROM tbl_master_ukm WHERE kabupaten='20'");
            $bk = $ck->num_rows();
            $dk = $ak->num_rows();
            $gk = ($dk/$bk)*100;
            $kk = substr($gk, 0,4);
            $kab="Ogan Komering Ulu Selatan : ".$kk."%";
        }elseif ($data['kabupaten']==21){ 
            $cl = $this->db->query("SELECT * FROM tbl_master_ukm");
            $al = $this->db->query("SELECT * FROM tbl_master_ukm WHERE kabupaten='21'");
            $bl = $cl->num_rows();
            $dl = $al->num_rows();
            $gl = ($dl/$bl)*100;
            $kl = substr($gl, 0,4);
            $kab="Ogan Komering Ulu Timur : ".$kl."%";
        }elseif ($data['kabupaten']==22){ 
            $cm = $this->db->query("SELECT * FROM tbl_master_ukm");
            $am = $this->db->query("SELECT * FROM tbl_master_ukm WHERE kabupaten='22'");
            $bm = $cm->num_rows();
            $dm = $am->num_rows();
            $gm = ($dm/$bm)*100;
            $km = substr($gm, 0,4);
            $kab="Penukal Abab Lematang Ilir : ".$km."%";
        }elseif ($data['kabupaten']==23){ 
            $cn = $this->db->query("SELECT * FROM tbl_master_ukm");
            $an = $this->db->query("SELECT * FROM tbl_master_ukm WHERE kabupaten='23'");
            $bn = $cn->num_rows();
            $dn = $an->num_rows();
            $gn = ($dn/$bn)*100;
            $kn = substr($gn, 0,4);
            $kab="Lubuk Linggau : ".$kn."%";
        }elseif ($data['kabupaten']==24){ 
            $co = $this->db->query("SELECT * FROM tbl_master_ukm");
            $ao = $this->db->query("SELECT * FROM tbl_master_ukm WHERE kabupaten='24'");
            $bo = $co->num_rows();
            $do = $ao->num_rows();
            $go = ($do/$bo)*100;
            $ko = substr($go, 0,4);
            $kab="Kota Pagaralam : ".$ko."%";
        }elseif ($data['kabupaten']==25){ 
            $cp = $this->db->query("SELECT * FROM tbl_master_ukm");
            $ap = $this->db->query("SELECT * FROM tbl_master_ukm WHERE kabupaten='25'");
            $bp = $cp->num_rows();
            $dp = $ap->num_rows();
            $gp = ($dp/$bp)*100;
            $kp = substr($gp, 0,4);
            $kab="Kota Palembang : ".$kp."%";
        }elseif ($data['kabupaten']==26){ 
            $cq = $this->db->query("SELECT * FROM tbl_master_ukm");
            $aq = $this->db->query("SELECT * FROM tbl_master_ukm WHERE kabupaten='26'");
            $bq = $cq->num_rows();
            $dq = $aq->num_rows();
            $gq = ($dq/$bq)*100;
            $kq = substr($gq, 0,4);
            $kab="Kota Prabumulih : ".$kq."%";
        }
        $kabupaten .= "'$kab'". ", ";
        //Mengambil nilai total dari database
        $jum=$data['total'];
        $jumlahukm .= "$jum". ", ";
    }

   //total klasterisasi perkabupaten
    $klasterisasi= "";
    $jumlahk=null;
    $sql=$this->db->query("select id_klasterisasi,COUNT(*) as 'total' from tbl_master_ukm GROUP by id_klasterisasi")->result_array();

    foreach ($sql as $data) {
        if ($data['id_klasterisasi']==1){
            $jk="Modal Kerja";
        }else {
            $jk="Tenaga Kerja";
        }
        $klasterisasi .= "'$jk'". ", ";

        $jum=$data['total'];
        $jumlahk .= "$jum". ", ";
    }

    //total klasterisasi perkabupaten
    $bekraf= "";
    $jumlahb=null;
    $sql=$this->db->query("select id_bekraf,COUNT(*) as 'total' from tbl_master_ukm GROUP by id_bekraf")->result_array();

    foreach ($sql as $data) {
        if ($data['id_bekraf']==1){
            $bek="Aplikasi Dan Pengembangan Permainana";
        }else if ($data['id_bekraf']==2){
            $bek="Arsitektur";
        }else if ($data['id_bekraf']==3){
            $bek="Desain Interior";
        }else if ($data['id_bekraf']==4){
            $bek="Desain Komunikasi Visual";
        }else if ($data['id_bekraf']==5){
            $bek="Desain Produk";
        }else if ($data['id_bekraf']==6){
            $bek="Fotografi";
        }else if ($data['id_bekraf']==7){
            $bek="Film Animasi Dan Video";
        }else if ($data['id_bekraf']==8){
            $bek="Kriya";
        }else if ($data['id_bekraf']==9){
            $bek="Kuliner";
        }else if ($data['id_bekraf']==10){
            $bek="Musik";
        }else if ($data['id_bekraf']==11){
            $bek="Penerbitan";
        }else if ($data['id_bekraf']==12){
            $bek="Periklanan";
        }else if ($data['id_bekraf']==13){
            $bek="Seni Pertunjukkan";
        }else if ($data['id_bekraf']==14){
            $bek="Seni Rupa";
        }else if ($data['id_bekraf']==15){
            $bek="Televisi Dan Radio";
        }else if ($data['id_bekraf']==16){
            $bek="Fashion";
        }

        $bekraf .= "'$bek'". ", ";

        $jum=$data['total'];
        $jumlahb .= "$jum". ", ";
    }

    ?>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: [<?php echo $kabupaten; ?>],
            datasets: [{
                label:'Total Ekraf Perkabupaten ',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlahukm; ?>]
            }]
        },

        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
// klasterisasi
    var ctx = document.getElementById('klasterisasi').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: [<?php echo $klasterisasi; ?>],
            datasets: [{
                label:'Total Klasterisasi UKM',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlahk; ?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });

    //kategori bekraf

    // klasterisasi
    var ctx = document.getElementById('bekraf').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'pie',
        // The data for our dataset
        data: {
            labels: [<?php echo $bekraf; ?>],
            datasets: [{
                label:'Data Kategori Bekraf',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlahb; ?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
    
</script>
