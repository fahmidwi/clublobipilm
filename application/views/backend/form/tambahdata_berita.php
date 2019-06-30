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
                <h4 class="header-title">Form Tambah Berita</h4>
                <hr>
                <form method="POST" action="<?php echo base_url('admin/Berita/prosesTambahData') ?>" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="col-form-label">Judul Berita</label>
                      <input class="form-control" type="text" name="judul_berita" id="example-text-input" placeholder="Judul Berita" pattern="[a-zA-Z0-9\s]+" required>
                      <i><p style="color:red;">judul tidak boleh mengandung karakter spesial</p></i>
                    </div>
                    <div class="form-group">
                      <label for="example-text-input" class="col-form-label">Deskripsi Berita</label>
                      <textarea name="isi_berita" required>
                      </textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="col-form-label">Foto</label>
                      <input class="form-control" type="file" name="gambar" id="example-text-input" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="col-form-label">Sumber</label>
                      <input class="form-control" type="text" name="sumber" id="example-text-input" placholder="ex:https://berita.com" required>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-success btn-block">SIMPAN</button>
                </div>
                <form>
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
CKEDITOR.replace( 'isi_berita', {
    toolbar: [
        { name: 'document', items: ['NewPage', 'Preview', '-', 'Templates' ] }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
        '/',                                          // Line break - next group will be placed in new line.
        { name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
    ]
});
</script>
</html>