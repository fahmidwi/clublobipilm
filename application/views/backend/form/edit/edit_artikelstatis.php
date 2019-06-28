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
										<h4 class="header-title">Form Edit Artikel</h4><hr>
											<form method="POST" action="<?php echo base_url('admin/ArtikelStatis/ProsesUbahData/'.$artikelstatis->id_artikel_statis) ?>">
												<div class="row">
														<div class="col-md-6">
																<div class="form-group">
																		<label for="example-text-input" class="col-form-label">Judul</label>
																		<input class="form-control" name="title" type="text" id="example-text-input" value="<?php echo $artikelstatis->title; ?>" disabled>
																</div>
														</div>
														<div class="col-md-6">
																<div class="form-group">
																		<label for="example-text-input" class="col-form-label">Deskripsi</label>
																		<textarea name="isi">
																			<?php echo $artikelstatis->isi; ?>
																		</textarea>
																</div>
														</div>
														<button class="btn btn-success btn-block">SIMPAN</button>
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
    CKEDITOR.replace( 'isi', {
        toolbar: [
            { name: 'document', items: ['NewPage', 'Preview', '-', 'Templates' ] }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
            '/',                                          // Line break - next group will be placed in new line.
            { name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
        ]
        });
</script>
</html>
