<?php
     /**
     * NIM : 2257401080
     * NAMA : RISKI FAUJI
     * KELAS : MI22A
     */ 
    session_start();
    session_destroy();
    session_unset();

    header('location:login.php');
?>