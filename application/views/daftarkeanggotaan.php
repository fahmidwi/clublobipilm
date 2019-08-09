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
                <blockquote>PENDAFTARAN KEANGGOTAAN</blockquote>
              </h3>
              <form method="POST" action="<?php echo base_url('pendaftaran/submitDaftar')?>" enctype="multipart/form-data">
              <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Lengkap</label>
                  <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" name="nama" required>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>No Telepon</label>
                    <input type="number" min="0" max=”99999999999999″ class="form-control" placeholder="Masukan Nomor Telepon" name="no_telepon" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Alamat Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                      placeholder="Masukan Email" name="email" required>
                  </div>
                </div>
                <div class="form-group">
                  <label>NPM (Nomor Induk Mahasiswa)</label>
                  <input type="number" min="0" max="999999999" class="form-control" id="npm" placeholder="Masukan Npm" name="npm" required>
                </div>
                <small style="color:red;font-style:italic;display:none;" id="alert-npm">Npm yang anda masukan telah terdaftar<br></small>
                <div class="form-group">
                  <label>Upload foto profile</label>
                  <input type="file" class="form-control" name="file" required>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <label for="exampleInputEmail1">Password</label>
                    <div class="input-group">
                      <input type="password" id="password1" class="form-control password" placeholder="Masukan Password" name="password" required>
                      <span class="input-group-btn">
                        <button class="btn showpassword" type="button" data="true"><span class="glyphicon glyphicon-eye-open"></span></button>
                      </span>
                    </div><!-- /input-group -->
                  </div><!-- /.col-lg-6 -->
                  <div class="col-lg-6">
                    <label for="exampleInputEmail1">Konfirmasi Password</label>
                    <div class="input-group">
                      <input type="password" id="password2" class="form-control password" placeholder="Konfirmasi Password" name="password" onchange="cekpass()" required>
                      <span class="input-group-btn">
                        <button class="btn showpassword" type="button" data="true"><span class="glyphicon glyphicon-eye-open"></span></button>
                      </span>
                    </div><!-- /input-group -->
                  </div><!-- /.col-lg-6 -->
                </div>
                <!-- <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="Password" id="password1" class="form-control" placeholder="Masukan Password" name="password" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Konfirmasi Password</label>
                    <input type="Password" id="password2" class="form-control" placeholder="Konfirmasi Password" name="password" onchange="cekpass()" required>
                  </div>
                </div> -->
                <br>
                <div class="form-group">
                  <label>Angkatan clp</label>
                  <select class="form-control" name="angkatan">
                    <?php 
                $tahun = date('Y');
                for ($angkatan=2010; $angkatan <= $tahun; $angkatan++) { ?>
                    <option value="<?php echo $angkatan; ?>">Angkatan <?php echo $angkatan; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="g-recaptcha" data-sitekey="6LcjjKoUAAAAAP1ieU2BKCHqAB7puERah55AIbCn"></div><br>
                <button type="submit" id="btn" class="btn btn-skin btn-lg btn-block">DAFTAR</button>
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
  
  $('.showpassword').click(function() {
    var data = $(this).attr('data')
    if (data=='true') {
      $(this).attr('data','false')
      $('.password').attr('type','text')
    }else{
      $(this).attr('data','true')
      $('.password').attr('type','password')
    }
  })

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