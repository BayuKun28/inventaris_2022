<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Elektronik
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Barang Tetap</a></li>
            <li class="active">Elektronik</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="row col-md-12">
                <div class="form-row">
                    <div class="box-header col-md-6">
                        <?php if ($this->session->userdata('level')  == 1) { ?>
                            <h3 class="box-title"><a href="<?= base_url('Elektronik/FormInput'); ?>" class="btn btn-block btn-success">Tambah</a></h3>
                        <?php }
                        if ($this->session->userdata('level') == 2) { ?>
                        <?php }; ?>
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
                                    <th>Nama Barang</th>
                                    <th>Nomor Seri</th>
                                    <th>Jumlah</th>
                                    <th>Kondisi</th>
                                    <th>Image</th>
                                    <?php if ($this->session->userdata('level')  == 1) { ?>
                                        <th>Action</th>
                                    <?php }
                                    if ($this->session->userdata('level') == 2) { ?>
                                    <?php }; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($elektronik as $b) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $b['nama_barang']; ?></td>
                                        <td><?= $b['nomor_seri_barang']; ?></td>
                                        <td><?= $b['jumlah']; ?></td>
                                        <td><?= $b['kondisi']; ?></td>
                                        <td>
                                            <a href="<?= base_url('upload/') . $b['image']; ?>" target="_blank"><?= $b['image']; ?></a>
                                        </td>
                                        <?php if ($this->session->userdata('level')  == 1) { ?>
                                            <td>
                                                <a href="<?= base_url('Elektronik/editview/') . $b['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                                <a href='javascript:void(0)' class="del_elektronik btn btn-sm btn-danger" data-kode="<?= $b['id']; ?>"><i class="fa fa-trash"></i></a>
                                            </td>
                                        <?php }
                                        if ($this->session->userdata('level') == 2) { ?>
                                        <?php }; ?>
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

<?php $this->load->view('templates/footer'); ?>
<script>
    $(document).ready(function() {
        $('#tabledata').DataTable({
            responsive: true
        });
        $(document).on('click', '.del_elektronik', function(event) {
            event.preventDefault();
            let kode = $(this).attr('data-kode');
            let delete_url = "<?= base_url(); ?>/Elektronik/delete/" + kode;

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