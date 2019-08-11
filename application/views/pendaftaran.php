<!DOCTYPE html>
<html lang="en">
<!-- CSS -->
<?php $this->load->view('include/header.php'); ?>
<style type="text/css">
@media screen and (max-width: 600px) {
  #sudahterdaftar {
    margin-top: 10%;
  }

  #pendaftaran {
    margin-top: -20%;
  }
}
</style>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <!-- Section: about -->
  <section id="about" class="home-section color-dark bg-white" style="margin-top: -10%;">
    <div class="container marginbot-50">
      <!-- <div class="row">
        <div class="col-md-12">
          <center>
          <img src="<?php echo base_url("assets/frontend/img/pendaftaranditutup.png"); ?>" width="50%" height="50%">
          </center>
        </div>
      </div> -->
      <div class="container wow fadeIn" style="margin-top: -5%;">
        <div class="row" style="margin:1%; margin-top: 2%; ">
          <div class="col-md-6">
            <?php if ($this->session->flashdata('pesan')) { ?>
            <div class="alert alert-primary" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Pesan :</span>
              <?php echo $this->session->flashdata('pesan'); ?>
            </div>
            <?php } ?>
            <form method="post" action="<?php echo base_url('home/prosesPedaftaran'); ?>" enctype="multipart/form-data">
              <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                value="<?=$this->security->get_csrf_hash();?>" style="display: none">
              <div class="form-group">
                <label>Indiefest </label>
                <input type="text" name="indiefestKe" class="form-control" value="<?php echo $settings->indiefestKe; ?>"
                  disabled>
              </div>
              <div class="form-group ui-widget">
                <label>Asal Sekolah</label>
                <input type="text" name="asal_sekolah" id="asalSekolah" class="form-control"
                  placeholder="Masukan Asal Sekolah" style="text-transform:uppercase" autocomplete="off" required>
                <div id="autokomplit"
                  style="display:none;z-index:2;box-shadow:3px 3px 15px grey;background:white;position:absolute;margin-top:1%;width:65%;height:auto;padding:2%;padding-bottom:0;">
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Perwakilan Siswa</label>
                <input type="text" name="nama_pewakilan" class="form-control" placeholder="Masukan Nama Lengkap"
                  required>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label>No Telepon</label>
                  <input type="text" name="no_tlp" class="form-control" placeholder="Masukan Nomor Telepon" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Alamat Email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Masukan Email" required>
                </div>
              </div>
              <div class="form-group">
                <label>Judul Film</label>
                <input type="text" name="judul_film" class="form-control" placeholder="Masukan Judul Film" required>
              </div>
              <div class="form-group">
                <label>Genre Film</label>
                <select class="form-control" name="genre">
                  <?php foreach ($genre as $res) { ?>
                  <option value="<?php echo $res->id_genre?>"><?php echo $res->genre?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Durasi Film</label>
              </div>
              <div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <select class="form-control" name="menit">
                        <option value="00" selected>00</option>
                        <?php for($i=1; $i <=15; $i++) { ?>
                        <option value="<?php echo $i?>"><?php echo $i?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <p>Menit</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <select class="form-control" name="detik">
                        <option value="00" selected>00</option>
                        <?php for($i=1; $i <=59; $i++) { ?>
                        <option value="<?php echo $i?>"><?php echo $i?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <p>Detik</p>
                    </div>
                  </div>
                </div>
              </div>
              <small style="color:red;font-style:italic;display:none;" id="alert-durasi">Durasi film maksimal 15
                Menit<br></small>
              <div class="form-group">
                <label>Sinopsis Film</label>
                <textarea name="editor1" required></textarea>
              </div>
              <div class="form-group">
                <label>Crew List</label>
                <textarea name="editor2" required></textarea>
              </div>
              <div class="form-group">
                <label>Poster Film</label>
                <input type="file" name="file_poster" class="form-control" placeholder="Masukan Judul Film" required>
              </div>
              <div class="form-group">
                <label>Masukan Link Google Drive</label>
                <input type="text" name="link_film" class="form-control" placeholder="Masukan Link Film (Google Drive)"
                  required>
                <p style="color:red; margin-top: 2%;"><i>Link folder yang sudah terupload pada google drive kamu, </i><a
                    href="https://drive.google.com/file/d/1-FKKL3dr4iZxv8k_uph9w3wVh27lr83k/view?usp=drivesdk"
                    target="_blank"> Panduan upload folder film</a></p>

              </div>
              <div class="form-group form-check">
                <input type="checkbox" name="syarat_kentuan" class="form-check-input" id="ceksk">
                <label class="form-check-label" for="ceksk">Saya setuju dengan <a
                    href="<?php echo base_url('syaratdanketentuan/indiefest') ?>" target="_blank">Syarat dan
                    Ketentuan</a></label><br>
                <small style="color: red;">Harap dibaca terlebih dahulu</small>
              </div>
              <div class="g-recaptcha" id="captcha" data-sitekey="6LcjjKoUAAAAAP1ieU2BKCHqAB7puERah55AIbCn"></div><br>
              <button type="submit" id="daftar" class="btn btn-skin btn-lg btn-block">DAFTAR</button>
            </form>
          </div><br>
          <div class="col-md-6" style="border-left: 1px solid gray;">
            <ul class="list-group list-group-flush">
              <?php if (empty($terdaftar)) { ?>
              <div class="row">
                <div class="col-md-12 text-center">
                  <img src="<?php echo base_url('assets/frontend/img/terimakasih.png') ?>" width="320" height="220"
                    class="card-img-top" alt="..."><br><br><br>
                  <h6>Ayo daftarkan karya terbaik dari sekolah mu</h6>
                </div>
              </div>
              <?php } else { ?>
              <?php foreach ($terdaftar as $res) { ?>
              <li class="list-group-item" style="margin-left:5%;">
                <div class="row">
                  <div class="col-md-3 text-center">
                    <img style="border: 3px solid #999;"
                      src="<?php echo base_url('assets/backend/img/poster_regis/'.$res->poster) ?>" width="90"
                      height="130" class="card-img-top" alt="...">
                  </div>
                  <div class="col-md-9">
                    <b><?php echo $res->asal_sekolah; ?><br><small style="font-weight: bold;">Judul Film :
                        <?php echo $res->judul_film;?></small></b>
                    <p style="margin-top: -2%;"><small style="font-weight: bold;">Sinopsis :</small></p>
                    <p style="margin-top: -5%; font-size: 10pt;">
                      <?php echo substr($res->sinopsis,0,100).'....'; ?>
                    </p>
                  </div>
                </div>
              </li>
              <?php } ?>
              <?php } ?>
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
CKEDITOR.replace('editor1', {
  toolbar: [{
      name: 'document',
      items: ['NewPage', 'Preview', '-', 'Templates']
    }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
    '/', // Line break - next group will be placed in new line.
    {
      name: 'basicstyles',
      items: ['Bold', 'Italic']
    }
  ]
});
CKEDITOR.replace('editor2', {
  toolbar: [{
      name: 'document',
      items: ['NewPage', 'Preview', '-', 'Templates']
    }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
    '/', // Line break - next group will be placed in new line.
    {
      name: 'basicstyles',
      items: ['Bold', 'Italic']
    }
  ]
});
</script>
<script>
$(document).ready(function() {
  const url = '<?php echo base_url() ?>';

  $('#daftar').prop('disabled', true);

  $('#ceksk').on('change', function() {
    if ($(this).is(':checked')) {
      $(this).attr('value', 'true');
    } else {
      $(this).attr('value', 'false');
    }

    if ($(this).val() == 'true') {
      $('#daftar').prop('disabled', false);
    } else {
      $('#daftar').prop('disabled', true);
    }
  });


  $('#asalSekolah').keyup(function() {
    const keyword = $(this).val();
    if (!keyword) {
      $('#autokomplit').html('');
      $('#autokomplit').hide();
      return;
    }
    autokomplitSekolah(keyword)
  })

  $('#autokomplit').on('click', '#klikautokomplit', function() {
    var data = $(this).attr('data');
    $('#autokomplit').hide();
    $('#asalSekolah').val(data);
  });

  function autokomplitSekolah(keyword) {
    $.ajax({
      type: 'GET',
      url: url + 'home/autokomplitSekolah/' + keyword,
      dataType: 'JSON',
      beforeSend: function() {
        $('#autokomplit').show();
        $('#autokomplit').html(". . . . .");
      },
      success: function(res) {
        console.log(res.dataSekolah.length)
        if (res.dataSekolah.length == 0) {
          $('#autokomplit').hide();
          return
        }

        var html = ''
        $.each(res.dataSekolah, function(key, val) {
          html += '<a href="javascript:void(0);" id="klikautokomplit" data="' + val.asal_sekolah +
            '"><b>' + val.asal_sekolah + '</b></a><hr>'
        });

        $('#autokomplit').html(html);
      }
    });
  }
})
</script>

</html>