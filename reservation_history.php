<?php
include("config.php");
include("reusable.php");

// Fetch loan history for the current user from the database
session_start();

sessionvalidation("user_id");
customhead("Reservation History");
loggedin_usertype("type");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,400&family=Raleway:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Reservation History</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="reservation-history">

    <h2 class="title">Reservation History</h2>

    <table border="1" width="80%" style="border-collapse: collapse;" class="Atable">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Facility Name</th>
                <th width="20%">Date</th>
                <th width="20%">Time Start</th>
                <th width="20%">Time End</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $counter = 1;
			$query = "SELECT * FROM reservation WHERE user_id = $userId";
			$result = mysqli_query($conn, $query);
			
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                        <td data-title="No" class="rowNumber">' . $counter . '</td>
                        <td data-title="Facility Name">' . getFaciName($row["faci_id"]) . '</td>
                        <td data-title="Date">' . $row["date"] . '</td>
                        <td data-title="Time Start">' . $row["time_start"] . '</td>
                        <td data-title="Time End">' . $row["time_end"] . '</td>
                      </tr>';
                $counter++;
            }
            ?>
        </tbody>
    </table>
</div>

<?php
mysqli_close($conn);

function getFaciName($faci_id) {
    global $conn;
    $query = "SELECT faci_name FROM facility WHERE faci_id = $faci_id";
    $result = mysqli_query($conn, $query);
    $room = mysqli_fetch_assoc($result);
    return $room["faci_name"];
}

?>
	<footer>
		<br>Copyright 2023.</br>
	</footer>
</body>
</html>
