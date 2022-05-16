<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Form Input Kendaraan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Kendaraan</a></li>
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
                    <form action="<?= base_url('Kendaraan/tambah'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="jenis_ranmor">Jenis Ranmor</label>
                                        <select id="jenis_ranmor" name="jenis_ranmor" class="itemJenis_ranmor form-control" required>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="merk">Merk</label>
                                        <input type="text" class="form-control" id="merk" name="merk" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="tipe_ranmor">Tipe Ranmor</label>
                                        <input type="text" class="form-control" id="tipe_ranmor" name="tipe_ranmor" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="unit_pengguna">Unit Pengguna</label>
                                        <select id="unit_pengguna" name="unit_pengguna" class="itemUnit_pengguna form-control" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="no_pol">No Pol</label>
                                        <input type="text" class="form-control" id="no_pol" name="no_pol" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="no_rangka">No Rangka</label>
                                        <input type="text" class="form-control" id="no_rangka" name="no_rangka" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="no_mesin">No Mesin</label>
                                        <input type="text" class="form-control" id="no_mesin" name="no_mesin" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tahun_perolehan">Tahun Perolehan</label>
                                        <input type="number" class="form-control" id="tahun_perolehan" name="tahun_perolehan" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="asal_perolehan">Asal Perolehan</label>
                                        <input type="text" class="form-control" id="asal_perolehan" name="asal_perolehan" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kondisi_ranmor">Kondisi Ranmor</label>
                                        <select id="kondisi_ranmor" name="kondisi_ranmor" class="itemKondisi_ranmor form-control" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="jenis_bbm">Jenis BBM</label>
                                        <select id="jenis_bbm" name="jenis_bbm" class="itemJenis_bbm form-control" required>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="file">File</label>
                                        <input type="file" id="file" name="file" accept=".pdf, .jpg, .png" required>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer text-right">
                                <a href="<?= base_url('Kendaraan'); ?>" class="btn btn-danger">Kembali</a>
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
        $('.itemJenis_ranmor').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url(); ?>/Kendaraan/getJenisranmor",
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
                            text: item.nama_jenis_ranmor
                        });
                    });
                    return {
                        results: results
                    }
                }
            }
        });

        $('.itemUnit_pengguna').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url(); ?>/Kendaraan/getUnitpengguna",
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
                            text: item.unit_pengguna
                        });
                    });
                    return {
                        results: results
                    }
                }
            }
        });
        $('.itemKondisi_ranmor').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url(); ?>/Kendaraan/getKondisi",
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
        $('.itemJenis_bbm').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url(); ?>/Kendaraan/getJenisbbm",
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
                            text: item.nama_jenis_bbm
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