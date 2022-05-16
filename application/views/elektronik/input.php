<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Form Input Elektronik
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Elektronik</a></li>
            <li class="active">Form Input</li>
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
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?= base_url('Elektronik/tambah'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="nama_barang">Nama Barang</label>
                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nomor_seri">Nomor Seri</label>
                                        <input type="text" class="form-control" id="nomor_seri" name="nomor_seri" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="jumlah">Jumlah</label>
                                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kondisi">Kondisi</label>
                                        <select id="kondisi" name="kondisi" class="itemKondisi form-control" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="file">File</label>
                                        <input type="file" id="file" name="file" accept=".pdf, .jpg, .png" required>
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
    $('#tgl_masuk').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    })
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
<?php
if (!empty($this->session->flashdata('message'))) {
    $pesan = $this->session->flashdata('message');
    if ($pesan == "Berhasil Ditambah") {
        $script = "
                    <script>
                            Swal.fire({
                              icon: 'success',
                              title: 'Data',
                              text: 'Data Berhasil Ditambah'
                            }) 
                    </script>
                ";
    } elseif ($pesan == "Berhasil Dihapus") {
        // die($pesan);
        $script = "
                    <script>
                            Swal.fire({
                              icon: 'success',
                              title: 'Data',
                              text: 'Berhasil Dihapus'
                            }) 
                    </script>
                ";
    } elseif ($pesan == "Berhasil Di Update") {
        // die($pesan);
        $script = "
                    <script>
                            Swal.fire({
                              icon: 'success',
                              title: 'Data',
                              text: 'Berhasil Di Update'
                            }) 
                    </script>
                ";
    } else {
        $script =
            "
                    <script>
                                Swal.fire({
                                  icon: 'error',
                                  title: 'Data',
                                  text: 'Gagal'
                                }) 

                    </script>
                    ";
    }
} else {
    $script = "";
}
echo $script;
?>