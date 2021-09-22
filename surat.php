	<?php    
	$tgl= date('d F Y');
	$kota = "Kota Tasikmalaya";
	$barang= array('Buku','Pensil','Meja');
	$instansi= array(
				'nama'=>"LP3I",
				'kota'=>"Tasikmalaya",
				'notlp'=>"022-123-456");
	$ttd = "Adinda Nur Aulia Rizki"
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Belajar Membuat Surat</title>
</head>
<body>

	<h3><center>Surat Permohonan</h3>
	<hr/>

	<?php   
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
