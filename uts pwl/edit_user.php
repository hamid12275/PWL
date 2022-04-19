<?php
// session start
if (!empty($_SESSION)) {
} else {
	session_start();
}
//session
if (!empty($_SESSION['ADMIN'])) {
} else {
	header('location:login.php');
}
// panggil file
require 'proses/panggil.php';

// tampilkan form edit
$idGet = strip_tags($_GET['id']);
$hasil = $proses->tampil_data_id('user', 'kode_user', $idGet);
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Edit User | TOKO ABC</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background:#586df5;">
	<div class="container">
		<br />
		<span style="color:#fff" ;>Selamat Datang, <?php echo $sesi['nama']; ?></span>
		<div class="float-right">
			<a href="index.php" class="btn btn-success btn-md" style="margin-right:1pc;"><span class="fa fa-home"></span> Kembali</a>
			<a href="logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
		</div>
		<br /><br /><br />
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-lg-6">
				<br />
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Edit User - <?php echo $hasil['nama']; ?></h4>
					</div>
					<div class="card-body">
						<!-- form berfungsi mengirimkan data input 
						dengan method post ke proses crud dengan paramater get aksi edit -->
						<form action="proses/crud.php?aksi_user=edit" method="POST">
							<div class="form-group">
								<label>Nama </label>
								<input type="text" value="<?php echo $hasil['nama']; ?>" class="form-control" name="nama">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" value="<?php echo $hasil['email']; ?>" class="form-control" name="harga">
							</div>
							<div class="form-group">
								<label>Telepon</label>
								<input type="number" value="<?php echo $hasil['telp']; ?>" class="form-control" name="telp">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="text" value="<?php echo $hasil['password']; ?>" class="form-control" name="password">
							</div>
							<button class="btn btn-primary btn-md" name="create"><i class="fa fa-edit"> </i> Edit Data</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>
</body>

</html>