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
        <title>World Cube - About</title>
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
                    <h1 class="display-4 fw-bolder">About</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Learn More About Us</p>
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
                                <h5 class="fw-bolder">Company Overview</h5>
                                <!-- Card Description-->
                                World Cube is a pioneering provider of elemental cubes, dedicated to revolutionizing 
                                he way people interact with the fundamental building blocks of our universe. Founded 
                                in 2024, we have quickly emerged as a leader in the industry, offering a diverse range 
                                of meticulously crafted elemental cubes that inspire creativity, foster learning, and 
                                ignite curiosity. Our commitment to innovation, quality, and customer satisfaction drives 
                                everything we do, as we strive to make science accessible and engaging for enthusiasts 
                                of all ages and backgrounds.
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
                                <h5 class="fw-bolder">Our Mission</h5>
                                <!-- Card Description-->
                                At World Cube, our mission is to provide innovative and high-quality 
                                elemental cubes that inspire creativity, learning, and exploration. We are 
                                dedicated to offering a diverse range of elemental cubes crafted with precision 
                                and care, catering to the needs of educators, scientists, hobbyists, and 
                                enthusiasts alike. Our commitment to excellence drives us to continuously push 
                                boundaries, foster curiosity, and promote sustainability in every aspect of our 
                                business. Through our products, we aim to spark imagination, facilitate discovery, 
                                and contribute positively to the advancement of science and education worldwide.
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
                                <h5 class="fw-bolder">Our Vision</h5>
                                <!-- Card Description-->
                                At World Cube, our vision is to inspire a lifelong love of learning and discovery 
                                by making science fun, engaging, and accessible to everyone. We envision a world 
                                where people of all ages can explore the wonders of chemistry, physics, and beyond 
                                through hands-on experimentation and interactive experiences. By continuing to 
                                innovate, collaborate, and push the boundaries of what's possible, we aim to spark 
                                curiosity, foster creativity, and empower future generations of scientists, educators, 
                                and innovators to unlock the mysteries of the universe.
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
                                <h5 class="fw-bolder">Our Values</h5>
                                <!-- Card Description-->
                                <p><b>Innovation:</b> We are committed to pushing the boundaries of creativity and technology to develop innovative products and solutions that inspire and delight our customers.</p>
                                
                                <p><b>Quality:</b>  We adhere to the highest standards of craftsmanship and attention to detail, ensuring that every product we create is of exceptional quality and durability.</p>
                                
                                <p><b>Education:</b>  We believe in the transformative power of education and strive to provide valuable learning experiences that promote curiosity, critical thinking, and lifelong learning.</p>
                                
                                <p><b>Community:</b>  We value collaboration, diversity, and inclusivity, fostering a supportive community where individuals from all backgrounds can come together to learn, explore, and grow.</p>
                                
                                <p><b>Integrity:</b>  We conduct our business with honesty, transparency, and integrity, building trust with our customers, partners, and stakeholders through ethical practices and accountability.</p>
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
