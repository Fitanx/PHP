<?php 
    session_start();
    include('server.php'); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register System</title>
        <style>
body {
	background: #836953;
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
	flex-direction: column;
}
label {
	color: #888;
	font-size: 18px;
	padding: 10px;
}

form {
	width: 500px;
	border: 2px solid #ccc;
	padding: 30px;
	background: #fff;
	border-radius: 15px;
}
input {
	display: block;
	border: 2px solid #ccc;
	width: 95%;
	padding: 10px;
	margin: 10px auto;
	border-radius: 5px;
}
button {
	float: left;
	background: #555;
	padding: 10px 15px;
	color: #fff;
	border-radius: 5px;
	margin-right: 10px;
	border: none;
}
button:hover{
	opacity: .7;
}
    </style>

    </head>
    <body>
        <h1>Register</h1>
        <form action="register_db.php" method="post">
            <?php include('errors.php'); ?>
            <?php if(isset($_SESSION['error'])):?>
            <h3>
            <?php 
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            ?>
            </h3>
            <?php endif ?>
            <label for="username">Username</label>
            <input type="text" name="username">
            <label for="email">Email</label>
            <input type="text" name="email">
            <label for="password_1">Password</label>
            <input type="password" name="password_1">
            <label for="password_2">Confirm Password</label>
            <input type="password" name="password_2">
            <button type="submit" name="reg_user" class="btn" >Register</button>
            <p>Already a member? <a href="login.php">Sign in</a></p>
        </form>
    </body>
</html>