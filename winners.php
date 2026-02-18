<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#F1E9D2 ;color:black ; font-size: 17px; font-family:Times ">
<!-- Content Header (Page header) -->
<section class="content-header" style= "color:black ; font-size: 17px; font-family:Times">
<h1>
<i class="fa fa-trophy" style="color: gold;"></i> ELECTION WINNERS
</h1>
<ol class="breadcrumb" style="color:black ; font-size: 17px; font-family:Times">
<li><a href="index.php"><i class="fa fa-dashboard" ></i> Home</a></li>
<li><a href="results.php"><i class="fa fa-bar-chart" ></i> Results</a></li>
<li class="active" style="color:black ; font-size: 17px; font-family:Times" >Winners</li>
</ol>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<?php
$positions_sql = "SELECT * FROM positions ORDER BY priority ASC";
$positions_query = $conn->query($positions_sql);
$position_count = 0;

while($position = $positions_query->fetch_assoc()){
$position_count++;
$winner_sql = "SELECT candidates.id, candidates.firstname, candidates.lastname, candidates.photo, COUNT(votes.id) as vote_count
FROM candidates
LEFT JOIN votes ON votes.candidate_id = candidates.id
WHERE candidates.position_id = ".$position['id']."
GROUP BY candidates.id
ORDER BY vote_count DESC
LIMIT 1";
$winner_query = $conn->query($winner_sql);
$winner = $winner_query->fetch_assoc();

if($winner['firstname']){
$photo_path = '../images/'.$winner['photo'];
if(!file_exists($photo_path) || empty($winner['photo'])){
$photo_path = '../images/default.png';
}

echo "
<div class='box box-success' style='background-color: #c4e8c4; border-top: 2px solid gold; margin-bottom: 30px;'>
<div class='box-header with-border' style='background-color: lightblue; color: black;'>
<h3 class='box-title' style='font-size: 24px; color: black;'><i class='fa fa-trophy'></i> ".$position['description']."</h3>
</div>
<div class='box-body'>
<div class='row'>
<div class='col-md-4 text-center'>
<img src='".$photo_path."' alt='Winner' style='max-width: 150px; border-radius: 10px; border: 3px solid gold;'>
</div>
<div class='col-md-8'>
<h2 style='color:#008000; font-weight: bold;'>".$winner['firstname']." ".$winner['lastname']."</h2>
<h4>Total Votes: <span style='color: #008000; font-size: 28px;'><strong>".$winner['vote_count']."</strong></span></h4>
</div>
</div>
</div>
</div>
";
}
}
?>
</div>
</div>

<div class="row">
<div class="col-md-8 col-md-offset-2">
<a href="results.php" class="btn btn-info"><i class="fa fa-bar-chart"></i> View Full Results</a>
<a href="index.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Dashboard</a>
</div>
</div>
</section>   
</div>

<?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>

<!-- Confetti Animation -->
<script src="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/dist/index.min.js"></script>
<script>
// Trigger confetti animation when page loads
window.addEventListener('load', function() {
const confettiSettings = {
target: 'my-canvas',
max: 200,
size: 2,
animate: true,
props: ['circle', 'square', 'heart','triangle'],
colors: [[165, 104, 246], [230, 61, 135], [0, 199, 228], [253, 214, 112]],
clock: 25,
interval: null,
rotate: true,
start_from_edge: true,
respawn: false
};

const confetti = new ConfettiGenerator(confettiSettings);
confetti.render();
});
</script>
<canvas id="my-canvas" style="
display:block;
position:fixed;
width:100%;
height:100%;
top:0;
left:0;
z-index:9999;
pointer-events:none;
"></canvas>

</body>
</html>
