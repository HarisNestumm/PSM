<?php
//include('session.php');
session_start();
include ("./includes/connect.php");
$idpelajar = "";
if (isset($_POST["simpan"])){
if(isset($_POST['NamaPenjaga'])&& isset($_POST['UmurPenjaga']) && isset($_POST['TarikhLahirPenjaga']) 
&& isset($_POST['NoKadPengenalan']) && isset($_POST['Jantina']) && isset($_POST['NoTel']) && isset($_POST['Alamat'])){
    
    $namapenjaga = $_POST['NamaPenjaga'];
    $umurpenjaga = (int)$_POST['UmurPenjaga'];
    $tarikhlahirpenjaga = $_POST['TarikhLahirPenjaga']; 
    $nokadpengenalan = $_POST['NoKadPengenalan'];
    $jantina = $_POST['Jantina'];
    $notel = $_POST['NoTel'];
    $alamat = $_POST['Alamat'];
   

    $sqlid = "SELECT * FROM pelajar WHERE ID_PELAJAR = ".$_SESSION["idpelajar"]."";
    $stmt = $conn->query($sqlid);
    while($row = $stmt->fetch())
        $idpelajar = $row['ID_PELAJAR'];

    $update_penjaga = "UPDATE penjaga_pelajar SET  NAMA_PENJAGA = '".$namapenjaga."', UMUR='".$umurpenjaga."',
    TARIKH_LAHIR='".$tarikhlahirpenjaga."', NO_KAD_PENGENALAN= '".$nokadpengenalan."', JANTINA='".$jantina."', NO_TEL='".$notel."', ALAMAT='".$alamat."'
    WHERE ID_PELAJAR = ".$_SESSION["idpelajar"]."";
    
    
    $updatepenjaga = $conn->prepare($update_penjaga);
    

    $updatepenjaga -> execute();
    
    echo ("<script>window.alert('Pelajar Berjaya Dikemaskini.');
    window.location.href='./adminSenaraiPelajar.php'</script>");
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
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
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
                                            <li class="nav-item has-submenu"><a class="nav-link collapse" href="#" aria-expanded="false" aria-controls="collapseLayouts" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" style="color: rgb(255,255,255);">
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
                    <h1 class="text-center" style="font-weight: bold;font-size: 50px;color: rgb(255,255,255);">Pendaftaran Pelajar</h1>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-8 offset-xxl-2">
                            <?php 
                            $penjaga = "SELECT * FROM penjaga_pelajar WHERE ID_PELAJAR = :idpelajar";
                            $stmt = $conn->prepare($penjaga);
                            $idp = $_SESSION["idpelajar"];
                            $stmt->bindParam(":idpelajar", $idp);
                            $stmt->execute();
                            ?>
                            <form class="border rounded shadow" method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>" style="padding: 10%;">
                            <?php while ($row = $stmt->fetch()){?>
                                <div><label class="form-label">Nama Penuh Penjaga:</label><input class="form-control" value = "<?php echo $row["NAMA_PENJAGA"]?>"name = "NamaPenjaga" type="text"></div><br>
                                <div><label class="form-label">Umur:</label><input class="form-control" value = "<?php echo $row["UMUR"]?>"name = "UmurPenjaga" type="text"></div><br>
                                <div><label class="form-label">Tarikh Lahir:</label><input class="form-control" value = "<?php echo $row["TARIKH_LAHIR"]?>"name = "TarikhLahirPenjaga" type="date"></div><br>
                                <div><label class="form-label">No. Kad Pengenalan:</label><input class="form-control" value = "<?php echo $row["NO_KAD_PENGENALAN"]?>" name = "NoKadPengenalan" type="text"></div><br>
                                <div><label class="form-label">Jantina:</label>
                                    <div class="form-check"><input value="<?php  echo $row['JANTINA']; ?>"value = "Lelaki" class="form-check-input" type="radio"  name = "Jantina" id="formCheck-1" <?php if(strcmp($row['JANTINA'],"Lelaki")==0){echo 'checked = "checked"';}?> ><label class="form-check-label" for="formCheck-1">Lelaki</label></div>
                                    <div class="form-check"><input value="<?php  echo $row['JANTINA']; ?>"value = "Perempuan" class="form-check-input" type="radio" name = "Jantina"  id="formCheck-2" <?php if(strcmp($row['JANTINA'],"Perempuan")==0){echo 'checked = "checked"';}?>><label class="form-check-label" for="formCheck-2">Perempuan</label></div>
                                </div><br>
                                <div><label class="form-label">Nombor Telefon:</label><input class="form-control" value = "<?php echo $row['NO_TEL']?>"name = "NoTel" type="text"></div><br>
                                <div><label class="form-label">Alamat Rumah:</label><input class="form-control" value = "<?php echo $row["ALAMAT"]?>"name = "Alamat" type="text"></div>
                                <div></div><br>
                                <?php }?>
                                <div><a class="btn btn-secondary float-start" href ="adminPendaftaranPelajar.php" type="button">Kembali</a><button class="btn btn-secondary float-start" type="reset">Set Semula</button><button class="btn btn-primary float-end" name = "simpan" type="submit">Simpan</button>
                                    <div class="bs-component"></div>
                                </div>
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