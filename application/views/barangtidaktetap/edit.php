<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Barang Tidak Tetap
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Barang Tidak Tetap</a></li>
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
                        <h3 class="box-title">Barang Tidak Tetap</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?= base_url('Barangtidaktetap/edit'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="id" id="id" value="<?= $barang['id']; ?>">
                                        <label for="nama_barang">Nama Barang</label>
                                        <input type="text" value="<?= $barang['nama_barang']; ?>" class="form-control" id="nama_barang" name="nama_barang" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="jumlah">Jumlah</label>
                                        <input type="number" value="<?= $barang['jumlah']; ?>" class="form-control" id="jumlah" name="jumlah" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="5"><?= $barang['keterangan']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer text-right">
                            <a href="<?= base_url('Barangtidaktetap'); ?>" class="btn btn-danger">Kembali</a>
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