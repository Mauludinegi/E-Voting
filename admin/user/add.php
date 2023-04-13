<?php
if (!isset($_SESSION['id_admin'])) {
    header('location: ../');
}

if (isset($_POST['add_user'])) {

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $smt = $_POST['semester'];
    //cek nim
    $get_id = $con->prepare("SELECT * FROM t_user WHERE id_user = ?");
    $get_id->bind_param('s', $nim);
    $get_id->execute();
    $get_id->store_result();
    $numb = $get_id->num_rows();
    //validasi
    if ($nim == '' || $nama == '' || $jk == '' || $smt == '') {

        echo '<script type="text/javascript">alert("Semua form harus terisi");</script>';

    } else if (!preg_match("/^[a-zA-z \'.]*$/", $nama)) {

        echo '<script type="text/javascript">alert("Nama hanya boleh mengandung huruf, titik(.), petik tunggal");</script>';

    } else if ($numb > 0) {

        echo '<script type="text/javascript">alert("NIM tidak dapat digunakan");window.history.go(-1);</script>';

    } else {
        $sql = $con->prepare("INSERT INTO t_user(id_user, fullname, id_semester, jk, pass) VALUES(?, ?, ?, ?, ?)");
        $sql->bind_param('sssss', $nim, $nama, $smt, $jk, $nim);
        $sql->execute();

        header('location: ?page=user');

    }

}
?>
<h3>Tambah Pemilih</h3>
<hr />
<div class="row">
    <div class="col-md-8 col-sm-12">
        <form action="" method="post" class="form-horizontal">

            <div class="form-group">
                <label class="col-sm-2 control-label">NIM</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="nim" placeholder="NIM" type="number" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Nama Mahsiswa</label>
                <div class="col-md-8">
                    <input class="form-control" name="nama" type="text" placeholder="Nama Mahasiswa" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-md-10">
                    <label class="radio-inline">
                        <input type="radio" name="jk" value="L" id="L"> Laki - laki
                    </label>

                    <label class="radio-inline">
                        <input type="radio" name="jk" value="P" id="P"> Perempuan
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Semester</label>
                <div class="col-md-6">
                    <select name="semester" required="semester" class="form-control">
                        <option value="#">-- Pilih Semester --</option>
                        <?php
                        $semester = mysqli_query($con, "SELECT * FROM t_semester");
                        while ($key = mysqli_fetch_array($semester)) {
                            ?>
                            <option value="<?php echo $key['id_semester']; ?>">
                                <?php echo $key['jml_semester']; ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" name="add_user" value="Tambah User" class="btn btn-success">Tambah
                        Pemilih</button>
                    <button type="button" onclick="window.history.back()" class="btn btn-danger">Kembali</button>
                </div>
            </div>
        </form>
    </div>
</div>