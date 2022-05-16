<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Elektronik
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Barang Tetap / Elektronik</a></li>
            <li class="active">Edit</li>
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
                        <h3 class="box-title">Elektronik</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?= base_url('Elektronik/edit'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="id" id="id" value="<?= $elektronik['id']; ?>">
                                        <label for="nama_barang">Nama Barang</label>
                                        <input type="text" value="<?= $elektronik['nama_barang']; ?>" class="form-control" id="nama_barang" name="nama_barang" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nomor_seri">Nomor Seri</label>
                                        <input type="text" value="<?= $elektronik['nomor_seri_barang']; ?>" class="form-control" id="nomor_seri" name="nomor_seri" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="jumlah">Jumlah</label>
                                        <input type="number" value="<?= $elektronik['jumlah']; ?>" class="form-control" id="jumlah" name="jumlah" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kondisi">Unit Pengguna</label>
                                        <select id="kondisi" name="kondisi" class="itemKondisi form-control" required>
                                            <option value="<?= $elektronik['idkondisi']; ?>" selected> <?= $elektronik['kondisi']; ?> </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-6">
                                            <div class="row col-md-12">
                                                <div class="row col-md-12">
                                                    <label for="file">File</label>
                                                </div>
                                                <div class="row col-md-12">
                                                    <span>Jika Tidak Update File Biarkan</span>
                                                </div>
                                                <div class="row col-md-12">
                                                    <input type="file" id="file" name="file" accept=".pdf, .jpg, .png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer text-right">
                            <a href="<?= base_url('Elektronik'); ?>" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
</div>
</section>
</div>

<?php $this->load->view('templates/footer'); ?>

<script>
    $(function() {
        $('.itemKondisi').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url(); ?>/Elektronik/getKondisi",
                dataType: "json",
                delay: 250,
                data: function(params) {
                    return {
                        jen: params.term
                    };
                },
                processResults: function(data) {
                    var results = [];
                    $.each(data, function(index, item) {
                        results.push({
                            id: item.id,
                            text: item.kondisi
                        });
                    });
                    return {
                        results: results
                    }
                }
            }
        });
    });
</script>