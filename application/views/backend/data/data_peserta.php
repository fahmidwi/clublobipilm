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
                <h4 class="header-title">Data Peserta</h4><br>
                <a href="<?php echo base_url('admin/home/tambahdata_peserta') ?>" class="badge badge-info">Tambah
                  Data</a>
                <div class="data-tables datatable-dark">
                  <table id="dataTable3" class="text-center"><br>
                    <thead class="text-capitalize">
                      <tr>
                        <th>No</th>
                        <th>Nama Perwakilan</th>
                        <th>Asal Sekolah</th>
                        <th>Email</th>
                        <th>Judul Film</th>
                        <th>Durasi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach ($peserta as $res) { ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $res->nama_perwakilan; ?></td>
                        <td><?php echo $res->asal_sekolah; ?></td>
                        <td><?php echo $res->email; ?></td>
                        <td><?php echo $res->judul_film; ?></td>
                        <td><?php echo $res->durasi; ?></td>
                        <td>
                          <a href="#" class="badge badge-warning" data-toggle="modal"
                            data-target=".detailpeserta<?php echo $res->id_registrasi; ?>">Detail</a>
                          <a href="#" class="badge badge-primary">Konfirmasi</a>
                          <!-- <a href="#" class="badge badge-danger">Tolak film</a> -->
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
              <?php $no=1; foreach ($peserta as $res) { ?>
              <div class="modal fade bd-example-modal-lg detailpeserta<?php echo $res->id_registrasi; ?>">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Detail Data Perserta Film</h5>
                      <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-4">
                          <a href="<?php echo $res->link_film; ?>" target="_blank">
                            <img src=<?php echo base_url('assets/backend/img/poster_regis/'.$res->poster) ?> width="300"
                              height="400" />
                          </a>
                          <p>Klik poster untuk melihat film</p>
                        </div>
                        <div class="col-md-8">
                          <h3><?php echo $res->asal_sekolah; ?></h3>
                          <hr />
                          <div class="row">
                            <div class="col-md-4">
                              <h4><?php echo $res->judul_film; ?></h4>
                            </div>
                            <div class="col-md-7">
                              <h5 style='float:right;'><?php echo $res->genre; ?></h5>
                            </div>
                          </div>
                          <p style="color:#ccc;font-size:12pt;">tanngal registrasi:
                            <?php echo $res->tanggal_registrasi; ?></p><br>
                          <p style="margin-top:1%;">Durasi : <?php echo $res->durasi; ?></p><br>
                          <p>Sinopsis : <br><?php echo $res->sinopsis; ?></p><br>
                          <p>cast : <br><?php echo $res->crew; ?></p><br>
                          <p>Link film : <a href="<?php echo $res->link_film; ?>" target="_blank"><?php echo $res->link_film; ?></a></p>
                          <br><br>

                          <h5>Kontak</h5>
                          <p><?php echo $res->email; ?></p>
                          <p><?php echo $res->no_tlp; ?></p>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <?php $no++; } ?>
            </div>
          </div>
          <!-- Large modal modal end -->
        </div>
      </div>
    </div>
    <!-- main content area end -->
    <!-- footer area start-->
    <footer>
      <?php $this->load->view('include/footer_backend'); ?>
      <!-- footer area end-->
  </div>
  <!-- page container area end -->
  <!-- offset area start -->

</body>
<?php $this->load->view('include/js_backend'); ?>

</html>