<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Detail Kendaraan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Barang Tetap / Kendaraan</a></li>
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
                        <h3 class="box-title">Kendaraan</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="jenis_ranmor">Jenis Ranmor</label>
                                        <select id="jenis_ranmor" name="jenis_ranmor" class="form-control" disabled>
                                            <option value="<?= $kendaraan['jenis_ranmor']; ?>" selected><?= $kendaraan['jenis_ranmor']; ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="merk">Merk</label>
                                        <input type="text" value="<?= $kendaraan['merk']; ?>" class="form-control" id="merk" name="merk" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="tipe_ranmor">Tipe Ranmor</label>
                                        <input type="text" value="<?= $kendaraan['tipe_ranmor']; ?>" class="form-control" id="tipe_ranmor" name="tipe_ranmor" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="unit_pengguna">Unit Pengguna</label>
                                        <select id="unit_pengguna" name="unit_pengguna" class="form-control" disabled>
                                            <option value="<?= $kendaraan['unit_pengguna']; ?>" selected><?= $kendaraan['unit_pengguna']; ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="no_pol">No Pol</label>
                                        <input type="text" value="<?= $kendaraan['no_pol']; ?>" class="form-control" id="no_pol" name="no_pol" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="no_rangka">No Rangka</label>
                                        <input type="text" value="<?= $kendaraan['no_rangka']; ?>" class="form-control" id="no_rangka" name="no_rangka" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="no_mesin">No Mesin</label>
                                        <input type="text" value="<?= $kendaraan['no_mesin']; ?>" class="form-control" id="no_mesin" name="no_mesin" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tahun_perolehan">Tahun Perolehan</label>
                                        <input type="number" value="<?= $kendaraan['tahun_perolehan']; ?>" class="form-control" id="tahun_perolehan" name="tahun_perolehan" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="asal_perolehan">Asal Perolehan</label>
                                        <input type="text" value="<?= $kendaraan['asal_perolehan']; ?>" class="form-control" id="asal_perolehan" name="asal_perolehan" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kondisi_ranmor">Kondisi Ranmor</label>
                                        <select id="kondisi_ranmor" name="kondisi_ranmor" class="form-control" disabled>
                                            <option value="<?= $kendaraan['kondisi_ranmor']; ?>" selected><?= $kendaraan['kondisi_ranmor']; ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="jenis_bbm">Jenis BBM</label>
                                        <select id="jenis_bbm" name="jenis_bbm" class="itemJenis_bbm form-control" disabled>
                                            <option value="<?= $kendaraan['jenis_bbm']; ?>" selected><?= $kendaraan['jenis_bbm']; ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row col-md-12">
                                            <div class="row col-md-12">
                                                <label for="file">File</label>
                                            </div>
                                            <div>
                                                <span><?= $kendaraan['file']; ?></span>
                                            </div>
                                            <div>
                                                <a href="<?= base_url('upload/') . $kendaraan['file']; ?>" target="_blank" class="btn btn-sm btn-warning">Buka</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer text-right">
                            <a href="<?= base_url('Kendaraan'); ?>" class="btn btn-danger">Kembali</a>
                        </div>
                </div>
                </form>
            </div>
        </div>
</div>
</section>
</div>

<?php $this->load->view('templates/footer'); ?>