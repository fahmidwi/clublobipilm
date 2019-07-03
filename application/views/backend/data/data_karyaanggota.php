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
                <h4 class="header-title">Data Karya Anggota</h4>
                <a href="<?php echo base_url('admin/Karya/tambahData') ?>" class="badge badge-info">Tambah
                  Data</a><br><br>
                <div class="data-tables datatable-dark">
                  <table id="dataTable3" class="text-left">
                    <thead class="text-capitalize">
                      <tr>
                        <th>No</th>
                        <th>poster</th>
                        <th>Judul</th>
                        <th>Sinopsis</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1;foreach ($karya as $res ) { ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><a href="<?php echo $res->link_film; ?>" targhet="_blank"><img
                              src="<?php echo base_url('assets/frontend/img/poster_karya/'.$res->poster) ?>"
                              width="100px" height="300px"></a></td>
                        <td><?php echo $res->judul_film; ?></td>
                        <td><?php echo substr($res->sinopsis,0,100).'...' ?></td>
                        <td>
                          <?php 
                            $judul = strtolower($res->judul_film);
                            $uri = str_replace(" ","-",$judul);
                          ?>
                          <a href="<?php echo base_url('home/dk/'.$res->id_karya.'/'.$uri) ?>" target="_blank"
                            class="badge badge-warning">Detail</a>
                          <a href="<?php echo base_url('admin/Karya/ubahData/'.$res->id_karya) ?>" class="badge badge-primary">Edit</a>
                          <a href="<?php echo base_url('admin/Karya/delete/'.$res->id_karya) ?>"
                            onClick="return confirm('Aksi ini akan menghapus data secara permanen, hapus?');"
                            class="badge badge-danger">Hapus</a>
                        </td>
                      </tr>
                      <?php $no++;} ?>
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