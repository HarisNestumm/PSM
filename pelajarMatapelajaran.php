<?php
session_start(); 
include ("./includes/connect.php");
$namaguru = $id_pelajar = $namapelajar="";
$emailpelajar = $_SESSION['EMEL_PELAJAR'];
$sql =  "SELECT * FROM pelajar WHERE EMEL_PELAJAR = '".$emailpelajar."'";
$stmt = $conn->prepare($sql);
$stmt -> execute();
while ($row = $stmt->fetch()){
    $namapelajar = $row['NAMA_PELAJAR'];
    $id_pelajar = $row['ID_PELAJAR'];
}
/*session_start();
$emailguru = $_SESSION['EMEL_GURU'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nota = "simpanBahanPembelajaran/";
    $dokumen_file = $nota . basename($_FILES["Nota"]["name"]);
    //$docFileType = strtolower(pathinfo($dokumen_file,PATHINFO_EXTENSION));
   //$idguru = $_POST['IDguru'];
    $tarikh = $_POST['Tarikh'];

    if(isset($nota) && isset($tarikh) ){
        include ("./includes/connect.php");
    
    $sql = "SELECT ID_GURU FROM guru WHERE EMEL_GURU = '".$emailguru."'";
    $stmt = $conn->query($sql);
    while ($row = $stmt->fetch())
        $idguru = $row['ID_GURU'];

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
////<form class="border rounded shadow" method = "POST" action = "<?php echo $_SERVER['PHP_SELF'];" style="padding: 10%;">
    echo "Pengumuman Berjaya Dimasukkan";
    }
}*/

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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" crossorigin="anonymous">

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
                    <li class="nav-item"><a class="nav-link" href="pelajarHomedashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="pelajarMatapelajaran.php"><i class="fas fa-user"></i><span>Mata Pelajaran</span></a></li>
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
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-lg-12 col-xl-12 col-xxl-12">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow">
                                    <h3 class="text-dark mb-4">Kelas</h3>
                                    <div>
                                        <div class="card">
                                            <div class="card-body">
                                                <form class="text-nowrap" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                                                    <div class="row">
                                                        <?php   
                                                        $sql = "SELECT S.ID_SUBJEK,S.NAMA_SUBJEK,PS.ID_PELAJAR FROM subjek S, pelajar_subjek PS WHERE PS.ID_SUBJEK=S.ID_SUBJEK AND PS.ID_PELAJAR = ".$id_pelajar."";

                                                         $stmt = $conn->query($sql);
                                                         $i = 0;
                                                        ?>
                                                        <div class="col text-end"><label class="col-form-label" style="text-align: left;">Pilih Mata Pelajaran:</label></div>
                                                        <div class="col">
                                                            <select class="form-select" name="pilihmatapelajaran">
                                                                <option value="" selected="" disabled="true">Sila Pilih</option>
                                                        <?php while ($row = $stmt->fetch()){ ?>
                                                                <option value="<?php echo $row['ID_SUBJEK']; ?>"> <?php echo $row['NAMA_SUBJEK']; ?></option>
                                                        <?php } ?>    
                                                            </select></div>
                                                        <div class="col"><button class="btn btn-primary float-start" <?php //echo $row["ID_SUBJEK"];?>  type="submit" name="sahmatapelajaran">Sahkan</button></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <nav class="navbar navbar-light navbar-expand-md">
                                   
                                        <div class="container-fluid"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                                            <div class="collapse navbar-collapse" id="navcol-1">
                                                
                                                <ul class="navbar-nav">
                                                    <li class="nav-item"><a class="btn nav-link" id="bahanPembelajaran" onclick="bahanPembelajaran()">Bahan Pembelajaran</a></li>
                                                    <li class="nav-item"><a class="btn nav-link" id="tugasanIndividu" onclick="tugasanIndividu()">Tugasan</a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </nav>
                                    <div class="card" style="display: none" id="divBahanPembelajaran">
                                        <div class="card-header">
                                            <h5 class="mb-0">Bahan Pembelajaran</h5>
                                            <div> </div>
                                        </div>

                                        <div class="card-body">
                                            
                                        <div class="table-responsive" role = "grid">
                                                <table class="w3-table w3-striped w3-bordered mydatatable">
                                                    <thead>
                                                        <tr>
                                                            <th>Bil.</th>
                                                            <th>Tajuk Bahan Pembelajaran </th>
                                                            <th class="w3-center">Tarikh</th>
                                                            <th class="w3-center">Nota</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <form  class="text-nowrap" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                                                        
                                                     
                                                                                                          
                                                        
                                                        <?php 
                                                        if(isset($_POST["sahmatapelajaran"]))
                                                        {
                                                            $_SESSION["idsubjeksemasa"] = $_POST["pilihmatapelajaran"];
                                                            $idsubjek = $_POST["pilihmatapelajaran"];
                                                 
                                                            if(isset($idsubjek))
                                                            {   //TAMBAH FILE
                                                                $sql = "SELECT * FROM bahan_pembelajaran WHERE ID_SUBJEK = :ID_SUBJEK";
                                                                $stmt = $conn->prepare($sql);
                                                                $stmt->bindParam(":ID_SUBJEK", $idsubjek);
                                                                $stmt -> execute();
                                                                $i = 0;

                                                                if($stmt)
                                                                {
                                                                    while($row = $stmt->fetch()){ ?>
                                                                    <tr>
                                                                        <td><?php echo ++$i; ?></td>
                                                                        <td><?php echo $row['TAJUK_BAHAN']; ?></td>
                                                                        <td class="w3-center"><?php echo $row['TARIKH']; ?></td>
                                                                        <td class="w3-center"><a type="button" class="btn" href = "./<?php echo $row['NOTA'];?> " target="_blank" style="margin-right: 3px;color: var(--bs-white);background: rgb(78,115,223);border-color: var(--bs-blue);">Fail Nota</a></a>

                                                                    </tr>
                                                                    <?php } 
                                                                }
                                                            }
                                                            
                                                            else
                                                            {
                                                                echo ("<script>window.alert('Sila Pilih Subjek.');
                                                                    </script>");
                                                            }
                                                        }
                                                    ?>      
                                                    </form>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                                               
                                    </div>
                                    <div class="card" style="display: none" id="divTugasanIndividu">
                                        <div class="card-header">
                                            <h5 class="mb-0">Tugasan</h5>
                                        </div>
                                        <div class="card-body">
                                        <div class="table-responsive" role = "grid">
                                                <table class="w3-table w3-striped w3-bordered mydatatable">
                                                    
                                                    <thead>
                                                        <tr>
                                                            <th>Bil.</th>
                                                            <th>Nama Tugasan</th>
                                                            <th>Tarikh</th>
                                                            <th>Hantar Tugasan</th>
                                                            <th class="w3-center">Status Penghantaran</th>
                                                            <th></th>
                                                        </tr>

                                                    </thead>

                                                    <tbody>
                                                    <?php 
                                                        if(isset($_POST["sahmatapelajaran"]))
                                                        {
                                                            $_SESSION["idsubjeksemasa"] = $_POST["pilihmatapelajaran"];
                                                            $idsubjek = $_POST["pilihmatapelajaran"];
                                                            
                                                            if(isset($idsubjek))
                                                            {
                                                                $sqltugasanguru = "SELECT * FROM tugasan_guru WHERE ID_SUBJEK = :ID_SUBJEK";

                                                                $stmt = $conn->prepare($sqltugasanguru);
                                                                $stmt->bindParam(":ID_SUBJEK", $idsubjek);
                                                                //$idpelajar = $_SESSION['EMEL_PELAJAR'];
                                                                //$stmt->bindParam(":EMEL_PELAJAR", $idpelajar);
                                                                $stmt -> execute();
                                                                $i = 0;
                                                                if($stmt)
                                                                {
                                                                    while($row = $stmt->fetch()){ ?>
                                                                    <tr>
                                                                        <td><?php echo ++$i; ?></td>
                                                                        <td><?php echo $row['TAJUK']; ?></td>
                                                                        <td><?php echo $row['TARIKH']; ?></td>
                                                                        <td class=""><a class="btn btn-success" href = "./pelajarHantarTugasan.php?idtugasanguru=<?php echo $row['ID_TUGASAN_GURU'];?>" style="margin-right: 3px;color: var(--bs-white);background: rgb(78,115,223);border-color: var(--bs-blue);">Hantar Tugasan</a></td>
                                                                        <td class="w3-center"><a class="btn btn-success" href="./pelajarLihatTugasan.php?idtugasanguru=<?php echo $row["ID_TUGASAN_GURU"];?>" style="margin-right: 3px;color: var(--bs-white);">Papar</a></td>
                                                                        <td class=""><a type="button" class="btn" href = "<?php echo $row['TUGASAN'];?>" target="_blank" style="margin-right: 3px;color: var(--bs-white);background: rgb(78,115,223);border-color: var(--bs-blue);">Lihat Tugasan</a></td>

                                                                        



                                                                        <?php
                                                                        //$_SESSION["idtugasanguru"] = $row["ID_TUGASAN_GURU"];
                                                                        ?>
                                                                        
                                                                    </tr>
                                                                    <?php } 
                                                                }
                                                            }
                                                            else
                                                            {
                                                                echo ("<script>window.alert('Sila Pilih Subjek.');
                                                                    </script>");
                                                            }
                                                        }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 offset-xxl-2">
                        <div class="row mb-3 d-none">
                            <div class="col">
                                <div class="card textwhite bg-primary text-white shadow">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col">
                                                <p class="m-0">Peformance</p>
                                                <p class="m-0"><strong>65.2%</strong></p>
                                            </div>
                                            <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                        </div>
                                        <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card textwhite bg-success text-white shadow">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col">
                                                <p class="m-0">Peformance</p>
                                                <p class="m-0"><strong>65.2%</strong></p>
                                            </div>
                                            <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                        </div>
                                        <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Preschool Learning System 2021</span></div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('.mydatatable').DataTable({
            order: [[3, 'desc']],
            pagingType:'full_numbers',
        });
    </script>
    <script>
        function bahanPembelajaran(){
            if(document.getElementById("divBahanPembelajaran").style.display == "none"){
                document.getElementById("divBahanPembelajaran").style.display = "block";
                document.getElementById("divTugasanIndividu").style.display = "none";
                document.getElementById("divPermakahan").style.display = "none";
                document.getElementById("divPanggilanVideo").style.display = "none";
                document.getElementById("bahanPembelajaran").classList.add("border-primary");
                document.getElementById("tugasanIndividu").classList.remove("border-primary");
                document.getElementById("permakahan").classList.remove("border-primary");
                document.getElementById("panggilanVideo").classList.remove("border-primary");
            }
        }

        function tugasanIndividu(){
            if(document.getElementById("divTugasanIndividu").style.display == "none"){
                document.getElementById("divTugasanIndividu").style.display = "block";
                document.getElementById("divBahanPembelajaran").style.display = "none";
                document.getElementById("divPermakahan").style.display = "none";
                document.getElementById("divPanggilanVideo").style.display = "none";
                document.getElementById("tugasanIndividu").classList.add("border-primary");
                document.getElementById("bahanPembelajaran").classList.remove("border-primary");
                document.getElementById("permakahan").classList.remove("border-primary");
                document.getElementById("panggilanVideo").classList.remove("border-primary");
            }
        }

        function permakahan(){
            if(document.getElementById("divPermakahan").style.display == "none"){
                document.getElementById("divBahanPembelajaran").style.display = "none";
                document.getElementById("divTugasanIndividu").style.display = "none";
                document.getElementById("divPermakahan").style.display = "block";
                document.getElementById("divPanggilanVideo").style.display = "none";
                document.getElementById("permakahan").classList.add("border-primary");
                document.getElementById("bahanPembelajaran").classList.remove("border-primary");
                document.getElementById("tugasanIndividu").classList.remove("border-primary");
                document.getElementById("panggilanVideo").classList.remove("border-primary");
            }
        }

        function panggilanVideo(){
            if(document.getElementById("divPanggilanVideo").style.display == "none"){
                document.getElementById("divBahanPembelajaran").style.display = "none";
                document.getElementById("divTugasanIndividu").style.display = "none";
                document.getElementById("divPermakahan").style.display = "none";
                document.getElementById("divPanggilanVideo").style.display = "block";
                document.getElementById("panggilanVideo").classList.add("border-primary");
                document.getElementById("permakahan").classList.remove("border-primary");
                document.getElementById("tugasanIndividu").classList.remove("border-primary");
                document.getElementById("bahanPembelajaran").classList.remove("border-primary");
            }
        }
    </script>
</body>
<script>
      $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
    </script>

</html>