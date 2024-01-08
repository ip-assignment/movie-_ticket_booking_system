<?php 
    include '../../../config/config.php';
    $Q_Str = parse_str($_SERVER['QUERY_STRING'], $parameters);
    $param = isset($parameters['id'])?$parameters['id']:null;
    $query = "DELETE FROM  `movies` WHERE M_id = ".$param."";
    if(mysqli_query($conn, $query)){
        echo "true";
    }else{
        echo "false";
    }

    header('Location: http://localhost/movie/php/adminPage/addNewMove/index.php?delete=true', true);
    exit();


?>