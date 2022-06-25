<?php 
session_start();
include ("./includes/connect.php");
$emailpelajar = $_SESSION['EMEL_PELAJAR'];
$namaguru ="";
$emailpelajar = $_SESSION['EMEL_PELAJAR'];
if(isset($_GET["idtugasanguru"])){
    $_SESSION["ID_TUGASAN_GURU"] = $_GET["idtugasanguru"];
}
$sql =  "SELECT * FROM pelajar WHERE EMEL_PELAJAR = '".$emailpelajar."'";
$stmt = $conn->prepare($sql);
$stmt -> execute();
while ($row = $stmt->fetch()){
    $namapelajar = $row['NAMA_PELAJAR'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $dokumen = "simpanTugasanPelajar/";
    $dokumen_file = $dokumen . basename($_FILES["Tugasan"]["name"]);
    $tarikh = $_POST['Tarikh'];
    

    if(!empty($dokumen) && !empty($tarikh)){
        

    $sql = "SELECT ID_PELAJAR FROM pelajar WHERE EMEL_PELAJAR = '".$emailpelajar."'";
    $stmt = $conn->query($sql);
    while ($row = $stmt->fetch())
        $idpelajar = $row['ID_PELAJAR'];

    $sqltugasanguru = "SELECT * FROM tugasan_guru WHERE ID_TUGASAN_GURU = ".$_SESSION['ID_TUGASAN_GURU']."";

   

    $subjek = (int)$_SESSION["idsubjeksemasa"];
    //$idtugasanguru = (int)$_SESSION["idtugasanguru"];

    $sql2 = "INSERT INTO tugasan_pelajar(ID_PELAJAR, ID_SUBJEK, ID_TUGASAN_GURU, TUGASAN, TARIKH)
            VALUES (:ID_PELAJAR, :ID_SUBJEK, :ID_TUGASAN_GURU, :TUGASAN, :TARIKH)";
            
    $stmt = $conn->prepare($sql2);
    $stmt->bindParam(":ID_PELAJAR", $idpelajar);
    $stmt->bindParam(":ID_SUBJEK", $subjek);
    $stmt->bindParam(":ID_TUGASAN_GURU", $_SESSION["ID_TUGASAN_GURU"]);
    $stmt->bindParam(":TUGASAN", $dokumen_file);
    $stmt->bindParam(":TARIKH", $tarikh);
    $stmt -> execute();
    move_uploaded_file($_FILES["Tugasan"]["tmp_name"], $dokumen_file);

    echo ("<script>window.alert('Tugasan Berjaya Dihantar.');
    window.location.href='./pelajarMatapelajaran.php'</script>");
    } 
    else {
        echo ("<script>window.alert('Sila Isi Semua Maklumat.');</script>");
    }
    $sql1 = "SELECT * FROM tugasan_pelajar";
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
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>P.L.S</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="pelajarHomedashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="pelajarMatapelajaran.php"><i class="fas fa-user"></i><span>Mata Pelajaran</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <div class="text-center d-none d-md-inline"></div><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                           
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><label><?php echo $namapelajar;?></label></span><img class="border rounded-circle img-profile" src="assets/img/boy.jpg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="pelajarProfail.php"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profail</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Log Keluar</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div id="layoutSidenav_content">
                <div style="background: #1a3c63;padding: 2%;">
                    <h1 class="text-center" style="font-weight: bold;font-size: 50px;color: rgb(255,255,255);">Tugasan</h1>
                </div>
                <div class="container">
                <form class="border rounded shadow" method = "POST" action = "<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" style="padding: 10%; ">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">Hantar Tugasan</p>
                                
                                
                            </div>
                            <div class="card-body">
                            <!--<div><input class="d-none" name="id" value="<?php //{ echo $_GET['subId'];} ?>"><label class="form-label">Tajuk Tugasan:</label><input class="form-control" name = "Tajuk" type="text" value="<?php //echo $row['TAJUK_BAHAN'];} ?>"></div><br>-->
                            <div><label class="form-label">Tugasan:</label><input class="form-control" name = "Tugasan" type="file" value=""></div><br>

                                <div><label class="form-label">Tarikh:</label><input class="form-control" name = "Tarikh" type="date"></div><br>
                                <div></div><br><br>
                                <div></div><br>
                                <div><button class="btn btn-secondary float-start" href="#" type="reset">Set Semula</button><button class="btn btn-primary float-end" type="submit">Simpan</button>
                                    <div class="bs-component"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <main></main>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
    
</body>

</html>
