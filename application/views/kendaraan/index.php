<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kendaraan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Barang Tetap</a></li>
            <li class="active">Kendaraan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="row col-md-12">
                <div class="form-row">
                    <div class="box-header col-md-6">
                        <?php if ($this->session->userdata('level')  == 1) { ?>
                            <h3 class="box-title"><a href="<?= base_url('Kendaraan/FormInput'); ?>" class="btn btn-block btn-success">Tambah</a></h3>
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
                                    <th>No Pol</th>
                                    <th>Jenis Ranmor</th>
                                    <th>Merk</th>
                                    <th>Tipe Ranmor</th>
                                    <th>Unit Pengguna</th>
                                    <?php if ($this->session->userdata('level')  == 1) { ?>
                                        <th>Action</th>
                                    <?php }
                                    if ($this->session->userdata('level') == 2) { ?>
                                    <?php }; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kendaraan as $b) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td> <a href="<?= base_url('Kendaraan/detail/') . $b['id']; ?>"> <?= $b['no_pol']; ?></a></td>
                                        <td><?= $b['jenis_ranmor']; ?></td>
                                        <td><?= $b['merk']; ?></td>
                                        <td><?= $b['tipe_ranmor']; ?></td>
                                        <td><?= $b['unit_pengguna']; ?></td>
                                        <?php if ($this->session->userdata('level')  == 1) { ?>
                                            <td>
                                                <a href="<?= base_url('Kendaraan/editview/') . $b['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                                <a href='javascript:void(0)' class="del_kendaraan btn btn-sm btn-danger" data-kode="<?= $b['id']; ?>"><i class="fa fa-trash"></i></a>
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


<div class="modal fade" id="modalpilih">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih jenis</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="jenis">Jenis Input</label>
                            <select id="jenis" name="jenis" class="form-control" required>
                                <option value="" disabled selected hidden>...</option>
                                <?php foreach ($jenis as $j) :  ?>
                                    <option value="<?= $j['url']; ?>"><?= $j['nama_jenis']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>
<script>
    $(document).ready(function() {
        $('#tabledata').DataTable({
            responsive: true
        });
        $(document).on('click', '.del_kendaraan', function(event) {
            event.preventDefault();
            let kode = $(this).attr('data-kode');
            let delete_url = "<?= base_url(); ?>/Kendaraan/delete/" + kode;

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
        $(function() {
            $('.itemJenis').select2({
                width: '100%',
                ajax: {
                    url: "<?= base_url(); ?>/Barangtetap/getJenis",
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
                                text: item.nama_jenis
                            });
                        });
                        return {
                            results: results
                        }
                    }
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