<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Online Voting System - Modern & Secure</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap">

<style>
* {
margin: 0;
padding: 0;
box-sizing: border-box;
}

body {
font-family: 'Montserrat', sans-serif;
line-height: 1.6;
color: #333;
}

/* Navigation */
.navbar-custom {
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
box-shadow: 0 2px 10px rgba(0,0,0,0.1);
padding: 15px 0;
}

.navbar-custom .navbar-brand {
font-size: 26px;
font-weight: 700;
color: #fff !important;
letter-spacing: 1px;
}

.navbar-custom .navbar-nav > li > a {
color: rgba(255,255,255,0.9) !important;
font-weight: 500;
transition: all 0.3s ease;
}

.navbar-custom .navbar-nav > li > a:hover {
color: #fff !important;
transform: translateY(-2px);
}

/* Hero Section */
.hero {
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
color: white;
padding: 100px 0;
text-align: center;
position: relative;
overflow: hidden;
}

.hero::before {
content: '';
position: absolute;
top: 0;
left: 0;
right: 0;
bottom: 0;
background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
pointer-events: none;
}

.hero-content {
position: relative;
z-index: 1;
}

.hero h1 {
font-size: 56px;
font-weight: 700;
margin-bottom: 20px;
text-shadow: 0 2px 4px rgba(0,0,0,0.1);
animation: slideInDown 0.8s ease;
}

.hero p {
font-size: 20px;
margin-bottom: 40px;
opacity: 0.95;
animation: slideInUp 0.8s ease 0.2s both;
}

.btn-hero {
margin: 10px;
padding: 14px 40px;
font-size: 16px;
font-weight: 600;
border-radius: 50px;
transition: all 0.3s ease;
border: 2px solid white;
}

.btn-voter {
background: white;
color: #667eea;
}

.btn-voter:hover {
background: transparent;
color: white;
transform: translateY(-3px);
box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

.btn-admin {
background: transparent;
color: white;
}

.btn-admin:hover {
background: white;
color: #667eea;
transform: translateY(-3px);
box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

/* Features Section */
.features {
padding: 80px 0;
background: #f8f9fa;
}

.features h2 {
font-size: 42px;
font-weight: 700;
margin-bottom: 60px;
text-align: center;
color: #2c3e50;
}

.feature-card {
text-align: center;
padding: 40px 20px;
border-radius: 10px;
background: white;
margin-bottom: 30px;
transition: all 0.3s ease;
box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.feature-card:hover {
transform: translateY(-10px);
box-shadow: 0 10px 25px rgba(102, 126, 234, 0.2);
}

.feature-icon {
font-size: 48px;
color: #667eea;
margin-bottom: 20px;
display: inline-block;
}

.feature-card h4 {
font-size: 20px;
font-weight: 600;
margin-bottom: 15px;
color: #2c3e50;
}

.feature-card p {
color: #666;
line-height: 1.8;
font-size: 14px;
}

/* About Section */
.about {
padding: 80px 0;
background: white;
}

.about h2 {
font-size: 42px;
font-weight: 700;
margin-bottom: 40px;
color: #2c3e50;
}

.about-content {
font-size: 16px;
line-height: 1.8;
color: #555;
margin-bottom: 20px;
}

.about-list {
list-style: none;
padding: 0;
margin: 30px 0;
}

.about-list li {
padding: 12px 0;
padding-left: 35px;
position: relative;
color: #555;
font-size: 16px;
}

.about-list li:before {
content: '\f058';
font-family: 'FontAwesome';
position: absolute;
left: 0;
color: #667eea;
font-weight: bold;
}

/* Stats Section */
.stats {
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
color: white;
padding: 60px 0;
}

.stat-item {
text-align: center;
margin-bottom: 30px;
}

.stat-number {
font-size: 48px;
font-weight: 700;
display: block;
margin-bottom: 10px;
}

.stat-label {
font-size: 18px;
opacity: 0.95;
font-weight: 500;
}

/* How It Works Section */
.how-it-works {
padding: 80px 0;
background: #f8f9fa;
}

.how-it-works h2 {
font-size: 42px;
font-weight: 700;
margin-bottom: 60px;
text-align: center;
color: #2c3e50;
}

.step {
background: white;
padding: 40px 30px;
border-radius: 10px;
text-align: center;
margin-bottom: 30px;
box-shadow: 0 2px 8px rgba(0,0,0,0.08);
position: relative;
}

.step-number {
display: inline-block;
width: 50px;
height: 50px;
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
color: white;
border-radius: 50%;
line-height: 50px;
font-size: 24px;
font-weight: bold;
margin-bottom: 20px;
}

.step h4 {
font-size: 20px;
font-weight: 600;
margin-bottom: 15px;
color: #2c3e50;
}

.step p {
color: #666;
font-size: 14px;
line-height: 1.8;
}

/* CTA Section */
.cta {
padding: 80px 0;
background: white;
text-align: center;
}

.cta h2 {
font-size: 42px;
font-weight: 700;
margin-bottom: 20px;
color: #2c3e50;
}

.cta p {
font-size: 18px;
color: #666;
margin-bottom: 40px;
}

.btn-cta {
padding: 14px 50px;
font-size: 16px;
font-weight: 600;
border-radius: 50px;
margin: 10px;
transition: all 0.3s ease;
}

.btn-cta-primary {
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
color: white;
border: none;
}

.btn-cta-primary:hover {
transform: translateY(-3px);
box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
color: white;
text-decoration: none;
}


/* Footer */
footer {
background: #2c3e50;
color: white;
padding: 40px 0;
text-align: center;
margin-top: 60px;
}

footer p {
margin: 0;
opacity: 0.9;
}

/* Animations */
@keyframes slideInDown {
from {
opacity: 0;
transform: translateY(-30px);
}
to {
opacity: 1;
transform: translateY(0);
}
}

@keyframes slideInUp {
from {
opacity: 0;
transform: translateY(30px);
}
to {
opacity: 1;
transform: translateY(0);
}
}

@keyframes fadeIn {
from {
opacity: 0;
}
to {
opacity: 1;
}
}

/* Responsive */
@media (max-width: 768px) {
.hero h1 {
font-size: 36px;
}

.hero p {
font-size: 16px;
}

.features h2,
.about h2,
.cta h2 {
font-size: 32px;
}

.btn-hero,
.btn-cta {
display: block;
margin: 10px auto;
width: 90%;
}

.stat-number {
font-size: 36px;
}
}
</style>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-custom">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="landing.php">
<i class="fa fa-check-circle"></i> VoteHub
</a>
</div>
<div class="collapse navbar-collapse" id="navbar-collapse">
</div>
</div>
</nav>

<!-- Hero Section -->
<section class="hero">
<div class="hero-content">
<div class="container">
<h1>Welcome to VoteHub</h1>
<p>Modern, Secure & Transparent Online Voting System</p>
<div style="margin-top: 40px;">
<a href="index.php?voter_login=1" class="btn btn-hero btn-voter">
<i class="fa fa-user"></i> Voter Login
</a>
<a href="admin/index.php" class="btn btn-hero btn-admin">
<i class="fa fa-lock"></i> Admin Access
</a>
</div>
</div>
</div>
</section>

<!-- About Section -->
<section class="about">
<div class="container">
<div class="row">
<div class="col-md-6">
<h2>About VoteHub</h2>
<p class="about-content">
VoteHub is a modern, cutting-edge online voting system designed to revolutionize the way organizations conduct elections and voting events. Whether you're managing a corporate election, student government, or community voting, VoteHub provides a robust and secure platform.
</p>
<p class="about-content">
Our system combines state-of-the-art technology with user-centric design to deliver a voting experience that is both secure and accessible to all.
</p>
</div>
<div class="col-md-6">
<h2 style="color: transparent; font-size: 0;">.</h2>
<ul class="about-list">
<li><strong>End-to-End Encryption:</strong> All data is encrypted during transmission and storage</li>
<li><strong>Audit Trail:</strong> Complete logging of all voting activities for verification</li>
<li><strong>Vote Verification:</strong> Voters can verify their votes were recorded correctly</li>
<li><strong>Real-Time Monitoring:</strong> Administrators can track voting progress in real-time</li>
<li><strong>Scalable Infrastructure:</strong> Handles any number of voters without performance issues</li>
</ul>
</div>
</div>
</div>
</section>

<!-- Footer -->
<footer>
<div class="container">
<p>&copy; 2026 VoteHub - Online Voting System. All rights reserved.</p>
<p style="margin-top: 10px; font-size: 12px;">Secure • Transparent • Reliable</p>
</div>
</footer>

<!-- jQuery -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
