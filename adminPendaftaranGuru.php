<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if(isset($_POST['NamaGuru']) && isset($_POST['UmurGuru']) && isset($_POST['TarikhLahirGuru']) && isset($_POST['NoKadPengenalan']) 
    && isset($_POST['Jantina']) && isset($_POST['NoTel']) && isset ($_POST['Agama']) && isset($_POST['Bangsa']) && isset($_POST['Alamat'])){
        include ("./includes/connect.php");
    
    $namaguru = $_POST['NamaGuru'];
    $umurguru = $_POST['UmurGuru'];
    $tarikhlahirguru = $_POST['TarikhLahirGuru'];
    $nokadpengenalan = $_POST['NoKadPengenalan'];
    $jantina = $_POST['Jantina'];
    $notel = $_POST['NoTel'];
    $agama = $_POST['Agama'];
    $bangsa = $_POST['Bangsa'];
    $alamat = $_POST['Alamat'];

    //GENERATE EMAIL
    $EMEL_GURU = "plsguru".rand(100,999)."@pelajartadika.com";
    $PASS_GURU = rand(100,999);
    $sql = "INSERT INTO guru (EMEL_GURU, KATA_LALUAN_GURU, NAMA_GURU, UMUR, TARIKH_LAHIR, KAD_PENGENALAN, JANTINA, AGAMA, BANGSA, NO_TEL, ALAMAT) 
     VALUES (:EMEL_GURU, :KATA_LALUAN_GURU, :NAMA_GURU, :UMUR, :TARIKH_LAHIR, :KAD_PENGENALAN, :JANTINA, :AGAMA, :BANGSA, :NO_TEL, :ALAMAT)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":NAMA_GURU", $namaguru);
    $stmt->bindParam(":UMUR", $umurguru);
    $stmt->bindParam(":TARIKH_LAHIR", $tarikhlahirguru);
    $stmt->bindParam(":KAD_PENGENALAN", $nokadpengenalan);
    $stmt->bindParam(":JANTINA", $jantina);
    $stmt->bindParam(":AGAMA", $agama);
    $stmt->bindParam(":EMEL_GURU", $EMEL_GURU);
    $stmt->bindParam(":KATA_LALUAN_GURU", $PASS_GURU);
    $stmt->bindParam(":BANGSA", $bangsa);
    $stmt->bindParam(":NO_TEL", $notel);
    $stmt->bindParam(":ALAMAT", $alamat);
    $stmt -> execute();

    echo ("<script>window.alert('Guru Berjaya Didaftarkan.');
    window.location.href='./adminSenaraiGuru.php'</script>");
    }
    else
    {
        echo ("<script>window.alert('Sila Isi Semua Maklumat.');</script>");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Preschool Learning System</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/popbox.css">
    <link rel="stylesheet" href="assets/css/Tamplate-SB-Admin-on-BSS.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body id="page-top">
    <div>
        <nav class="navbar navbar-dark navbar-expand bg-dark sb-topnav">
            <div class="container-fluid"><button class="btn btn-link btn-sm link-light order-md-1" id="sidebarToggle-1" type="button"></button><a class="navbar-brand" href="#"><img src="assets/img/desk.jpg" style="width: 28px;margin-right: 10px;border-width: 3px;border-style: solid;border-radius: 8px;">&nbsp;Preschool Learning System</a>
                <ul class="navbar-nav d-flex order-3 ms-auto ml-md-0">
                    <li class="nav-item d-flex d-sm-flex d-md-none justify-content-center align-items-center justify-content-sm-center" style="margin-right: 7px;">
                        <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fa fa-search" style="font-size: 25px;margin-right: 0px;"></i> </a>
                            <div class="dropdown-menu"><a class="dropdown-item" href="#">First Item</a><a class="dropdown-item" href="#">Second Item</a><a class="dropdown-item" href="#">Third Item</a></div>
                        </div>
                    </li>
                    <li class="nav-item d-flex justify-content-center align-items-center">
                        <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle active" aria-expanded="false" data-bs-toggle="dropdown" href="#">&nbsp;<img class="rounded-circle" src="assets/img/boy.jpg" style="width: 40px;border-width: 2px;border-style: solid;"></a>
                            <div class="dropdown-menu dropdown-menu-end text-start shadow" style="margin-top: 16px;"><a class="dropdown-item" href="#">Pengaturan</a><a class="dropdown-item" href="#">Log Aktivitas</a><a class="dropdown-item" href="#">Pelanggaran</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php">Keluar</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <div id="sidenavAccordion" class="sb-sidenav accordion sb-sidenav-dark">
                    <div class="sb-sidenav-menu">
                        <div class="nav"><br>
                            <ul class="nav">
                                <li class="nav-item">
                                    <div><a class="nav-link active" href="adminHomePengumuman.php">
                                            <div class="sb-nav-link-icon"><i class="fa fa-dashboard"></i></div><span>Pengumuman</span>
                                        </a></div>
                                </li>
                                <li>
                                    <div>
                                        <ul class="nav">
                                            <li class="nav-item has-submenu"><a class="nav-link collapsed" href="#" aria-expanded="false" aria-controls="collapseLayouts" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" style="color: rgb(255,255,255);">
                                                    <div class="sb-nav-link-icon"><i class="fa fa-dashboard" style="color: rgb(255,255,255);"></i></div><span>Pendaftaran</span>
                                                    <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                                </a></li>
                                        </ul>
                                        <div id="collapseLayouts" class="collapse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion" style="background: var(--bs-gray-dark);">
                                            <div class="sb-sidenav-menu-nested nav"><a class="nav-link" href="adminPendaftaranGuru.php">Pendaftaran Guru</a><a class="nav-link" href="adminPendaftaranPelajar.php">Pendaftaran Pelajar</a><a class="nav-link" href="adminPendaftaranSubjek.php">Pendaftaran Subjek</a></div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <ul class="nav">
                                            <li class="nav-item has-submenu"><a class="nav-link collapsed" href="#" aria-expanded="false" aria-controls="collapseLayouts-1" data-bs-toggle="collapse" data-bs-target="#collapseLayouts-1" style="color: rgb(255,255,255);">
                                                    <div class="sb-nav-link-icon"><i class="fa fa-dashboard" style="color: rgb(255,255,255);"></i></div><span>Senarai</span>
                                                    <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                                </a></li>
                                        </ul>
                                        <div id="collapseLayouts-1" class="collapse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion" style="background: var(--bs-gray-dark);">
                                            <div class="sb-sidenav-menu-nested nav"><a class="nav-link" href="adminSenaraiGuru.php">Senarai Guru</a><a class="nav-link" href="adminSenaraiPelajar.php">Senarai Pelajar</a><a class="nav-link" href="adminSenaraiSubjek.php">Senarai Subjek</a></div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <ul class="nav">
                                            <li class="nav-item has-submenu"><a class="nav-link collapsed" href="#" aria-expanded="false" aria-controls="collapseLayouts-2" data-bs-toggle="collapse" data-bs-target="#collapseLayouts-2" style="color: rgb(255,255,255);">
                                                    <div class="sb-nav-link-icon"><i class="fa fa-dashboard" style="color: rgb(255,255,255);"></i></div><span>Laporan</span>
                                                    <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                                </a></li>
                                        </ul>
                                        <div id="collapseLayouts-2" class="collapse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion" style="background: var(--bs-gray-dark);">
                                            <div class="sb-sidenav-menu-nested nav"><a class="nav-link" href="adminLaporanGuru.php">Laporan Guru</a><a class="nav-link" href="adminLaporanPelajar.php">Laporan Pelajar</a></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small"><span>Logged as : Admin</span></div>
                    </div>
                </div>
            </div>
            <div id="layoutSidenav_content">
                <div style="background: #1a3c63;padding: 2%;">
                    <h1 class="text-center" style="font-weight: bold;font-size: 50px;color: rgb(255,255,255);">Pendaftaran Guru</h1>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-8 offset-xxl-2">
                            <form class="border rounded shadow" method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?> " style=" padding: 10%;">
                                <div><label class="form-label">Nama Penuh:</label><input class="form-control" name = "NamaGuru" type="text"></div><br>
                                <div><label class="form-label">Umur:</label><input class="form-control" name = "UmurGuru"type="text"></div><br>
                                <div><label class="form-label">Tarikh Lahir:</label><input class="form-control" name = "TarikhLahirGuru"type="date"></div><br>
                                <div><label class="form-label">No. Kad Pengenalan:</label><input class="form-control" name = "NoKadPengenalan" type="text"></div><br>
                                <div><label class="form-label">Nombor Telefon:</label><input class="form-control" name = "NoTel" type="text"></div><br>
                                <div><label class="form-label">Jantina:</label>
                                    <div class="form-check"><input value = "Lelaki" class="form-check-input" type="radio"  name = "Jantina" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Lelaki</label></div>
                                    <div class="form-check"><input value = "Perempuan" class="form-check-input" type="radio" name = "Jantina"  id="formCheck-2"><label class="form-check-label" for="formCheck-2">Perempuan</label></div>
                                </div><br>
                                <div><label class="form-label">Agama:</label><select name = "Agama" class="form-select">
                                        <option value="undefined" selected="" disabled="true">Sila Pilih</option>
                                        <option value="Islam" name = "Agama"> Islam</option>
                                        <option value="Buddha" name = "Agama">Buddha</option>
                                        <option value="Kristian" name = "Agama">Kristian</option>
                                    </select></div><br>
                                <div><label class="form-label">Bangsa:</label><input class="form-control" name = "Bangsa" type="text"></div><br>
                                <div><label class="form-label">Alamat:</label><input class="form-control" name = "Alamat" type="text"></div><br>
                                <div><button class="btn btn-secondary float-start" type="reset">Set Semula</button><button class="btn btn-primary float-end" type="submit">Simpan</button></div>
                            </form>
                        </div>
                    </div>
                </div>
                <main></main>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>