  <!--Section: intro -->
    <section id="intro" class="home-slide text-light">
    <!-- Carousel -->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <?php $no=1; foreach ($slideshows as $res) { ?>
          <div class="item <?php if($no == 1){echo 'active';} ?> ?>">
          <img src="<?php echo base_url('assets/frontend/img/slideshow/').$res->file;?>" alt="this slide">
          <!-- Static Header -->
          <div class="header-text hidden-xs">
            <div class="col-md-12 text-center">
              <h2><span>Welcome to Shuffle</span></h2>
              <br>
              <h3><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span></h3>
              <br>
              <div class="">
                <a class="btn btn-theme btn-sm btn-min-block" href="#about">About us</a><a class="btn btn-theme btn-sm btn-min-block" href="#works">Our works</a></div>
            </div>
          </div>
          <!-- /header-text -->
        </div>
        <?php $no++;} ?>
      </div>
      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>
    <!-- /carousel -->
  </section>
  <!-- /Section: intro -->