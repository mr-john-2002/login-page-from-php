<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'user1234';

$con = mysqli_connect($server, $username, $password, $database);
if ($con){
    // echo 'success';
}
else{
    die("Error". mysqli_connect_error());
}


?>