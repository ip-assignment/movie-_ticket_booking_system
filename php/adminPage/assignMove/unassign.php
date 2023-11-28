<?php 
    include "../../../config/config.php";
    $Q_Str = parse_str($_SERVER['QUERY_STRING'], $parameters);
    $mid = isset($parameters['mid'])?$parameters['mid']:null;
    $rid = isset($parameters['rid'])?$parameters['rid']:null;
    
    $mQuery = "UPDATE `movies` SET `room_id` = NULL WHERE `movies`.`id` = :id";
    $mState = $conn->prepare($mQuery);
    $mState->execute([":id"=>$mid]);
    
    $rQuery = "UPDATE `c_room` SET `is_ available` = '1' WHERE `c_room`.`id` = :id";
    $rState = $conn->prepare($rQuery);
    $rState->execute([":id"=>$rid]);

    header("Location:http://localhost/refIP2/php/adminPage/assignMove/index.php?search=TRUE", true);
    exit();
?>