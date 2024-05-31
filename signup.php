<?php

// php code referenced from https://www.youtube.com/watch?v=WYufSGgaCZ8&t=770s
// adapted to use txt files instead of database
session_start();
    include ('php/functions.php');

    // if user press the login button
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
            $username = $_POST['username'];
            $password = $_POST['password'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $homephone = $_POST['homephone'];
            $cellphone = $_POST['cellphone'];

            // Insert data into the database
            $sql = "INSERT INTO users (name, password, first_name, last_name, email, address, home_phone, cell_phone) VALUES ('$username', '$password', '$firstname', '$lastname', '$email', '$address', '$homephone', '$cellphone')";
            if (mysqli_query($conn, $sql)) {
                // Close connection
                mysqli_close($conn);
                // redirect
                header('Location: login.php');
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
        <title>World Cube - Sign up</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <?php include ('php/Nav&Footer.php'); ?>
        <!-- Navigation-->
        <?php specialNavBar(); ?>

        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Sign up</h1>
                    <p class="lead fw-normal text-white-50 mb-0">This is The Sign up Page</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    
                    <div class="col mb-5">
                        <div class="card h-100">
                            <form method = "post">
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-left">
                                        <!-- Card Title-->
                                        <h5 class="fw-bolder text-center">Sign up</h5>
                                        <!-- Card Description-->
                                        Username
                                        <input style="width: 100%;" type="text" name="username" id="username" required placeholder="Username"><br><br>
                                        Password
                                        <input style="width: 100%;" type="password" name="password" id="password" required placeholder="Password"><br><br>
                                        <!-- First Name -->
                                        First Name
                                        <input style="width: 100%;" type="text" name="firstname" id="firstname" required placeholder="First Name"><br><br>
                                        <!-- Last Name -->
                                        Last Name
                                        <input style="width: 100%;" type="text" name="lastname" id="lastname" required placeholder="Last Name"><br><br>
                                        <!-- Email -->
                                        Email
                                        <input style="width: 100%;" type="email" name="email" id="email" required placeholder="example@example.com"><br><br>
                                        <!-- Home Address -->
                                        Home Address
                                        <input style="width: 100%;" type="text" name="address" id="address" required placeholder="Home Address"><br><br>
                                        <!-- Home Phone -->
                                        Home Phone
                                        <input style="width: 100%;" type="tel" name="homephone" id="homephone" required placeholder="123-456-7890"><br><br>
                                        <!-- Cell Phone -->
                                        Cell Phone
                                        <input style="width: 100%;" type="tel" name="cellphone" id="cellphone" required placeholder="123-456-7890"><br><br>
                                    </div>
                                </div>
                                <!-- button actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"> 
                                        <input type="submit" value="Sign up" name="Sign up" class="btn btn-outline-dark mt-auto">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- Footer-->
        <?php footer(); ?>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
