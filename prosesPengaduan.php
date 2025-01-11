<?php
   require_once("koneksi.php");
   $namapelapor = $_POST['namapelapor'];
   $masalah = $_POST['masalah'];
   $isimasalah = $_POST['isi'];
   $alamat = $_POST['alamat'];
   $data = "INSERT INTO pengaduan(id, namapelapor, masalah, isi, alamat) VALUES (NULL,'$namapelapor','$masalah','$isimasalah','$alamat')";
   $simpan = $conn->query($data);
   if($simpan) {
        echo "<script type='text/javascript'>
        alert('Terimakasih Sudah Melapor');
        history.back(self);
        </script>";
       } else {
         echo "
        <script type='text/javascript'>
        alert('Tidak Dapat Melapor');
        history.back(self);
        </script>";
       }
?>