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
ELECTION RESULTS
<small>Vote Tally</small>
</h1>
<ol class="breadcrumb" style="color:black ; font-size: 17px; font-family:Times">
<li><a href="index.php"><i class="fa fa-dashboard" ></i> Home</a></li>
<li class="active" style="color:black ; font-size: 17px; font-family:Times" >Results</li>
</ol>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-xs-12">
<a href="winners.php" class="btn btn-success btn-lg" style="margin-bottom: 20px;"><i class="fa fa-trophy"></i> View Winners</a>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="box" style="background-color: #d8d1bd">
<div class="box-header with-border" style="background-color: #d8d1bd">
<h3 class="box-title">Vote Count by Position</h3>
</div>
<div class="box-body">
<?php
$sql = "SELECT DISTINCT positions.id, positions.description FROM positions ORDER BY positions.priority ASC";
$positions_query = $conn->query($sql);

while($position = $positions_query->fetch_assoc()){
echo "
<div class='box box-warning' style='margin-top: 20px;'>
<div class='box-header with-border'>
<h4 class='box-title'>".$position['description']."</h4>
</div>
<div class='box-body'>
<table class='table table-striped table-hover'>
<thead>
<tr style='background-color: #c9c3af; color: black;'>
<th>Candidate</th>
<th>Vote Count</th>
<th>Percentage</th>
</tr>
</thead>
<tbody>";

// Get total votes for this position
$total_sql = "SELECT COUNT(*) as total FROM votes WHERE position_id = ".$position['id'];
$total_result = $conn->query($total_sql);
$total_row = $total_result->fetch_assoc();
$total_votes = $total_row['total'];

// Get candidates and their vote counts
$candidates_sql = "SELECT candidates.id, candidates.firstname, candidates.lastname, COUNT(votes.id) as vote_count 
FROM candidates 
LEFT JOIN votes ON votes.candidate_id = candidates.id 
WHERE candidates.position_id = ".$position['id']." 
GROUP BY candidates.id 
ORDER BY vote_count DESC";
$candidates_query = $conn->query($candidates_sql);

while($candidate = $candidates_query->fetch_assoc()){
$percentage = ($total_votes > 0) ? ($candidate['vote_count'] / $total_votes * 100) : 0;
echo "
<tr style='color: black;'>
<td>".$candidate['firstname']." ".$candidate['lastname']."</td>
<td><strong>".$candidate['vote_count']."</strong></td>
<td>
<div class='progress' style='margin-bottom: 0;'>
<div class='progress-bar progress-bar-success' role='progressbar' style='width: ".$percentage."%;'>
".number_format($percentage, 2)."%
</div>
</div>
</td>
</tr>
";
}

echo "
</tbody>
</table>
<p style='color: black;'><strong>Total Votes for this Position: ".$total_votes."</strong></p>
</div>
</div>
";
}
?>
</div>
</div>
</div>
</div>

<!-- Summary Statistics -->
<div class="row" style="margin-top: 30px;">
<div class="col-md-4">
<div class="info-box" style="background-color: #d8d1bd;">
<span class="info-box-icon bg-aqua"><i class="fa fa-check"></i></span>
<div class="info-box-content">
<span class="info-box-text" style="color: black;">Total Votes Cast</span>
<span class="info-box-number" style="color: black;">
<?php
$total_votes_sql = "SELECT COUNT(*) as total FROM votes";
$total_votes_result = $conn->query($total_votes_sql);
$total_votes_row = $total_votes_result->fetch_assoc();
echo $total_votes_row['total'];
?>
</span>
</div>
</div>
</div>
<div class="col-md-4">
<div class="info-box" style="background-color: #d8d1bd;">
<span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
<div class="info-box-content">
<span class="info-box-text" style="color: black;">Total Voters</span>
<span class="info-box-number" style="color: black;">
<?php
$total_voters_sql = "SELECT COUNT(*) as total FROM voters";
$total_voters_result = $conn->query($total_voters_sql);
$total_voters_row = $total_voters_result->fetch_assoc();
echo $total_voters_row['total'];
?>
</span>
</div>
</div>
</div>
<div class="col-md-4">
<div class="info-box" style="background-color: #d8d1bd;">
<span class="info-box-icon bg-yellow"><i class="fa fa-bar-chart"></i></span>
<div class="info-box-content">
<span class="info-box-text" style="color: black;">Voter Turnout</span>
<span class="info-box-number" style="color: black;">
<?php
$turnout_sql = "SELECT COUNT(DISTINCT voters_id) as total FROM votes";
$turnout_result = $conn->query($turnout_sql);
$turnout_row = $turnout_result->fetch_assoc();
$total_voters_sql = "SELECT COUNT(*) as total FROM voters";
$total_voters_result = $conn->query($total_voters_sql);
$total_voters_row = $total_voters_result->fetch_assoc();
$turnout = ($total_voters_row['total'] > 0) ? ($turnout_row['total'] / $total_voters_row['total'] * 100) : 0;
echo number_format($turnout, 2)."%";
?>
</span>
</div>
</div>
</div>
</div>

<div class="row" style="margin-top: 30px;">
<div class="col-xs-12">
<a href="index.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Dashboard</a>
</div>
</div>
</section>   
</div>

<?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
</body>
</html>
