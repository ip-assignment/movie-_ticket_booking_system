<?php
function getSeat() {
    include '../config/config.php';

    // Use mysqli_real_escape_string for security
    $jsonData = json_decode(file_get_contents('php://input'), true);
    $id = mysqli_real_escape_string($conn, $jsonData['id']);
    $type = mysqli_real_escape_string($conn, $jsonData['type']);

    $query = "SELECT * FROM `schedule` WHERE SC_id = $id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error in SQL query: " . mysqli_error($conn));
    }

    $data = mysqli_fetch_assoc($result);

    $rQuery = "SELECT * FROM `seatas` WHERE R_id = '".$data['R_id']."' AND S_type = '$type' AND (
        SELECT COUNT(*) FROM `reserve` WHERE `reserve`.S_id = `seatas`.S_id AND `reserve`.SC_id = $id
    ) <= 0";
    $rResult = mysqli_query($conn, $rQuery);

    if (!$rResult) {
        die("Error in SQL query: " . mysqli_error($conn));
    }

    $rData = mysqli_fetch_all($rResult, MYSQLI_ASSOC);

    // Return the result as JSON
    return $rData;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    echo json_encode(getSeat());
}
?>
