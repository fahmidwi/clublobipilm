<!DOCTYPE html>
<html lang="en">
<style type="text/css">
.tbl {
  width: 90%;
  height: 90%;
  overflow-x: auto;
  overflow-y: auto;
}
</style>
<!-- CSS -->
<?php $this->load->view('include/header.php'); ?>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <section id="about" class="home-section color-dark bg-white" style="margin-top: -10%;">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-12">
          <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
            <div class="section-heading">
              <h3 style="font-family: lato; font-weight:bold;">
                <blockquote>Keanggotaan CLP</blockquote>
              </h3>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-8"></div>
            <div class="col-xs-12 col-md-4">
            <?php 
              $q = $this->input->get('q');
              if ($q == '') {
                $value = null;
              }else{
                $value = $q;
              }
            ?>
              <form method="GET" action="<?php echo base_url('home/keanggotaan') ?>">
              <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Cari Anggota Berdasarkan Nama / npm" value=<?php echo $value; ?>>
                <span class="input-group-btn">
                  <button class="btn btn-dark" type="submit">Cari</button>
                </span>
              </div>
              </form>
            </div>
          </div><br>
          <div class="row">
            <div class="col-xs-12">
              <div class="tbl">
                <center>
                  <table class="table table-striped" style="width:100%">
                    <thead>
                      <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">NPM</th>
                        <th class="text-center">Angkatan CLP</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      <?php $no=1; foreach ($anggota as $res) { ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $res->nama ?></td>
                          <td>
                            <img src="<?php echo base_url('assets/backend/img/foto_profile/'.$res->foto_profile) ?>"
                              class="img-rounded" alt="foto profile" width="60px" height="70px">
                          </td>
                          <td><?php echo $res->npm; ?></td>
                          <td><?php echo $res->angkatan_clp; ?></td>
                        </tr>
                      <?php $no++;} ?>
                    </tbody>
                  </table>
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

</html>