<?php

    include ("./includes/connect.php");

    if(isset($_GET['subId']))
    {
        $sql = "DELETE FROM bahan_pembelajaran WHERE ID_BAHAN = :idbahan";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":idbahan", $_GET['subId']);
        if($stmt->execute())
        {
            echo "<script>
            alert('Bahan Pembelajaran Berjaya Dihapuskan.');
            window.location.href='./guruMatapelajaran.php';
            </script>";
        }
    }

?>