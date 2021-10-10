<?php
session_start();
$user = $_SESSION['username'];


include 'config.php';

$task = $_GET['task'];

$query = "insert into task (username, task) values('$user','$task')";

$sql = mysqli_query($conn,$query);

if($sql)
{
    header("location:index.php");
}
else
{
    echo 'Somethingh went wrong';
}


?>