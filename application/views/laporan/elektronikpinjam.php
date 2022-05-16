<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Laporan Peminjaman Elektronik
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laporan Peminjaman</a></li>
            <li class="active">Elektronik</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="row col-md-12">
                <div class="form-row">
                    <div class="box-header col-md-12">
                        <form method="post" action="<?= base_url('Laporan/Peminjamanelektronik') ?>" class="row">
                            <div class="form-group col-md-2">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="tanggalawal" name="tanggalawal" autocomplete="off" class="form-control" value="<?= $tanggalawal ?>">
                                </div>
                            </div>
                            <div class="form-group col-md-1">
                                <input type="text" readonly placeholder="S/D" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="tanggalakhir" name="tanggalakhir" autocomplete="off" class="form-control" value="<?= $tanggalakhir ?>">
                                </div>
                            </div>
                            <div class="form-group col-md-4 align-items-end">
                                <button name="action" value="tampil" type="submit" class="btn btn-success btn-col-1 " role="button" aria-disabled="true">Tampilkan</button>
                                <a href="<?= base_url('Laporan/cetakpeminjamanelektronik?tglawal=') . $tanggalawal . '&tglakhir=' . $tanggalakhir; ?>" name="cetak" class="btn btn-danger btn-col-1" target="_blank" role="button" aria-disabled="true"><i class="fa fa-balance-scale fa-fw"></i>Cetak</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row col-md-12">
                    <div class="table-responsive">
                        <table id="tabledata" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peminjam</th>
                                    <th>Nama Unit</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Cetak</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pinjam as $b) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $b['nama']; ?></td>
                                        <td><?= $b['nama_unit']; ?></td>
                                        <td><?= $b['tgl_pinjam']; ?></td>
                                        <td><?= $b['keterangan']; ?></td>
                                        <td><?php
                                            if (!empty($b['tgl_kembali'])) {
                                                echo " <a class='btn btn-sm btn-success'><i class='fa fa-check-circle'></i> Dikembalikan</a>";
                                            } else {
                                                echo " <a class='btn btn-sm btn-danger'><i class='fa fa-close'></i> Dipinjam</a>";
                                            }
                                            ?></td>
                                        <td><a target="_blank" href="<?= base_url('Laporan/cetaktransaksielektronik/') . $b['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-book"></i></a></td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
</div>

</div>

<?php $this->load->view('templates/footer'); ?>
<script>
    $(document).ready(function() {
        $('#tabledata').DataTable({
            responsive: true
        });
    });
    $(document).ready(function() {
        $('#tanggalawal').datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true
        });
    });
    $(document).ready(function() {
        $('#tanggalakhir').datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true
        });
    });
</script>