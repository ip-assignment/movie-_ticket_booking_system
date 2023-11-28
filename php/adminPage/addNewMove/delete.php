<?php
    include "../../../config/config.php";
    $Q_Str = parse_str($_SERVER['QUERY_STRING'], $parameters);
    $param = isset($parameters['id'])?$parameters['id']:null;
    
    $checkQuery = "SELECT * FROM `movies` WHERE id=:id";
    $checkState = $conn->prepare($checkQuery);
    $checkState->execute([":id"=>$param]);
    $checkResult = $checkState->fetch(PDO::FETCH_OBJ);

    $room_id = isset($checkResult->room_id)?$checkResult->room_id:null;

    if($room_id){
        $updateQuey = "UPDATE `c_room` SET `is_ available` = :is_available WHERE `c_room`.`id` =:id";
        $updateState = $conn->prepare($updateQuey);
        $updateState->execute([':is_available'=>true, ":id"=>$room_id]);
    }
    
    $query = "DELETE FROM `movies` WHERE id=:id";
    $stem = $conn->prepare($query);
    $stem->execute([":id"=>$param]);

    

    header("Location: http://localhost/refIP2/php/adminPage/addNewMove/index.php?search=TRUE", true);
    exit();
?>