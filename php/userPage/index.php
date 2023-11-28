<?php 
session_start();
include "../../config/config.php";
if(!isset($_SESSION['id'])){
    header("Location:http://localhost/refIP2/php/", true);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
</head>
<body>
   <a href="../logout.php">logout</a>
</body>
</html>