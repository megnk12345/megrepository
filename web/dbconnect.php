<?php
	date_default_timezone_set('Africa/Lagos');
    // syntax for database connection
    $host     ="localhost";
    $user     ="root";
    $password ="";
    $db       ="advertdb";
    $conn = mysqli_connect($host, $user, $password, $db) or die(mysqli_error($conn));

?>