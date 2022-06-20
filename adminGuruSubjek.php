<?php
session_start();
include ("./includes/connect.php");
$checked="";
if(isset( $_GET["idguru"])){
    $_SESSION["idg"] = $_GET["idguru"];     
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
    if(!empty($_POST['check_subjek'])){
        foreach($_POST['check_subjek'] as $checked){
            
            $sql = "INSERT INTO guru_subjek (ID_GURU, ID_SUBJEK)
                VALUES(:ID_GURU, :ID_SUBJEK)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":ID_GURU",$_SESSION["idg"]);
                $stmt->bindParam(":ID_SUBJEK", $checked);
                $stmt->execute();
        }
        echo ("<script>window.alert('Subjek Berjaya Didaftarkan.');</script>");
    } 
    else {
        echo ("<script>window.alert('Sila Pilih Subjek.');</script>");
    }
}
else
{
    //echo "<script>alert('sini');</script>";
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
                            <div class="dropdown-menu dropdown-menu-end text-start shadow" style="margin-top: 16px;">
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
                                    <div><a class="nav-link active" href="#">
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
                    <h1 class="text-center" style="font-weight: bold;font-size: 50px;color: rgb(255,255,255);">Subjek Guru</h1>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12 offset-xxl-0">
                            <div class="border rounded shadow" style="padding: 10%;">
                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 fw-bold">Info Subjek</p>
                                    </div>
                                    
                                    <div class="card-body">
                                    <form class="text-nowrap" method="post" action="./adminGuruSubjek.php?idguru=<?php echo $_SESSION["idg"]; ?>">
                                        <div class="row">
                                            <?php   
                                                //SUBJEK = 1234   IN  GURU_SUBJEK=23
                                                //$sql = "SELECT * FROM SUBJEK WHERE ID_SUBJEK NOT IN (SELECT ID_SUBJEK FROM guru_subjek WHERE ID_GURU=".$_SESSION["idg"].")";
                                                $sql= "SELECT ID_SUBJEK, NAMA_SUBJEK FROM subjek WHERE ID_SUBJEK NOT IN (SELECT ID_SUBJEK FROM guru_subjek)";
                                                $stmt = $conn->query($sql);
                                                $i = 0;

                                                //$sql1 = "SELECT "
                                            ?>
                                                <input class="d-none" type="text" name="idguru" value="<?php echo $idg; ?>" readonly>
                                                <div class="col text-end">
                                                    <label class="col-form-label" style="text-align: left;">Pilih Subjek:</label>
                                                </div>
                                                <div class="col">
                                                <?php while ($row = $stmt->fetch()){ ?>
                                                    <input type = "checkbox" name = "check_subjek[]" value="<?php echo $row['ID_SUBJEK']; ?>"> <?php echo $row['NAMA_SUBJEK']; ?></br>
                                                <?php } ?>    
                                                </div>
                                                <div class="col"><input class="btn btn-primary float-start" type="submit" name="submit" value="Daftar"></div>
                                        </div>
                                    </form>
                                        
                                            <div class="col-xxl-12"><br></div>
                                            <div class="col-md-6 text-nowrap">
                                                <!--nanti adjust-->
                                                <div id="dataTable_length-2" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="form-select d-inline-block form-select form-select-sm">
                                                            <option value="10" selected="">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select>&nbsp;</label></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-md-end dataTables_filter" id="dataTable_filter-2"><label class="form-label"><input class="form-control form-control form-control-sm" type="search" aria-controls="dataTable" placeholder="Search"></label></div>
                                            </div>
                                        
                                            
                                        <div class="table-responsive table mt-2" id="dataTable-3" role="grid" aria-describedby="dataTable_info">
                                            <table class="table my-0" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>Bil.</th>
                                                        <th>Nama Subjek</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    //$sql = "SELECT subjek.NAMA_SUBJEK, subjek.ID_SUBJEK
                                                    //FROM subjek INNER JOIN guru_subjek ON subjek.ID_SUBJEK = guru_subjek.ID_SUBJEK";
                                                    $sql = "SELECT  s.ID_SUBJEK, s.NAMA_SUBJEK, gs.ID_SUBJEK, gs.ID_GURU_SUBJEK 
                                                    FROM subjek s, guru_subjek gs WHERE s.ID_SUBJEK = gs.ID_SUBJEK AND gs.ID_GURU=".$_SESSION["idg"]."";
                                                
                                                    //$sql = "SELECT gs.ID_SUBJEK, s.NAMA_SUBJEK, gs.ID_GURU FROM guru_subjek gs, subjek s WHERE gs.ID_SUBJEK = s.ID_SUBJEK AND gs.ID_GURU = :ID_GURU";
                                                    //$stmt->bindParam(":ID_GURU", $_GET('idguru'));
                                                    //echo $_SESSION["idguru"];
                                                    $stmt = $conn->query($sql);
                                                    $i = 0;
                                                    ?>
                                                    <?php while($row = $stmt->fetch()){ ?>
                                                    <tr>
                                                        <td><?php echo ++$i; ?></td>
                                                        <td><?php echo $row['NAMA_SUBJEK']; ?></td>

                                                        <td class="float-end btn-toolbar"><a class="btn btn-danger" href= "./adminBuangGuruSubjek.php?idgurusubjek=<?php echo $row["ID_GURU_SUBJEK"]; ?> " style="margin-right: 3px;">Buang</a></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 align-self-center">
                                                <p id="dataTable_info-2" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                                            </div>
                                            <div class="col-md-6">
                                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                                    <ul class="pagination">
                                                        <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <main></main>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
    </script>
</body>

</html>