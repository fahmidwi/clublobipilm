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
                <h4 class="header-title">Data Berita</h4>
                <a href="<?php echo base_url('admin/Berita/tambahData') ?>" class="badge badge-info">Tambah
                  Data</a>
                <br><br>
                <div class="data-tables datatable-dark">
                  <table id="dataTable3" class="text-left">
                    <thead class="text-capitalize">
                      <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>isi berita</th>
                        <th>tanggal upload</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;foreach ($berita as $res) {?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><img src="<?php echo base_url('assets/frontend/img/berita/' . $res->gambar) ?>"
                            width="100px" height="30px"></td>
                        <td><?php echo $res->judul_berita; ?></td>
                        <td><?php echo substr($res->isi_berita, 0, 100) . '....'; ?></td>
                        <td><?php echo $res->create_date; ?></td>
                        <td>
                          <a href="<?php echo base_url('admin/Berita/ubahData/' . $res->id_berita) ?>" class="badge badge-primary">Edit</a>
                          <a href="<?php echo base_url('admin/Berita/delete/' . $res->id_berita) ?>"
                            onClick="return confirm('Aksi ini akan mengahpus datasecara permanen, haous?');"
                            class="badge badge-danger">Hapus</a>
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

</html>