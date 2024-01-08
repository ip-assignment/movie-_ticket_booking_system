<?php 
include '../../../config/config.php';
    $Q_Str = parse_str($_SERVER['QUERY_STRING'], $parameters);
    $param = isset($parameters['id'])?$parameters['id']:null;
    $deleteS = "DELETE FROM `seatas` WHERE R_id = $param";
    mysqli_query($conn, $deleteS);
    $deleteR = "DELETE FROM `rooms` WHERE R_id = $param";
    mysqli_query($conn, $deleteR);
    header("Location: http://localhost/movie/php/adminPage/addCinemaRoom/index.php?delete=true", true);
    exit();
?>