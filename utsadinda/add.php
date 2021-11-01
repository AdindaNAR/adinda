<?php
error_reporting(0);
//Buat Koneksinya
$con = mysqli_connect("localhost","root","","db_utsadinda");

$tgl = date('d F Y');

	/*$isi = $result->fetch_assoc();*/
$query = mysqli_query($con, 'SELECT * FROM tbl_posisi_pegawai');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Add Data Pegawai</title>
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
        <row>
            <div class="card">
            <h2 align="center">Tambah Data Pegawai</h2>
            <div class="card-body">
                <form class="row g-3" method="POST" action="">
  <div class="col-md-6">
    <label for="inputid" class="form-label">NIP</label>
    <input type="text" class="form-control" id="inputid" name="kdPegawai" placeholder="PGW-00-0-000">
  </div>
  <div class="col-md-6">
    <label for="inputPosisi" class="form-label">Posisi Pegawai</label>
    <select id="inputPosisi" class="form-select" name="posisiPegawai">
      <option selected value="" disabled="">Silahkan Pilih...</option>
      <?php foreach ($query as $gaji){ ?>
      <option value="<?= $gaji['posisi_pegawai'] ?>"><?= $gaji['posisi_pegawai'] ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="col-6">
    <label for="inputNama" class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control" id="inputNama" name="namaPegawai">
  </div>

  <div class="col-6">
    <label for="inputAlamat" class="form-label">Alamat</label>
    <input type="text" class="form-control" id="inputAlamat" name="alamatPegawai">
  </div>
  <div class="col-md-6">
    <label for="inputTelepon" class="form-label">No Telp</label>
    <input type="text" class="form-control" id="inputTelepon" name="noTelp">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="submit">Add</button>
    <button type="Cancel" class="btn btn-danger">Cancel</button>
  </div>
</form>
  </div>  
  </div>
  </row>
  <?php
  	if (isset($_POST['submit'])) {
  		$kd_pegawai = $_POST['kdPegawai'];
      $nama_pegawai = $_POST['namaPegawai'];//name/id kolom
  		$posisi_pegawai = $_POST['posisiPegawai'];
  		$alamat_pegawai = $_POST['alamatPegawai'];
  		$no_telp = $_POST['noTelp'];
  		
  		$result = mysqli_query($con, "INSERT INTO `tbl_pegawai`
  			(`id`,`kd_pegawai`,`nama_pegawai`,`posisi_pegawai`,`alamat_pegawai`,`no_telp`) VALUES (NULL,'$kd_pegawai','$nama_pegawai','$posisi_pegawai','$alamat_pegawai','$no_telp')");

  		//show message when user added
  		header("Location:view.php?pesan=success&frm=add");
  	}
  ?>
</body>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>
