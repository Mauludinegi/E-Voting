<?php
define("BASEPATH", dirname(__FILE__));
session_start();
if(!isset($_SESSION['mahasiswa'])) {
   header('location:../Login/index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote</title>
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
    <div class="container">
    <?php
         require('../../include/connection.php');

         $thn     = date('Y');
         $dpn     = date('Y') + 1;
         $periode = $thn.'/'.$dpn;

         $sql = $con->prepare("SELECT * FROM t_kandidat WHERE periode = ?") or die($con->error);
         $sql->bind_param('s', $periode);
         $sql->execute();
         $sql->store_result();
         if ($sql->num_rows() > 0) {
            $numb = $sql->num_rows();

    echo  '<header>
            <h1>PEMILIHAN KETUA & WAKIL KETUA Periode'.$periode.'</h1>
        </header>';
        for($i = 1; $i <= $numb; $i++) {
            $sql->bind_result($id, $nama, $foto, $visi, $misi, $suara, $periode);
            $sql->fetch();
   ?>
        <main>
            


            <div class="voting voting-1">
                <div class="kotak kotak-1">
                    <img class="daru-1" src="../img/kandidat/<?=$foto; ?>" alt="Daru-1">
                    <div class="hero"></div>
                    <span>
                        <P><?=$nama?></P>
                    </span>
                </div>
                <div class="rectangel">
                    <div class="ellipse ellipse-1">
                        <a href="./submit.php?id=<?php echo $id; ?>&s=<?php echo $suara; ?>"><?=$i?></a>
                    </div>
                </div>
            </div>
        </main>
            <?php
        }
    }else {
        echo '<div class="callout warning">
                     <h2>Belum Ada Calon Ketua</h2>
                     <a href="logout.php">Kembali</a>
                  </div>';
    } ?>
            
            
    </div>


</body>
</html>