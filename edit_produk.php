<?php
    /**
     * NIM : 2257401080
     * NAMA : RISKI FAUJI
     * KELAS : MI22A
     */
    
    include 'cek_session.php';
    include 'menu.php';
    include 'koneksi.php';

    $id         = "";
    $nama       = "";
    $kategori   = "";
    $deskripsi  = "";
    $sukses     = "";
    $error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql       = "select * from produk where id_produk = '$id'";
    $q1         = mysqli_query($koneksi, $sql);
    $r1         = mysqli_fetch_array($q1);
    $id        = $r1['id_produk'];
    $nama       = $r1['nama_produk'];
    $kategori   = $r1['kategori_produk'];
    $deskripsi  = $r1['deskripsi'];

    if ($id == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) {
    $nama        = $_POST['nama'];
    $kategori    = $_POST['kategori'];
    $deskripsi   = $_POST['deskripsi'];
    $gambar      = $_POST['gambar'];


    if ($nama && $kategori && $deskripsi) {
        if ($op == 'edit') { //untuk update
            $sql       = "update produk set id_produk = '$id', nama_produk='$nama', kategori_produk = '$kategori', deskripsi='$deskripsi', where id_produk = '$id'";
            $q1         = mysqli_query($koneksi, $sql);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else {
            $error = "Silakan masukkan semua data";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
         body{
        height: 100vh;
        background: black;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        } 
        .mx-auto {
           
            position: absolute;
        left: 45%;
        top: 30%;
        transform: translate(-50%,-50%);
        padding: 20px 25px;
        width: 800px;
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=editcb.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=editcb.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="kode" class="col-sm-2 col-form-label">Kode Produk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $id ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Produk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kategori" class="col-sm-2 col-form-label">Kategori Produk</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="kategori" id="kategori">
                                <option value="">- Pilih Kategori -</option>
                                <option value="aksesoris" <?php if ($kategori == "aksesoris") echo "selected" ?>>aksesoris</option>
                                <option value="jaket" <?php if ($kategori == "jaket") echo "selected" ?>>jaket</option>
                                <option value="ATK" <?php if ($kategori == "ATK") echo "selected" ?>>ATK</option>
                                <option value="oli" <?php if ($kategori == "oli") echo "selected" ?>>oli</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $deskripsi ?>">
                        </div>
                    </div>
                        <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                        <a href="produk.php">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
        </div>
</body>

</html>