<?php
session_start();

    include ('../php/functions.php');
    
    login_url_params();
    
    // check if user is logged in
    $loggedIn = check_login();
    if (!$loggedIn) {
        header("Location: ../login.php");
        die;
    }

    // set cookie for visited pages
    addVisitedPage('Aluminum (Al)', 'products/product9.php');

    // if user press the submit button to post a review
    if($_SERVER['REQUEST_METHOD'] == 'POST')
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
            $product = 9;
            $username = $_SESSION['user'];
            $rating = intval($_POST['rating']);
            $review = mysqli_real_escape_string($conn, $_POST['review']);
            $product_name = 'Aluminum (Al)';
            $url = 'https://phuocle.website/products/product9.php';  
            
            // Insert data into the database
            $sql = "INSERT INTO reviews (product, name, rating, review, product_name, url) VALUES ('$product', '$username', '$rating', '$review', '$product_name', '$url')";
            if (mysqli_query($conn, $sql)) {
                // Close connection
                mysqli_close($conn);
                // redirect
                header('Location: product9.php');
                die;
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>World Cube - Aluminum (Al)</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
        <body>
        <?php
            include ('../php/Nav&Footer.php');
        ?>
        <!-- Navigation-->
        <?php specialNavBar(); ?>

        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Aluminum (Al) Cube</h1>
                    <p class="lead fw-normal text-white-50 mb-0">High Quality Cube</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
                    
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../images/Aluminum.png" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Aluminum (Al)</h5>
                                    <!-- Product price-->
                                    $40.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Buy</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="col mb-5">
                        <div class="card h-100" style="width: 900px;">
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-start">
                                    <!-- Card Title-->
                                    <h5 class="fw-bolder">Aluminum (Al) Cube Overview</h5>
                                    <!-- Card Description-->
                                    <b>Description:</b> <br>
                                    Discover the essence of chemistry with our Aluminum (Al) Cube. Crafted 
                                    from high-quality plastic, this cube embodies the simplicity and importance 
                                    of the most abundant element in the universe. Its sleek design and authentic 
                                    representation of Aluminum's atomic structure make it an ideal addition to 
                                    any science enthusiast's collection. Whether for educational purposes or as 
                                    a unique decorative piece, our Aluminum cube is sure to spark curiosity and 
                                    conversation wherever it's displayed. Dive into the world of atoms and molecules 
                                    with this captivating tribute to the building blocks of life. <br><br>
                                    <b>Material:</b> Plastic <br><br>
                                    <b>Dimension:</b> 3x3x3 in
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">

                <h2 class="fw-bolder">Ratings and Reviews</h2>
                <!-- user review form -->
                <div class="col mb-5">
                    <div class="card h-100">
                        <form method = "post">
                            <div class="card-body p-4">
                                <div class="text-left">
                                    <!-- Review form-->
                                    <p><b>Rating</b></p>
                                    <input type="number" min="1" max="5" value="5" name="rating" id="rating" required><br><br>
                                    <p><b>Review</b></p>
                                    <textarea rows="4" cols="135" name="review" id="review" required></textarea>
                                </div>
                            </div>
                            <!-- button actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div> 
                                    <input type="submit" value="submit" name="submit" class="btn btn-outline-dark mt-auto">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- past reviews -->
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
                        $product = 9;
                        $sql = "SELECT * FROM reviews WHERE product = '$product'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                // display each review $row["review_id"]
                                echo '
                                <div class="col mb-5">
                                    <div class="card h-100">
                                        <!-- Product details-->
                                        <div class="card-body p-4">
                                            <div class="text-start">
                                                <!-- Card Title-->
                                                <h5 class="fw-bolder">' . $row["name"] . '</h5>
                                                <!-- Card Description-->
                                                <b>Rating:</b> ' . $row["rating"] . '/5 <br>
                                                ' . $row["review"] . '
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ';
                            }
                        } else {
                            echo "No Reviews Available. Be the first to review this product!";
                        }
                    }
                ?>

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
