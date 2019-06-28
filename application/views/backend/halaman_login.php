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
    <div class="login-area" >
        <div class="container">
            <div class="login-box ptb--100" >
                <form>
                    <div class="login-form-head" style="background-color: #171717;">
                        <h4>Login</h4>
                        <p>Hallo, login untuk masuk ke halaman Dashboard</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" id="Username">
                            <i class="ti-check-box"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="exampleInputPassword1">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Masuk <i class="ti-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->
<?php $this->load->view('include/footer_backend'); ?>


</body>

</html>