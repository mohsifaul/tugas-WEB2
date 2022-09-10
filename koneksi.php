<?php
    $koneksi = mysqli_connect("localhost", "root", "", "wilayah");
    if (!$koneksi) { // jika gagal
        die("Connection failed: " . mysqli_connect_error());
    }
?>