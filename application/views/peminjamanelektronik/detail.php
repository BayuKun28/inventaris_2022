<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Detail Peminjaman Elektronik
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Peminjaman Elektronik</a></li>
            <li class="active">Detail</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informasi Peminjam</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Nama Peminjam</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" class="form-control" value="<?= $info['nama_peminjam']; ?>" disabled>
                                        </div>
                                        <label>Keterangan</label>
                                        <div class="input-group">
                                            <textarea class="form-control" cols="100" rows="10" disabled><?= $info['keterangan']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Tanggal Pinjam</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" value="<?= $info['tgl_pinjam']; ?>" disabled>
                                        </div>
                                        <label>Tanggal Kembali</label>
                                        <div class=" input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" value="<?= $info['tgl_kembali']; ?>" disabled>
                                        </div>
                                        <label for="file">File Elektronik</label>
                                        <div>
                                            <span><?= $info['image']; ?></span>
                                        </div>
                                        <div>
                                            <a href="<?= base_url('upload/') . $info['image']; ?>" target="_blank" class="btn btn-sm btn-warning">Buka</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
                <div class="box-header with-border">
                    <h3 class="box-title">Informasi Elektronik</h3>
                </div>
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Nama Unit</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-home"></i>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $info['nama_unit']; ?>" disabled>
                                    </div>
                                    <label>Nama Barang</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-laptop"></i>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $info['nama_barang']; ?>" disabled>
                                    </div>
                                    <label>Nomor Seri Barang</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-cog"></i>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $info['nomor_seri_barang']; ?>" disabled>
                                    </div>
                                    <label>Kondisi</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-cog"></i>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $info['kondisi']; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
            <div class="box-footer text-right">
                <a href="<?= base_url('Peminjamanelektronik'); ?>" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('templates/footer'); ?>