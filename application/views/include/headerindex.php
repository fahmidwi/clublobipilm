<!-- CSS -->
<style type="text/css">
@media screen and (max-width: 1600px) {
  .img_hp {
    display: none;
  }
}

@media screen and (max-width: 600px) {
  .img_hp {
    display: block;
  }

  .img_desktop {
    display: none;
  }

}

* {
  margin: 0;
  padding: 0
}

@keyframes autopopup {
  from {
    opacity: 0;
    margin-top: -200px;
  }

  to {
    opacity: 1;
  }
}

#close {
  background-color: rgba(64, 68, 65, 0.5);
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  animation: autopopup 1.5s;
}

#close:target {
  -webkit-transition: all 1s;
  -moz-transition: all 1s;
  transition: all 1s;
  opacity: 0;
  visibility: hidden;
}

@media (min-width: 768px) {
  .container-popup {
    width: 70%;
  }
}

@media (max-width: 767px) {
  .container-popup {
    width: 70%;
  }
}

.container-popup {
  position: relative;
  margin: 5% auto;
  padding: 4px 3px;
  background-color: #e1fff5;
  color: #333;
  border-radius: 8px;
}

.container-popup img {
  z-index: 12;

  width: 100%
}

.close {
  position: absolute;
  top: 3px;
  right: 3px;
  background-color: #33898B;
  padding: 7px 10px;
  font-size: 15px;
  text-decoration: none;
  line-height: 1;
  color: #fff;
}
</style>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CLP - Clublobipilm</title>

  <!-- css -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.min.css">
  <link href="<?php echo base_url('lib/frontend/css/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('lib/frontend/css/css/bootstrap.css');?>" rel="stylesheet" type="text/css">

  <link href="<?php echo base_url('lib/frontend/css/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet"
    type="text/css" />
  <link href="<?php echo base_url('lib/frontend/css/css/nivo-lightbox.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('lib/frontend/css/css/nivo-lightbox-theme/default/default.css');?>" rel="stylesheet"
    type="text/css" />
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
            <a href="index.html" class="brand"><img style="width:150%; height: 150%; margin-top:-3%; margin-left: -20%"
                class="img_desktop" src="<?php echo base_url('assets/frontend/img/logoclphead.png') ?>"></img>
              <img style="width:80%; height: 80%; margin-top:-4%;" class="img_hp"
                src="<?php echo base_url('assets/frontend/img/logoclphead.png') ?>"></img></a>
          </div>
        </div>
        <div class="col-md-10">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu"><i
                class="fa fa-bars"></i></button>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav navbar-right" style="background-color: #101010; color: #fff;">
              <li><a style="color: #fff;" href="#intro">Home</a></li>
              <li><a style="color: #fff;" href="#tentangkami">Tentang Kami</a></li>
              <li><a style="color: #fff;" href="#programkerja">Program Kerja</a></li>
              <li><a style="color: #fff;" href="#hasilkarya">Hasil karya</a></li>
              <li><a style="color: #fff;" href="">Keanggotaan</a></li>
              <li><a style="color: #fff;" href="">Gallery</a></li>
              <li><a style="color: #fff;" href="<?php echo base_url('home/pendaftaran') ?>" data-toggle="tooltip"
                  data-placement="bottom" title="Pendaftaran Indiefest">Pendaftaran</a></li>
              <li><a style="color: #fff;" href="#hubkami">Hubungi Kami</a></li>
            </ul>
          </div>
          <!-- /.Navbar-collapse -->
        </div>
      </div>
    </div>
    <!-- /.container -->
  </nav>
</div>