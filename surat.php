	<?php   
	$con = new mysqli("localhost","root","","db_suratadinda");
	$tgl = date('d F Y');
	$kota = "Kota Tasikmalaya";
	$barang= array('Buku','Pensil','Meja');
	$instansi= array(
				'nama'=>"LP3I",
				'kota'=>"Tasikmalaya",
				'notlp'=>"022-123-456");
	$ttd = "Adinda Nur Aulia Rizki";
	
if ($con) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Belajar Membuat Surat</title>
</head>
<body>
<?php
	$sql = "SELECT * FROM tbl_surat WHERE id = '2'";
	//$query = mysqli_query($con, 'SELECT * FROM tbl_surat');
	//$result = $con->query($sql);

	$isi = $result->fetch_assoc();

	echo $isi["jenis_surat"];

		if($isi["jenis_surat"]="1"){
			$js = "Surat Keputusan";
		}
		elseif($isi["jenis_surat"]="2"){
			$js = "Surat Pernyataan";
		}
		elseif($isi["jenis_surat"]="3"){
			$js = "Surat Peminjaman";
		}
		else($isi["jenis_surat"]="4"){
			$js = "Kode Salah"
		}



	echo "<h3><center>" . $js . "</h3>";
	echo "hr/";
	echo "<br>";
	echo "Nomor : 125 ";
	echo "<br>";
	echo "Perihal : Permohonan Peminjaman Barang";
	echo "<br>";
	echo "Kepada :";
	echo "<br>";
	echo "<br>";
	echo $instansi['nama'];
	echo "<br>";
	echo $instansi['kota'];
	echo ",";
	echo $instansi['notlp'];
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "Dengan Hormat,";
	echo"<br>";
	echo "Dalam rangka pelaksanaan kegiatan perlombaan antar prodi, di lingkungan kampus LP3I Tasikmalaya, Kami bermaksud meminjam beberapa barang, diantaranya sebagai berikut :";
	echo "<br>";
	$n = 1;
	for($x=0;$x<count($barang);$x++){
	echo$n." " .$barang[$x]."<br/>";  
	$n++;     
 }
 	echo "Atas Perhatiannya saya ucapkan Terima kasih:";
 	echo "<br>";
 	echo "<br>";
 	echo "<br>";
 	echo $tgl;
 	echo "<br>";
 	echo "<br>";
 	echo "<br>";
 	echo "<br>";
 	echo $ttd;
 ?>
</body> 
</html>
<?php

}else{
	die("Yahh! Koneksi database pertama gagal : " . mysqli_connect_error());
}
?>

