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
        <title>World Cube - Visited Products</title>
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
                    <h1 class="display-4 fw-bolder">Visited Products</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Listing of Five Last Visited Products</p>
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
                                <h5 class="fw-bolder ">Five Last Visited Products</h5>
                                <!-- Card Description-->
                                <?php
                                    // Define the name of the cookie
                                    $cookieName = 'visited_pages';
                                    
                                    // Check if the cookie exists
                                    if(isset($_COOKIE[$cookieName])) {
                                        // Get the current list of visited pages from the cookie
                                        $visitedPages = json_decode($_COOKIE[$cookieName], true);
                                        
                                        // Output the list of visited pages
                                        foreach($visitedPages as $page) {
                                            echo "<a href='https://phuocle.website/{$page['url']}'>{$page["name"]}</a><br>";
                                        }
                                    } else {
                                        // If the cookie doesn't exist or is empty, display a message
                                        echo "No pages have been visited yet.";
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
                                <h5 class="fw-bolder ">Five Most Reviewed Products</h5>
                                <!-- Card Description-->
                                <?php
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
                                        $sql = "SELECT product_name, url, COUNT(*) AS review_count FROM reviews GROUP BY product ORDER BY review_count DESC LIMIT 5;";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            echo '<ol>';
                                            while($row = mysqli_fetch_assoc($result)) {
                                                // display each review $row["review_id"]
                                                echo '<li><a href=" ' . $row["url"] . ' "> ' . $row["product_name"] . '</a> (' . $row["review_count"] . ' Reviews) - </li>
                                                ';
                                            }
                                            echo '</ol>';
                                        } else {
                                            echo "No Reviews Available.";
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
        <?php specialFooter(); ?>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
