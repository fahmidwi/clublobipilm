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
                <h4 class="header-title">Data User</h4>
                <a href="<?php echo base_url('admin/home/tambahdata_user') ?>" class="badge badge-info">Tambah Data</a>
                <br><br>
                <div class="data-tables datatable-dark">
                  <table id="dataTable3" class="text-center">
                    <thead class="text-capitalize">
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1;foreach ($user as $res) { ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $res->nama; ?></td>
                        <td><?php echo $res->email; ?></td>
                        <td><?php echo $res->username; ?></td>
                        <td>
                          <?php echo ($res->level_akses==0)?'<sl style="color:#52b7ff;">ADMIN</sl>' : '<sl style="color:grey;">ANGGOTA</sl>' ; ?>
                        </td>
                        <td>
                          <?php if ($res->level_akses==0) { ?>
                          <p>-</p>
                          <?php } else { ?>
                          <a href="<?php echo base_url('admin/User/ChangeToAdmin/'.$res->id_user) ?>"
                            onClick="return confirm('Jadikan user ini ADMIN?')" class="badge badge-primary">jadikan
                            admin</a>
                          <a href="<?php echo base_url('admin/User/hapusAnggota/'.$res->id_user) ?>" onClick="return confirm('Hapus anggota ini?')" class="badge badge-danger">Blokir</a>
                          <?php }?>
                        </td>
                      </tr>
                      <?php $no++; } ?>
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