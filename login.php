<?php
session_start();
$username = $_GET['username'];
$pass = $_GET['password'];

$_SESSION['username'] = $username;

?>


<?php
include 'config.php';


$username = $_GET['username'];
$pass = $_GET['password'];

$query = "select * from user WHERE username = '$username' and password ='$pass' ";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) >0 )
{
    header("location: index.php");
}
else
{
    echo 'error';
}


?>