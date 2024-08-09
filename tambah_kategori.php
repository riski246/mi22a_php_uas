<?php
    /**
     * NIM : 2257401080
     * NAMA : RISKI FAUJI
     * KELAS MI22A
     */ 
    include 'cek_session.php';
    include 'menu.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    <style>
     body{
        height: 100vh;
        background-image: url(img/awan2.jpg);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
       
    }      
    .container{
        position: absolute;
        left: 30%;
        top: 25%;
        transform: translate(-50%,-50%);
        padding: 20px 25px;
        width: 300px;
        background-color: rgba(0,0,0,.7);
        box-shadow: 0 0 10px rgba(255,255,255,.3);
    }
    .container form h2{
        text-align: left;
        color: white;
        margin-bottom: 30px;
        border-bottom: 4px solid paleturquoise;;
    }
    .container label{
        text-align: left;
        color: white;
    }
    .container form input{
        width: calc(100% - 20px);
        padding: 8px 10px;
        margin-bottom: 15px;
        border: none;
        background-color: transparent;
        border-bottom: 2px solid paleturquoise;;
        color: #fff;
        font-size: 20px;
    }
    .container form button{
        width: 100%;
        padding: 5px 0;
        border: none;
        background-color:paleturquoise;;
        font-size: 18px;
        color: black;
    }   
    .container form a{
        text-align: left;
        color: darkblue;
    }

    </style>

</head>
    <body>
    <div class="container border">
        <div class="row align-items-center py-3 px-xl-5">
            <div>
                <form action="" method="post">
                    <h2>Tambah Kategori</h2>

                    <label for="name">Nama Kategori</label><br>
                    <input type="text" name="name" id="name">
                    <br><br>
                    
                    <button type="submit" name="save">Save</button> 
                    <br><br>
                    <button type="submit" name="save">Back</button>
                </form>

                <?php 
                    if (isset($_POST['save'])) {
                        include 'koneksi.php';

                        $nama = $_POST['name'];

                        $sql = "INSERT INTO kategori (kategori_brg)VALUES ('$nama');";
                        $result = mysqli_query($koneksi, $sql);

                        if ($result) {
                            $_SESSION['success'] = "Barang Berhasil ditambah";
                            header('location: kategori.php');
                    
                        } else {
                            echo "<span style='color:red'>"."FILED";
                        }
                    }
                ?>
            </div>
        </div>     
    </div>
    </body>
</html>	
