<?php /** @noinspection ALL */
@include 'config.php';
session_start();
require "views/header.php";
if (isset($_POST['submit'])){

    $username=mysqli_real_escape_string($connect, $_POST['username']);
    $email=mysqli_real_escape_string($connect, $_POST['email']);
    $password=md5($_POST['password']);
    $comfirm_password=md5($_POST['password']);

    $select="SELECT * FROM user_form WHERE email='$email'&& password='$password'";
    $result=mysqli_query($connect,$select);
    if (mysqli_num_rows($result)>0){
        $error[]='user already exisits';
    }elseif ($password != $comfirm_password){
        $error[]='password not matched';
    }else{
        $insert="INSERT INTO user_form(name, email ,password ) VALUES ('$username','$email','$password')";
        mysqli_query($connect,$insert);
        header('location:login.php');
    }
}

?>
<body>

<form method="post" action="Home.php">
    <h2>Sign Up</h2>
    <?php
    if (isset($error)){
        foreach ($error as $error){
            echo '<span class="error-msg" >.$error.</span>';
        };
    };
    ?>

    <label>Email</label>
    <label>
        <input type="email" name="email" placeholder="example@email.com">
    </label>
    <label>User Name</label>
    <label>
        <input type="text" name="username" placeholder="Username">
    </label>
    <label>Password</label>
    <label>
        <input type="password" name="password" placeholder="Password">
    </label> <label>
        <input type="password" name="repassword" placeholder="comfirm Password">
    </label>
    <label id="kod">Already have an account? <a href="login.php">Login</a></label>
    <button type="submit" name="submit">Sign Up</button>

</form>
</body>