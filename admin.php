<?php
 /**
     * NIM : 2257401080
     * NAMA : RISKI FAUJI
     * KELAS MI22A
     */ 
    include 'cek_session.php';
    include 'menu.php';
    include 'koneksi.php';

    $data_user = mysqli_query($koneksi,"SELECT * FROM user");
    $data_produk = mysqli_query($koneksi,"SELECT * FROM produk");
    $data_kategori = mysqli_query($koneksi,"SELECT * FROM kategori");
 
// menghitung data barang
$jumlah_user = mysqli_num_rows($data_user);
$jumlah_produk = mysqli_num_rows($data_produk);
$jumlah_kategori = mysqli_num_rows($data_kategori);
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <style>
     body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    }

    .main {
        display: flex;
    }
   
    .content {
    width: 500px;
    padding: 20px;
        
    }
    .content a {
        display: block;
    padding: 10px;
    text-decoration: none;
    color: black;
    margin-bottom: 10px;
    }
    
    .header {
    margin-bottom: 20px;
    }
    .header h1 {
        margin: 0;
        font-size: 24px;
    
    }
    
        .cards {
        display: flex;
        gap: 20px;
    }

    .card {
        flex: 1;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .card h2 {
        margin: 0;
        font-size: 18px;
        font-weight: normal;
    }

    .card p {
        font-size: 24px;
        margin: 10px 0 0 0;
    }
    </style>
</head>

    <body>
    <main class="main">
		<div class="content">
            <div class="header">
             <h1>SELAMAT DATANG <?php echo $_SESSION['user']; ?></h1>
            </div>    
        
                <div class="cards">
                    <div class="card">
                        <h2>Produk</h2>
                        <p><?php echo $jumlah_produk; ?></p>
                    </div>
                    <div class="card">
                        <h2>Kategori</h2>
                        <p><?php echo $jumlah_kategori; ?></p>
                    </div>
                    <div class="card">
                        <h2>User</h2>
                        <p><?php echo $jumlah_user; ?></p>
                    </div>
                </div> 	
		</div>
	</main>
</body>

</html>



    
   
    
