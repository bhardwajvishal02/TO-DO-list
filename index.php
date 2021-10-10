<?php
session_start();

if(!$_SESSION['username'])
{
    header("location:login.html");
}

$user = $_SESSION['username'];

include 'config.php';

$sql = "select task from task where username = '$user'";
$result = $conn->query($sql);
$resultcheck = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO-DO list</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>




    <div class="navbar">
       <h1>THIS IS YOUR TO-DO LIST</h1> 
       <form action="logout.php">
       <input class="logout" type="submit" value="logout">
       </form>
        <br>
        <hr color="#D9CAB3">
    </div>


    <div class="container">
        
        <div class="new-task">
            <form class="list" action="newtask.php" method="get">
                <input class="enter-task" type="text" placeholder="Enter a new task" name="task">
                <input class="submit-task" type="submit" value="Enter">
            </form>
        </div>
        <hr color="#D9CAB3">


<!-- PHP CODE TO DISPLAY THE TASK -->
        <?php 
            if($resultcheck>0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    $_SESSION['task'] = $row['task'];
                    ?>
                    <div class="task">
            <!-- <form class="list" method="GET"> -->
                <h1><?php 
                echo $row['task']; ?></h1>
                <a style="color:#F6F6F6; text-decoration:none; border: 3px solid #D9CAB3;" href="delete-process.php?task=<?php echo $row["task"]; ?>">Delete</a>
                <!-- <a href="delete.php?task=$row['task']" name="delete" class=".link"><button class="submit" type="submit" name="delete"> Delete</button></a> -->
                <!-- <input class="submit" type="submit" value="Delete" name="delete"> -->
            <!-- </form> -->
                    <?php
                }
            }
        ?>
        

           


        </div>
        <hr color="#D9CAB3">
        <div class="count">
            <form class="list" action="delete.php" method="POST">
                <h1>You have <?php echo $resultcheck;?> pending task</h1>
                <input class="submit" type="submit" value="Clear All" name=deleteall>
            </form>
        </div>
    </div>
</body>
</html>