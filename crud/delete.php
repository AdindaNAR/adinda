<?php
$con = new mysqli("localhost","root","","db_suratadinda");
                            if (isset($_POST['delete'])) {
                                $id = $_POST['id'];
        
        $result = mysqli_query($con, "DELETE FROM `tbl_surat` WHERE `id` = '$id'");

        //show message when user added
        //echo "Surat updated successfully.<a href='view.php'>List Surat</a>";
      header("Location:view.php");
    }?>