<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>form</title>
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
            border: 2px gray;
            width: 40vw;
            height: 70vh;
            margin: auto;
            /* margin-right: 30px; */
            margin-top: 50px;
            border-radius: 5px;
           
        }

        form{
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        #submit{
            margin-top: 20px;
            cursor: pointer;
        }

        /* .error{
            color:red;
        } */

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
<?php
include "header.html";
?>
<body>

   <?php
include 'config.php';


session_start();

   
   $usernameErr = $emailErr = $passwordErr = "";
   $username = $email = $password = "";

   if($_SERVER["REQUEST_METHOD"] == "POST"){
if(empty($_POST["username"])){ 
    $usernameErr = "username is required";
}else{
$username = test_input($_POST["username"]);
// to check if the username contains only letters and white space
// if(!preg_match("/^[a-zA-Z-' ]*$\,$username")){
//     $usernameErr = "Username must contain only letters and white space";
// }
}

if(empty($_POST["email"])){
    $emailErr = "Email is required";
}else{
    $email = test_input($_POST["email"]);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailErr = "invalid email format";
    }
}

if(empty($_POST["password"])){
    $passwordErr = "password is empty";
}else{
    $password = test_input($_POST["password"]);
}
   }

   function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
   }

   $stmt = $conn->prepare("SELECT id FROM users2 WHERE username = ? OR email = ?");
   $stmt->bind_param("ss", $username, $email);
   $stmt->execute();
   $stmt->store_result();
   if($stmt->num_rows >0){
    echo "username or email already exist";
   }else{
    //hash password and save the user
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt->prepare("INSERT INTO users2 (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $username, $email, $hashed_password);
    if($stmt->execute()){
        echo "Registration succesful";
         header("location: login.php");
    }else{
        echo "Something went wrong";
    }
   }
   $stmt->close();
   $conn->close();


   
   ?> 
    <div class="formcont">
   <form action="" method="post">
    <label for="username">Username</label>
        <input type="text" placeholder="Enter your username" name="username" id="username"> 
        <!-- <span class="error">* <?php echo $usernameErr?></span> -->

        <label for="email">Email</label>
        <input type="email" placeholder="Enter your email" name="email" id="email">
        <!-- <span class="error">* <?php echo $emailErr?></span> -->

        <label for="password">Password</label>
        <input type="password" placeholder="Enter your password" name="password" id="password">
        <!-- <span class="error">* <?php echo $passwordErr?></span> -->

        <label for="password">Confirm password</label>
        <input type="password" placeholder="Confirm password"  name="password" id="password">
        <input type="submit" value="submit" id="submit">
    </form> 
    <p>Already have an account? <span><a href="login.php">Login</a></span></p>
</div>




<?php
include "footer.html";
?>
   
</body>
</html>