<?php
include 'connect.php';
include 'header.php';

session_destroy();

echo 'You have been logged out. <a href="signin.php"> Sign In Again</a>';

include 'footer.php';


?>
