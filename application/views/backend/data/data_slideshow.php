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
        <?php $this->load->view('include/tabhead'); ?>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- Dark table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Data Slideshow</h4>
                                <a href="<?php echo base_url('admin/SlideShows/tambahData') ?>" class="badge badge-info">Tambah Data</a><br>
`                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Gambar</th>
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1;foreach ($slideshows as $res) { ?>
                                            <tr>
																							<td><?php echo $no; ?></td>
																							<td><img src="<?php echo base_url('assets/frontend/img/slideshow/'.$res->file); ?>" height="150px" width="300px" /></td>
																							<td><?php echo $res->title; ?></td>
																							<td><?php echo $res->desk; ?></td>
																							<td>
																								<a href="<?php echo base_url('admin/SlideShows/ubahData/'.$res->id_slide) ?>" class="badge badge-primary">Edit</a>
																								<a href="<?php echo base_url('admin/SlideShows/delete/'.$res->id_slide) ?>" class="badge badge-danger">Hapus</a>
																							</td>
                                            </tr>
                                        <?php }  ?>
                                        </tbody>
                                    </table>
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
