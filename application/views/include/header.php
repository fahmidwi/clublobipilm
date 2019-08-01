<style type="text/css">
@media screen and (max-width: 1600px) {
                    .img_hp{
                       display:none;
                    }
                  }
            @media screen and (max-width: 600px) {
                    .img_hp{
                        display:block;
                    }
                        .img_desktop{
                            display:none;    
                        }
                        
                  }
</style>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/frontend/img/logoclp.png') ?>">
  <title>CLP - Clublobipilm</title>

  <!-- css -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.materialdesignicons.com/1.9.32/">
  <link href="<?php echo base_url('lib/frontend/css/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css">
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
  <div id="navigation" style="background-color: #101010;">
    <nav class="navbar navbar-custom" role="navigation">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div class="site-logo">
              <a href="<?php echo base_url('home') ?>" class="brand"><img style="width:150%; height: 150%; margin-top:-3%; margin-left: -20%" class="img_desktop" src="<?php echo base_url('assets/frontend/img/logoclphead.png') ?>"></img>
                <img style="width:80%; height: 80%; margin-top:-4%;" class="img_hp" src="<?php echo base_url('assets/frontend/img/logoclphead.png') ?>"></img></a>
            </div>
          </div>
          <div class="col-md-10">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu"><i class="fa fa-bars"></i></button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="menu">
              <ul class="nav navbar-nav navbar-right" style="background-color: #101010; color: #fff;">
                <li><a style="color: #fff;" href="<?php echo base_url('home') ?>">Home</a></li>
                <li><a style="color: #fff;" href="<?php echo base_url('home/tentangKami') ?>">Tentang Kami</a></li>
                <li><a style="color: #fff;" href="<?php echo base_url('home/index/#service') ?>">Program Kerja</a></li>
                <!-- <li><a style="color: #fff;" href="<?php echo base_url('home/gallry') ?>">Gallery</a></li> -->
                <li class="dropdown">
                  <a class="dropdown-toggle" style="color: #fff;" data-toggle="dropdown" href="#">Gallery
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a style="color: #000;" href="<?php echo base_url('home/gallery') ?>">Bioskop Mini</a></li>
                    <li><a style="color: #000;" href="<?php echo base_url('home/gallery') ?>">Cariti</a></li>
                    <li><a style="color: #000;" href="<?php echo base_url('home/gallery') ?>">Indiefest</a></li>
                    <li><a style="color: #000;" href="<?php echo base_url('home/gallery') ?>">Latihan Kepemimpinan</a></li>
                    <li><a style="color: #000;" href="<?php echo base_url('home/gallery') ?>">Makrab</a></li>
                  </ul>
                </li>
                <li><a style="color: #fff;" href="<?php echo base_url('home/karya') ?>">Hasil karya</a></li>
                <li><a style="color: #fff;" href="<?php echo base_url('home/keanggotaan') ?>">Keanggotaan</a></li>
                <li><a style="color: #fff;" href="<?php echo base_url('home/pendaftaran') ?>" data-toggle="tooltip" data-placement="bottom" title="Pendaftaran Indiefest">Pendaftaran</a></li>
                <li><a style="color: #fff;" href="<?php echo base_url('home/index/#contact') ?>">Hubungi Kami</a></li>
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

