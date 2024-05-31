<?php
session_start();
    include ('php/functions.php');
    login_url_params();

    $loggedIn = check_login();
        if (!$loggedIn) {
            header("Location: login.php");
            die;
        }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SJSU Marketplaces - Top 5</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
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
                    <h1 class="display-4 fw-bolder">Top Five Reviewed Products</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Listing Top Five Most Reviewed Products From Marketplaces</p>
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
                                <h5 class="fw-bolder ">Five Most Reviewed Products From All Marketplaces</h5>
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
                                        $DBresult = mysqli_query($conn, $sql);

                                        // get top 5 reviewed products from Phuc Le API
                                        $result = get_top_five("https://phucle.website/api/topEP.php");
                                        // Loop through each element and add the website name
                                        foreach ($result as &$element) {
                                            $element['website_name'] = 'Live&Love Market (Phuc Le)';
                                        }

                                        // add data from db query to result array
                                        while ($row = mysqli_fetch_assoc($DBresult)) {
                                            $result[] = [
                                                "product_name" => $row["product_name"],
                                                "url" => $row["url"],
                                                "review_count" => $row["review_count"],
                                                "website_name" => 'World Cube (Phuoc Le)'
                                            ];
                                        }

                                        // get top 5 reviewed products from Phuong Ngo API
                                        $Phuongresult = get_top_five("https://cmpe272.phuongngo.net/products/top5products.php");
                                        // Loop through each element and add the website name
                                        foreach ($Phuongresult as &$row) {
                                            $result[] = [
                                                "product_name" => $row["product_name"],
                                                "url" => $row["url"],
                                                "review_count" => $row["review_count"],
                                                "website_name" => 'YOLO Travel (Phuong Ngo)'
                                            ];
                                        }

                                        // get top 5 reviewed products from Vinh Tran API
                                        $Vinhresult = get_top_five("https://vinhtran00.com/top5products.php");
                                        // Loop through each element and add the website name
                                        foreach ($Vinhresult as &$row) {
                                            $result[] = [
                                                "product_name" => $row["product_name"],
                                                "url" => $row["url"],
                                                "review_count" => $row["review_count"],
                                                "website_name" => 'San Quentin Palm Reading (Vinh Tran)'
                                            ];
                                        }

                                        // Extract the review counts into a separate array for sorting
                                        $reviewCounts = array_column($result, 'review_count');
                                        // Sort the array of review counts
                                        array_multisort($reviewCounts, SORT_DESC, $result);
                                        // get only the top 5 reviewed products
                                        $result = array_slice($result, 0, 5);
                                        // output top 5 reviewed product in a list
                                        echo '<ol>';
                                        foreach ($result as $product) {
                                            if ($product["website_name"] == 'San Quentin Palm Reading (Vinh Tran)') {
                                                echo '<li><a href=" ' . $product["url"] . '&username=' . $_SESSION['user'] . '&password=' . $_SESSION['password'] .'"> ' . $product["product_name"] . '</a> (' . $product["review_count"] . ' Reviews) - ' . $product["website_name"] . '</li>';
                                            } else {
                                                echo '<li><a href=" ' . $product["url"] . '?username=' . $_SESSION['user'] . '&password=' . $_SESSION['password'] .'"> ' . $product["product_name"] . '</a> (' . $product["review_count"] . ' Reviews) - ' . $product["website_name"] . '</li>';
                                            }
                                        }
                                        echo '</ol>';
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
