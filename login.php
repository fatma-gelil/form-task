<?php /** @noinspection ALL */
@include 'config.php';
session_start();
require "views/header.php";
if (isset($_POST['submit'])){


    $email=mysqli_real_escape_string($connect, $_POST['email']);
    $password=md5($_POST['password']);


    $select="SELECT * FROM user_form WHERE email='$email'&& password='$password'";
    $result=mysqli_query($connect,$select);
    if (mysqli_num_rows($result)>0){
       $row=mysqli_fetch_array($result);
}else{
        $error[]="incorrect email or password";
    }

?>

<html lang="">
<head>
    <title>Login</title>
</head>
<body>

<form method="post" action="Home.php">
    <h2>Login</h2>
    <?php
    if (isset($error)){
        foreach ($error as $error){
            echo '<span class="error-msg" >.$error.</span>';
        }
    }
}

    ?>
    <label>Email</label>
    <label>
        <input type="email" name="email" placeholder="example@email.com">
    </label>
    <label>Password</label>
    <label>
        <input type="password" name="password" placeholder="Password">
    </label>
    <button type="submit">Login</button>
</form>

</body>
</html>


