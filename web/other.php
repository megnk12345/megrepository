<?php include('dashlink.php');
		

include('link.php');
include 'dbconnect.php';

$select=mysqli_query($conn, "SELECT * FROM others");
$row=mysqli_num_rows($select);




?>

</head>
<body>	

		<?php include('head.php');?>

	<div class="container-fluid padding">
		<div class="row padding text-center text-dark" style="margin-top:4px; padding-top:2em;">

		<div class="col-12"> 
					<h2 class="">Others</h2>
					
		</div>
		<hr class="">
		</div>
		<div class"row my-4 py-4" style="padding-top:5rem;">
<?php
	if($row>0)
		{
			while ($fetch=mysqli_fetch_assoc($select)) 
		{
			
			
		echo'<div class="col-md-4" style="display:inline-block;">
			<div class="card">
			<a href="comment.php?vid='.$fetch['other_id'].'"><img class="card-img-top" style="height:15rem;" src="uploads/'.$fetch['image'].'"> </a>
			<div class="card-body text-center">
			<h6 class="card-title"> Description:'." ".$fetch['description'].'</h6>
			
			</div>
			</div>
			<div>
			</div>
			</div>';
			
		}
		

	}

	?>



<?php include('dashscript.php');?>
</body>	



<?php include('script.php');?>
</html>