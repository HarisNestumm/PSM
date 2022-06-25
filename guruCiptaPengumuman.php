<?php
session_start();
include ("./includes/connect.php");
$namaguru ="";
$emailguru = $_SESSION['EMEL_GURU'];
$sql =  "SELECT * FROM guru WHERE EMEL_GURU = '".$emailguru."'";
$stmt = $conn->prepare($sql);
$stmt -> execute();
while ($row = $stmt->fetch()){
    $namaguru = $row['NAMA_GURU'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $tajuk = $_POST['Tajuk'];
    $penerangan = $_POST['Penerangan'];
    $tarikh = $_POST['Tarikh'];
    $dokumen = "simpanDocPengumuman/";
    $dokumen_file = $dokumen . basename($_FILES["Dokumen"]["name"]);

    if(isset($tajuk) && isset($penerangan) && isset($dokumen) && !empty($tarikh)){
        
    $sql = "SELECT * FROM guru WHERE EMEL_GURU = '".$emailguru."'";
    $stmt = $conn->query($sql);
    while ($row = $stmt->fetch()){
        $idguru = $row['ID_GURU'];
    }

    $sql2 = "INSERT INTO pengumuman (ID_GURU, TAJUK, PENERANGAN, DOKUMEN, TARIKH)
            VALUES (:ID_GURU, :TAJUK, :PENERANGAN, :DOKUMEN, :TARIKH)";
    $stmt = $conn->prepare($sql2);
    $stmt->bindParam(":ID_GURU", $idguru);
    $stmt->bindParam(":TAJUK", $tajuk);
    $stmt->bindParam(":PENERANGAN", $penerangan);
    $stmt->bindParam(":DOKUMEN", $dokumen_file);
    $stmt->bindParam(":TARIKH", $tarikh);
    $stmt -> execute();
    move_uploaded_file($_FILES["Dokumen"]["tmp_name"], $dokumen_file);
    echo ("<script>alert('Pengumuman Berjaya Dimasukkan.');
            windows.location.href='./guruHomedashboard.php'</script>");
    }
    else
    {
        echo ("<script>window.alert('Sila Isi Semua Maklumat.');
             </script>");
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootraps/4.3.1/css/bootstrap.min.css">
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
                    <li class="nav-item"><a class="nav-link active" href="guruHomedashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="guruMatapelajaran.php"><i class="fas fa-user"></i><span>Mata Pelajaran</span></a></li>
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
                            <?php
                            //$_SESSION["idguru"] = $row["NAMA_GURU"];
                            ?>
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small" ><label><?php echo $namaguru;?></label></span><img class="border rounded-circle img-profile" src="assets/img/boy.jpg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="guruProfail.php"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profail</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Log Keluar</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div id="layoutSidenav_content">
                <div style="background: #1a3c63;padding: 2%;">
                    <h1 class="text-center" style="font-weight: bold;font-size: 50px;color: rgb(255,255,255);">Pengumuman</h1>
                </div>
                <div class="container">
                <form class="border rounded shadow" method = "POST" action = "<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" style="padding: 10%; ">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">Cipta Pengumuman</p>
                            </div>
                            <div class="card-body">
                                <div><label class="form-label">Tajuk Pengumuman:</label><input class="form-control" name = "Tajuk" type="text"></div><br>
                                <div><label class="form-label">Penerangan:</label><input class="form-control" name = "Penerangan" type="text"></div><br>
                                <div><label class="form-label">Dokumen:</label><input class="form-control" name = "Dokumen" type="file"></div><br>
                                <div><label class="form-label">Tarikh:</label><input class="form-control" name = "Tarikh" type="date"></div><br>
                                <div></div><br><br>
                                <div></div><br>
                                <div><button class="btn btn-secondary float-start" type="reset">Set Semula</button><button class="btn btn-primary float-end" type="submit">Simpan</button>
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
