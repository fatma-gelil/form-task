<?php /** @noinspection ALL */
@include 'config.php';
require "views/header.php";
if (isset($_POST['submit'])){
    $email=mysqli_real_escape_string($connect, $_POST['email']);
    $username=mysqli_real_escape_string($connect, $_POST['username']);
    $password=md5($_POST['password']);
    $comfirm_password=md5($_POST['password']);
    $select="SELECT * FROM user_form WHERE email='$email'&& password='$password'";
    $result=mysqli_query($connect,$select);
    if (mysqli_num_rows($result)>0){
        $error[]='user already exisits';
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