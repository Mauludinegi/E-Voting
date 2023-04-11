<?php
if (!isset($_POST['update'])) {

   header('location: ../');

} else {
   define('BASEPATH', dirname(__FILE__));

   include('../../include/connection.php');

   $nim  = $_POST['nim'];
   $nama = $_POST['fullname'];
   $jk   = $_POST['jk'];
   $smt  = $_POST['semester'];
   $pil  = $_POST['pemilih'];

   if($nim == '' || $nama == '' || $jk == '' || $smt == '') {

      echo '<script type="text/javascript">alert("Semua form harus terisi");window.history.go(-1);</script>';

   } else if(!preg_match("/^[a-zA-z \'.]*$/",$nama)) {

      echo '<script type="text/javascript">alert("Nama hanya boleh mengandung huruf, titik(.), petik tunggal");window.history.go(-1)</script>';

   } else {

      $sql = $con->prepare("UPDATE t_user SET fullname = ?, id_semester = ?, jk = ?, pemilih = ? WHERE id_user = ?");
      $sql->bind_param('sssss', $nama, $smt, $jk, $pil, $nim);
      $sql->execute();

      header('location:../dashboard.php?page=user');

   }

}

?>
