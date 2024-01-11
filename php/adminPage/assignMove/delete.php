<?php 
include '../../../config/config.php';
    $Q_Str = parse_str($_SERVER['QUERY_STRING'], $parameters);
    $param = isset($parameters['id'])?$parameters['id']:null;
    $cQuery = "SELECT * FROM `reserve` WHERE SC_id = $param";
    $cResult = mysqli_query($conn, $cQuery);
    $cData = mysqli_fetch_all($cResult);
    if($cData){
        header("Location: http://localhost/movie/php/adminPage/assignMove/index.php?delete=true", true);
        exit();
    }
    $deleteS = "DELETE FROM `schedule` WHERE SC_id = $param";
    mysqli_query($conn, $deleteS);
    header("Location: http://localhost/movie/php/adminPage/assignMove/index.php?delete=true", true);
    exit();
?>