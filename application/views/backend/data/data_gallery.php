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
                <h4 class="header-title">Data Gallery</h4>
                <a href="<?php echo base_url('admin/Gallery/tambahData') ?>" class="badge badge-info">Tambah
                  Data</a><br>
                ` <div class="data-tables datatable-dark">
                  <table id="dataTable3" class="text-center">
                    <thead class="text-capitalize">
                      <tr>
                        <th>No</th>
                        <th>Program kerja</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1;foreach ($gallery as $res) { ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $res->judul; ?></td>
                        <td><img src="<?php echo base_url('assets/backend/img/gallery/'.$res->gambar); ?>"
                            height="50px" width="100px" /></td>
                        <td>
                          <a href="<?php echo base_url('admin/Gallery/ubahData/'.$res->id_gallery) ?>"
                            class="badge badge-primary">Edit</a>
                          <a href="<?php echo base_url('admin/Gallery/delete/'.$res->id_gallery) ?>"
                            class="badge badge-danger"
                            onClick="return confirm('Aksi ini akan menghapus data secara permanen, hapus?')">Hapus</a>
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