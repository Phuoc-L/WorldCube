<?php

// Function to check if the user is logged in
function check_login()
{
    // if user is already logged in
    if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
        return true;
    }
    else
    {
        return false;
    }
}

// Function to get parameters from the URL and login
function login_url_params() {
    // Check if both username and password parameters are set in the URL
    if(isset($_GET['username']) && isset($_GET['password'])) 
    {
        // connect DB (host, username, password, database)
        $conn = mysqli_connect('localhost', 'xvilncmy_WPMHU', 'Phuocle123', 'xvilncmy_worldcube');

        // check connection
        if(!$conn)
        {
            echo 'Connection error: ' . mysqli_connect_error();
        }
        else
        {
            // get the username and password from the form
            $username = $_GET['username'];
            $password = $_GET['password'];

            // check if the username and password is correct
            $sql = "SELECT * FROM users WHERE name = '$username' AND password = '$password'";
            $result = mysqli_query($conn, $sql);

            // if the username and password is correct
            if(mysqli_num_rows($result) > 0)
            {
                // set the session
                $_SESSION['user'] = $username;
                $_SESSION['password'] = $password;

                // Close connection
                mysqli_close($conn);
                // free the $result from memory (good practise)
	            mysqli_free_result($result);
                // redirect
                header('Location: index.php');
                die;
            }
            else
            {
                echo 'Username or password is incorrect';
            }

        }
    }
} // ex: https://phuocle.website/index.php?username=phuoc&password=phuoc

// Function to get reviewed products from the URL endpoint
function get_top_five($input_url)
{
    // Initialize cURL session
    $ch = curl_init();
    // Set the URL
    curl_setopt($ch, CURLOPT_URL, $input_url);
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
    $data = json_decode($response, true, 512, JSON_BIGINT_AS_STRING);
    // Check if decoding was successful
    if ($data === null) {
        echo "Error decoding JSON";
    } else {
        // // Iterate through the list of users and display line by line
        // foreach ($data as $product) {
        //     echo($product['product_name'] . " " . $product['url'] . " " . $product['review_count'] . "<br>");
        // }
        return $data;
    }
}

// Function to send a create account request to url endpoint
function send_create_account($username, $password, $firstname, $lastname, $email, $address, $homephone, $cellphone, $url)
{
    // Prepare data to be sent in the request body
    $data = array(
        'username' => $username,
        'password' => $password,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'address' => $address,
        'homephone' => $homephone,
        'cellphone' => $cellphone
    );

    // Initialize cURL session
    $curl = curl_init($url);

    // Set the Content-Type header to application/json
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    // Set the request method to POST
    curl_setopt($curl, CURLOPT_POST, true);

    // Set the POST data
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

    // Set option to return the response instead of outputting it
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // Bypass SSL certificate verification
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    // Execute cURL request and get the response
    $response = curl_exec($curl);

    // Check for errors
    if ($response === false) {
        echo "Error: " . curl_error($curl);
    }

    // Close cURL session
    curl_close($curl);
}

?>