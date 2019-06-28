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
        <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Tambah Data Peserta</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Kumkum Rai <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="#">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- Dark table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                        <h4 class="header-title">Form Tambah Peserta</h4><hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Nama Asal Sekolah</label>
                                            <input class="form-control" type="text" id="example-text-input" placeholder="Nama Asal Sekolah">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Nama Siswa Perwakilan</label>
                                            <input class="form-control" type="text" id="example-text-input" placeholder="Nama Siswa Perwakilan">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email-input" class="col-form-label">Email</label>
                                            <input class="form-control" type="email" placeholder="Email" id="example-email-input">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Judul Film</label>
                                            <input class="form-control" type="text" id="example-text-input" placeholder="Judul Film">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Durasi Film</label>
                                            <input class="form-control" type="text" id="example-text-input" placeholder="Durasi Film">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Sinopsis Film</label>
                                            <textarea class="form-control" type="text" id="example-text-input" placeholder="Sinopsis Film"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Crew</label>
                                            <textarea class="form-control" type="text" id="example-text-input" placeholder="Crew"></textarea>
                                        </div>
                                        <label for="example-text-input" class="col-form-label">Poster</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Link Film</label>
                                            <input class="form-control" type="text" id="example-text-input" placeholder="Link Film">
                                            <i>Link film yang sudah di upload ke Google Drive</i>
                                        </div>
                                    </div>
                                    <button class="btn btn-success btn-block">SIMPAN</button>
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
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="">Fahmi Dion</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->

</body>
<?php $this->load->view('include/footer_backend'); ?>

</html>