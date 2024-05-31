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
        <title>World Cube - Search Users</title>
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
                    <h1 class="display-4 fw-bolder">Search Users</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Search For A User</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                    <!-- Search Users -->
                    <div class="col mb-5">
                        <div class="card h-100">
                            <form method = "get">
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-left">
                                        <!-- Card Title-->
                                        <h5 class="fw-bolder text-center">Search Users</h5>
                                        <!-- Card Description-->
                                        <label for="searchCriteria">Search By:</label>
                                        <select id="searchCriteria" name="criteria">
                                            <option value="name">Username</option>
                                            <option value="email">Email</option>
                                            <option value="cell_phone">Cell Phone</option>
                                        </select>
                                        <label for="searchTerm">Search Term:</label>
                                        <input style="width: 100%;" type="text" id="searchTerm" name="term" required>
                                    </div>
                                </div>
                                <!-- button actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"> 
                                        <input type="submit" value="Search" name="Search" class="btn btn-outline-dark mt-auto">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <?php
            // if user press the search button
            if($_SERVER['REQUEST_METHOD'] == 'GET')
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
                    // Check if both criteria and term are set
                    if (isset($_GET['criteria']) && isset($_GET['term'])) 
                    {
                        $criteria = $_GET['criteria'];
                        $term = $_GET['term'];

                        // Assuming $conn is your MySQL connection object
                        $sql = "SELECT * FROM users WHERE $criteria = '$term'";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0) {
                            // display user found
                            echo '<h5 style="text-align: center;">Users Found</h5>';
                            // Fetching and displaying each user record
                            while ($row = mysqli_fetch_assoc($result)) {

                                echo '<section class="py-5">
                                    <div class="container px-4 px-lg-5 mt-5">
                                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                                            
                                            <div class="col mb-5">
                                                <div class="card h-100">
                                                    <div class="card-body p-4">
                                                        <div class="text-center">
                                                            Username: '. $row['name'] .' <br>
                                                            First Name: '. $row['first_name'] .' <br>
                                                            Last Name: '. $row['last_name'] .' <br>
                                                            Email: '. $row['email'] .' <br>
                                                            Address: '. $row['address'] .' <br>
                                                            Home Phone: '. $row['home_phone'] .' <br>
                                                            Cell Phone: '. $row['cell_phone'] .' <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                        
                                        </div>
                                    </div>
                                </section>';
                            }
                            
                            // Close connection
                            mysqli_close($conn);
                        } else {
                            echo '<h5 style="text-align: center;">No Users Found</h5>';
                        }
                    }
                }
            }
        ?>

        <!-- Footer-->
        <special-footer></special-footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Core theme JS-->
        <?php specialFooter(); ?>
    </body>
</html>
