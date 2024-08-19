<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Screens</title>
</head>
<body>
    <h1>Available Screens</h1>
    <?php
        // Database connection details (replace with your actual credentials)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "savoy";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Current date and time
        $current_date = date("Y-m-d");
        $current_time = date("H:i");

        $available_screens = [];

        // SQL query to get bookings
        $sql = "SELECT S_ID, date, time_slot FROM screen 
                WHERE date = '$current_date'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Loop through bookings
            while($row = $result->fetch_assoc()) {
                $booking_date = $row["date"];
                $booking_time_slot = explode("-", $row["time_slot"]);
                $booking_start_time = $booking_time_slot[0];
                $booking_end_time = $booking_time_slot[1];

                // Check if booking overlaps with current time
                if ($booking_start_time > $current_time && $booking_end_time > $current_time) {
                    $available_screens[] = $row["screen_id"];
                }
            }
        }

        $conn->close();

        if (count($available_screens) > 0) {
            echo "<h2>Available Screens:</h2>";
            echo "<ul>";
            foreach ($available_screens as $screen_id) {
                echo "<li>Screen ID: $screen_id</li>";
            }
            echo "</ul>";
        } else {
            echo "<h2>No Screens Available at this Time</h2>";
        }
    ?>
</body>
</html>
