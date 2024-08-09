<?php
 /**
     * NIM : 2257401080
     * NAMA : RISKI FAUJI
     * KELAS : MI22A
     */ 
    include 'cek_session.php';
    include 'menu.php';
    include 'koneksi.php';

    $sql = "SELECT nama FROM kategori";
    $query = mysqli_query($koneksi, $sql); 
?>
<style>
     body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
     }  
    .category {
        width: 500px;
        padding: 20px;
    }
    .text-gray {
	    color: grey;
    }
    .category table{
        background-color:paleturquoise;;
        width: 100%;
    }
    .category table td{
        border: 1px solid black;
        padding: 15px;
        text-align: left;
    }
 
</style>
<body>
    <div class="category">
        <div style="display:flex; gap: 1em">        
            <div class="row align-items-center py-3 px-xl-5">    
                <h3>-- Katergori --</h3>
                
                <form action="tambah_kategori.php" method="get">
                <button type="submit" name="tambah">Tambah Kategori</button>
                <br><br>
                </form>

                <table border ="1" cellspacing="0" cellpadding="10px">
                    <?php while($row = mysqli_fetch_assoc($query)) :?>
                        <tr>  
                        <td><?php echo $row['nama']?></td>
                        <td>
                            <a href="hapus_kategori.php?id=<?php echo $row['nama']; ?>">Hapus</a>
                        </td>
                        </tr>  
                    <?php endwhile; ?> 
                </table>

            </div>
        </div>
    </div>
</body>