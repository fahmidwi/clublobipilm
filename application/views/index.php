<!DOCTYPE html>
<html lang="en">

<!-- CSS -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Website Club Lobi Pilm @2019">
  <meta name="author" content="fahmidwisyahputra(@dwifhmi), MochFahmi(@fahmidion_)">

  <title>CLP - Clublobipilm</title>

  <!-- css -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.min.css">
  <link href="<?php echo base_url('lib/frontend/css/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('lib/frontend/css/css/bootstrap.css');?>" rel="stylesheet" type="text/css">

  <link href="<?php echo base_url('lib/frontend/css/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('lib/frontend/css/css/nivo-lightbox.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('lib/frontend/css/css/nivo-lightbox-theme/default/default.css');?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('lib/frontend/css/css/owl.carousel.css');?>" rel="stylesheet" media="screen" />
  <link href="<?php echo base_url('lib/frontend/css/css/owl.theme.css');?>" rel="stylesheet" media="screen" />
  <link href="<?php echo base_url('lib/frontend/css/css/flexslider.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('lib/frontend/css/css/animate.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('lib/frontend/css/css/style.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('lib/frontend/css/color/default.css');?>" rel="stylesheet">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>


  <!-- Navigation -->
  <div id="navigation">
    <nav class="navbar navbar-custom" role="navigation">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="site-logo">
              <a href="index.html" class="brand"><img style="width:25%; height: 25%; margin-top: -7%;" src="<?php echo base_url('assets/frontend/img/logoclp.png') ?>"></img><clp style="font-size: 50%; margin-left: 2%;">Club lobi pilm</clp></a>
            </div>
          </div>


          <div class="col-md-9">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu"><i class="fa fa-bars"></i></button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="menu">
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#intro">Beranda</a></li>
                <li><a href="#about">Tentang Kami</a></li>
                <li><a href="#service">Program Kerja</a></li>
                <li><a href="#works">Hasil Karya</a></li>
                <li><a href="">Keanggotaan</a></li>
                <li><a href="#contact">Hubungi Kami</a></li>
              </ul>
            </div>
            <!-- /.Navbar-collapse -->

          </div>
        </div>
      </div>
      <!-- /.container -->
    </nav>
  </div>
  <!-- /Navigation -->
<?php $this->load->view('include/slideshow.php'); ?>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <!-- Section: about -->
  <section id="about" class="home-section color-dark bg-white">
    <div class="container marginbot-50" style="margin-top: -8%;">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
            <div class="section-heading text-center">
              <h2 class="h-bold">Sejarah Terbentuk</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
        <img src="<?php echo base_url('assets/frontend/img/clp.jpg') ?>" alt="" class="img-responsive"/>
        </div>
        <div class="col-md-6">
          <p style="text-align: justify;">
            <?php echo substr($sejarah->isi,0,1000).'...';?>
            <br><a href="<?php echo base_url('home/tentangKami') ?>" ><i>Lihat selengkapnya</i></a>
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- /Section: about -->
  <!-- Section: services -->
  <section id="service" class="home-section color-dark bg-gray">
    <div class="container marginbot-50" style="margin-top: -8%;">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
            <div class="section-heading text-center">
              <h2 class="h-bold">Program Kerja</h2>
              <div class="divider-header"></div>
              <p>Kegiatan yang dilaksanakan oleh Club Lobi Pilm</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center">
      <div class="container">
        <div class="row">
        <?php foreach ($proker as $res) { ?>
          <div class="col-md-4">
            <div class="wow fadeInLeft" data-wow-delay="0.2s">
              <div class="service-box">
                <div class="service-icon">
                </div>
                <div class="service-desc">
                  <h5><?php echo $res->judul ?></h5>
                  <p>
                    <?php echo substr($res->program_kerja,0,100); ?>  
                  </p>
                  <?php 
                    $judul = strtolower($res->judul);
                    $uri = str_replace(" ","-",$judul);
                  ?>
                  <a href="<?php echo base_url('home/infoProker/'.$res->id_proker.'/'.$uri); ?>" class="btn btn-skin">Lihat Selengkapnya</a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <!-- /Section: services -->
    <!-- Section: event -->
  <section id="event" class="home-section nopadd-bot color-dark">
    <div class="container marginbot-50 text-center" style="margin-top: -8%;">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
            <div class="section-heading text-center">
              <h2 class="h-bold">Seputar CLP</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container" style="margin-top: -1%;">
      <div class="row">
        <div class="col-md-5">
          <div class="section-heading text-center">
              <h4>FRESH <b style="color: #c0392b;">NEWS</b></h4>
          </div>
          <?php foreach($berita as $res) { ?>
            <div class="row" style="margin-bottom: 2%;">
              <?php 
                $judul = strtolower($res->judul_berita);
                $ex = explode(" ",$judul);
                $judul = $ex[0].'-'.$ex[1].'-'.$ex[2];
                $uri = str_replace(" ","-",$judul);
              ?>
              <div class="col-md-12 bg-gray">
                <a href="<?php echo base_url('home/db/'.$res->id_berita.'/'.$uri); ?>" style="color: #c0392b">
                  <h6 style="margin-top: 3%;"><b><?php echo $res->judul_berita; ?></b></h6>
                  <div class="col-md-12" style="margin-top: -5%;">
                    <i class="mdi mdi-calendar-text" ></i><i>17 Januari 2019</i>
                    <p><?php  echo substr($res->isi_berita,0,100).'...'; ?></p>
                  </div>
                </a>
              </div>
            </div>
          <?php } ?>
          <a href="<?php echo base_url('home/berita/0'); ?>"><i>Lebih banyak berita</i></a>
        </div>
        <div class="col-md-7">
          <div class="section-heading text-center">
              <h4>FAVORITE <b style="color: #c0392b">NEWS</b></h4>
            </div>
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
            <?php $no=1; foreach ($favberita as $res) { ?>
                <div class="item <?php if($no == 1){echo 'active';} ?> ?>">
                <img src="<?php echo base_url('assets/frontend/img/berita/').$res->gambar;?>" alt="this slide">
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
                      <p style="margin-top:-3%;color:white;"><?php echo substr($res->isi_berita,0,220)." . . ."; ?></p>
                    </a>
                  </div>
                </div>
                <!-- /header-text -->
              </div>
              <?php $no++;} ?>
            </div>

            <!-- Left and right controls -->
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
      </div>
    </div>
  </section>
  <!-- /Section: event -->

  <!-- Section: works -->
  <section id="works" class="home-section color-dark bg-gray text-center">
    <div class="container marginbot-50" style="margin-top: -8%;">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
            <div class="section-heading text-center">
              <h2 class="h-bold">Hasil Karya</h2>
              <div class="divider-header"></div>
              <p>Karya Anggota CLP</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
          <div class="wow bounceInUp" data-wow-delay="0.4s">
            <div id="owl-works" class="owl-carousel">
              <?php foreach ($karya as $res) { ?>
                <div class="item" style="box-shadow:3px 0px 7px 3px #ccc;border-radius:10px;">
                  <a href="<?php echo base_url('assets/frontend/img/poster_karya/'.$res->poster) ?>" title="<?php echo $res->judul_film; ?>" data-lightbox-gallery="gallery1" data-lightbox-hidpi="<?php echo base_url('assets/frontend/img/works/2@2x.jpg') ?>">
                    <img src="<?php echo base_url('assets/frontend/img/poster_karya/'.$res->poster) ?>" class="img-responsive " alt="img" style="border-radius:10px;width:651px;height:338px;z-index: 1; -webkit-filter:brightness(50%);">
                  </a>
                </div>
              <?php } ?>
            </div>
            <a href="<?php echo base_url('home/karya') ?>" class="btn btn-skin">Tonton sekarang</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Section: works -->

  <!-- Section: contact -->
  <section id="contact" class="home-section nopadd-bot color-dark bg-white">
    <div class="container marginbot-50" style="margin-top: -8%;">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
            <div class="section-heading text-center">
              <h2 class="h-bold">Hubungi Kami</h2>
              <div class="divider-header"></div>
              <p>Jika ada pertanyaan silahkan hubungi kami dengan cara mengisi form yang tersedia</p>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="container">

      <div class="row marginbot-80">
        <div class="col-md-8 col-md-offset-2">
        <?php echo ($this->session->flashdata('pesan')) ? '<i class="mdi mdi-check"></i><div style="color:blue">'.$this->session->flashdata('pesan').'</div>' : null ; ?>
          <div id="errormessage"></div>
          <form action="<?php echo base_url('home/hubkami') ?>" method="post" role="form" class="contactForm">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Anda" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email anda" data-rule="email" data-msg="Please enter a valid email" required />
                </div>
              </div>
              <div class="col-md-8">
                <label>Subjek</label>
                <div class="form-group">
                  <input type="text" class="form-control" name="subjek" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required/>
                </div>
                <label>Pesan</label>
                  <div class="form-group">
                    <textarea class="form-control" name="pesan" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Masukan Pesan Anda" required></textarea>
                  </div>
                <div class="g-recaptcha" data-sitekey="6LcjjKoUAAAAAP1ieU2BKCHqAB7puERah55AIbCn"></div>
                <br>
              </div>
            <div class="text-center"><button type="submit" class="btn btn-skin btn-lg btn-block">Kirim Pesan</button></div>
          </form>

        </div>
      </div>


    </div>
  </section>
  <!-- /Section: contact -->
  <!-- FOOTER -->
<?php $this->load->view('include/footer.php'); ?>

</body>

</html>
