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
                <h4 class="header-title">Data tentang kami</h4>
                <!-- <a href="<?php echo base_url('admin/home/tambahdata_misi') ?>" class="badge badge-info">Tambah Data</a><br><br> -->
                <div class="data-tables datatable-dark">
                  <?php if ($this->session->flashdata('pesan')) { ?>
                  <div class="alert alert-primary" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Pesan :</span>
                    <?php echo $this->session->flashdata('pesan'); ?>
                  </div>
                  <?php } ?>
                  <table id="dataTable3" class="text-center">
                    <thead class="text-capitalize">
                      <tr>
                        <th>No</th>
                        <th>title</th>
                        <th>isi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach($artikelstatis as $res) { ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $res->title; ?></td>
                        <td><?php echo $res->isi; ?></td>
                        <td>
                          <a href="<?php echo base_url('admin/ArtikelStatis/ubahData/'.$res->id_artikel_statis) ?>"
                            class="badge badge-primary">Edit</a>
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
