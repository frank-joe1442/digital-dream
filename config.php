<?php
//connect to database
$server = "localhost";
$username = "root";
$password = "";
$database = "projectdb";

$conn = new mysqli($server, $username, $password, $database);

if($conn->connect_error){
 die("error connecting to database" .$conn->connect_error);
}else{
 echo "connection to database succesful";
}


?>