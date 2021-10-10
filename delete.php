<?php

session_start();
include 'config.php';


$user = $_SESSION['username'];



include 'config.php';

if(isset($_POST["delete"]))
{
    echo "one";
}
else if(isset($_POST["deleteall"]))
{
    $query = "DELETE from task WHERE username = '$user'";

    
    if(mysqli_query($conn , $query))
    {
        header("location:index.php");
    }
    else
    {
        echo "Somethingh went wrong";
    }
}



?>