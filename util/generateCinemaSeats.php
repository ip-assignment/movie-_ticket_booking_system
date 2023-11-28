<?php 
function generateCinemaSeats($numSeats) {
    if ($numSeats <= 0) {
        return [];
    }

    $seats = [];
    $row = 'A';
    $seatNumber = 1;

    while (count($seats) < $numSeats) {
        $seatIdentifier = $row . $seatNumber;

        $seats[] = $seatIdentifier;

        // Increment the seat number and handle row changes
        $seatNumber++;

        if ($seatNumber > 15) {
            $seatNumber = 1;

            // Move to the next row
            $row = incrementRow($row);
        }
    }

    return $seats;
}

function incrementRow($currentRow) {
    $length = strlen($currentRow);
    $incrementedRow = '';

    $carry = 1;

    for ($i = $length - 1; $i >= 0; $i--) {
        $char = $currentRow[$i];
        $newValue = ord($char) + $carry;

        if ($newValue > ord('Z')) {
            $carry = 1;
            $newValue = ord('A');
        } else {
            $carry = 0;
        }

        $incrementedRow = chr($newValue) . $incrementedRow;
    }

    if ($carry) {
        $incrementedRow = 'A' . $incrementedRow;
    }

    return $incrementedRow;
}


?>