<?php

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
    <link rel="stylesheet" href="https://stackpatch.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" crossorigin="anonymous">

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
                    <h1 class="text-center" style="font-weight: bold;font-size: 50px;color: rgb(255,255,255);">Pengumuman</h1>
                </div>
                <div class="container">
                    <form class="border rounded shadow" style="padding: 10%;">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">Info Pengumuman</p>
                            </div>
                            <div class="card-body">
                                 
                                        <?php
                                            include ("./includes/connect.php");

                                            $sql = "SELECT ID_PENGUMUMAN, TAJUK, TARIKH, DOKUMEN FROM pengumuman";
                                            $stmt = $conn->query($sql);
                                            $i = 0;
                                        ?>
                                        
                                        <div class="container mb-3 mt-3">
                                            <table class="table my-0 mydatatable"  style = "width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>Bil.</th>
                                                        <th>Perkara</th>
                                                        <th>Tarikh</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while($row = $stmt->fetch()){ ?>
                                                    <tr>
                                                        <td><?php echo ++$i; ?></td>
                                                        <td><?php echo $row['TAJUK']; ?></td>
                                                        <td><?php echo $row['TARIKH']; ?></td>
                                                        <td><a type="button" class="btn" href = "./<?php echo $row['DOKUMEN'];?> " target="_blank" style="margin-right: 3px;color: var(--bs-white);background: rgb(78,115,223);border-color: var(--bs-blue);">Fail Pengumuman</a></a>
                                                        
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/umd/popper.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>
     
    <script>
        $('.mydatatable').DataTable({
            order: [[3, 'desc']],
            pagingType:'full_numbers',
            

        });
    </script>
   
</body>

</html>