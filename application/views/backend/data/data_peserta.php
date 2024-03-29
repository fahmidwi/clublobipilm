<!doctype html>
<html class="no-js" lang="en">

<?php $this->load->view('include/head_backend'); ?>

<body>
  <div id="preloader">
    <div class="loader"></div>
  </div>
  <!-- preloader area end -->
  <link rel="stylesheet" href="<?php echo base_url('lib/backend/css/jquery-ui.min.css') ?>">
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
            <?php if ($this->session->flashdata('pesan')) { ?>
            <div class="alert alert-success" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Pesan :</span>
              <?php echo $this->session->flashdata('pesan'); ?>
            </div><br>
            <?php } ?>
            <div class="card">
              <div class="card-body">
                <h4 class="header-title">Data Peserta</h4><br>
                <a href="<?php echo base_url('admin/home/tambahdata_peserta') ?>" class="badge badge-info">Tambah
                  Data</a>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="col-form-label"
                      style="font-weight: bold; margin-top: 9%;">Cetak laporan per tahun</label>
                    <select class="form-control">
                      <option>Pilih tahun</option>
                      <option>2019</option>
                    </select>
                  </div>
                </div>
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
                        <th>Status kelengkapan data</th>
                        <th>Status pembayaran</th>
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
                        <td><?php echo $res->durasi.' Menit'; ?></td>
                        <td>
                          <?php if ($res->flg_konfirmasi == 1) { ?>
                          <p style="color:green;font-weight:bold;">Terkonfirmasi</p>
                          <?php } else { ?>
                          <p style="color:grey;font-weight:bold;">Menunggu Konfirmasi</p>
                          <?php }?>
                        </td>
                        <td>
                          <?php if ($res->status_pembayaran == 1) { ?>
                          <p style="color:green;font-weight:bold;">Terkonfirmasi</p>
                          <?php } else { ?>
                          <p style="color:grey;font-weight:bold;">Menunggu Konfirmasi</p>
                          <?php }?>
                        </td>
                        <td>
                          <a href="#" class="badge badge-warning" data-toggle="modal"
                            data-target=".detailpeserta<?php echo $res->id_registrasi; ?>">Detail</a>
                          <a href="#" class="badge badge-primary" data-toggle="modal"
                            data-target=".detailbukti<?php echo $res->id_registrasi; ?>"
                            onclick="getBukti(<?php echo $res->id_registrasi ?>)">Lihat bukti pembayaran</a>
                          <?php if ($res->flg_konfirmasi == 0) { ?>
                          <!-- <a href="<?php echo base_url('admin/home/konfimasicalonpeserta/'.$res->id_registrasi) ?>"
                            class="badge badge-primary"
                            onclick="return confirm('Data telah memenuhi syarat?, Konfirmasi dan kirim kan invoice pembayaran');">Konfirmasi</a> -->
                          <?php } ?>
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
                          </a><br><br>
                          <a href="<?php echo $res->link_film; ?>" target="blank_">
                            <p style="font-size:13pt;"><i class="fa fa-folder-o" aria-hidden="true"> Klik untuk melihat
                                assets film</p></i>
                          </a>
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
                            <?php 
                              $pisahdatetime = explode(' ',$res->tanggal_registrasi);
                            echo changeDate($pisahdatetime[0]).' '.$pisahdatetime[1]; ?></p><br>
                          <p style="margin-top:1%;">Durasi : <?php echo $res->durasi.' Menit'; ?></p><br>
                          <p>Sinopsis : <br><?php echo $res->sinopsis; ?></p><br>
                          <p>cast : <br><?php echo $res->crew; ?></p><br>
                          <!-- <p>Link film : <a href="<?php echo $res->link_film; ?>"
                              target="_blank"><?php echo $res->link_film; ?></a></p> -->
                          <br><br>

                          <h5>Kontak</h5>
                          <p><?php echo $res->email; ?></p>
                          <p><?php echo $res->no_tlp; ?></p>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <?php if ($res->flg_konfirmasi == 0) { ?>
                      <a href="<?php echo base_url('admin/home/konfimasicalonpeserta/'.$res->id_registrasi) ?>"
                        onclick="return confirm('Data telah memenuhi syarat?, Konfirmasi dan kirim kan invoice pembayaran kepada pendaftar?');"
                        class="btn btn-primary">Konfirmasi</a>
                      <?php } ?>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <?php $no++; } ?>
            </div>
          </div>
          <!-- Large modal modal end -->
          <div class="col-lg-6 mt-5">
            <div class="card">
              <!-- Large modal -->
              <?php $no=1; foreach ($peserta as $res) { ?>
              <div class="modal fade bd-example-modal-lg detailbukti<?php echo $res->id_registrasi; ?>">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Bukti pembayaran</h5>
                      <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12">
                          <center>
                            <div id="pictPemb<?php echo $res->id_registrasi; ?>"></div>
                          </center>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <?php if ($res->status_pembayaran == 0) { ?>
                      <a href="<?php echo base_url('admin/home/konfimasipembayaran/'.$res->id_registrasi) ?>"
                        onclick="return confirm('Konfirmasi pembayaran ?');" class="btn btn-primary"
                        id="btnKonfir<?php echo $res->id_registrasi ?>">Konfirmasi Pembayaran</a>
                      <?php }else{ ?>
                      <p style="color:green;font-weight:bold;">Sudah dikonfirmasi </p>
                      <?php } ?>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <?php $no++; } ?>
            </div>
          </div>
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
<script>
'use strict';
const url = '<?php echo base_url(); ?>'

function getBukti(id_registrasi) {
  $.ajax({
    type: 'GET',
    url: url + 'admin/home/getBuktiPembayaran/' + id_registrasi,
    dataType: 'JSON',
    beforeSend: function() {
      console.log('mengirim')
    },
    success: function(res) {
      const pictPemb = document.getElementById("pictPemb" + id_registrasi);
      if (res.data == 'not found') {
        console.log('sdas')
        document.getElementById("btnKonfir" + id_registrasi).style.visibility = "hidden";
        pictPemb.innerHTML = "DATA FILM BELUM DIKONFIRMASI";
        return;
      }

      if (res.data.status_bukti != 0) {
        const img = '<img src="' + url + 'assets/backend/img/bukti_pembayaran/' + res.data.bukti_pembayaran +
          '"/>';
        pictPemb.innerHTML = img;
      } else {
        pictPemb.innerHTML = 'BELUM MELAKUKAN KONFIRMASI PEMBAYARAN'
        document.getElementById("btnKonfir" + id_registrasi).style.visibility = "hidden";
      }
    }
  })
}
</script>

</html>