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
                <form method="POST" action="<?php echo base_url('admin/SlideShows/prosesTambahData') ?>"
                  enctype="multipart/form-data">
                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                    value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Judul</label>
                        <input class="form-control" name="judul" type="text" id="example-text-input"
                          placeholder="Judul">
                      </div>
                      <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Deskripsi</label>
                        <textarea name="deskripsi_slide">
																					</textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="example-text-input" class="col-form-label">Gambar</label>
                      <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="inputGroupFile01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                      </div>
                      <p style="color:blue;">Gambar akan di ubah menjadi ukuran 1920px x 600px, sesuaikan ukuran dan
                        resolusi gambar<p>
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
<script>
CKEDITOR.replace('deskripsi_slide', {
  toolbar: [{
      name: 'document',
      items: ['NewPage', 'Preview', '-', 'Templates']
    }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
    '/', // Line break - next group will be placed in new line.
    {
      name: 'basicstyles',
      items: ['Bold', 'Italic']
    }
  ]
});
</script>

</html>