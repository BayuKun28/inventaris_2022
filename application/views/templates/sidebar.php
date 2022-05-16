        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url('assets/'); ?>user.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= $user['nama']; ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <?php if ($this->session->userdata('level')  == 1) { ?>
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">Main Menu</li>
                        <li>
                            <a href="<?= base_url('Dashboard') ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-book"></i> <span>Master</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url('Kondisi'); ?>"><i class="fa fa-circle-o"></i> Kondisi</a></li>
                                <li><a href="<?= base_url('Jenisranmor'); ?>"><i class="fa fa-circle-o"></i> Jenis Ranmor</a></li>
                                <li><a href="<?= base_url('Jenisbbm'); ?>"><i class="fa fa-circle-o"></i> Jenis BBM</a></li>
                                <li><a href="<?= base_url('Unitpengguna'); ?>"><i class="fa fa-circle-o"></i> Unit Pengguna</a></li>
                                <li><a href="<?= base_url('Auth/pengguna'); ?>"><i class="fa fa-circle-o"></i> User / Pengguna</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>Barang</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-circle-o"></i> Barang Tetap
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="<?= base_url('Kendaraan'); ?>"><i class="fa fa-circle-o"></i> Kendaraan</a></li>
                                        <li><a href="<?= base_url('Elektronik'); ?>"><i class="fa fa-circle-o"></i> Elektronik</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?= base_url('Barangtidaktetap'); ?>"><i class="fa fa-circle-o"></i> Barang Tidak Tetap</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i> <span>Peminjaman</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url('Peminjamankendaraan'); ?>"><i class="fa fa-circle-o"></i> Kendaraan</a></li>
                                <li><a href="<?= base_url('Peminjamanelektronik'); ?>"><i class="fa fa-circle-o"></i> Elektronik</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-newspaper-o"></i> <span>Laporan</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-circle-o"></i> Peminjaman
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="<?= base_url('Laporan/Peminjamankendaraan'); ?>"><i class="fa fa-circle-o"></i> Kendaraan</a></li>
                                        <li><a href="<?= base_url('Laporan/Peminjamanelektronik'); ?>"><i class="fa fa-circle-o"></i> Elektronik</a></li>
                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-circle-o"></i> Pengembalian
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="<?= base_url('Laporan/Pengembaliankendaraan'); ?>"><i class="fa fa-circle-o"></i> Kendaraan</a></li>
                                        <li><a href="<?= base_url('Laporan/Pengembalianelektronik'); ?>"><i class="fa fa-circle-o"></i> Elektronik</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <?php }
                if ($this->session->userdata('level') == 2) { ?>
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">Main Menu</li>
                        <li>
                            <a href="<?= base_url('Dashboard') ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>Barang</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-circle-o"></i> Barang Tetap
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="<?= base_url('Kendaraan'); ?>"><i class="fa fa-circle-o"></i> Kendaraan</a></li>
                                        <li><a href="<?= base_url('Elektronik'); ?>"><i class="fa fa-circle-o"></i> Elektronik</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?= base_url('Barangtidaktetap'); ?>"><i class="fa fa-circle-o"></i> Barang Tidak Tetap</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i> <span>Peminjaman</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url('Peminjamankendaraan'); ?>"><i class="fa fa-circle-o"></i> Kendaraan</a></li>
                                <li><a href="<?= base_url('Peminjamanelektronik'); ?>"><i class="fa fa-circle-o"></i> Elektronik</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-newspaper-o"></i> <span>Laporan</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-circle-o"></i> Peminjaman
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="<?= base_url('Laporan/Peminjamankendaraan'); ?>"><i class="fa fa-circle-o"></i> Kendaraan</a></li>
                                        <li><a href="<?= base_url('Laporan/Peminjamanelektronik'); ?>"><i class="fa fa-circle-o"></i> Elektronik</a></li>
                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-circle-o"></i> Pengembalian
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="<?= base_url('Laporan/Pengembaliankendaraan'); ?>"><i class="fa fa-circle-o"></i> Kendaraan</a></li>
                                        <li><a href="<?= base_url('Laporan/Pengembalianelektronik'); ?>"><i class="fa fa-circle-o"></i> Elektronik</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <?php }; ?>
            </section>
            <!-- /.sidebar -->
        </aside>