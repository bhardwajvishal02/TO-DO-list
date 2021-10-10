<?php
include 'config.php';

$name = $_GET["name"];
$user = $_GET["user"];
$password = $_GET["password"];



$sql = "INSERT INTO user (name,username,password) values ('$name','$user','$password')";

$queryy = mysqli_query($conn,$sql);

if($queryy)
{
    echo "sign up succesful";
}

?>