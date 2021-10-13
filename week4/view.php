<?php
error_reporting(0);
//Buat Koneksinya
$con = new mysqli("localhost","root","","db_suratadinda");

$tgl = date('d F Y');

$sql = "SELECT * FROM tbl_surat ";
$result = $con->query($sql);
  /*$isi = $result->fetch_assoc();*/

?>
<!DOCTYPE html>
<html>
  <head>
    <title>View Surat</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
    <row>
      <div class="container-fluid"></div>
      <h1>List Surat</h1>
    </row>
    <table class="table">
      <thead class="table-primary">
        <td>No Surat</td>
        <td>Jenis Surat</td>
        <td>Tanggal Surat</td>
        <td>TTD Surat</td>
        <td>TTD Mengetahui</td>
        <td>TTD Menyetujui</td>
      </thead>
    <?php
      foreach ($qur as $isi) {
        if ($isi["jenis_surat"]=='1') {
          $js = "Surat Keputusan"
        }
        elseif ($isi["jenis_surat"]=='2') {
          $js = "Surat Pernyataan"
        }
        elseif ($isi["jenis_surat"]=='3') {
          $js = "Surat Peminjaman"
        }
        else {
          $js = "Kode Bermasalah"
        }
        ?>
      <tr>
      <td><?= $val['no_surat'] ?></td>
      <td><?= $js ?></td>
      <td><?= $val['tgl_surat'] ?></td>
      <td><?= $val['ttd_surat'] ?></td>
      </tr>
      }



    ?>
  </body>
  

    <script src="assets/js/bootstrap.min.js"</script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>

