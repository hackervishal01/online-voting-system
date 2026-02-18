<?php
session_start();

// If user is clicking voter login from admin panel, clear admin session
if(isset($_GET['voter_login'])){
unset($_SESSION['admin']);
}

if(isset($_SESSION['admin']) && !isset($_GET['voter_login'])){
header('location: admin/home.php');
}

if(isset($_SESSION['voter'])){
header('location: home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Voter Login - VoteHub</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap">

<style>
* {
margin: 0;
padding: 0;
box-sizing: border-box;
}

body {
font-family: 'Poppins', sans-serif;
background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #7aa8da 100%);
min-height: 100vh;
display: flex;
align-items: center;
justify-content: center;
padding: 20px;
}

.login-wrapper {
width: 100%;
max-width: 360px;
}

.login-card {
background: white;
border-radius: 20px;
box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
overflow: hidden;
animation: slideUp 0.6s ease;
}

@keyframes slideUp {
from {
opacity: 0;
transform: translateY(30px);
}
to {
opacity: 1;
transform: translateY(0);
}
}

.login-header {
background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
color: white;
padding: 35px 25px 30px;
text-align: center;
position: relative;
overflow: hidden;
}

.login-header::before {
content: '';
position: absolute;
top: -50%;
right: -10%;
width: 300px;
height: 300px;
background: rgba(255, 255, 255, 0.1);
border-radius: 50%;
}

.login-header h2 {
font-size: 26px;
font-weight: 700;
margin-bottom: 6px;
position: relative;
z-index: 1;
}

.login-header p {
font-size: 12px;
opacity: 0.95;
position: relative;
z-index: 1;
font-weight: 400;
}

.login-icon {
font-size: 48px;
margin-bottom: 15px;
position: relative;
z-index: 1;
display: inline-block;
}

.login-body {
padding: 35px 28px;
}

.form-group {
margin-bottom: 22px;
}

.form-group label {
font-weight: 600;
color: #1e3c72;
margin-bottom: 8px;
display: block;
font-size: 13px;
text-transform: uppercase;
letter-spacing: 0.5px;
}

.form-control {
border: 2px solid #e0e0e0;
border-radius: 10px;
padding: 12px 15px;
font-size: 14px;
font-family: 'Poppins', sans-serif;
background: #f8f9fa;
transition: all 0.3s ease;
}

.form-control:focus {
border-color: #2a5298;
background: white;
box-shadow: 0 0 0 4px rgba(42, 82, 152, 0.1);
outline: none;
}

.form-control::placeholder {
color: #999;
}

.btn-login {
width: 100%;
padding: 13px 0;
background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
color: white;
border: none;
border-radius: 10px;
font-family: 'Poppins', sans-serif;
font-size: 15px;
font-weight: 600;
cursor: pointer;
transition: all 0.3s ease;
margin-top: 15px;
box-shadow: 0 4px 15px rgba(42, 82, 152, 0.3);
}

.btn-login:hover {
transform: translateY(-2px);
box-shadow: 0 8px 25px rgba(42, 82, 152, 0.4);
color: white;
}

.btn-login:active {
transform: translateY(0);
}

.login-footer {
padding: 18px 28px;
border-top: 1px solid #f0f0f0;
background: #fafafa;
text-align: center;
}

.login-footer p {
color: #666;
font-size: 13px;
margin-bottom: 12px;
}

.btn-switch {
width: 100%;
padding: 11px 20px;
background: white;
color: #2a5298;
border: 2px solid #2a5298;
border-radius: 10px;
font-family: 'Poppins', sans-serif;
font-size: 13px;
font-weight: 600;
cursor: pointer;
transition: all 0.3s ease;
text-decoration: none;
display: inline-block;
}

.btn-switch:hover {
background: #2a5298;
color: white;
text-decoration: none;
transform: translateY(-2px);
}

.error-message {
background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
color: white;
padding: 14px 16px;
border-radius: 10px;
margin-bottom: 20px;
font-size: 13px;
animation: slideInDown 0.4s ease;
border-left: 4px solid #ff5252;
}

@keyframes slideInDown {
from {
opacity: 0;
transform: translateY(-15px);
}
to {
opacity: 1;
transform: translateY(0);
}
}

@media (max-width: 480px) {
.login-header {
padding: 40px 25px 30px;
}

.login-header h2 {
font-size: 26px;
}

.login-body {
padding: 35px 25px;
}

.login-footer {
padding: 20px 25px;
}

.login-icon {
font-size: 40px;
}
}
</style>
</head>
<body>
<div class="login-wrapper">
<div class="login-card">
<div class="login-header">
<div class="login-icon">
<i class="fa fa-check-circle"></i>
</div>
<h2>VoteHub</h2>
<p>Voter Authentication Portal</p>
</div>

<div class="login-body">
<?php
if(isset($_SESSION['error'])){
echo '<div class="error-message">
<i class="fa fa-exclamation-circle"></i> '.$_SESSION['error'].'
</div>';
unset($_SESSION['error']);
}
?>

<form action="login.php" method="POST">
<div class="form-group">
<label for="voter">
<i class="fa fa-id-card"></i> Voter ID
</label>
<input type="text" id="voter" class="form-control" name="voter" placeholder="Enter your voter ID" required>
</div>

<div class="form-group">
<label for="password">
<i class="fa fa-lock"></i> Password
</label>
<input type="password" id="password" class="form-control" name="password" placeholder="Enter your password" required>
</div>

<button type="submit" class="btn-login" name="login">
<i class="fa fa-sign-in"></i> Sign In to Vote
</button>
</form>
</div>

<div class="login-footer">
<p>Are you an administrator?</p>
<a href="admin/index.php" class="btn-switch">
<i class="fa fa-lock"></i> Admin Access
</a>
</div>
</div>
</div>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<?php include 'includes/scripts.php' ?>
</body>
</html>