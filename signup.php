<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // SOMTHING  WAS POSTED
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $cn_password = $_POST['cn_password'];

    if (!empty($user_name) && !empty($password) && !empty($user_name) && !empty($cn_password) && !is_numeric($user_name)) {

        if ($cn_password != $password || $password != $cn_password) {
            echo "Please Re-assign the password and Confirm Password!!";
         ?> <br><a href = "signup.php">Goto Sign Up Again!!!</a><?php
        }else{
        //save to database
        $user_id = random_num(20);
        $query = "insert into users(user_id, user_name, password) values('$user_id', '$user_name', '$password')";
        mysqli_query($con, $query);

        header("Location: login.php");
        } 
    }else {
        echo "Please Enter Valid Credentials...!";
        ?><br><a href = "signup.php">Goto Sign Up Again!!!</a><?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Signup</title>
</head>

<body>
    <style type="text/css">
        #text {
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
        }

        #button {
            padding: 10px;
            width: 100px;
            color: white;
            background-color: lightblue;
            border: none;
        }

        #box {
            background-color: pink;
            margin: auto;
            width: 300px;
            padding: 20px;
        }
    </style>

    <div id="box">
        <form method="post">
            <div style="font-size: 20px; margin: 10px">Signup -></div>
            Username : <input id="text" type="text" name="user_name"><br><br>
            Password : <input id="text" type="password" name="password"><br><br>
            Confirm Password : <input id="text" type="cn_password" name="cn_password"><br><br>
            <input type="submit" value="Signup"><br><br>
            <a href="login.php">Click to Login</a><br><br>
        </form>
    </div>

</body>

</html>