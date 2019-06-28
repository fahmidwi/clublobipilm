<!DOCTYPE html>
<html lang="en">

<!-- CSS -->
<?php $this->load->view('include/header.php'); ?>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

  <section id="event" class="home-section nopadd-bot color-dark">
    <div class="container marginbot-50 text-center" style="margin-top: -8%;">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
            <div class="section-heading text-center">
              <h2 class="h-bold">NEWS</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container" style="margin-top: -1%;">
      <div class="row">
        <div class="col-md-8">
          <div class="section-heading text-center">
              <h4>FAVORITE <b style="color: #c0392b">NEWS</b></h4>
            </div>
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <?php $no=1; foreach ($favberita as $res) { ?>
                <div class="item <?php if($no == 1){echo 'active';} ?> ?>">
                <img src="<?php echo base_url('assets/frontend/img/berita/').$res->gambar;?>" alt="this slide">
                <!-- Static Header -->
                <
                <div class="header-text hidden-xs" style="margin-top:30%;">
                  <div class="col-md-12">
                    <?php 
                      $judul = strtolower($res->judul_berita);
                      $ex = explode(" ",$judul);
                      $judul = $ex[0].'-'.$ex[1].'-'.$ex[2];
                      $uri = str_replace(" ","-",$judul);
                    ?>
                    <a href="<?php echo base_url('Home/db/'.$res->id_berita.'/'.$uri); ?>">
                      <h3><span><?php echo $res->judul_berita; ?></span></h3>
                      <p style="margin-top:-2%;color:white;"><?php echo substr($res->isi_berita,0,250)." . . ."; ?></p>
                    </a>
                  </div>
                </div>
                <!-- /header-text -->
              </div>
              <?php $no++;} ?>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="section-heading text-center">
              <h4>FRESH <b style="color: #c0392b;">NEWS</b></h4>
          </div>
          <div class="row" style="margin-bottom: 2%;">
            <div class="col-md-12 bg-gray">
              <a href="#" style="color: #c0392b">
                <h6 style="margin-top: 3%;"><b>INDIEFEST 2019 GENERATION</b></h6>
                <div class="col-md-12" style="margin-top: -5%;">
                  <i class="mdi mdi-calendar-text" ></i><i>17 Januari 2019</i>
                  <p >Komitmen PT Pertamina (Persero) melalui Marketing Operation Region (MOR) VII Sulawesi ketahanan.... <a href=""><i>Lihat selengkapnya</i></a></p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div><hr>
      <div class="row">
        <div class="col-md-12">
            <?php foreach ($berita as $res) { ?>
            <div class="row">
              <div class="col-md-3">
                <?php 
                  $judul = strtolower($res->judul_berita);
                  $ex = explode(" ",$judul);
                  $judul = $ex[0].'-'.$ex[1].'-'.$ex[2];
                  $uri = str_replace(" ","-",$judul);
                ?>
                <a href="<?php echo base_url('Home/db/'.$res->id_berita.'/'.$uri); ?>" class="thumbnail">
                  <img src="<?php echo base_url('assets/frontend/img/berita/'.$res->gambar) ?>">
                </a>
              </div>
              <div class="col-md-9">
                <h6 style="margin-top: 3%;"><b><?php $res->judul_berita ?></b></h6>
                  <div class="col-md-12" style="margin-top: -5%;">
                    <br>
                    <i class="mdi mdi-calendar-text" ></i><i>17 Januari 2019</i>
                    <p><?php echo substr($res->isi_berita,0,250)." . . ."; ?><a href="<?php echo base_url('Home/db/'.$res->id_berita.'/'.$uri); ?>"><i>Lihat selengkapnya</i></a></p>
                  </div>
              </div>
              </div>
            <?php } ?>
            <nav aria-label="Page navigation example" style="float:right;">
              <ul class="pagination">
                <?php echo $prev; ?>
                <?php echo $next; ?>
              </ul>
            </nav>
        </div>
        <!-- <div class="col-md-4">
          <div class="section-heading text-center">
              <h4>MOST <b style="color: #c0392b;">POPULAR</b></h4>
          </div>
          <div class="row" style="margin-bottom: 2%;">
            <div class="col-md-12 bg-gray">
              <a href="#" style="color: #c0392b">
                <h6 style="margin-top: 3%;"><b>INDIEFEST 2019 GENERATION</b></h6>
                <div class="col-md-12" style="margin-top: -5%;">
                  <i class="mdi mdi-calendar-text" ></i><i>17 Januari 2019</i>
                  <p >Komitmen PT Pertamina (Persero) melalui Marketing Operation Region (MOR) VII Sulawesi ketahanan.... <a href=""><i>Lihat selengkapnya</i></a></p>
                </div>
              </a>
            </div>
            </div>
            <div class="row" style="margin-bottom: 2%;">
            <div class="col-md-12 bg-gray">
              <a href="#" style="color: #c0392b">
                <h6 style="margin-top: 3%;"><b>INDIEFEST 2019 GENERATION</b></h6>
                <div class="col-md-12" style="margin-top: -5%;">
                  <i class="mdi mdi-calendar-text" ></i><i>17 Januari 2019</i>
                  <p >Komitmen PT Pertamina (Persero) melalui Marketing Operation Region (MOR) VII Sulawesi ketahanan.... <a href=""><i>Lihat selengkapnya</i></a></p>
                </div>
              </a>
            </div>
            </div>
            <div class="row" style="margin-bottom: 2%;">
            <div class="col-md-12 bg-gray">
              <a href="#" style="color: #c0392b">
                <h6 style="margin-top: 3%;"><b>INDIEFEST 2019 GENERATION</b></h6>
                <div class="col-md-12" style="margin-top: -5%;">
                  <i class="mdi mdi-calendar-text" ></i><i>17 Januari 2019</i>
                  <p >Komitmen PT Pertamina (Persero) melalui Marketing Operation Region (MOR) VII Sulawesi ketahanan.... <a href=""><i>Lihat selengkapnya</i></a></p>
                </div>
              </a>
            </div>
            </div>
        </div> -->
      </div>
    </div>
  </section>
  <!-- FOOTER -->
<?php $this->load->view('include/footer.php'); ?>

</body>
</html>
    