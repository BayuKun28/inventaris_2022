<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Detail Peminjaman Kendaraan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Peminjaman Kendaraan</a></li>
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
                                        <label for="file">File Kendaraan</label>
                                        <div>
                                            <span><?= $info['file']; ?></span>
                                        </div>
                                        <div>
                                            <a href="<?= base_url('upload/') . $info['file']; ?>" target="_blank" class="btn btn-sm btn-warning">Buka</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
                <div class="box-header with-border">
                    <h3 class="box-title">Informasi Kendaraan</h3>
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
                                            <i class="fa fa-car"></i>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $info['nama_barang']; ?>" disabled>
                                    </div>
                                    <label>Merk</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-cog"></i>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $info['merk']; ?>" disabled>
                                    </div>
                                    <label>Tipe Ranmor</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-cog"></i>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $info['tipe_ranmor']; ?>" disabled>
                                    </div>
                                    <label>Unit Pengguna</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-cog"></i>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $info['unit_pengguna']; ?>" disabled>
                                    </div>
                                    <label>Jenis BBM</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-cog"></i>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $info['nama_jenis_bbm']; ?>" disabled>
                                    </div>
                                    <label>Jenis Ranmor</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-cog"></i>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $info['nama_jenis_ranmor']; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Nomor Polisi</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-car"></i>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $info['no_pol']; ?>" disabled>
                                    </div>
                                    <label>Nomor Rangka</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-cog"></i>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $info['no_rangka']; ?>" disabled>
                                    </div>
                                    <label>Nomor Mesin</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-cog"></i>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $info['no_mesin']; ?>" disabled>
                                    </div>
                                    <label>Tahun Perolehan</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $info['tahun_perolehan']; ?>" disabled>
                                    </div>
                                    <label>Asal Perolehan</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $info['asal_perolehan']; ?>" disabled>
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
                            <div class="box-footer text-right">
                                <a href="<?= base_url('Peminjamankendaraan'); ?>" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>

                </form>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('templates/footer'); ?>