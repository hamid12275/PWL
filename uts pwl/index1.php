<?php
// session start
if (!empty($_SESSION)) {
} else {
    session_start();
}
require 'proses/panggil.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Dashboard | TOKO ABC</title>
    <!-- BOOTSTRAP 4-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <!-- DATATABLES BS 4-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- jQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <!-- DATATABLES BS 4-->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <!-- BOOTSTRAP 4-->
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <b>
                    <i class="fa fa-cog"></i>
                    <?= $title_project; ?>
                </b>
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ml-auto">
                    <?php if (!empty($_SESSION['ADMIN'])) { ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Dashboard</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="login.php">
                                <i class="fa fa-sign-in"></i> Login Disini
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if (!empty($_SESSION['ADMIN'])) { ?>
                    <br />
                    <span style="color:black;" ;>Selamat Datang, <?php echo $sesi['nama']; ?></span>
                    <a href="logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
                    <br /><br /><br /><br />
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Barang</h4>
                        </div>
                        <div class="card-body">
                            <a href="tambah.php" class="btn btn-success btn-md"><span class="fa fa-plus"></span> Tambah</a>
                            <table class="table table-hover table-bordered" id="mytable1" style="margin-top: 10px">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah Stok</th>
                                        <th>Gambar</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $hasil = $proses->tampil_data('barang');
                                    foreach ($hasil as $isi) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi['nama'] ?></td>
                                            <td><?php echo $isi['harga']; ?></td>
                                            <td><?php echo $isi['gambar']; ?></td>
                                            <td><?php echo $isi['jml_stok']; ?></td>
                                            <td style="text-align: center;">
                                                <a href="edit.php?id=<?php echo $isi['kode_barang']; ?>" class="btn btn-success btn-md">
                                                    <span class="fa fa-edit"></span></a>
                                                <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="proses/crud.php?aksi=hapus&hapusid=<?php echo $isi['kode_barang']; ?>" class="btn btn-danger btn-md"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php } else { ?>
                    <br />
                    <div class="alert alert-info">
                        <h3> Maaf Anda Belum Dapat Akses CRUD, Silahkan Login Terlebih Dahulu !</h3>
                        <hr />
                        <p><a href="login.php">Login Disini</a></p>
                    </div>
                <?php } ?>
            </div>
        </div>

        <!-- User -->
        <div class="row">
            <div class="col-lg-12">
                <?php if (!empty($_SESSION['ADMIN'])) { ?>
                    <br /><br /> <br /><br />
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data User</h4>
                        </div>
                        <div class="card-body">
                            <!-- <a href="tambah.php" class="btn btn-success btn-md"><span class="fa fa-plus"></span> Tambah</a> -->
                            <table class="table table-hover table-bordered" id="mytable2" style="margin-top: 10px">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $hasil1 = $proses->tampil_data('user');
                                    foreach ($hasil1 as $isi) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi['nama'] ?></td>
                                            <td><?php echo $isi['email']; ?></td>
                                            <td><?php echo $isi['telp']; ?></td>
                                            <td style="text-align: center;">
                                                <a href="edit_user.php?id=<?php echo $isi['kode_user']; ?>" class="btn btn-success btn-md">
                                                    <span class="fa fa-edit"></span></a>
                                                <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="proses/crud.php?aksi_user=hapus&hapusid=<?php echo $isi['kode_user']; ?>" class="btn btn-danger btn-md"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php } else { ?>
                    <br />
                    <div class="alert alert-info">
                        <h3> Maaf Anda Belum Dapat Akses CRUD, Silahkan Login Terlebih Dahulu !</h3>
                        <hr />
                        <p><a href="login.php">Login Disini</a></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <script>
        $('#mytable1').dataTable();
        $('#mytable2').dataTable();
    </script>
</body>

</html>