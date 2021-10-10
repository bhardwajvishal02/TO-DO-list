<?php

session_start();
include 'config.php';
$task = $_GET['task'];



    $query = "DELETE from task WHERE task = '$task'";

    
    if(mysqli_query($conn , $query))
    {
        header("location:index.php");
    }
    else
    {
        echo "Somethingh went wrong";
    }




?>