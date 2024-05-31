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
        <title>World Cube - Contacts</title>
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
                    <h1 class="display-4 fw-bolder">Contacts</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Get In Contact With Our Representatives</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                    <?php // reading in contacts from text file
                        $filename = 'text/contacts.txt';
                        // Check if the file exists
                        if (file_exists($filename)) {
                            // Read the file line by line
                            $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                            // Loop through each line
                            foreach ($lines as $line) {
                                // Split the line by comma
                                $parts = explode(',', $line);
                                // Trim any whitespace from each part
                                $parts = array_map('trim', $parts);
                                // Display the contact information with CSS styling
                                echo "
                                <div class='col mb-5'>
                                    <div class='card h-100'>
                                        <!-- Profile image-->
                                        <img class='card-img-top' src='https://dummyimage.com/450x300/dee2e6/6c757d.jpg' alt='...' />
                                        <!-- Profile details-->
                                        <div class='card-body p-4'>
                                            <div class='text-center'>
                                                <!-- Person name-->
                                                <h5 class='fw-bolder'>{$parts[0]}</h5>
                                                <!-- Person Email-->
                                                <p>{$parts[1]}</p>
                                                <!-- Person Phone Number-->
                                                <p>{$parts[2]}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                            }
                        } else {
                            echo "Contact information not available.";
                        }
                    ?>

                </div>
            </div>
        </section>
        <!-- Footer-->
        <?php specialFooter(); ?>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
