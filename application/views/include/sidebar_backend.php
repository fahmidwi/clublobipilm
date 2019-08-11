<!-- sidebar menu area start -->
<div class="sidebar-menu">
  <div class="sidebar-header">
    <div class="logo">
      <a href="<?php echo base_url('admin/home') ?>"><img src="<?php echo base_url('assets/backend/img/clpdash.png') ?>"
          alt="logo"></a>
    </div>
  </div>
  <div class="main-menu">
    <div class="menu-inner">
      <nav>
        <ul class="metismenu" id="menu">
          <?php if ($this->session->userdata('level_akses')=='0') { ?>
          <li>
            <a href="<?php echo base_url('admin/home/settings') ?>" aria-expanded="true"><i
                class="ti-settings"></i><span>Pengaturan</span></a>
          </li>
          <li>
            <a href="<?php echo base_url('admin/home/CalonPesertaClp') ?>" aria-expanded="true"><i
                class="ti-dashboard"></i><span>Peserta Indiefest</span></a>
          </li>
          <li>
            <a href="<?php echo base_url('admin/home/tentangkami') ?>" aria-expanded="true"><i
                class="ti-layout-sidebar-left"></i><span>Tentang Kami</span></a>
          </li>
          <li>
            <a href="<?php echo base_url('admin/home/slideshow') ?>" aria-expanded="true"><i
                class="ti-layers-alt"></i><span>Slideshow</span></a>
          </li>
          <li>
            <a href="<?php echo base_url('admin/home/proker') ?>" aria-expanded="true"><i
                class="ti-pie-chart"></i><span>Program Kerja</span></a>
          </li>
          <li>
            <a href="<?php echo base_url('admin/home/gallery') ?>" aria-expanded="true"><i
                class="ti-layers-alt"></i><span>Gallery</span></a>
          </li>
          <li>
            <a href="<?php echo base_url('admin/home/berita') ?>" aria-expanded="true"><i
                class="ti-book"></i><span>Berita CLP</span></a>
          </li>
          <?php } ?>
          <li>
            <a href="<?php echo base_url('admin/home/keanggotaan') ?>"><i
                class="ti-id-badge"></i><span>Keanggotaan</span></a>
          </li>
          <li>
            <a href="<?php echo base_url('admin/home/karya') ?>">
              <i class="ti-image"></i><span>Karya Anggota</span>
            </a>
          </li>
          <?php if ($this->session->userdata('level_akses')=='0') { ?>
          <li>
            <a href="<?php echo base_url('admin/home/genre') ?>">
              <i class="ti-menu-alt"></i><span>Genre</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('admin/home/user') ?>" aria-expanded="true"><i
                class="ti-face-smile"></i><span>User</span></a>
          </li>
          <li>
            <a href="<?php echo base_url('admin/home/masukan') ?>" aria-expanded="true"><i
                class="ti-face-message"></i><span>Masukan/Pertanyaan</span></a>
          </li>
          <?php } ?>

          <li>
            <a href="<?php echo base_url('admin/Login/logout') ?>" aria-expanded="true"><i
                class="ti-power-off"></i><span>Logout</span></a>
          </li>

        </ul>
      </nav>
    </div>
  </div>
</div>
<!-- sidebar menu area end -->