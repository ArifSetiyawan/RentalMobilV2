<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">RENTCAR MENU</li>
        <li class="nav-item">
            <a href="<?php echo base_url(); ?>welcome" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Master Data
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="pages/forms/general.html" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p>Mobil</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/forms/advanced.html" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>User Login</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/forms/editors.html" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Pelanggan</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Transaksi Peminjaman
                </p>
            </a>
        </li>
    </ul>
</nav>