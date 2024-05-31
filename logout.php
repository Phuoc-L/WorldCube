<?php

include ('php/functions.php');

session_start();
if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
    session_destroy();
    header('Location: index.php');
    die;
}
else {
    header('Location: index.php');
    die;
}

?>