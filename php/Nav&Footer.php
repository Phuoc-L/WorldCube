<?php

function specialNavBar() {
    $loggedIn = "";
    $account = '<li class="nav-item"><a class="nav-link" href="https://phuocle.website/login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="https://phuocle.website/signup.php">Sign up</a></li>';

    // Check if the user is logged in
    if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
        // if logged in set the session string for links
        $loggedIn = '?username=' . $_SESSION['user'] . '&password=' . $_SESSION['password'];
        $account = '<b><li class="nav-item nav-link">' . $_SESSION['user'] . '</li></b>
                    <li class="nav-item"><a class="nav-link" href="https://phuocle.website/logout.php">Logout</a></li>';
    }

    echo '
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="https://phuocle.website/index.php">World Cube</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div style="width: 100%; white-space: nowrap;" class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="https://phuocle.website/main' . $loggedIn .'">Main</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://phuocle.website/news.php">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://phuocle.website/about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://phuocle.website/contact.php">Contacts</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://phuocle.website/fivevisitedpage.php">Top 5</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://phuocle.website/listusers.php">List Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://phuocle.website/searchuser.php">Search Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://phuocle.website/product.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://phuocle.website/secure.php">Secure</a></li>
                </ul>
            </div>
            <div style="text-align: right; white-space: nowrap;" class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">' 
                    . $account . '
                </ul>
            </div>
        </div>
    </nav>
    ';
}

function specialFooter() {
    echo '
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Phuoc Le - World Cube Website</p></div>
    </footer>
    ';
}


?>