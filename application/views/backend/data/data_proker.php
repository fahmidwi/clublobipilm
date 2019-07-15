<!doctype html>
<html class="no-js" lang="en">

<?php $this->load->view('include/head_backend');?>

<body>
<div id="preloader">
<div class="loader"></div>
</div>
<!-- preloader area end -->
<!-- page container area start -->
<div class="page-container">
<?php $this->load->view('include/sidebar_backend')?>
<!-- main content area start -->
<div class="main-content">
		<!-- header area start -->
<?php $this->load->view('include/header_backend')?>
<?php $this->load->view('include/tabhead')?>
		<!-- page title area end -->
		<div class="main-content-inner">
				<div class="row">
						<!-- Dark table start -->
						<div class="col-12 mt-5">
							<div class="card">
								<div class="card-body">
									<h4 class="header-title">Data Program Kerja</h4>
									<a href="#" class="badge badge-primary" data-toggle="modal" data-target=".tambahproker">Tambah Data</a><br><br>
									<div class="data-tables datatable-dark">
										<table id="dataTable3" class="text-left">
											<thead class="text-capitalize">
													<tr>
															<th>No</th>
															<th>Judul Proker</th>
															<th>Deskirpsi</th>
															<th>tanggal buat</th>
															<th>User</th>
															<th>Aksi</th>
													</tr>
											</thead>
											<tbody>
											<?php $no = 1;foreach ($proker as $res) {?>
												<tr>
													<td><?php echo $no; ?></td>
													<td><?php echo $res->judul; ?></td>
													<td><?php echo substr($res->program_kerja, 0, 200) . "..."; ?></td>
													<td><?php echo $res->create_date; ?></td>
													<td><?php echo $res->nama; ?></td>
													<td>
															<a href="#" class="badge badge-warning" data-toggle="modal" data-target=".proker<?php echo $res->id_proker ?>">Detail</a>
															<a href="<?php echo base_url('admin/Proker/ubahData/' . $res->id_proker) ?>" class="badge badge-primary">Edit</a>
															<a href="<?php echo base_url('admin/Proker/delete/' . $res->id_proker) ?>" onClick="return confirm('Menghapus data secara permanen, hapus?')" class="badge badge-danger">Hapus</a>
													</td>
												</tr>
											<?php $no++;}?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- Dark table end -->
						<!-- Large modal start -->
						<div class="col-lg-6 mt-5">
							<div class="card">
								<!-- Large modal -->
								<!-- TAMBAH DATA -->
								<div class="modal fade bd-example-modal-lg tambahproker">
									<input type="hidden" id="jumlahdata" value="<?php echo count($proker); ?>"/>
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Ubah data proker</h5>
												<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
											</div>
											<form method="post" action="<?php echo base_url('admin/Proker/ProsesTambah/'); ?>">
												<div class="modal-body">
													<div class="row">
														<div class="col-md-12">
																<div class="form-group">
																		<label for="example-text-input" class="col-form-label">Judul Proker</label>
																		<input name="judul" class="form-control" type="text" id="example-text-input" placholder="masukan judul program kerja" pattern="[a-zA-Z0-9\s]+" required>
																		<i><p style="color:red;">judul tidak boleh mengandung karakter spesial</p></i>
																</div>
																<div class="form-group">
																		<label for="example-text-input" class="col-form-label">Deskripsi Program kerja</label>
																		<textarea name="deskripsi_proker">
																		</textarea>
																</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">Simpan data</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<!-- DETAIL -->
								<?php foreach ($proker as $res) {?>
								<div class="modal fade bd-example-modal-lg proker<?php echo $res->id_proker ?>">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title"><?php echo $res->judul; ?></h5>
												<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
											</div>
											<div class="modal-body">
												<?php echo $res->program_kerja; ?><br>
												<i style="color:grey;">dibuat oleh : <?php echo $res->nama . ' | ' . $res->create_date; ?></i><br>
												<?php if ($res->create_update != '0000-00-00') {?>
													<i style="color:grey;">diubah pada : <?php echo $res->create_update; ?></i><br>
												<?php }?>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<?php }?>
							</div>
						</div>
						<!-- Large modal modal end -->
				</div>
		</div>
</div>
<!-- main content area end -->
<!-- footer area start-->
<?php $this->load->view('include/footer_backend');?>
<!-- footer area end-->
</div>
<!-- page container area end -->
<!-- offset area start -->

</body>
<?php $this->load->view('include/js_backend');?>
<script>
		CKEDITOR.replace( 'deskripsi_proker', {
        toolbar: [
            { name: 'document', items: ['NewPage', 'Preview', '-', 'Templates' ] }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
            '/',                                          // Line break - next group will be placed in new line.
            { name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
        ]
    	});
</script>
</html>
