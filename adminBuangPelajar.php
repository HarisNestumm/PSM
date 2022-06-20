<?php

    include ("./includes/connect.php");

    if(isset($_GET['pelajarDanPenjaga']))
    {
        // $sql = "DELETE FROM pelajar WHERE EMEL_PELAJAR, KATA_LALUAN_PELAJAR, NAMA_PELAJAR, UMUR, TARIKH_LAHIR, NO_MYKID, JANTINA, AGAMA, BANGSA
        //      = :EMEL_PELAJAR, :KATA_LALUAN_PELAJAR, :NAMA_PELAJAR, :UMUR, :TARIKH_LAHIR, :NO_MYKID, :JANTINA, :AGAMA, :BANGSA";
        $sql = "DELETE FROM pelajar WHERE ID_PELAJAR = :id_pelajar";

        // $sql2 = "DELETE FROM penjaga_pelajar WHERE ID_PELAJAR, NAMA_PENJAGA, UMUR, TARIKH_LAHIR, NO_KAD_PENGENALAN, JANTINA, NO_TEL, ALAMAT 
        //       = :ID_PELAJAR, :NAMA_PENJAGA, :UMUR, :TARIKH_LAHIR, :NO_KAD_PENGENALAN, :JANTINA, :NO_TEL, :ALAMAT)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id_pelajar", $_GET['pelajarDanPenjaga']);
        if($stmt->execute())
        {
            echo "<script>
            alert('Hapus pelajar berjaya.');
            window.location.href='./adminSenaraiPelajar.php';
            </script>";
        }
    }

?>