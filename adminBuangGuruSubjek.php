<?php
    session_start();
    include ("./includes/connect.php");
    if(isset($_GET['idgurusubjek']))
    {
        $sql = "DELETE FROM guru_subjek WHERE ID_GURU_SUBJEK = :idgurusubjek";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":idgurusubjek", $_GET['idgurusubjek']);
        if($stmt->execute())
        {
            echo "<script>
            alert('Hapus subjek berjaya.');
            window.location.href='./adminGuruSubjek.php?idgurusubjek=".$_SESSION["idg"]."';
            </script>";
        }
        
    }
?>