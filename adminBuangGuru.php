<?php

    include ("./includes/connect.php");

    if(isset($_GET['subId']))
    {
        $sql = "DELETE FROM guru WHERE ID_GURU = :idguru";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":idguru", $_GET['subId']);
        if($stmt->execute())
        {
            echo "<script>
            alert('Hapus subjek berjaya.');
            window.location.href='./adminSenaraiGuru.php';
            </script>";
        }
    }

?>