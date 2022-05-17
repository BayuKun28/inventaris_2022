<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Peminjaman Elektronik
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Peminjaman</a></li>
            <li class="active">Elektronik</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="row col-md-12">
                <div class="form-row">
                    <div class="box-header col-md-6">
                        <h3 class="box-title"><a href="<?= base_url('Peminjamanelektronik/FormInput'); ?>" class="btn btn-block btn-success">Tambah</a></h3>
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
                                    <th>Nama Barang</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pinjam as $b) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $b['nama']; ?></td>
                                        <td><?= $b['nama_unit']; ?></td>
                                        <td><?= $b['nama_barang']; ?></td>
                                        <td><?= $b['tgl_pinjam']; ?></td>
                                        <td><?= $b['keterangan']; ?></td>
                                        <td><?php
                                            if (!empty($b['tgl_kembali'])) {
                                                echo " <a class='btn btn-sm btn-success'><i class='fa fa-check-circle'></i> Dikembalikan</a>";
                                            } else {
                                                echo " <a id='kembali' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#modal-kembali' data-idkembali='" . $b['id'] . "' data-idbarang='" . $b['idbarang'] . "' ><i class='fa fa-close'></i> Dipinjam</a>";
                                            }
                                            ?></td>
                                        <td><a href="<?= base_url('Peminjamanelektronik/detail/') . $b['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-book"></i></a></td>
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

<div class="modal fade" id="modal-kembali">
    <div class="modal-dialog">
        <form action="<?= base_url('Peminjamanelektronik/kembali'); ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Input Tanggal Kembali</h4>
                </div>
                <div class="modal-body">

                    <div class="box-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="tgl_kembali">Tanggal Kembali</label>
                                    <input type="hidden" class="form-control" id="idkembali" name="idkembali">
                                    <input type="hidden" class="form-control" id="idbarang" name="idbarang">
                                    <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>
</div>

<?php $this->load->view('templates/footer'); ?>
<script>
    $(document).ready(function() {
        $('#tabledata').DataTable({
            responsive: true
        });
        $(document).on('click', '#kembali', function() {
            var idkembali = $(this).data('idkembali');
            $('#idkembali').val(idkembali);
            var idbarang = $(this).data('idbarang');
            $('#idbarang').val(idbarang);
        })
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
    } elseif ($pesan == "Berhasil Dikembalikan") {
        // die($pesan);
        $script = "
                            <script>
                                    Swal.fire({
                                      icon: 'success',
                                      title: 'Data',
                                      text: 'Berhasil Dikembalikan'
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