<?php 
include '../../config/config.php';
    $Q_Str = parse_str($_SERVER['QUERY_STRING'], $parameters);
    $param = isset($parameters['userName'])?$parameters['userName']:null;
    $deleteS = "DELETE FROM `reserve` WHERE U_UserName = '$param'";
    mysqli_query($conn, $deleteS);
    header("Location: http://localhost/movie/php/receptionist/", true);
    exit();
?>