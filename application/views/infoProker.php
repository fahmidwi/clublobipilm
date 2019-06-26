<!DOCTYPE html>
<html lang="en">

<!-- CSS -->
<?php $this->load->view('include/header.php'); ?>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <!-- Section: about -->
  <section id="about" class="home-section bg-white" style="margin-top: -10%;">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-9">
          <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
            <div class="section-heading">
              <h3 style="font-family: lato; font-weight:bold;"><blockquote><?php echo strtoupper($infoproker->judul); ?></blockquote></h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <a href="#" class="thumbnail">
                <img src="<?php echo base_url('assets/frontend/img/works/1.jpg') ?>" alt="...">
              </a>
            </div>
            <div class="col-md-9">
              <p>
                <?php echo $infoproker->program_kerja; ?>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
            <div class="section-heading">
              <h3 style="font-family: lato; font-weight:bold; font-size: 17pt;"><blockquote>Program Kerja</blockquote></h3>
            </div>
          </div>
          <?php foreach ($proker as $res) { ?>
            <?php 
              $judul = strtolower($res->judul);
              $uri = str_replace(" ","-",$judul);
            ?>
            <div class="panel panel-default" style="display:<?php if($res->id_proker==$infoproker->id_proker){echo"none";} ?>;">
              <div class="panel-heading">
                <h3 class="panel-title"><b><a href="<?php echo base_url('home/infoProker/'.$res->id_proker.'/'.$uri); ?>"><?php echo $res->judul ?></a></b></h3>
              </div>
              <div class="panel-body">
                <small><?php echo substr($res->program_kerja,0,100)." . . ."; ?></small>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <!-- /Section: about -->
  <!-- FOOTER -->
<?php $this->load->view('include/footer.php'); ?>

</body>
</html>
    