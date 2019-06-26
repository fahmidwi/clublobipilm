<!DOCTYPE html>
<html lang="en">
<!-- CSS -->
<?php $this->load->view('include/header.php'); ?>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <!-- Section: about -->
  <section id="about" class="home-section color-dark bg-white" style="margin-top: -10%;">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-6 ">
          <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
            <div class="section-heading">
              <h3 style="font-family: lato; font-weight:bold;"><blockquote>PENDAFTARAN INDIEFEST</blockquote></h3>
            </div>
          </div>
        </div>
        <div class="col-lg-6 ">
          <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
            <div class="section-heading">
              <h3 style="font-family: lato; font-weight:bold;"><blockquote>SEKOLAH YANG SUDAH TERDAFTAR</blockquote></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container" style="margin-top: -5%;">
      <div class="row" style="margin:1%; margin-top: 2%; ">
        <div class="col-md-6">
          <!-- <div class="alert alert-danger" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            Gagal mendaftar
          </div> -->
          <form method="post" action="<?php echo base_url('home/prosesPedaftaran'); ?>" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Perwakilan Siswa</label>
              <input type="text" name="nama_pewakilan" class="form-control" placeholder="Masukan Nama Lengkap">
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label>No Telepon</label>
                <input type="text" name="no_tlp" class="form-control"  placeholder="Masukan Nomor Telepon">
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Alamat Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Email">
            </div>
          </div>
            <div class="form-group">
              <label>Asal Sekolah</label>
              <input type="text" name="asal_sekolah" class="form-control"  placeholder="Masukan Asal Sekolah">
            </div>
            <div class="form-group">
              <label>Judul Film</label>
              <input type="text" name="judul_film" class="form-control"  placeholder="Masukan Judul Film">
            </div>
            <div class="form-group">
              <label>Sinopsis Film</label>
              <textarea name="editor1"></textarea>
            </div>
            <div class="form-group">
              <label>Crew List</label>
              <textarea name="editor2"></textarea>
            </div>
            <div class="form-group">
              <label>Poster Film</label>
              <input type="file" name="file_poster" class="form-control"  placeholder="Masukan Judul Film">
            </div>
            <div class="form-group">
              <label>Masukan Link Google Drive</label>
              <input type="text" name="link_film" class="form-control"  placeholder="Masukan Link Film">
            </div>
            <div class="form-group form-check">
              <input type="checkbox" name="syarat_kentuan" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Saya setuju dengan Syarat dan Ketentuan</label>
            </div>
            <button type="submit" class="btn btn-skin btn-lg btn-block">DAFTAR</button>
          </form>
        </div><br>
        <div class="col-md-6" style="border-left: 1px solid gray;">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">          
              <div class="row">
                <div class="col-md-3 text-center">
                  <img style="border: 3px solid #999;" src="<?php echo base_url('assets/frontend/img/1484409214451.jpg') ?>" width="70" height="120" class="card-img-top" alt="...">
                </div>
                <div class="col-md-9">
                  <b>SMK ADI SANGGORO<br><small style="font-weight: bold;">Judul Film : Kahade</small></b>
                  <p style="margin-top: -2%;"><small style="font-weight: bold;">Sinopsis :</small></p>
                  <p style="margin-top: -5%; font-size: 10pt;">Diterima di SMA ungggulan Abdi Bangsa  merupakan impian setiap siswa.Namun bagi Alex (Angga Aldi),....</p>
                </div>
              </div>
            </li>
            <li class="list-group-item">          
              <div class="row">
                <div class="col-md-3 text-center">
                  <img style="border: 3px solid #999;" src="<?php echo base_url('assets/frontend/img/1484409214451.jpg') ?>" width="70" height="120" class="card-img-top" alt="...">
                </div>
                <div class="col-md-9">
                  <b>SMK ADI SANGGORO<br><small style="font-weight: bold;">Judul Film : Kahade</small></b>
                  <p style="margin-top: -2%;"><small style="font-weight: bold;">Sinopsis :</small></p>
                  <p style="margin-top: -5%; font-size: 10pt;">Diterima di SMA ungggulan Abdi Bangsa  merupakan impian setiap siswa.Namun bagi Alex (Angga Aldi),....</p>
                </div>
              </div>
            </li>
            <li class="list-group-item">          
              <div class="row">
                <div class="col-md-3 text-center">
                  <img style="border: 3px solid #999;" src="<?php echo base_url('assets/frontend/img/1484409214451.jpg') ?>" width="70" height="120" class="card-img-top" alt="...">
                </div>
                <div class="col-md-9">
                  <b>SMK ADI SANGGORO<br><small style="font-weight: bold;">Judul Film : Kahade</small></b>
                  <p style="margin-top: -2%;"><small style="font-weight: bold;">Sinopsis :</small></p>
                  <p style="margin-top: -5%; font-size: 10pt;">Diterima di SMA ungggulan Abdi Bangsa  merupakan impian setiap siswa.Namun bagi Alex (Angga Aldi),....</p>
                </div>
              </div>
            </li>
            <li class="list-group-item">          
              <div class="row">
                <div class="col-md-3 text-center">
                  <img style="border: 3px solid #999;" src="<?php echo base_url('assets/frontend/img/1484409214451.jpg') ?>" width="70" height="120" class="card-img-top" alt="...">
                </div>
                <div class="col-md-9">
                  <b>SMK ADI SANGGORO<br><small style="font-weight: bold;">Judul Film : Kahade</small></b>
                  <p style="margin-top: -2%;"><small style="font-weight: bold;">Sinopsis :</small></p>
                  <p style="margin-top: -5%; font-size: 10pt;">Diterima di SMA ungggulan Abdi Bangsa  merupakan impian setiap siswa.Namun bagi Alex (Angga Aldi),....</p>
                </div>
              </div>
            </li>
            <li class="list-group-item">          
              <div class="row">
                <div class="col-md-3 text-center">
                  <img style="border: 3px solid #999;" src="<?php echo base_url('assets/frontend/img/1484409214451.jpg') ?>" width="70" height="120" class="card-img-top" alt="...">
                </div>
                <div class="col-md-9">
                  <b>SMK ADI SANGGORO<br><small style="font-weight: bold;">Judul Film : Kahade</small></b>
                  <p style="margin-top: -2%;"><small style="font-weight: bold;">Sinopsis :</small></p>
                  <p style="margin-top: -5%; font-size: 10pt;">Diterima di SMA ungggulan Abdi Bangsa  merupakan impian setiap siswa.Namun bagi Alex (Angga Aldi),....</p>
                </div>
              </div>
            </li>
            <li class="list-group-item">          
              <div class="row">
                <div class="col-md-3 text-center">
                  <img style="border: 3px solid #999;" src="<?php echo base_url('assets/frontend/img/1484409214451.jpg') ?>" width="70" height="120" class="card-img-top" alt="...">
                </div>
                <div class="col-md-9">
                  <b>SMK ADI SANGGORO<br><small style="font-weight: bold;">Judul Film : Kahade</small></b>
                  <p style="margin-top: -2%;"><small style="font-weight: bold;">Sinopsis :</small></p>
                  <p style="margin-top: -5%; font-size: 10pt;">Diterima di SMA ungggulan Abdi Bangsa  merupakan impian setiap siswa.Namun bagi Alex (Angga Aldi),....</p>
                </div>
              </div>
            </li>
            <li class="list-group-item">          
              <div class="row">
                <div class="col-md-3 text-center">
                  <img style="border: 3px solid #999;" src="<?php echo base_url('assets/frontend/img/1484409214451.jpg') ?>" width="70" height="120" class="card-img-top" alt="...">
                </div>
                <div class="col-md-9">
                  <b>SMK ADI SANGGORO<br><small style="font-weight: bold;">Judul Film : Kahade</small></b>
                  <p style="margin-top: -2%;"><small style="font-weight: bold;">Sinopsis :</small></p>
                  <p style="margin-top: -5%; font-size: 10pt;">Diterima di SMA ungggulan Abdi Bangsa  merupakan impian setiap siswa.Namun bagi Alex (Angga Aldi),....</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- /Section: about -->
  <!-- FOOTER -->
<?php $this->load->view('include/footer.php'); ?>
</body>
<script>
  CKEDITOR.replace( 'editor1', {
  toolbar: [
    { name: 'document', items: ['NewPage', 'Preview', '-', 'Templates' ] }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
    '/',                                          // Line break - next group will be placed in new line.
    { name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
  ]
});
    CKEDITOR.replace( 'editor2', {
  toolbar: [
    { name: 'document', items: ['NewPage', 'Preview', '-', 'Templates' ] }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
    '/',                                          // Line break - next group will be placed in new line.
    { name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
  ]
});
</script>

</html>
