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
                <h4 class="header-title">Data Keanggotaan</h4>
                <a href="<?php echo base_url('admin/home/tambahdata_user') ?>" class="badge badge-info">Tambah Data</a>
                <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="col-form-label" style="font-weight: bold; margin-top: 9%;">Cetak laporan per tahun</label>
                  <select class="form-control">
                    <option>Pilih tahun</option>
                    <option>2019</option>
                  </select>
                </div>
                </div>
                <div class="data-tables datatable-dark">
                  <table id="dataTable3" class="text-center">
                    <thead class="text-capitalize">
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1;foreach ($keanggotaan as $res) { ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $res->nama; ?></td>
                        <td><?php echo $res->email; ?></td>
                      </tr>
                      <?php $no++; } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- Dark table end -->
          <!-- Large modal start -->
          <div class="col-lg-6 mt-5">
            <div class="card-body">
              <!-- Large modal -->
              <div class="modal fade bd-example-modal-lg">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Detail Data Perserta</h5>
                      <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius voluptates explicabo natus
                        nobis, aperiam placeat aliquid nisi ut exercitationem dolor quisquam nam tempora voluptatem.
                        Unde dignissimos est aliquid quidem porro dolorum ipsam suscipit animi quas, debitis ea, sunt
                        quo distinctio doloribus eveniet dolores tempore delectus voluptatum! Possimus earum asperiores
                        animi.</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Large modal modal end -->
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