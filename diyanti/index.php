<?php

date_default_timezone_set('Asia/Jakarta');
//transit get
$tampil = $_GET['tampil'];

//biodata
$nama = "Dianti Arifudin";
$nim = '1319144013';
$date = date('Y-m-d H:i:sa');

$hash = md5($date.$nim);


if(isset($_POST['hitung'])){
    //cekk string apa bukan

    if(is_string($_POST)){
        echo "DATA YANG ANDA MASUKKAN BERJENIS STRING";
        die;
    }

    if(empty($_POST['r'])&& empty($_POST['d'])){
        echo "<script>alert('Isi Parameter Diameter atau Jari-Jari Terlebih dahulu')</script>";
    }
    if(!empty($_POST['d'])&& empty($_POST['r'])){
         
            $d = $_POST['d'];
            $r = $d/2;
            $t = $_POST['t'];
            $phi = $_POST['phi'];
           
            if($phi == '22/7'){
                //formula phi*r2*t
                $ops1 = pow($r,2)*$t;
        
                $hasil = 22 * $ops1 / 7;
            }elseif($phi == '3.14'){
                //formula
                $hasil = 3.14 * pow($r,2)*$t;
        
            }else{
                echo "<script>alert('Isi Phi Terlebih dahulu');document.location.href='index.php'</script>";
            }
        $tampil =1;

    }
    if(empty($_POST['d'])&& !empty($_POST['r'])){
          //diketahui
          $d = $_POST['r'] * 2;
          $r = $d /2;
          $t = $_POST['t'];
          $phi = $_POST['phi'];

          if($phi == '22/7'){
            //formula phi*r2*t
            $ops1 = pow($r,2)*$t;
    
            $hasil = 22 * $ops1 / 7;
        }elseif($phi == '3.14'){
            //formula
            $hasil = 3.14 * pow($r,2)*$t;
    
        }else{
            echo "<script>alert('Isi Phi Terlebih dahulu');document.location.href='index.php'</script>";
        }

        $tampil =1;

    }

    if(!empty($_POST['d'])&& !empty($_POST['r'])){
        echo "<script>alert('Nilai Diameter Dan Jari-Jari tidak boleh di isi bersamaan / Sesuaikan dengan Soal')</script>";
    }
}
?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Diyanti</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet"> 
    <style>
        h1,h2{
            font-family: 'Yusei Magic', sans-serif;
        }
        .bg{
                background-image: url(img/bgmm.jpeg);
                background-repeat: no-repeat;
                position: fixed;
                width: 100%;
                height: 100%;
                background-size: 100%;
                filter: blur(5px);
            }
        ul li{
            list-style-type: none;
        }
        .input{
            border: 5px solid blue;
            padding: 10px;
            position: absolute;
            width: 40%;
            margin-left: 30%;
            margin-top: 200px;
            
        }
        .input button{
            margin-left: 20%;
            width: 40%;
            margin-top:20px;
            
        }
        .input h2{
            color:white;
        }
        .judul h1{
            font-size: 30px;
            text-align: center;
            margin-top: 50px;
            position: absolute;
            color: white;
            margin-left: 40%;
        }
        .copy{
            position: absolute;
            margin-top:20%;
            filter: blur(1px);
        }
        .copy h1{
            color: white;
            font-size:30px;
          
            
        }
        .hasil{
            border: 5px solid blue;
            position: absolute;
            width:30%;
            background-color: white;
            margin-left: 35%;
            margin-top:140px;
            animation: tampil 1s linear;
        }
        #close1{
            margin-top: -10px;
            margin-left: 85%;
            width:40px;
            height:40px;
            border: 1px solid white;
            position: absolute;
        }
        @keyframes tampil{
            from{
                margin-top:-200px;
            }
            to{
                margin-top: 140px;

            }
        }
    </style>
  </head>
  <body>
        <div class="bg"></div>
        <div class="judul">
            <h1>Menghitung<br> Volume Tabung</h1>
        </div>

        <div class="blur" id="blur">
        <div class="input">
            <h2>Input Parameter</h2>
            <form method="post">
            <ul>
                <li>
                    <div class="form-floating mb-3">
                    <input class="form-control form-control-lg" type="number" step="any" placeholder=".form-control-lg" aria-label=".form-control-lg example" name="d" autofocus >
                        <label for="floatingInput">Diameter (D) (cm)</label>
                    </div>
                </li>
                <li>
                    <div class="form-floating mb-3">
                    <input class="form-control form-control-lg" type="number" step="any" placeholder=".form-control-lg" aria-label=".form-control-lg example" name="r">
                        <label for="floatingInput">Jari-Jari (r) (cm)</label>
                    </div>
                </li>
                <li>
                    <div class="form-floating mb-3">
                    <input class="form-control form-control-lg harga" type="number" step="any" placeholder=".form-control-lg" aria-label=".form-control-lg example" name="t" required>
                        <label for="floatingInput">Tinggi (t) (cm)</label>
                    </div>
                </li>
                <li>
                         <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="phi">
                            <option value="">Select</option>
                            <option value="22/7">22/7</option>
                            <option value="3.14">3.14</option>
                        </select>
                        <label for="floatingSelect">Phi</label>
                        </div>
                </li>
                <button type="submit" name="hitung" class="btn btn-success">HITUNG</button>
            </ul>
            </form>
        </div>
        </div>

        <div class="copy">
            <h1>
                Nama : Dianti Arifudin <br>
                NIM : 1319144013
            </h1>
        </div>
        <?php if($tampil == 1): ?>
        <div class="hasil" id="hasil">
            <a href="?tampil=0" type="button" id="close1" class="btn-close" data-bs-dismiss="toast" aria-label="Close" style="background-color:white; color:white; margin-top:5px;"></a>
            <ul>
                <li><p>Biodata : </p></li>
                <li><p> Nama : <strong><?= $nama; ?></strong></p></li>
                <li><p> Nim : <strong><?= $nim; ?></strong></p></li>
                <li><p> Tanggal Hari ini : <strong><?= $date; ?></strong></p></li>
                <li><p> md5UAS = <strong><?= $hash; ?></strong></p></li>
                <br>
                <li><p>Hasil Perhitungan : </p></li>
                <li><p>Diameter Tabung (d)= <strong><?= $d; ?> cm</strong></p></li>
                <li><p>Jari-jari Tabung (r)= <strong><?= $r;?> cm</strong></p></li>
                <li><p>Tinggi Tabung (t) = <strong><?= $t; ?> cm</strong></p></li>
                <li><p>Phi Tabung = <strong><?= $phi; ?> </strong></p></li>
                <br>
                <li><p>Volume Tabung (V) = <strong><?= $hasil;?> cm3 </strong></p></li>
            </ul>
        </div>
        <?php endif; ?>


        <script>
            var hasil = document.getElementById('hasil');
            var blur = document.getElementById('blur');
    
            if(hasil.style.display = 'block'){
                blur.style.filter = 'blur(5px)';
            }
            
        </script>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>
