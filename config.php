<?php 

$server = "localhost";
$dbuser = "root";
$dbpass = "";
$database = "upfetch";

$conn = mysqli_connect($server, $dbuser, $dbpass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

$base_url = "https://attachment.kheloalchemists.tk/"; // Website url
