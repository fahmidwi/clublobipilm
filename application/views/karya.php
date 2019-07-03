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
              <h3 style="font-family: lato; font-weight:bold;">
                <blockquote>KARYA DARI ANGGOTA CLP</blockquote>
              </h3>
            </div>
          </div>
          <form>
            <div class="row">
              <div class="col-lg-12 bg-white">
                <label>Filter</label>
                <form method="GET">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Genre</label>
                        <select class="form-control" name="genre">
                          <option value="semua">SEMUA</option>
                          <?php foreach ($genre as $res) { ?>
                          <option value="<?php echo $res->genre?>"><?php echo $res->genre?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tahun upload</label>
                        <select class="form-control" name="tahun">
                          <?php 
                        $tahun = explode("-",date('Y-m-d'))[0];
                        for ($i=2010; $i < 2030; $i++) { ?>
                          <option value=<?php echo $i; ?> <?php echo ($i==$tahun ? 'selected' :null) ?>>
                            <?php echo $i; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <button type="submit" class="btn btn-info" style="margin-top: 11%;">Terapkan</button>
                      </div>
                    </div>
                </form>
              </div>
            </div>
        </div>
        </form>
        <span class="badge"><?php echo $tag_genre;  ?></span>
        <span class="badge"><?php echo $tag_tahun_upload;  ?></span>
        <div class="row" style="margin-top: 2%;">
          <?php foreach ($karya as $res) { ?>
          <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
              <?php if ($res->flg_new==0) {?>
              <span class="label label-danger" style="margin-top:-2%;z-index:5;position:absolute;margin:2%;">New</span>
              <?php } ?>
              <!-- <i class="mdi mdi-eye" style="margin-top:-2%;z-index:5;position:absolute;margin:2% 10% 2% 2% ;right:0;color:white;">25</i> -->
              <img src="<?php echo base_url('assets/frontend/img/poster_karya/'.$res->poster) ?>" alt="..."
                style="width:351px;height:338px;z-index: 1; -webkit-filter:brightness(50%);">
              <h6 style="font-weight: bold;color:black;padding:5%;">
                <?php echo (strlen($res->judul_film) > 25 ? substr($res->judul_film,0,25).' ...' : $res->judul_film); ?>&nbsp;
              </h6>
              <div class="caption" style="margin-top:-10%;">
                <label>Sinopsis :</label>
                <p><?php echo substr($res->sinopsis,0,100)."..."; ?></p>
                <p><a href="<?php echo $res->link_film ?>" class="btn btn-success" target="_blank">Lihat sekarang</a>
                  <?php 
                      $judul = strtolower($res->judul_film);
                      $uri = str_replace(" ","-",$judul);
                    ?>
                  <a href="<?php echo base_url('home/dk/'.$res->id_karya.'/'.$uri) ?>" class="btn btn-info"
                    role="button">Detail</a></p>
              </div>
            </div>
          </div>
          <?php } ?>
          <?php if (count($karya)==12) { ?>
          <nav aria-label="...">
            <ul class="pager">
              <li><a href="#">Previous</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </nav>
          <?php } ?>
        </div>
      </div>
    </div>
    </div>
  </section>
  <!-- /Section: about -->
  <!-- FOOTER -->
  <?php $this->load->view('include/footer.php'); ?>
</body>

</html>