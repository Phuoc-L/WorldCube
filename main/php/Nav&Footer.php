<?php

function specialNavBar() {
    echo '
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="https://phuocle.website/main">SJSU Marketplaces</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div style="width: 100%; white-space: nowrap;" class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="https://phuocle.website/main/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://phuocle.website/main/marketplaces.php">Marketplaces</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://phuocle.website/main/top.php">Top 5</a></li>
                </ul>
            </div>
            <div style="text-align: right; white-space: nowrap;" class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">';
                
    if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
        echo '<b><li class="nav-item nav-link">' . $_SESSION['user'] . '</li></b>';
        echo '<li class="nav-item"><a class="nav-link" href="https://phuocle.website/main/logout.php">Logout</a></li>';
    } else {
        echo '<li class="nav-item"><a class="nav-link" href="https://phuocle.website/main/login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="https://phuocle.website/main/signup.php">Sign up</a></li>';
    }

    echo '
                    
                </ul>
            </div>
        </div>
    </nav>
    ';
}

function specialFooter() {
    echo '
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">SJSU Marketplaces - Website</p></div>
    </footer>
    ';
}


?>