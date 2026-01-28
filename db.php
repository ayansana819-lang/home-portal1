<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "faimly_system";
$conn = new mysqli($server,$user,$password,$dbname);
if(!$conn){
    echo "Error!: {$conn->connect_error}";
}
?>
