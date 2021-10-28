<?php
error_reporting(0);
//Buat Koneksinya
$con = new mysqli("localhost","root","","db_suratadinda");

$tgl = date('d F Y');

$sql = "SELECT * FROM tbl_surat ";
$result = $con->query($sql);
$query = mysqli_query($con, 'SELECT * FROM tbl_surat');
  $isi = $result->fetch_assoc();

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
                            <div class="h3 text-center">Data Mahasiswa</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped w-100">
                                    <thead>
                                            <td>No Surat</td>
                                            <td>Jenis Surat</td>
                                            <td>Tgl Surat</td>
                                            <td>Ttd Surat</td>
                                            <td>Ttd Mengetahui</td>
                                            <td>Ttd Menyetujui</td>
                                            <td colspan="2"><center>Action</td>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($query as $isi) { ?>
                                            <?php
                                            if ($isi['jenis_surat'] == '1') {
                                                $js = 'Surat Keputusan';
                                            } else if ($isi['jenis_surat'] == '2') {
                                                $js = 'Surat Persyaratan';
                                            } else if ($isi['jenis_surat'] == '3') {
                                                $js = 'Surat Peminjaman';
                                            } else if ($isi['jenis_surat'] == '4') {
                                                $js = 'Surat Nikah';
                                            } else if ($isi['jenis_surat'] == '5') {
                                                $js = 'Surat Kepemelikan';

                                            } else {
                                                $js = 'Kode Bermasalah';
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $isi['no_surat'] ?></td>
                                                <td><?php echo $js ?></td>
                                                <td><?php echo $isi['tgl_surat'] ?></td>
                                                <td><?php echo $isi['ttd_surat'] ?></td>
                                                <td><?php echo $isi['ttd_mengetahui'] ?></td>
                                                <td><?php echo $isi['ttd_menyetujui'] ?></td>
                                                <td><a class="btn btn-warning" href="edit.php?id=<?php echo $isi['id'];?>">Edit</a></td>
                                                <td><button class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#deletesurat<?php echo $isi['id'];?>">Delete
                                                </button></td>
                                            </tr>
                                            <!-- modal delete -->
                                            <div class="example-modal">
                                                <div id="deletesurat<?php echo $isi['id'];?>" class="modal fade" role="dialog" style="display: none;">
                                                    <div class = "modal-dialog">
                                                    <div class="modal-content">
                                                        <form class="row g-3" action="delete.php" method="POST" action="edit.php">
                                                    <div class="modal-header">
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                                    <h3 class="modal-tittle">Konfirmasi Delete Data Surat</h3>
                                                </div>
                                                     <div class="modal-body">
                                                        <input type="hidden" name="id" value="<?php echo $isi['id']?>">
                                                        <h4 align="center">Apakah anda yakin ingin menghapus no surat<? echo $isi['no_surat'];?><strong><span class="grt"></span></strong>?></h4>
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
 <div class="text-center"> <h6>Ingin menambah surat?<a href="add.php">Klik disini!</a></h6></div>
</body>
  

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>

