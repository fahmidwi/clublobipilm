<!doctype html>
<html class="no-js" lang="en">
<?php $this->load->view('include/head_backend'); ?>

<body>
  <!-- preloader area start -->
  <div id="preloader">
    <div class="loader"></div>
  </div>
  <!-- preloader area end -->
  <!-- login area start -->
  <div class="login-area">
    <div class="container">
      <div class="login-box ptb--100">
        <form method="POST" action="<?php echo base_url('admin/Login/actLogin') ?>">
          <div class="login-form-head" style="background-color: #171717;">
            <h4>Login Dashboard Clp</h4>
            <p>Hallo, login untuk masuk ke halaman Dashboard</p>
          </div>
          <div class="login-form-body">
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
            <div class="form-gp">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" id="Username" name="username" required>
              <i class="ti-check-box"></i>
            </div>
            <div class="form-gp">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" id="exampleInputPassword1" name="password" required>
              <i class="ti-lock"></i>
            </div>
            <div class="submit-btn-area">
              <button id="form_submit" type="submit">Masuk <i class="ti-arrow-right"></i></button>
            </div><br>
            <?php if ($this->session->flashdata('pesan')) { ?>
            <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Pesan :</span>
              <?php echo $this->session->flashdata('pesan'); ?>
            </div>
            <?php } ?>
          </div>
      </div>
      </form>
    </div>
  </div>
  </div>
  <!-- login area end -->
  <?php $this->load->view('include/js_backend'); ?>
</body>

</html>