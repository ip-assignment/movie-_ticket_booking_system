<?php
    include "../../../config/config.php";
    $Q_Str = parse_str($_SERVER['QUERY_STRING'], $parameters);
    $param = isset($parameters['id'])?$parameters['id']:null;
    $query = "DELETE FROM `c_room` WHERE id=:id";
    $stem = $conn->prepare($query);
    echo $param;
    $stem->execute([":id"=>$param]);
    $query = "DELETE FROM `seats` WHERE seat_id=:s_id";
    $stem = $conn->prepare($query);
    $stem->execute([":s_id"=>$param]);
    header("Location: http://localhost/refIP2/php/adminPage/addCinemaRoom/index.php?search=TRUE", true);
    exit();
?>