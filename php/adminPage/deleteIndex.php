<?php 
    include  "../../config/config.php";
    $qStr = parse_str($_SERVER['QUERY_STRING'], $parameters);
    $param = isset($parameters['id'])?$parameters['id']:null;
    $query = "DELETE FROM `users` WHERE id=:id";
    $stat = $conn->prepare($query);
    $stat->execute([':id'=>$param]);
    header("Location: http://localhost/refIP2/php/adminPage/index.php?search=TRUE", true);
    exit();

?>








<!-- <a href="http://localhost/refIP2/php/adminPage/index.php?search=TRUE">test</a> -->