<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>World Cube - List Users</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
        <body>
        <?php
            include ('php/Nav&Footer.php');
        ?>
        <!-- Navigation-->
        <?php specialNavBar(); ?>

        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Listing Users</h1>
                    <p class="lead fw-normal text-white-50 mb-0">LIsting All Users From Marketplaces</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">

                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-start">
                                <!-- Card Title-->
                                <h5 class="fw-bolder ">World Cube (Phuoc Le) Users:</h5>
                                <!-- Card Description-->
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
                                            $users[] = $row['name']; // Store only the name in the array
                                        }
                                        // Loop through the array and print each element on a new line
                                        foreach ($users as $user) { // Iterate over $users, not $array
                                            echo($user . "<br>"); // Use "\n" to create a new line
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-start">
                                <!-- Card Title-->
                                <h5 class="fw-bolder ">YOLO Travel (Phuong Ngo) Users:</h5>
                                <!-- Card Description-->
                                <?php
                                    // Initialize cURL session
                                    $ch = curl_init();
                                    // Set the URL
                                    curl_setopt($ch, CURLOPT_URL, 'https://cmpe272.phuongngo.net/list_users/users.php');
                                    // Set to return the transfer as a string
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    // Bypass SSL certificate verification
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                                    // Execute the request
                                    $response = curl_exec($ch);
                                    // Check for errors
                                    if(curl_errno($ch)){
                                        echo 'Curl error: ' . curl_error($ch);
                                    }
                                    // Close cURL session
                                    curl_close($ch);
                                    // Decode the JSON response
                                    $data = json_decode($response, true);
                                    // Check if decoding was successful
                                    if ($data === null) {
                                        echo "Error decoding JSON";
                                    } else {
                                        // Iterate through the list of users and display line by line
                                        foreach ($data as $user) {
                                            echo($user['first_name'] . " " . $user['last_name'] . "<br>");
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-start">
                                <!-- Card Title-->
                                <h5 class="fw-bolder ">Live&Love Market (Phuc Le) Users:</h5>
                                <!-- Card Description-->
                                <?php
                                    // Initialize cURL session
                                    $ch = curl_init();
                                    // Set the URL
                                    curl_setopt($ch, CURLOPT_URL, 'https://phucle.website/api/userEP.php');
                                    // Set to return the transfer as a string
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    // Bypass SSL certificate verification
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                                    // Execute the request
                                    $response = curl_exec($ch);
                                    // Check for errors
                                    if(curl_errno($ch)){
                                        echo 'Curl error: ' . curl_error($ch);
                                    }
                                    // Close cURL session
                                    curl_close($ch);
                                    // Decode the JSON response
                                    $data = json_decode($response, true);
                                    // Check if decoding was successful
                                    if ($data === null) {
                                        echo "Error decoding JSON";
                                    } else {
                                        // Iterate through the list of users and display line by line
                                        foreach ($data as $user) {
                                            echo($user['username'] . "<br>");
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-start">
                                <!-- Card Title-->
                                <h5 class="fw-bolder ">San Quentin Palm Reading (Vinh Tran) Users:</h5>
                                <!-- Card Description-->
                                <?php
                                    // Initialize cURL session
                                    $ch = curl_init();
                                    // Set the URL
                                    curl_setopt($ch, CURLOPT_URL, 'https://vinhtran00.com/users.php');
                                    // Set to return the transfer as a string
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    // Bypass SSL certificate verification
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                                    // Execute the request
                                    $response = curl_exec($ch);
                                    // Check for errors
                                    if(curl_errno($ch)){
                                        echo 'Curl error: ' . curl_error($ch);
                                    }
                                    // Close cURL session
                                    curl_close($ch);
                                    // Decode the JSON response
                                    $data = json_decode($response, true);
                                    // Check if decoding was successful
                                    if ($data === null) {
                                        echo "Error decoding JSON";
                                    } else {
                                        // Iterate through the list of users and display line by line
                                        foreach ($data as $user) {
                                            echo($user['name'] . "<br>");
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- Footer-->
        <special-footer></special-footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Core theme JS-->
        <?php specialFooter(); ?>
    </body>
</html>
