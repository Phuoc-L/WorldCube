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
        <title>World Cube - News</title>
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
                    <h1 class="display-4 fw-bolder">News</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Find Out About Our Latest Updates</p>
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
                                <h5 class="fw-bolder ">Exciting Launch of World Cube</h5>
                                <p class="text-secondaryr">March 3, 2024</p>
                                <!-- Card Description-->
                                <p> 
                                    We are thrilled to announce the official launch of the World Cube website! 
                                    After months of meticulous planning, designing, and crafting, we are delighted 
                                    to unveil our online platform dedicated to elemental cubes and all things related 
                                    to science, education, and innovation. Our website is the culmination of our passion 
                                    for elemental cubes and our commitment to providing exceptional products and services 
                                    to our customers. Here, you will find a comprehensive collection of elemental cubes 
                                    meticulously curated to inspire curiosity, foster learning, and spark creativity.
                                </p>
                                <p>
                                    Designed with user experience in mind, our website offers intuitive navigation, detailed 
                                    product descriptions, and an easy-to-use interface, ensuring that your browsing and shopping 
                                    experience is seamless and enjoyable. Whether you're a seasoned scientist, an enthusiastic 
                                    educator, a curious hobbyist, or simply someone with a love for science and discovery, our 
                                    website has something for everyone. Explore our diverse range of elemental cubes, discover 
                                    fascinating insights into the world of chemistry, and stay updated on the latest news and 
                                    developments in the field.
                                </p>
                                <p>
                                    We invite you to visit our website, browse our collections, and embark on a journey of exploration 
                                    and learning with World Cube. Join us as we revolutionize the way you experience the elements!
                                </p>
                                <p>
                                    Thank you for your support, and we look forward to serving you on our exciting journey ahead.
                                </p>
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
