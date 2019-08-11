<!doctype html>
<html class="no-js" lang="en">

<?php $this->load->view('include/head_backend');?>

<body>
  <div id="preloader">
    <div class="loader"></div>
  </div>
  <!-- preloader area end -->
  <!-- page container area start -->
  <div class="page-container">
    <?php $this->load->view('include/sidebar_backend')?>
    <!-- main content area start -->
    <div class="main-content">
      <!-- header area start -->
      <?php $this->load->view('include/header_backend')?>
      <?php $this->load->view('include/tabhead')?>
      <!-- page title area end -->
      <div class="main-content-inner">
        <div class="row">
          <!-- Dark table start -->
          <div class="col-12 mt-5">
            <div class="card">
              <div class="card-body">
                <h4 class="header-title">Masukan/Pertanyaan</h4>
                <div class="data-tables datatable-dark">
                  <table id="dataTable3" class="text-left">
                    <thead class="text-capitalize">
                      <tr>
                        <th>No</th>
                        <th>nama</th>
                        <th>Email</th>
                        <th>Subjek</th>
                        <th>Pesan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;foreach ($masukan as $res) {?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $res->nama; ?></td>
                        <td><?php echo $res->email; ?></td>
                        <td><?php echo $res->subjek; ?></td>
                        <td><?php echo $res->pesan; ?></td>
                      </tr>
                      <?php $no++;}?>
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
    <?php $this->load->view('include/footer_backend');?>
    <!-- footer area end-->
  </div>
  <!-- page container area end -->
  <!-- offset area start -->

</body>
<?php $this->load->view('include/js_backend');?>
<script>
CKEDITOR.replace('deskripsi_proker', {
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
</html>

</html>