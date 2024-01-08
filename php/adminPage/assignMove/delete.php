<?php 
include '../../../config/config.php';
    $Q_Str = parse_str($_SERVER['QUERY_STRING'], $parameters);
    $param = isset($parameters['id'])?$parameters['id']:null;
    $deleteS = "DELETE FROM `schedule` WHERE SC_id = $param";
    mysqli_query($conn, $deleteS);
    header("Location: http://localhost/movie/php/adminPage/assignMove/index.php?delete=true", true);
    exit();
?>