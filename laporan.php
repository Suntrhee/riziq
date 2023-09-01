<?php
require 'kudulogin.php';
?>
<html>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Capriola&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<script src="https://kit.fontawesome.com/e3e51e51f5.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.min.js"></script>
  <script>
  $(document).ready(function () {
    $('#tabel_lbayarzakat').DataTable({
    pageLength : 5,
    lengthMenu : [[5,10,20,-1],[5,10,20,"All"]],

    });
    
});

  $(document).ready(function () {
    $('#tabel_ldwarga').DataTable({
    pageLength : 5,
    lengthMenu : [[5,10,20,-1],[5,10,20,"All"]],

    });
    
});

  $(document).ready(function () {
    $('#tabel_ldmustahik').DataTable({
    pageLength : 5,
    lengthMenu : [[5,10,20,-1],[5,10,20,"All"]],

    });
    
});
</script>
    <title>Laporan</title>
        <style>
      body{
        font-family: 'Pacifico', cursive;
        background-color: white;
      }
    </style>

</head>
<body>
<nav class="navbar navbar-expand-lg shadow" data-bs-theme="light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="font-size: 2em; font-weight: bold; padding-left: 15px;">ZAKAT FITRAH</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end"  id="navbarSupportedContent">
      <ul class="nav nav-underline">
        <li class="nav-item" style="margin-right: 20px; font-size: 1.1em; color: black;">
    <a class="nav-link link-dark" href="index.php">Home</a>
  </li>
  <li class="nav-item dropdown"style="margin-right: 20px; font-size: 1.1em;">
    <a class="nav-link link-dark dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Master Data</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="muzakki.php">Muzakki</a></li>
      <li><a class="dropdown-item" href="mustahik.php">Mustahik</a></li>
    </ul>
  </li>
    <li class="nav-item" style="margin-right: 20px; font-size: 1.1em;">
    <a class="nav-link link-dark" href="bayarzakat.php">Bayar Zakat</a>
  </li>
  <li class="nav-item dropdown"style="margin-right: 20px; font-size: 1.1em;">
    <a class="nav-link link-dark dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Distribusi Zakat</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="dwarga.php">Distribusi Warga</a></li>
      <li><a class="dropdown-item" href="dmustahik.php">Distribusi Mustahik</a></li>
    </ul>
  </li>
  <li class="nav-item" style="margin-right: 20px; font-size: 1.1em;">
    <a class="nav-link link-dark" href="laporan.php">Laporan</a>
  </li>
  <li class="nav-item" style="margin-right: 20px; font-size: 1.1em;">
    <a class="nav-link link-dark" href="about.php">About</a>
  </li>
  <li class="nav-item" style="margin-right: 20px; font-size: 1.1em;">
    <button type="button" class="btn btn-outline-warning" onclick="location.href='logout.php'">Log Out</button>
  </li>
</ul>
    </div>
  </div>
</nav>
<div class="container-fluid p-2" style="background-color: #00FF00"><h3 style="font-weight: bold; padding-left: 15px;">LAPORAN BAYAR ZAKAT</h3> </div>
<div class="container-fluid p-4 shadow mb-5" style="padding-bottom: 20px; padding-top: 20px;">
  <button type="button" class="btn btn-outline-info float-end" onclick="location.href='export.php'">PRINT</button><br><br>
  <table id="tabel_lbayarzakat" class="table table-striped ">
        <thead style=" color: black; font-size: 1.1em;" >
          <tr align="center">
                                            <th>Total Beras</th>
                                            <th>Total Uang </th>
                                            <th>Total Muzakki</th>
                                            <th>Total Jiwa</th>
                                        </tr>
        </thead>
        <tbody style="color: black; font-size: 1.1em;">
         <?php 
                                        $get = mysqli_query($c,"select * from bayarzakat ");
                                        $total_bayar_beras = 0;
                                        $total_bayar_uang = 0;
                                        $total_jiwa = 0;
                                        while($p=mysqli_fetch_array($get)){
                                            $jenisbayar = $p['jenis_bayar'];
                                            $jtyd = $p['jumlah_tanggunganyangdibayar'];
                                            $bayarberas = $p['bayar_beras'];
                                            $bayaruang = $p['bayar_uang'];
                                            
                                        

                                            if ($jenisbayar == 'beras') {
                                                $total_bayar_beras += $bayarberas;
                                            }
                                            
                                            
                                            if ($jenisbayar == 'uang') {
                                                $total_bayar_uang += $bayaruang;
                                            }
                                            
                                            $total_jiwa += $jtyd;  
                                        }
                                             
                                            $total_muzakki = mysqli_num_rows($get); 
                                    ?>
                                    


                                        <tr align="center">
                                            <td><?=$total_bayar_beras ;?> Kg</td>
                                            <td>Rp <?=number_format($total_bayar_uang, 0, ',', '.');?></td>
                                            <td><?= $total_muzakki;?> Orang</td>
                                            <td><?=$total_jiwa;?> Orang</td>
                                           
                                           
                                            
                                        </tr>
                                        
                </tbody>
      </table>
</div>
<div class="container-fluid p-2" style="background-color: #3CB371"><h3 style="font-weight: bold; padding-left: 15px;">LAPORAN DISTRIBUSI WARGA</h3> </div>
<div class="container-fluid p-4 shadow mb-5" style="padding-bottom: 20px; padding-top: 20px;">
  <button type="button" class="btn btn-outline-info float-end" onclick="location.href='export_warga.php'">PRINT</button><br><br>
  <table id="tabel_ldwarga" class="table table-striped ">
        <thead style=" color: black; font-size: 1.1em;" >
          <tr align="center">
                                            <th>Kategori</th>
                                            <th>Jumlah Hak</th>
                                            <th>Jumlah KK</th>
                                            <th>Total beras</th>
                                        </tr>
        </thead>
        <tbody style="color: black; font-size: 1.1em;">
         <?php
$get = "SELECT kategori,hak_beras, COUNT(id_mustahikwarga) AS jumlah_kk, SUM(hak_beras) AS total_beras FROM mustahik_warga WHERE kategori IN ('fakir', 'miskin', 'mampu') GROUP BY kategori";
if ($result = $c->query($get)) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['kategori'] . "</td>";
        echo "<td>" . getHakBeras($row['kategori']) . "</td>";
        echo "<td>" . $row['jumlah_kk'] . "</td>";
        echo "<td>" . $row['total_beras'] . " Kg"."</td>";
        echo "</tr>";
    }
}

// Fungsi untuk mendapatkan hak beras berdasarkan kategori mustahik
function getHakBeras($kategori)
{
    if ($kategori == 'fakir' || $kategori == 'miskin') {
        return 2;
    } else if ($kategori == 'mampu') {
        return 1;
    } else {
        return 0;
    }
}
?>
                                        
                </tbody>
      </table>
</div>

<div class="container-fluid p-2" style="background-color: #00FA9A"><h3 style="font-weight: bold; padding-left: 15px;">LAPORAN DISTRIBUSI MUSTAHIK</h3> </div>
<div class="container-fluid p-4 shadow mb-5" style="padding-bottom: 20px; padding-top: 20px;">
  <button type="button" class="btn btn-outline-info float-end" onclick="location.href='export_mustahik.php'">PRINT</button><br><br>
  <table id="tabel_ldmustahik" class="table table-striped ">        
    <thead style=" color: black; font-size: 1.1em;" >
          <tr align="center">
                                            <th>Kategori</th>
                                            <th>Hak</th>
                                            <th>Jumlah KK</th>
                                            <th>Total Beras</th>
                                        </tr>
        </thead>
        <tbody style="color: black; font-size: 1.1em;">
          <?php
         $query = "SELECT kategori, hak, COUNT(nama) AS jumlah_kk, SUM(penerimaan) AS total_beras FROM mustahik_lainnya GROUP BY kategori";
$result = $c->query($query);

// Mengecek apakah terdapat data yang dihasilkan dari query
if ($result->num_rows > 0) {
    // Membuat tabel HTML


    // Mengambil data dari setiap baris hasil query
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['kategori'] . "</td>";
        echo "<td>" . $row['hak'] . "</td>";
        echo "<td>" . $row['jumlah_kk'] . "</td>";
        echo "<td>" . $row['total_beras'] . " Kg"."</td>";
        echo "</tr>";
    }

} else {
    echo "Tidak ada data yang ditemukan.";
}
         ?>                           

                                        
                </tbody>
      </table>
</div>


<footer class="bg-light text-center text-white">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #3b5998;"
        href="https://www.facebook.com/Alhikmahponpesmugarsari?mibextid=ZbWKwL"
        role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #55acee;"
        href="https://pondokpesantrenalhikmah.id/"
        role="button"
        ><i class="fa-sharp fa-solid fa-globe"></i
      ></a>

      <!-- Instagram -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #ac2bac;"
        href="https://www.instagram.com/_dikrii/"
        role="button"
        ><i class="fab fa-instagram"></i
      ></a>
      <!-- Github -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #DC143C;"
        href="https://www.youtube.com/@ponpesal-hikmahmugarsari3878"
        role="button"
        ><i class="fab fa-youtube"></i
      ></a>
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-1">
    <a class="text-black" href="https://mdbootstrap.com/">© 2023 Copyright: Riziq Hifdhika M</a>
  </div>
  <!-- Copyright -->
</footer>
</body>
</html>