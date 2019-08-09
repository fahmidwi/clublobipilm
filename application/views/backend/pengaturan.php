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
              <?php if ($this->session->flashdata('pesan')) { ?>
              <div class="alert alert-success" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Pesan :</span>
                <?php echo $this->session->flashdata('pesan'); ?>
              </div><br><br><br>
              <?php } ?>
              <div class="card-body">
                <h4>Pengaturan website</h4>
                <hr><br>
                <h5  class="header-title">Pengaturan Pendaftaran indifest</h5>
                <div class="row">
                  <div class="col-md-4">
                    <p>indiefest ke : <?php echo $pengaturan->indiefestKe ?></p>
                  </div>
                  <div class="col-md-4">
                    <p>Pendaftaran dibuka : <?php echo changeDate($pengaturan->bukaDaftar) ?></p>
                  </div>
                  <div class="col-md-4">
                    <p>Pendaftaran ditutup : <?php echo changeDate($pengaturan->tutupDaftar); ?></p>
                  </div>
                  <div class="col-md-4">
                    <p>Biaya pendaftaran indiefest : <?php echo rupiah($pengaturan->biayaIndiefest); ?></p>
                  </div>
                  <div class="col-md-4">
                    <p>Syarat & ketentuan : <a href="<?php echo base_url('syaratdanketentuan/indiefest'); ?>" target="_blank">Lihat disini</a></p>
                  </div>
                </div><br>
                <hr>
                <b><p>Setting ulang Pendaftaran</p><b>
                <form action="<?php echo base_url('admin/home/setpendaftaran/'.$pengaturan->id_settings) ?>" method="POST">
                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Pendaftaran di buka</label>
                        <input name="buka" class="form-control" type="date" id="example-text-input" value="<?php echo $pengaturan->bukaDaftar; ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Pendaftaran di tutup</label>
                        <input name="tutup" class="form-control" type="date" id="example-text-input" value="<?php echo $pengaturan->tutupDaftar; ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Biaya pendaftaran indiefest</label>
                        <input name="biaya" class="form-control uang" type="text" id="example-text-input" value="<?php echo $pengaturan->biayaIndiefest; ?>"  required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Idiefest ke</label>
                        <select name="indiefestKe" class="form-control">
                            <?php for ($ke=1; $ke < 20; $ke++) { ?>
                              <?php if ($ke==$pengaturan->indiefestKe) { ?>
                                <option value="<?php echo $ke; ?>" selected><?php echo $ke; ?></option>
                              <?php } else { ?>
                                <option value="<?php echo $ke; ?>"><?php echo $ke; ?></option>
                              <?php } ?>
                            <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Syarat & ketentuan indiefest</label>
                        <textarea name="syaratketentuan">
                          <?php echo $pengaturan->syaratketentuan; ?>
                        </textarea>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-success btn-block" onclick="return confirm('Ubah ulang settingan pendaftaran?')">Simpan</button>
                </form><hr>
                <br><br><h5  class="header-title">Pengaturan Pop awal website</h5><hr>
                <b><p>pop saat ini</p><b><br>
                <div class="row">
                  <div class="col-md-8">
                    <img src="<?php echo base_url('assets/frontend/img/'.$pengaturan->popUpWeb) ?>"/>
                  </div>
                  <div class="col-md-4">
                    <form action="<?php echo base_url('admin/home/setpopup/'.$pengaturan->id_settings) ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                     <div class="form-group">
                        <label for="example-text-input" class="col-form-label">popup baru</label>
                        <input name="file" class="form-control" type="file" id="example-text-input" required>
                      </div>
                      <button type="submit" class="btn btn-success btn-block" onclick="return confirm('ganti pop up?')">Simpan</button>
                    </form>
                  </div>
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

$(document).ready(function(){
  CKEDITOR.replace( 'syaratketentuan', {
    toolbar: [
        { name: 'document', items: ['NewPage', 'Preview', '-', 'Templates' ] }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
        '/',                                          // Line break - next group will be placed in new line.
        { name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
    ]
});
// Format mata uang.
$( '.uang' ).mask('000.000.000', {reverse: true});

})
</script>
</html>