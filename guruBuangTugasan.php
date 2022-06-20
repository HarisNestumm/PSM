<?php

    include ("./includes/connect.php");

    if(isset($_GET['subId']))
    {
        $sql = "DELETE FROM tugasan_guru WHERE ID_TUGASAN_GURU = :idtugasanguru";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":idtugasanguru", $_GET['subId']);
        if($stmt->execute())
        {
            echo "<script>
            alert('Hapus subjek berjaya.');
            window.location.href='./guruMataPelajaran.php';
            </script>";
        }
    }

?>