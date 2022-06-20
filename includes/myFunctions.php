<?php

function getStudent($conn, $email, $pass)
{
    $stmt = $conn->prepare("SELECT * FROM pelajar WHERE EMEL_PELAJAR = :emel AND KATA_LALUAN_PELAJAR = :katalaluan");
    $stmt->bindParam(":emel", $email);
    $stmt->bindParam(":katalaluan", $pass);
    $stmt->execute();
    return $stmt->rowCount();
}

function getTeacher($conn, $email, $pass)
{
    $stmt = $conn->prepare("SELECT * FROM guru WHERE EMEL_GURU = :emel AND KATA_LALUAN_GURU = :katalaluan");

    $stmt->bindParam(":emel", $email);
    $stmt->bindParam(":katalaluan", $pass);
    $stmt->execute();
    return $stmt->rowCount();
}

function getAdmin($conn, $email, $pass)
{
    $stmt = $conn->prepare("SELECT * FROM admin WHERE EMEL_ADMIN = :emel AND KATA_LALUAN = :katalaluan");
    $stmt->bindParam(":emel", $email);
    $stmt->bindParam(":katalaluan", $pass);
    $stmt->execute();
    return $stmt->rowCount();
}
?>