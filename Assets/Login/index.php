<?php
define('BASEPATH', dirname(__FILE__));
session_start();

if (isset($_SESSION['mahasiswa'])) {
   header('location: ../SyaratDanKetentuan/index.php');
}

if (isset($_POST['submit'])) {
require('../../include/connection.php');
   $nim     = $_POST['nim'];
   $thn     = date('Y');
   $dpn     = date('Y') + 1;
   $pass = $_POST['password'];
   $periode = $thn.'/'.$dpn;

   $cek = $con->prepare("SELECT * FROM t_pemilih WHERE nim = ?") or die($con->error);
   $cek->bind_param('s', $nim);
   $cek->execute();
   $cek->store_result();

   if ($cek->num_rows() > 0) {

      echo '<script type="text/javascript">alert("Anda sudah memberikan suara");</script>';
   } else {

      $sql = $con->prepare("SELECT * FROM t_user WHERE id_user = ? and pass = ? and pemilih = 'Y'") or die($con->error);;
      $sql->bind_param('ss', $nim, $pass);
      $sql->execute();
      $sql->store_result();

      if ($sql->num_rows() > 0 ) {
            $sql->bind_result($id, $user, $smt, $jk, $pemilih, $pass);
            $sql->fetch();
   
            $_SESSION['mahasiswa'] = $id;
   
            header('location:../SyaratDanKetentuan/index.php');
   
         } else {
   
            echo '<script type="text/javascript">alert("Anda tidak berhak memberikan suara");</script>';
   
         }
   
      }
   
   }

?>
<!DOCTYPE html>
<html>
      <head>
            <title>E - Voting</title>
      </head>
      <body>
            <div class="container">

            <header>
            <h1>Login to your account</h1>
        </header>
        
        <div class="hero"></div>
        
        <main>
            <div class="content">
                <form method="post">
                    <div class="formgroup formgroup-1">
                        <input type="text" id="nama" class="formcontrol formcontrol-1" name="nim" placeholder="NIM" autocomplete="off" autofocus>
                    </div>
                    <div class="formgroup formgroup-2">
                        <input type="password" id="email" class="formcontrol formcontrol-2" name="password" placeholder="Password" autocomplete="off" >
                    </div>
                    <div class="formgroup kotak">
                        <input class="box" type="checkbox">
                        <label>Ingat Username</label>
                    </div>
                    <div class="tombol">
                        <button class="button-satu" type="submit" name="submit"><a>Masuk</a></button>
                        <label class="label" for="Pesan">Login with your Account</label>
                        <button id="btn" class="button-dua"type="submit"><img src="./images/Grooj.png" alt="Grooj"><a href="">Login with Google</a></button>
                    </div>
                </form>
            </div>
        </main>      
                        <div class="col-md-12">
                        <?php
                        if (isset($_GET['page'])) {
                        switch ($_GET['page']) {
                              case 'thanks':
                              include('../Success/index.php');
                              break;

                              default:
                              include('./login.php');
                              break;
                        }
                        } else {
                        include('./login.php');
                        }
                        ?>
                        </div>      
                  
            </div>
            <script type="text/javascript" src="./assets/js/jquery-2.2.3.min.js"></script>
      </body>
</html>
