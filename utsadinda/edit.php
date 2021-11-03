<?php
error_reporting(0);
//Buat Koneksinya
$con = new mysqli("localhost","root","","db_utsadinda");

$tgl = date('d F Y');
$id = $_GET['id']; //mengambil parameter yang ada di URL
$query = mysqli_query($con, "SELECT * FROM tbl_pegawai where id='$id'");
$isi = $query->fetch_assoc();

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Edit Data Pegawai</title>
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
        <row>
            <div class="card">
            <h2 align="center">Edit Data Pegawai</h2>
            <div class="card-body">
                <form class="row g-3" method="POST" action="edit.php">
                 <div class="col-md-12">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $isi['id']?>">
                    </div>
  <div class="col-md-6">
    <label for="inputid" class="form-label">NIP</label>
    <input type="text" class="form-control"  name="kdPegawai" value="<?php echo $isi['kd_pegawai'] ?>" placeholder="PGW-01-1-2021">
  </div>
  <div class="col-md-6">
    <label for="inputPosisi" class="form-label">Posisi Pegawai</label>
    <select id="posisiPegawai" class="form-select" name="posisiPegawai">
      <option selected value="<?php echo $gaji['posisi_pegawai'] ?>"><?php echo $gaji ?></option>
      <option value="Staff">Staff</option>
      <option value="Supervisor">Supervisor</option>
      <option value="Manajer">Manajer</option>
    </select>
  </div>
  <div class="col-6">
    <label for="inputNama" class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control"  name="namaPegawai" value="<?= $isi['nama_pegawai'] ?>">
  </div>
  <div class="col-md-6">
    <label for="inputAlamat" class="form-label">Alamat</label>
    <input type="text" class="form-control"  name="alamatPegawai" value="<?= $isi['alamat_pegawai'] ?>">
  </div>
  <div class="col-6">
    <label for="inputTelepon" class="form-label">Nomor Telepon</label>
    <input type="text" class="form-control" name="noTelp" value="<?= $isi['no_telp'] ?>">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="update">Update</button>
    <button type="Cancel" class="btn btn-danger">Cancel</button>
  </div>
</form>
  </div>  
  </div>
  </row>
  <?php
  	if (isset($_POST['update'])) {
      $id = $_POST['id'];
  		$kd_pegawai = $_POST['kdPegawai'];//name/id kolom
  		$nama_pegawai = $_POST['namaPegawai'];
  		$posisi_pegawai = $_POST['posisiPegawai'];
  		$alamat_pegawai = $_POST['alamatPegawai'];
  		$no_telp = $_POST['noTelp'];
  		
  		$result = mysqli_query($con, "UPDATE `tbl_pegawai` SET
  			 `kd_pegawai` = '$kd_pegawai',`nama_pegawai` = '$nama_pegawai',`posisi_pegawai` = '$posisi_pegawai',`alamat_pegawai` = '$alamat_pegawai',`no_telp` = '$no_telp' WHERE `id` = '$id'");

  		//show message when user added
  		//echo "Surat updated successfully.<a href='view.php'>List Surat</a>";
      header("Location:view.php?pesan=success&frm=edit");
  	}
  ?>
</body>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>
