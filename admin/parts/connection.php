<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'dev-magazin-facultate');
/* connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if($mysqli === false){
 die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("../homepage_admin.php");
    exit;
}

?>
