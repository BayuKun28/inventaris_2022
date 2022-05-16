<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Unit Pengguna
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Unit Pengguna</a></li>
            <li class="active">Unit Pengguna</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="row col-md-12">
                <div class="form-row">
                    <div class="box-header col-md-6">
                        <h3 class="box-title"><a class="btn btn-block btn-success" data-toggle="modal" data-target="#modal-tambah">Tambah</a></h3>
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
                                    <th>Unit Pengguna</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($unit as $b) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $b['unit_pengguna']; ?></td>
                                        <td>
                                            <a id="edit" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit" data-idedit="<?= $b['id']; ?>" data-unit_penggunaedit="<?= $b['unit_pengguna']; ?>"><i class="fa fa-pencil"></i></a>
                                            <a href='javascript:void(0)' class="del_unitpengguna btn btn-sm btn-danger" data-kode="<?= $b['id']; ?>"><i class="fa fa-trash"></i></a>
                                        </td>
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

<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <form action="<?= base_url('Unitpengguna/tambah'); ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Jenis BBM</h4>
                </div>
                <div class="modal-body">

                    <div class="box-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="unit_pengguna">Unit Pengguna</label>
                                    <input type="text" class="form-control" id="unit_pengguna" name="unit_pengguna" required>
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
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <form action="<?= base_url('Unitpengguna/edit'); ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Unit Pengguna</h4>
                </div>
                <div class="modal-body">

                    <div class="box-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="unit_penggunaedit">Unit Pengguna</label>
                                    <input type="hidden" class="form-control" id="idedit" name="idedit">
                                    <input type=" text" class="form-control" id="unit_penggunaedit" name="unit_penggunaedit" required>
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
<!-- /.modal-dialog -->

<?php $this->load->view('templates/footer'); ?>
<script>
    $(document).ready(function() {
        $('#tabledata').DataTable({
            responsive: true
        });
        $(document).on('click', '.del_unitpengguna', function(event) {
            event.preventDefault();
            let kode = $(this).attr('data-kode');
            let delete_url = "<?= base_url(); ?>/Unitpengguna/delete/" + kode;

            Swal.fire({
                title: 'Hapus Data',
                text: "Apakah Anda Yakin Ingin Menghapus Data Ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then(async (result) => {
                if (result.value) {
                    window.location.href = delete_url;
                }
            });
        });
        $(document).on('click', '#edit', function() {
            var idedit = $(this).data('idedit');
            var unit_penggunaedit = $(this).data('unit_penggunaedit');

            $('#idedit').val(idedit);
            $('#unit_penggunaedit').val(unit_penggunaedit);
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