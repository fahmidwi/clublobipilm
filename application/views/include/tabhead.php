<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="<?php echo base_url('admin/home') ?>">Home</a></li>
                    <?php echo $tab; ?>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('nama') ?><i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <!-- <a class="dropdown-item" href="#">Message</a>
                    <a class="dropdown-item" href="#">Settings</a> -->
                    <a class="dropdown-item" href="<?php echo base_url('admin/Login/Logout');?>">Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>