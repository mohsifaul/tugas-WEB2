<?php
    $koneksi = mysqli_connect("localhost", "root", "", "wilayah");
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>