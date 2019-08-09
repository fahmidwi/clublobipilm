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
                <h4 class="header-title">Form Edit Karya Anggota</h4>
                <hr>
                <form method="POST" action="<?php echo base_url('admin/Karya/ProsesUbahData/'.$karya->id_karya) ?>"
                  enctype="multipart/form-data">
                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Judul</label>
                        <input class="form-control" name="judul" type="text" id="example-text-input"
                          value="<?php echo $karya->judul_film ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Genre Film</label>
                        <select class="form-control" name="genre">
                          <?php foreach ($genre as $res) { ?>
                          <?php if ($res->id_genre == $karya->id_genre) { ?>
                          <option value="<?php echo $res->id_genre?>" selected><?php echo $res->genre?></option>
                          <?php }else{ ?>
                          <option value="<?php echo $res->id_genre?>"><?php echo $res->genre?></option>
                          <?php } ?>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Durasi Film</label>
                        <input type="text" name="durasi" class="form-control"
                          value="<?php echo $karya->durasi ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="example-email-input" class="col-form-label">Sinopsis</label>
                        <textarea name="sinopsis"><?php echo $karya->sinopsis ?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="example-email-input" class="col-form-label">Crew</label>
                        <textarea name="crew"><?php echo $karya->cast; ?></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label">Poster lama</label><br><br>
                        <img src="<?php echo base_url('assets/frontend/img/poster_karya/'.$karya->poster) ?>" width="100px"
                          height="300px" /><br><br>
                        <label for="example-email-input" class="col-form-label">Upload Poster baru</label>
                        <input class="form-control" name="file" type="file" placeholder="Poster"
                          id="example-email-input">
                      </div>
                      <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Link Film (Google Drive)</label>
                        <input class="form-control" name="link" type="text" id="example-text-input"
                          value="<?php echo $karya->link_film; ?>" required>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">SIMPAN</button>
                  </div>
                </form>
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
CKEDITOR.replace('sinopsis', {
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
CKEDITOR.replace('crew', {
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