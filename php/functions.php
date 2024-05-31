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

// Function to add a page to the list of visited pages in the cookie
function addVisitedPage($pageName, $pageUrl) {
    // Define the name of the cookie
    $cookieName = 'visited_pages';
    
    // Check if the cookie exists
    if(isset($_COOKIE[$cookieName])) {
        // Get the current list of visited pages from the cookie
        $visitedPages = json_decode($_COOKIE[$cookieName], true);

        // Add the new page to the beginning of the array
        $visitedPages[] = array('name' => $pageName, 'url' => $pageUrl);

        // Remove duplicate elements based on the 'name' key
        $visitedPages = array_map("unserialize", array_unique(array_map("serialize", $visitedPages)));

        // Re-index the array after removing duplicates
        $visitedPages = array_values($visitedPages);
        
        // If the number of visited pages exceeds 5, remove the oldest one
        if(count($visitedPages) > 5) {
            array_shift($visitedPages);
        }
    } else {
        // If the cookie doesn't exist yet, create an empty array
        $visitedPages = array();
        
        // Add the first visited page to the array
        $visitedPages[] = array('name' => $pageName, 'url' => $pageUrl);
    }
    
    // Encode the array of visited pages as JSON and set it as the cookie value
    setcookie($cookieName, json_encode($visitedPages), time() + (86400 * 30), "/"); // 30 days expiration
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
            }
            else
            {
                echo 'Username or password is incorrect';
            }

        }
    }
} // ex: https://phuocle.website/index.php?username=phuoc&password=phuoc

?>