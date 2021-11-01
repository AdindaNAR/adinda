<?php
error_reporting(0);
//Buat Koneksinya
$con = new mysqli("localhost","root","","db_utsadinda");

$tgl = date('d F Y');

$sql = "SELECT * FROM tbl_pegawai ";
$result = $con->query($sql);
$query = mysqli_query($con, 'SELECT * FROM tbl_pegawai');
  $isi = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>
  <head>
    <title>View Data Pegawai</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="main mt-4">
        <div class="container">
            <?php
            $pesan = $_GET['pesan'];
            $frm = $_GET['frm'];
            /*echo $pesan;*/
            if ($pesan=='success' &&  $frm == 'add') {
                 ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Berhasil!</strong>Anda berhasil menambahkan data.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php 
                } else if ($pesan=='success' &&  $frm == 'dell') {
                 ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>Berhasil!</strong>Anda berhasil menghapus data.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php 
                } else if ($pesan=='success' &&  $frm == 'edit') {
                 ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
             <strong>Berhasil!</strong>Anda berhasil merubah data.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php 
                }//ALERT SETTING AKHIR
                    ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-white text-uppercase">
                            <div class="h3 text-center">Data Pegawai</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <a class="btn btn-primary" href="add.php?id=<?php echo $isi['id'];?>">Add Data</a>
                                <table class="table table-striped w-100">
                                    <thead>
                                            <th>NIP</th>
                                            <th>Nama Lengkap</th>
                                            <th>Posisi</th>
                                            <th>Gaji</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            <th colspan="2"><center>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($query as $isi) { ?>
                                            <?php
                                            $gaji = 0;
                                            if ($isi['posisi_pegawai'] == 'Staff') {
                                                $gaji = 2000;
                                            } else if ($isi['posisi_pegawai'] == 'Manajer') {
                                                $gaji = 10000;
                                            } else if ($isi['posisi_pegawai'] == 'Supervisor') {
                                                $gaji = 4000;

                                            } else {
                                                $js = 'Kode Bermasalah';
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $isi['kd_pegawai'] ?></td>
                                                <td><?php echo $isi['nama_pegawai'] ?></td>
                                                <td><?php echo $isi['posisi_pegawai'] ?></td>
                                                <td><?php echo $gaji ?></td>
                                                <td><?php echo $isi['alamat_pegawai'] ?></td>
                                                <td><?php echo $isi['no_telp'] ?></td>
                                                <td><a class="btn btn-warning" href="edit.php?id=<?php echo $isi['id'];?>">Edit</a></td>
                                                <td><button class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#deletedata<?php echo $isi['id'];?>">Delete
                                                </button></td>
                                            </tr>
                                            <!-- modal delete -->
                                            <div class="example-modal">
                                                <div id="deletedata<?php echo $isi['id'];?>" class="modal fade" role="dialog" style="display: none;">
                                                    <div class = "modal-dialog">
                                                    <div class="modal-content">
                                                        <form class="row g-3" action="delete.php" method="POST" action="edit.php">
                                                    <div class="modal-header">
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                                    <h3 class="modal-tittle">Konfirmasi Delete Data Pegawai</h3>
                                                </div>
                                                     <div class="modal-body">
                                                        <input type="hidden" name="id" value="<?php echo $isi['id']?>">
                                                        <h4 align="center">Apakah anda yakin ingin menghapus data? <? echo $isi['no_surat'];?><strong><span class="grt"></span></strong>?></h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button id="nodelete" type="button" class="btn btn-primary pull-left" data-bs-dismiss="modal">Cancle</button>
                                                     <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                 </div>
                                            </div>
                                         </div>
                                         <!-- modal delete -->
                                    </div>
                                    <?php }?>
                                </tbody>
                            </table>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
</body>
  

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>

