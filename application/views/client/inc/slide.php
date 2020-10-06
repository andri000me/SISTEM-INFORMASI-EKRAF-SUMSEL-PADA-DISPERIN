<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <!-- <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol> -->
  <div class="carousel-inner">
    <?php
        $qs=$this->db->get_where("slide",array("status"=>"1"))->result();
        $ns=1;
        foreach ($qs as $key => $vqs) {
          if($ns==1){
              echo "<div class='carousel-item active'>
              <img src='".base_url('assets/ecom/img/slide/'.$vqs->foto)."' class='d-block w-100' alt='$vqs->foto'>
            </div>";
          }
          else{
              echo "<div class='carousel-item'>
              <img src='".base_url('assets/ecom/img/slide/'.$vqs->foto)."' class='d-block w-100' alt='$vqs->foto'>
            </div>";
          }
          
          $ns++;
        }

    ?>    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
