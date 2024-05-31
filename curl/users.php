<?php

// Establish connection to MySQL database
$conn = mysqli_connect('localhost', 'xvilncmy_WPMHU', 'Phuocle123', 'xvilncmy_worldcube');

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to select all users
$sql = "SELECT name FROM users";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Initialize an empty array to store the users
    $users = array();

    // Fetch each row from the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Add the user to the array
        $users[] = $row;
    }

    // Set the content type header to JSON
    header('Content-Type: application/json');

    // Output the users array as JSON
    echo json_encode($users);
} 
else {
    // Respond with an error message if no users were found
    echo "No users found";
}

// Close the database connection
mysqli_close($conn);

?>
