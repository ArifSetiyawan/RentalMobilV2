<style>
  .dropdown-item {
    display: block;
    width: 100%;
    padding: 0.25rem 1rem;
    clear: both;
    font-weight: 400;
    color: #212529;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
  }
</style>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="index.html"><img src="<?php echo base_url(); ?>assets/userpage/images/logo.png" width="150" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item <?php echo isset($active_menu) ? ($active_menu == 'beranda'  ? 'active' : '') : ''; ?>"><a href="<?php echo base_url(); ?>userpage/index" class="nav-link">Beranda</a></li>
        <li class="nav-item <?php echo isset($active_menu) ? ($active_menu == 'about'  ? 'active' : '') : ''; ?>"><a href="<?php echo base_url(); ?>userpage/about" class="nav-link">Tentang Kami</a></li>
        <li class="nav-item <?php echo isset($active_menu) ? ($active_menu == 'layanan'  ? 'active' : '') : ''; ?>"><a href="<?php echo base_url(); ?>userpage/layanan" class="nav-link">Layanan Kami</a></li>
        <li class="nav-item <?php echo isset($active_menu) ? ($active_menu == 'mobil'  ? 'active' : '') : ''; ?>"><a href="<?php echo base_url(); ?>userpage/mobil" class="nav-link">Mobil</a></li>

        <?php if (isset($_SESSION['nama'])) { ?>
          <li class="nav-item <?php echo isset($active_menu) ? ($active_menu == 'transaksi_rental'  ? 'active' : '') : ''; ?>"><a href="<?php echo base_url(); ?>userpage/transaksi_rental" class="nav-link">Transaksi</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?= $_SESSION['nama'] ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo base_url('userpage/profil') ?>">Profil</a>
              <a class="dropdown-item" href="<?php echo base_url('userpage/changePass') ?>">Ganti Password</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>">Logout</a>
            </div>
          </li>
        <?php } ?>

      </ul>
    </div>
  </div>
</nav>
<!-- END nav -->