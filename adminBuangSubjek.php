<?php

    include ("./includes/connect.php");

    if(isset($_GET['subId']))
    {
        $sql = "DELETE FROM subjek WHERE ID_SUBJEK = :idsubjek";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":idsubjek", $_GET['subId']);
        if($stmt->execute())
        {
            echo "<script>
            alert('Hapus subjek berjaya.');
            window.location.href='./adminSenaraiSubjek.php';
            </script>";
        }
    }

?>