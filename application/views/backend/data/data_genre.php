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
                <h4 class="header-title">Data Genre</h4>
                <a href="#" class="badge badge-info" data-toggle="modal" data-target=".tambahgenre">Tambah
                  Data</a><br><br>
                <div class="data-tables datatable-dark">
                  <table id="dataTable3" class="text-center">
                    <thead class="text-capitalize">
                      <tr>
                        <th>No</th>
                        <th>Genre</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1;foreach ($genre as $res) {?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $res->genre; ?></td>
                        <td>
                          <a href="#" class="badge badge-primary" data-toggle="modal"
                            data-target=".editgenre<?php echo $res->id_genre ?>">Edit</a>
                          <a href="<?php echo base_url('admin/Genre/delete/'.$res->id_genre) ?>"
                            class="badge badge-danger"
                            onClick="return confirm('Aksi ini akan menghapus data secara permanen, hapus?');">Hapus</a>
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
          <!-- Large modal start -->
          <div class="col-lg-6 mt-5">
            <div class="card">
              <!-- Large modal -->
              <!-- TAMBAH DATA -->
              <div class="modal fade bd-example-modal-lg tambahgenre">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambah data Genre</h5>
                      <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <form method="post" action="<?php echo base_url('admin/Genre/ProsesTambah/'); ?>">
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="example-text-input" class="col-form-label">Genre</label>
                              <input name="genre" class="form-control" type="text" id="example-text-input"
                                placeholder="masukan Gener" required>
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

              <!-- EDIT DATA -->
              <?php foreach ($genre as $res) { ?>
              <div class="modal fade bd-example-modal-lg editgenre<?php echo $res->id_genre ?>">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Ubah data Genre</h5>
                      <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <form method="post" action="<?php echo base_url('admin/Genre/ProsesUbahData/'.$res->id_genre); ?>">
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="example-text-input" class="col-form-label">Genre</label>
                              <input name="genre" class="form-control" type="text" id="example-text-input"
                                value="<?php echo $res->genre ?>" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ubah data</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <?php } ?>
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