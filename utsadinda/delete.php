<?php
$con = new mysqli("localhost","root","","db_utsadinda");
                            if (isset($_POST['delete'])) {
                                $id = $_POST['id'];
        
        $result = mysqli_query($con, "DELETE FROM `tbl_pegawai` WHERE `id` = '$id'");

        //show message when user added
        //echo "Surat updated successfully.<a href='view.php'>List Surat</a>";
      header("Location:view.php?pesan=success&frm=dell");
    }?>