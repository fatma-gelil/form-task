<?php

require "views/header.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = 'Please fill in all fields';
    } else {
        // Your authentication logic here
        // valid input
        echo "valid input";
    }
}
?>
<html>
<head>
    <title>Login</title>
</head>
<body>

<form method="post" action="Home.php">
    <h2>Login</h2>
    <?php if($_GET['error']) {?>
        <p class="error"><?php echo $_GET['error'];?></p>
    <?php } ?>
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


