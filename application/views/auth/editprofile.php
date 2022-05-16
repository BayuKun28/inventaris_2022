<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Form Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Profile</a></li>
            <li class="active">Form Profile</li>
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
                    <form action="<?= base_url('Auth/simpanprofile'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="idedit" id="idedit" value="<?= $pengguna['id']; ?>" class="form-control" required>
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?= $pengguna['username']; ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password">Passowrd</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="nama">Nama Pengguna</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $pengguna['nama']; ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="unit_pengguna">Level</label>
                                        <label>Level</label>
                                        <select name="level" id="level" class="form-control">
                                            <option selected value="<?= $pengguna['level']; ?>"><?php
                                                                                                if ($pengguna['level'] == 1) {
                                                                                                    echo "Admin";
                                                                                                } else if ($pengguna['level'] == 2) {
                                                                                                    echo "Petugas";
                                                                                                }
                                                                                                ?></option>
                                            <option value="1">Admin</option>
                                            <option value="2">Petugas</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer text-right">
                                <a href="<?= base_url('Dashboard'); ?>" class="btn btn-danger">Kembali</a>
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