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
                <h4 class="header-title">Form Tambah Slideshow</h4>
                <hr>
                <form method="POST" action="<?php echo base_url('admin/Gallery/prosesTambahData') ?>"
                  enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="example-text-input" class="col-form-label">Program kerja</label>
                      <select name="proker" class="form-control"><br>
                        <?php foreach ($proker as $res) { ?>
                            <option value="<?php echo $res->id_proker ?>"><?php echo $res->judul; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="example-text-input" class="col-form-label">Gambar</label>
                      <input type="file" name="file" class="form-control" required><br>
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