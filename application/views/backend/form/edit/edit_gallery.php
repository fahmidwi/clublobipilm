<!doctype html>
<html class="no-js" lang="en">

<?php $this->load->view('include/head_backend'); ?>

<body>
  <div id="preloader">
    <div class="loader"></div>
  </div>
  <!-- preloader area end -->
  <!-- page container area start -->
  <div class="page-container">
    <?php $this->load->view('include/sidebar_backend') ?>
    <!-- main content area start -->
    <div class="main-content">
      <!-- header area start -->
      <?php $this->load->view('include/header_backend') ?>
      <?php $this->load->view('include/tabhead') ?>
      <!-- page title area end -->
      <div class="main-content-inner">
        <div class="row">
          <!-- Dark table start -->
          <div class="col-12 mt-5">
            <div class="card">
              <div class="card-body">
                <h4 class="header-title">Form Edit Slideshow</h4>
                <hr>
                <form method="POST"
                  action="<?php echo base_url('admin/Gallery/ProsesUbahData/'.$gallery->id_gallery) ?>"
                  enctype="multipart/form-data">
                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                    value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="example-text-input" class="col-form-label">Program kerja</label>
                      <select name="proker" class="form-control"><br>
                        <?php foreach ($proker as $res) { ?>
                        <?php if ($res->id_proker == $gallery->id_proker) { ?>
                        <option value="<?php echo $res->id_proker ?>" selected><?php echo $res->judul; ?></option>
                        <?php } else { ?>
                        <option value="<?php echo $res->id_proker ?>"><?php echo $res->judul; ?></option>
                        <?php } ?>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="col-form-label">Gambar lama</label><br><br>
                      <img src="<?php echo base_url('assets/backend/img/gallery/'.$gallery->gambar) ?>" width="200px"
                        height="100px" /><br><br>
                      <label for="example-text-input" class="col-form-label">ubah Gambar</label>
                      <input type="file" name="file" class="form-control"><br>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">SIMPAN</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Dark table end -->

      </div>
    </div>
  </div>
  <!-- main content area end -->
  <!-- footer area start-->
  <?php $this->load->view('include/footer_backend'); ?>
  <!-- footer area end-->
  </div>
  <!-- page container area end -->
  <!-- offset area start -->

</body>
<?php $this->load->view('include/js_backend'); ?>

</html>