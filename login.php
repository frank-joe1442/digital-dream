<?php
include "config.php";
include "header.html";
session_start();


if($_SERVER['REQUEST_METHOD']=="POST"){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT id, password FROM users2 WHERE username = ?");
    $stmt-bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows == 1){
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();
        //verify password
         if(password_verify($password, $hashed_password)){
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            header("location: dashboard.php");
         }else{
            echo "invalid password";        
        }
    } else{
        echo "No account found with that username";
     
    }
    $stmt->close();
    $conn->close();
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <style>
*{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body{
            background-image: url(images/background.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 14px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .formcont{
            background: black;
            color: white;
            border: 4px solid green;
            width: 30vw;
            height: 60vh;
            /* margin: auto; */
            margin-left: 500px;
            margin-top: 60px;
            border-radius: 5px;
           
        }

        form{
            display: flex;
            flex-direction: column;
            gap: 50px;
        }

        form input{
            padding: 20px;
            border: none;
            border-radius: 4px;
        }
        p{
            margin-top: 20px;
        }

        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php
include "header.html";
?>
    <div class="formcont">
        <form action="login.php" method="post">
            <input type="text" placeholder="Enter your username" name="username" required>
            <input type="password" placeholder="Enter your password" name="password" required>
            <input type="submit" value="Login">
        </form>
        <p>First time using our website? <span><a href="signup.php">Signup</a></span></p>
    </div>

    <?php
    include "footer.html";
    ?>
</body>
</html>