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
        <!-- sales report area start -->
        <div class="sales-report-area mt-5 mb-5">
          <div class="row">
            <div class="col-md-4">
              <div class="single-report mb-xs-30">
                <div class="s-report-inner pr--20 pt--30 mb-3">
                  <div class="icon"><i class="fa fa-user"></i></div>
                  <div class="s-report-title d-flex justify-content-between">
                    <h4 class="header-title mb-0">Calon peserta indifest </h4>
                    <p><?php echo date('Y') ?></p>
                  </div>
                  <div class="d-flex justify-content-between pb-2">
                    <h2><?php echo $jumPeserta ?></h2>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="single-report mb-xs-30">
                <div class="s-report-inner pr--20 pt--30 mb-3">
                  <div class="icon"><i class="fa fa-user"></i></div>
                  <div class="s-report-title d-flex justify-content-between">
                    <h4 class="header-title mb-0">Anggota</h4>
                  </div>
                  <div class="d-flex justify-content-between pb-2">
                    <h2><?php echo $jumAnggota ?></h2>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="single-report">
                <div class="s-report-inner pr--20 pt--30 mb-3">
                  <div class="icon"><i class="fa fa-film"></i></div>
                  <div class="s-report-title d-flex justify-content-between">
                    <h4 class="header-title mb-0">Karya</h4>
                  </div>
                  <div class="d-flex justify-content-between pb-2">
                    <h2><?php echo $jumKarya ?></h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- sales report area end -->
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