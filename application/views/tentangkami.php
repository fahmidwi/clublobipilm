<!DOCTYPE html>
<html lang="en">

<!-- CSS -->
<?php $this->load->view('include/header.php'); ?>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <section id="intro" class="home-slide text-light">
    <!-- Carousel -->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="<?php echo base_url('assets/frontend/img/Indiefest.jpg') ?>" alt="First slide">
          <!-- Static Header -->
          <div class="header-text hidden-xs">
            <div class="col-md-12 text-center"><br>
              <h2 style="font-family: Marcellus SC; color: #000;"><span style="background-color: #939393; border-radius: 5%;"><b>CLUB LOBI PILM</b></span></h2>
            </div>
          </div>
          <!-- /header-text -->
        </div>
        
      </div>
    </div>
    <!-- /carousel -->
  </section>
  <!-- Section: about -->
  <section id="about" class="home-section color-dark bg-white" style="margin-top: -10%;">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-12">
          <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
            <div class="section-heading">
              <h3 style="font-family: lato; font-weight:bold;"><blockquote>Tentang Kami</blockquote></h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
               <h5><?php echo $sejarah->title; ?></h5>
               <p>
                <?php echo $sejarah->isi; ?>
               </p>
            </div>
            <div class="col-md-6">
              <?php foreach ($statis as $res) { ?>
                <div class="panel panel-default" style="display:<?php echo ($res->id_artikel_statis==$sejarah->id_artikel_statis) ? 'none' : null ; ?>">
                  <div class="panel-heading">
                    <h3 class="panel-title"><?php echo strtoupper($res->title); ?></h3>
                  </div>
                  <div class="panel-body">
                    <?php echo $res->isi; ?>
                  </div>
                </div>
              <?php } ?>
            </div>
            <div class="col-md-12">
            <h5>Lokasi</h5>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.384104248348!2d106.80879231401157!3d-6.599094716342796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5d97d3764c3%3A0xd56ba6305181755c!2sUniversitas+Pakuan!5e0!3m2!1sid!2sid!4v1557888668081!5m2!1sid!2sid" width="100%" height="100%" frameborder="0" style="border:1px;" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Section: about -->
  <!-- FOOTER -->
<?php $this->load->view('include/footer.php'); ?>

</body>
<script>
  CKEDITOR.replace( 'editor1', {
  toolbar: [
    { name: 'document', items: ['NewPage', 'Preview', '-', 'Templates' ] }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
    '/',                                          // Line break - next group will be placed in new line.
    { name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
  ]
});
    CKEDITOR.replace( 'editor2', {
  toolbar: [
    { name: 'document', items: ['NewPage', 'Preview', '-', 'Templates' ] }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
    '/',                                          // Line break - next group will be placed in new line.
    { name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
  ]
});
</script>

</html>
    