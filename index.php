<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'ambildata.php';?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/css/bootstrap.min.css">
    <title>Tugas - Combo Box Dinamis</title>
    <style>
        label{
            font-weight : bold;
        }
    </style>
    <!-- Bagian javascript -->
    <script src="./jquery-3.6.1.min.js"></script>
    <script type="text/javascript">
        // script provinsi --> kabupaten
        $(document).ready(function() {
            $('#provinsi').change(function() {
                var tampung = $(this).val();
                $.ajax({
                    url:'ambildata.php',
                    method: 'GET',
                    data:{
                        action:'getKab',
                        idProv:tampung
                    },
                    success:function (data) {
                        $('#kab').html(data);
                        $('#kab').change();
                    }
                });
            });
            // script kabupaten --> kecamatan
            $('#kab').change(function() {
                var tampung = $(this).val();
                $.ajax({
                    url:'ambildata.php',
                    method: 'GET',
                    data:{
                        action:'getKec',
                        idKab:tampung
                    },
                    success:function (data) {
                        $('#kec').html(data);
                        $('#kec').change();
                    }
                });
            });
            // script kecamatan --> desa
            $('#kec').change(function() {
                var tampung = $(this).val();
                $.ajax({
                    url:'ambildata.php',
                    method: 'GET',
                    data:{
                        action:'getDesa',
                        idDesa:tampung
                    },
                    success:function (data) {
                        $('#desa').html(data);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <h2 align="center" class="mt-2">Combo-Box Dinamis Wilayah Indonesia</h2>
        <hr>
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 d-flex flex-column mx-auto">
              <div class="card mt-2">
                <div class="card-body">
                  <form>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Provinsi</label>
                        <div class="col-sm-9">
                            <select id="provinsi" name="provinsi" class="form-select form-control">
                                <option value="">-- Pilih Provinsi --</option>
                                <?php 
                                    echo load_provinsi(); 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Kabupaten / Kota</label>
                        <div class="col-sm-9">
                            <select id="kab" name="kab" class="form-select form-control">
                            <option value="">-- Pilih Kabupaten / Kota --</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Kecamatan</label>
                        <div class="col-sm-9">
                            <select id="kec" name="kec" class="form-select form-control">
                            <option value="">-- Pilih Kecamatan --</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Kelurahan / Desa</label>
                        <div class="col-sm-9">
                            <select id="desa" name="desa" class="form-select form-control">
                            <option value="">-- Pilih Kelurahan / Desa --</option>
                            </select>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>   
    </div>
    
</body>
</html>