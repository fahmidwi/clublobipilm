<!DOCTYPE html>
<html lang="en">

<!-- CSS -->
<?php $this->load->view('include/header.php'); ?>
<style type="text/css">
@media only screen and (max-width: 1168px) {
  #sudahdaftar {
    margin-top: 6%;
  }

  #sinopsis {
    margin-top: 300%;
  }
}
</style>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <!-- Section: about -->
  <section id="about" class="home-section color-dark bg-white" style="margin-top: -10%;">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="wow fadeIn" data-wow-offset="0" data-wow-delay="0.4s">
            <div class="section-heading">
              <h3 style="font-family: lato; font-weight:bold;">
                <blockquote>KONFIRMASI PEMBAYARAN</blockquote>
              </h3>
              <div class="alert alert-warning" id="not_found" style="display:none;">
                <strong>PERINGATAN!</strong> Invoice kamu tidak terdata di database kami.
              </div>
              <?php if ($this->session->flashdata('confirm_success')) { ?>
              <div class="alert alert-success" id="confirm_success">
                <?php echo $this->session->flashdata('confirm_success'); ?>
              </div>
              <?php } ?>
              <div class="form-group">
                <label for="exampleInputEmail1">Cari Invoice Kamu</label>
                <div class="input-group">
                  <input type="text" id="code_invoice" class="form-control" placeholder="Masukan Code Invoice Kamu">
                  <span class="input-group-btn">
                    <button class="btn" type="button" id="seacrh" style="color:black;">Cari</button>
                  </span>
                </div>
              </div>
              <center>
                <i class="fa fa-spinner fa-spin" id="loading" aria-hidden="true"
                  style="font-size:55pt;display:none;"></i>
              </center>
              <div id="dataInvoice" style="display:none;">
                <div class="col-md-12" style="background-color: #999;">
                  <center>
                    <p style="margin-top: 4%; color: #fff;">Data Film Kamu</p>
                  </center>
                </div><br><br><br><br>
                <div class="col-md-6">
                  <div class="row">
                    <a class="thumbnail" id="poster">
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <ul>
                    <li>
                      Nama Perwakilan : <namaperwakilan></namaperwakilan>
                    </li>
                    <li>
                      Sekolah : <sekolah></sekolah>
                    </li>
                    <li>
                      Judul Film : <judulfilm></judulfilm>
                    </li>
                    <li>
                      Genre : <genre></genre>
                    </li>
                    <li>
                      Tanggal Pendaftaran : <tglpendaftaran></tglpendaftaran>
                    </li>

                  </ul>
                </div>
                <div class="col-md-12">
                  <h5>INVOICE KAMU</h5>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th>#</th>
                        <th>Invoice</th>
                        <th>Perihal</th>
                        <th>Biaya Pendaftaran</th>
                      </tr>
                      <tr>
                        <td>
                          <no></no>
                        </td>
                        <td>
                          <codeinvoice></codeinvoice>
                        </td>
                        <td>
                          <perihal></perihal>
                        </td>
                        <td>
                          <biaya></biaya>
                        </td>
                      </tr>
                    </table>
                    <hr>
                  </div>
                </div>
                <div class="col-md-12" id="done-up">
                  <div class="alert alert-success" >
                    <strong>INFO!</strong> Konfirmasi pembayaran kamu berhasil. Silahkan tunggu kami akan cek pembayaran anda dan memberi
				konfirmasi lewat E-mail (kotak masuk/spam).
                  </div>
                </div>
                <form method="POST" id="form-up-bukti" action="<?php echo base_url("/home/uploadBuktiPembayaran") ?>"
                  enctype="multipart/form-data">
                  <div class="col-md-12">
                    <h5>UPLOAD BUKTI PEMBAYARAN</h5>
                    <div class="form-group">
                      <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                        value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                      <input type="hidden" name="idv" id="idv">
                      <input type="hidden" name="token" value="<?php echo $token; ?>">
                      <label for="exampleFormControlFile1">File Bukti Pembayaran</label>
                      <input type="file" name="file_bukti" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div style="margin-top: 4%;" class="g-recaptcha"
                      data-sitekey="6LcjjKoUAAAAAP1ieU2BKCHqAB7puERah55AIbCn"></div><br>
                    <button type="submit" id="btn" class="btn btn-skin btn-lg btn-block">KIRIM</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Section: about -->
  <!-- FOOTER -->
  <?php $this->load->view('include/footer.php'); ?>

</body>
<script>
$(document).ready(function() {

  const base_url = '<?php echo base_url(); ?>'

  setTimeout(() => {
    $('#confirm_success').hide();
  }, 10000);

  $('#seacrh').click(function() {
    $('#dataInvoice').hide();
    const code_invoice = $('#code_invoice').val();
    if (!code_invoice) {
      return;
    }
    checkInvoice(code_invoice);
  });

  function checkInvoice(code_invoice) {
    $.ajax({
      type: 'GET',
      url: base_url + '/home/checkInvoice/' + code_invoice,
      dataType: 'JSON',
      beforeSend: function() {
        $('#seacrh').prop('disabled', true);
        $('#loading').show();
      },
      success: function(res) {
        $('#seacrh').prop('disabled', false);
        $('#loading').hide()
        if (res.not_found) {
          console.log('GADA')
          $('#not_found').show()
        }
        if (res.found) {
          $('#form-up-bukti').show()
          $('#done-up').hide()
          if (res.dataInvoice.status_bukti != 0) {
            console.log(res.dataInvoice.status_bukti)
            $('#form-up-bukti').hide()
            $('#done-up').show()
          }
          $('#not_found').hide()
          $('#dataInvoice').show();
          $('#idv').val(res.dataInvoice.id_invoice)

          const poster = '<img src="' + base_url + 'assets/backend/img/poster_regis/' + res.dataInvoice
            .poster + '" alt="..." width="150" height="250">'
          $('#poster').html(poster)

          $('namaperwakilan').html(res.dataInvoice.nama_perwakilan)
          $('sekolah').html(res.dataInvoice.asal_sekolah)
          $('judulfilm').html(res.dataInvoice.judul_film)
          $('genre').html(res.dataInvoice.genre)
          $('tglpendaftaran').html(res.dataInvoice.tanggal_registrasi)
          $('codeinvoice').html(res.dataInvoice.code_invoice)
          $('perihal').html(res.dataInvoice.perihal)
          $('biaya').html("Rp." + res.dataInvoice.biaya)
        }
      }
    });
  }

})
</script>

</html>