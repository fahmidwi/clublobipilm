<!DOCTYPE html>
<html lang="en">

<!-- CSS -->
<?php $this->load->view('include/header.php'); ?>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <!-- Section: about -->
  <section id="about" class="home-section color-dark bg-white" style="margin-top: -10%;">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-12">
          <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
            <div class="section-heading">
              <h3 style="font-family: lato; font-weight:bold;"><blockquote><?php echo $dk->judul_film;?></blockquote></h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-xs-8 col-md-4">
                  <a href="#" class="thumbnail">
                    <img src="<?php echo base_url('assets/frontend/img/poster_karya/'.$dk->poster) ?>" alt="...">
                  </a>
                </div>
                <div class="col-xs-8 col-md-8">
                  <p>
                    <?php echo $dk->sinopsis; ?>
                  </p>
                  <ul>
                    <li>Tanggal Post : <?php echo $dk->create_date; ?></li>
                    <li>Admin : <?php echo $dk->nama; ?></li><br>
                    <li>Durasi : <?php echo $dk->durasi; ?></li>
                    <li>Genre : <?php echo $dk->genre; ?></li>
                    <li>Cast : <?php echo $dk->cast; ?></li>
                  </ul>
                  <a href="<?php echo $dk->link_film; ?>" class="btn btn-skin" target="_blank">Tonton Sekarang</a>
                </div>
              </div>
              
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
    