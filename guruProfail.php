<?php 
//include('sessionGuru.php');
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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><label><?php echo $namaguru;?></label></span><img class="border rounded-circle img-profile" src="assets/img/boy.jpg"></a>
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
                    <h1 class="text-center" style="font-weight: bold;font-size: 50px;color: rgb(255,255,255);">Profail Guru</h1>
                </div>
                <div class="container">
                <form class="border rounded shadow" method = "POST" action = "<?php echo $_SERVER['PHP_SELF']?>;" style="padding: 10%;">
                        <div class="card shadow">
                            <div class="card-header py-3">
                               <p class="text-primary m-0 fw-bold">Info Guru</p>
                            </div>
                            <div class="card-body">
                            <div class="card-body">
                                    
                                        <?php
                                            //include ("./includes/connect.php");

                                            $sql = "SELECT * FROM guru WHERE EMEL_GURU = '".$emailguru."' ";
                                            $stmt = $conn->query($sql);
                                           
                                        ?>
                                            <div class="col-xxl-12"><br></div>
                                            <div class="col-md-6 text-nowrap">
                                                <!--nanti adjust-->
                                                
                                            </div>
                                           
                                        
                                        <div class="table-responsive table mt-2" id="dataTable-3" role="grid" aria-describedby="dataTable_info">
                                            <table class="table my-0" id="dataTable">
                                            <tbody>
            
                                                <thead>
                                                <?php if ($row = $stmt->fetch()){ ?>
                                                    <tr>
                                                        <td>ID Guru:</td>
                                                        <td width="1em"></td>
                                                        <td> <?php echo $row['ID_GURU']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Penuh:</td>
                                                        <td width="1em"></td>
                                                        <td> <?php echo $row['NAMA_GURU']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Umur:</td>
                                                        <td width="1em"></td>
                                                        <td><?php echo $row['UMUR']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>No. Kad Pengenalan:</td>
                                                        <td width="1em"></td>
                                                        <td><?php echo $row['KAD_PENGENALAN']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jantina:</td>
                                                        <td width="1em"></td>
                                                        <td><?php echo $row['JANTINA']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Agama:</td>
                                                        <td width="1em"></td>
                                                        <td><?php echo $row['AGAMA']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nombor Telefon:</td>
                                                        <td width="1em"></td>
                                                        <td><?php echo $row['NO_TEL']; ?></td>
                                                    </tr>
                                                    </tbody>
                                            </table>
                                                <?php } ?>   
                                                </thead>
                                                <tbody>
                                                    
                                                    <tr>
                                                        <!--<td class="float-end btn-toolbar"><a class="btn btn-success" href="#" style="margin-right: 3px;color: var(--bs-white);">Kemaskini</a><a class="btn btn-danger" href= "./adminBuangPelajar.php?pelajarDanPenjaga=<?php //echo $row["ID_PELAJAR"];?>" style="margin-right: 3px;">Buang</a></td>-->
                                                       <!-- <td class="float-end btn-toolbar"><a type="button" class="btn" href = "#" style="margin-right: 3px;color: var(--bs-white);background: rgb(78,115,223);border-color: var(--bs-blue);">Maklumat Pelajar</a><a type="button" class="btn" href = "#" style="margin-right: 3px;color: var(--bs-white);background: rgb(78,115,223);border-color: var(--bs-blue);">Daftar Subjek</a>-->
                                                        
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>
</body>

</html>