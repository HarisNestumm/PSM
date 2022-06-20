<?php
session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST['email'];
        $pass = $_POST['password'];
        //$subidsubjek = $_POST['idsubjek'];
        $_SESSION['EMEL_GURU'] = $email;
        $_SESSION['EMEL_PELAJAR'] = $email;
        $_SESSION['EMEL_ADMIN'] = $email;
        //$_SESSION['ID_SUBJEK'] = $subidsubjek;

        if(isset($email) && isset($pass)){
            include ("./includes/myFunctions.php");
            include ("./includes/connect.php");

            if(getStudent($conn, $email, $pass) == 1){
                echo ("<script>window.alert('Log Masuk Berjaya.');
                window.location.href='./pelajarHomedashboard.php';
                </script>");
            }
            else if(getTeacher($conn, $email, $pass ) == 1){
                echo ("<script>window.alert('Log Masuk Berjaya.');
                window.location.href='./guruHomedashboard.php';
                </script>");
                
            }
            else if(getAdmin($conn, $email, $pass) == 1){
                echo ("<script>window.alert('Log Masuk Berjaya.');
                window.location.href='./adminHomePengumuman.php';
                </script>");
            }
            else{
                echo "<script>alert('Emel atau katalaluan adalah salah. Sila cuba lagi');</script>";
            }
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
</head>

<body class="bg-gradient-primary">
    <section>
        <div>
        <nav class="navbar navbar-dark navbar-expand bg-dark sb-topnav">
            <div class="container-fluid"><button class="btn btn-link btn-sm link-light order-md-1" id="sidebarToggle-1" type="button"></button><a class="navbar-brand" href="#"><img src="assets/img/desk.jpg" style="width: 28px;margin-right: 10px;border-width: 3px;border-style: solid;border-radius: 8px;">&nbsp;Sistem Pembelajaran Prasekolah</a>
                <ul class="navbar-nav d-flex order-3 ms-auto ml-md-0">
                </ul>
            </div>
        </nav>  
        </div>
    <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 col-xl-8 col-xxl-8 offset-md-1 offset-lg-2 offset-xl-2 offset-xxl-2" style="background: var(--bs-body-bg);margin-bottom: 10%;margin-top: 10%;">
                    <div style="text-align: center;"><img class="img-fluid" src="assets/img/dogs/2063.jpg" width="60%">
                        <div class="p-5">
                            <h1 class="text-dark mb-4">SELAMAT DATANG!</h1>
                            <form class="user" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">  
                                <div class="mb-3">
                                    <input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Sila masukkan emel anda..." name="email">
                                </div>
                                <div class="mb-3">
                                    <input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Kata Laluan" name="password">
                                </div>
                               
                                <button class="btn btn-primary d-block btn-user w-100" type="submit">Login</button>
                                <hr>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer-dark" style="height: 128px;">
            <div class="container">
                <h3 class="text-center text-secondary mb-4"><br>Preschool Learning System © 2021<br><br></h3>
            </div>
        </footer>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>
</html>