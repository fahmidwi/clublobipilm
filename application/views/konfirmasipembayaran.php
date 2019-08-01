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
              <div class="alert alert-warning">
                <strong>PERINGATAN!</strong> Invoice kamu tidak terdata di database kami.
              </div>
              <div class="alert alert-success">
                <strong>SELAMAT!</strong> Konfirmasi pembayaran kamu berhasil. Silahkan tunggu kami akan memberi konfirmasi lewat E-mail (kotak masuk/spam).
              </div>
              <form method="POST" action="<?php echo base_url('pendaftaran/submitDaftar')?>" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputEmail1">Invoice</label>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Masukan Invoice Kamu">
                    <span class="input-group-btn">
                      <button class="btn" type="button">Cari</button>
                    </span>
                  </div>
                </div>
                
                <div class="col-md-12" style="background-color: #999;">
                  <center><p style="margin-top: 4%; color: #fff;">Data Film Kamu</p></center>
                </div><br><br><br>
                <div class="col-md-6">
                  <div class="row">
                      <a class="thumbnail">
                        <img src="<?php echo base_url('assets/frontend/img/terimakasih.png') ?>" alt="...">
                      </a>
                  </div>
                </div>
                <div class="col-md-6">
                <ul >
                    <li>
                      Nama Perwakilan : Dono
                    </li>
                    <li>
                      Sekolah : SMK ADI SANGGORO
                    </li>
                    <li>
                      Judul Film : Akhirnya aku paham
                    </li>
                    <li>
                      Genre : Horor
                    </li>
                    <li>
                      Tanggal Pendaftaran : 19 Januari 2019
                    </li>

                  </ul>
                </div>
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th>#</th>
                        <th>Invoice</th>
                        <th>Biaya Pendaftaran</th>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>CLP7878</td>
                        <td>Rp. 125.000</td>
                      </tr>
                    </table><hr>
                  </div>
                </div>
                <div class="col-md-12">
                  <form>
                    <div class="form-group">
                      <label for="exampleFormControlFile1">File Bukti Pembayaran</label>
                      <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                  </form>
                </div>
                <div class="col-md-12">
                <div style="margin-top: 4%;" class="g-recaptcha" data-sitekey="6LcjjKoUAAAAAP1ieU2BKCHqAB7puERah55AIbCn"></div><br>
                <button type="submit" id="btn" class="btn btn-skin btn-lg btn-block">SUBMIT</button>
                </div>
              </form>
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
  function cekpass(){
    var pass2=document.getElementById('password2').value;
    var pass1=document.getElementById('password1').value;
    if(pass1!=pass2){
      document.getElementById("btn").disabled = true;
      document.getElementById("password2").style.border = "1px solid red";
    }else{
      document.getElementById("btn").disabled = false;
      document.getElementById("password2").style.border = "1px solid green";
    }
  }
</script>
<script>
$(document).ready(function(){
  
  const base_url = '<?php echo base_url(); ?>'
  
  $('#npm').on('change',function () {
    const npm = $(this).val();
    checkNpm(npm);
  });

  function checkNpm(npm){
    $.ajax({
      type:'GET',
      url:base_url+'/pendaftaran/checkNpm/'+npm,
      dataType:'JSON',
      beforeSend:function() {
        console.log('mengirim')
      },
      success:function (res) {
        if (res.res == 1) {
          $('#alert-npm').show()
        }
      },
      error:function (a,b,c) {
        console.log(a)
        console.log(b)
        console.log(c)
      }
    });
  }

})
</script>
</html>