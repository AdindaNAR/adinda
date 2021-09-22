<!DOCTYPE html>
<html>
<head>
	<title>Belajar Array PHP</title>
</head>
<body>
<<<<<<< Updated upstream
	<?php 
		 
		$biodata['nama'] = "Adinda Nur Aulia Rizki";
		$biodata['kelas'] = "MI20B";
		$biodata['alamat'] = "Tasikmalaya";
		$biodata['asal'] = "LP3I";
		 
=======
	<h1>My Biodata</h1>

	<?php    
	$biodata = array(
	'nama' => "Nama : Adinda Nur Aulia Rizki",
	'kelas' => "Kelas : MI20B",
	'alamat' => "Alamat : Tasikmalaya",
	'nohp' => "No Hp : 083121405709"
	);
	$matakuliah = array('Web Programming', 'English for Special Purpose','Java Programming','Network Operating System');
 
>>>>>>> Stashed changes

	echo $biodata['nama'];
	echo "<br>";
	echo $biodata['kelas'];
	echo "<br>";
	echo $biodata["alamat"];
	echo "<br>";
	echo $biodata["nohp"];
	echo "<br>";
	print_r($matakuliah);
                     
 
?>
</body> 
</html>
