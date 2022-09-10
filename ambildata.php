<?php
// ambil data provinsi
    function load_provinsi(){
        include "./koneksi.php";
        $provinsi = "";
        $query = "SELECT * FROM provinsi ORDER BY nama_provinsi";
        $result = mysqli_query($koneksi, $query);
        while ($row = mysqli_fetch_array($result)) {
            $provinsi .= '<option value ="'.$row["id_provinsi"].'">'.$row["nama_provinsi"].'</option>';
        }
        return $provinsi;
    }

    // ambil data kabupaten
    if (isset($_GET['action']) && $_GET['action'] == 'getKab') {
        // koneksi database
        include "./koneksi.php";
        $idKab = $_GET['idProv'];
        $query = 'SELECT * FROM kabupaten WHERE id_provinsi = '.$_GET["idProv"].' ORDER BY nama_kab';
        $result = mysqli_query($koneksi, $query);
        $kabupaten = "";
        $kabupaten = '<option value="">-- Pilih Kabupaten / Kota --</option>';
        while ($row = mysqli_fetch_array($result)) {
            $kabupaten .= '<option value ="'.$row["id_kab"].'">'.$row["nama_kab"].'</option>';
        }
        echo $kabupaten;
    } elseif (isset($_GET['action']) && $_GET['action'] == 'getKec') {
        // koneksi database
        include "./koneksi.php";
        $idKab = $_GET['idKab'];
        $query = 'SELECT * FROM kecamatan WHERE id_kab = '.$_GET["idKab"].' ORDER BY nama_kec';
        $result = mysqli_query($koneksi, $query);
        $kecamatan = "";
        $kecamatan = '<option value="">-- Pilih Kecamatan --</option>';
        while ($row = mysqli_fetch_array($result)) {
            $kecamatan .= '<option value ="'.$row["id_kec"].'">'.$row["nama_kec"].'</option>';
        }
        echo $kecamatan;
    } elseif (isset($_GET['action']) && $_GET['action'] == 'getDesa') {
        // koneksi database
        include "./koneksi.php";
        $idDesa = $_GET['idDesa'];
        $query = 'SELECT * FROM desa WHERE id_kec = '.$_GET["idDesa"].' ORDER BY nama_desa';
        $result = mysqli_query($koneksi, $query);
        $desa = "";
        $desa = '<option value="">-- Pilih Kelurahan / Desa --</option>';
        while ($row = mysqli_fetch_array($result)) {
            $desa .= '<option value ="'.$row["id_desa"].'">'.$row["nama_desa"].'</option>';
        }
        echo $desa;
    }

?>