<?php
session_start();
    include ("./includes/connect.php");
    if(isset($_GET['idpelajarsubjek']))
    {
        $sql = "DELETE FROM pelajar_subjek WHERE ID_PELAJAR_SUBJEK = :idpelajarsubjek";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":idpelajarsubjek", $_GET['idpelajarsubjek']);
        if($stmt->execute())
        {
            echo "<script>
            alert('Hapus subjek berjaya.');
            window.location.href='./adminPelajarSubjek.php?idpelajarsubjek=".$_SESSION["idp"]."';
            </script>";
        }
    }
?>