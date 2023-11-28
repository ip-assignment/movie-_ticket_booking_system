<?php
$host = "localhost";
$user = "root";
$pw = "";
$dbname = "movieDB";
// $conn = mysqli_connect($host, $user, $pw);
// mysqli_select_db($conn, $dbname);

try {
    $conn = new PDO("mysql:host=".$host.";dbname=".$dbname, $user, $pw);
} catch (PDOException $e) {
    throw $e;
}
