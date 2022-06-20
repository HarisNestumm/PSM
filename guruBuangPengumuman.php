<?php

    include ("./includes/connect.php");

    if(isset($_GET['subId']))
    {
        $sql = "DELETE FROM pengumuman WHERE ID_PENGUMUMAN = :idpengumuman";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":idpengumuman", $_GET['subId']);
        if($stmt->execute())
        {
            echo "<script>
            alert('Hapus subjek berjaya.');
            window.location.href='./guruHomedashboard.php';
            </script>";
        }
    }

?>