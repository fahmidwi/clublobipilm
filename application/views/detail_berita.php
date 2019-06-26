<!DOCTYPE html>
<html lang="en">

<!-- CSS -->
<?php $this->load->view('include/header.php'); ?>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <section id="event" class="color-dark" style="margin-top:3%;">
    <div class="container" style="margin-top: -1%;">
      <div class="row">
        <div class="col-md-8">
            <h3><b><?php echo $detail->judul_berita; ?></b></h3>
            <span class="mdi mdi-grease-pencil"></span><small><i><b>Oleh : <?php echo $detail->nama; ?>. 18 Mei 2018, dilihat <?php echo $detail->view; ?> kali</b></i></small><br>
            <i><b>Sumber : <?php if($detail->sumber == ''){echo "-";}else{echo"<a href='$detail->sumber' target='_blank'>$detail->sumber</a>";} ?></b></i><br><br>
            <img src="<?php echo base_url('assets/frontend/img/berita/'.$detail->gambar); ?>" width="100%"><br><br>
            <p><?php echo $detail->isi_berita ?></p>
        </div>
        <div class="col-md-4">
          <div class="section-heading text-center">
              <h4>FRESH <b style="color: #c0392b;">NEWS</b></h4>
          </div>
          <?php foreach ($berita as $res) { ?>
            <div class="row" style="margin-bottom: 2%;" style="display:<?php if($res->id_berita==$detail->id_berita){echo"none";} ?>;">
              <div class="col-md-12 bg-gray">
                <a href="#" style="color: #c0392b">
                  <h6 style="margin-top: 3%;"><b><?php echo $res->judul_berita ?></b></h6>
                  <div class="col-md-12" style="margin-top: -5%;">
                    <i class="mdi mdi-calendar-text" ></i><i>17 Januari 2019</i>
                    <?php 
                      $judul = strtolower($res->judul_berita);
                      $ex = explode(" ",$judul);
                      $judul = $ex[0].'-'.$ex[1].'-'.$ex[2];
                      $uri = str_replace(" ","-",$judul);
                    ?>
                    <p><?php  echo substr($res->isi_berita,0,100).'...'; ?><a href="<?php echo base_url('Home/db/'.$res->id_berita.'/'.$uri); ?>"><i>Lihat selengkapnya</i></a></p>
                  </div>
                </a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
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
    