<!DOCTYPE html>
<?php 
session_start();
include("head.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .login-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgba(0, 0, 0, 0.2);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
        body{
			background-image: url(https://c0.wallpaperflare.com/preview/94/952/914/india-pollachi-background-nature.jpg);
			background-size: cover;
		}
		
    </style>
</head>

<body>

    <h1>Railway System Login</h1>
    <div class="login-container">
        <form action="#" method="post">
            <div class="form-group">
                <label for="username">User/Admin:</label>
               <center>
				    <a href="userlogin.php">User</a>
            </div>
            <div class="form-group">
				<center>
					
                <a href="adminlogin.php">Admin</a>
				</center>
			   
            </di>
        </form>
    </div>
</body>
</html>
