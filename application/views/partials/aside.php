<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="<?php echo base_url() ?>/assets/images/man.png" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="#" class="d-block"><?php echo $_SESSION['email'][0] ?></a>
    </div>
</div>
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">RENTCAR MENU</li>
        <?php if ($_SESSION['role'] == 1) { ?>
            <li class="nav-item <?php echo $this->uri->segment(1) == 'masterdata' ? 'menu-open' : 'has-treeview'; ?>">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Master Data
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>masterdata/datamobil" class="nav-link <?php echo $this->uri->segment(2) == 'datamobil' ? 'active' : ''; ?>">
                            <i class="nav-icon far fa-circle text-danger"></i>
                            <p>Mobil</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>masterdata/customer" class="nav-link <?php echo $this->uri->segment(2) == 'customer' || $this->uri->segment(2) == 'add_customer' || $this->uri->segment(2) == 'edit_customer' ? 'active' : ''; ?>">
                            <i class="nav-icon far fa-circle text-warning"></i>
                            <p>Pengguna</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>masterdata/supir" class="nav-link <?php echo $this->uri->segment(2) == 'supir' || $this->uri->segment(2) == 'add_supir' || $this->uri->segment(2) == 'edit_supir' ? 'active' : ''; ?>">
                            <i class="nav-icon far fa-circle text-primary"></i>
                            <p>Supir</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>masterdata/bank" class="nav-link <?php echo $this->uri->segment(2) == 'bank' || $this->uri->segment(2) == 'add_bank' || $this->uri->segment(2) == 'edit_bank' ? 'active' : ''; ?>">
                            <i class="nav-icon far fa-circle text-success"></i>
                            <p>Bank</p>
                        </a>
                    </li>
                </ul>
            </li>
        <?php } ?>
        <li class="nav-item <?php echo $this->uri->segment(1) == 'transaksi' ? 'menu-open' : 'has-treeview'; ?>">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Transaksi
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>transaksi" class="nav-link <?php echo $this->uri->segment(1) == 'transaksi' ? 'active' : ''; ?>">
                        <i class="nav-icon far fa-circle text-red"></i>
                        <p>
                            Transaksi Rental
                        </p>
                    </a>
                </li>
            </ul>
        </li>
        <?php if ($_SESSION['role'] == 1) { ?>
            <li class="nav-item <?php echo $this->uri->segment(1) == 'report' ? 'menu-open' : 'has-treeview'; ?>">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-print"></i>
                    <p>
                        Reporting
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>report/reportTransaksi" class="nav-link <?php echo $this->uri->segment(2) == 'reportTransaksi' ? 'active' : ''; ?>">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Report Transaksi Rental</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>report/reportPendapatan" class="nav-link <?php echo $this->uri->segment(2) == 'reportPendapatan' ? 'active' : ''; ?>">
                            <i class="nav-icon far fa-circle text-success"></i>
                            <p>Report Pendapatan Rental</p>
                        </a>
                    </li>
                </ul>
            </li>
        <?php } ?>

    </ul>
</nav>