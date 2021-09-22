	<?php    
	$biodata = array(
	'nama' => "Nama : Adinda Nur Aulia Rizki",
	'kelas' => "Kelas : MI20B",
	'alamat' => "Alamat : Tasikmalaya",
	'nohp' => "No Hp : 083121405709"
	);
	$matakuliah = array('Web Programming', 'English for Special Purpose','Java Programming','Network Operating System','Sistem Desain Analisis','Enterprise Resource Planning','Database Client Server','Mobile Programming');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Belajar Array PHP</title>
</head>
<body>

	<h1><center>My Biodata</h1>
	<hr/>

	<?php   
	echo $biodata['nama'];
	echo "<br>";
	echo $biodata['kelas'];
	echo "<br>";
	echo $biodata["alamat"];
	echo "<br>";
	echo $biodata["nohp"];
	echo "<br>";
	echo"<br>";
	echo "Saya mengambil mata kuliah sebagai berikut:<br>";
	$n = 1;
	for($x=0;$x<count($matakuliah);$x++){
	echo$n." " .$matakuliah[$x]."<br/>";  
	$n++;     
 }
?>
</body> 
</html>
