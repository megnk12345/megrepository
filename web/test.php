<?php 
include('header.php');
include('dashlink.php');
include 'dbconnect.php';

$select=mysqli_query($conn, "SELECT * FROM cards");
$row=mysqli_num_rows($select);




?>


<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /><!-- style.css -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" /><!-- flexslider-CSS -->
<link rel="stylesheet" href="css/font-awesome.min.css" /><!-- fontawesome-CSS -->
<link rel="stylesheet" href="css/menu_sideslide.css" type="text/css" media="all"><!-- Navigation-CSS -->
<!-- meta tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resale Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />

<!-- //meta tags -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>
<body>	

		<?php ///include('header.php');?>


		<div class="container-fluid">

			
			<?php
	if($row>0)
		{
			while ($fetch=mysqli_fetch_assoc($select)) 
		{
			
			
		echo'
				<div class="col-md-3 offset-1" style="display:inline-block;">
			<div class="card">
			<a href="test.php?vid='.$fetch['card_id'].'" data-toggle="modal" data-target="#viewModal"><img class="card-img-top" style="height:15rem;" src="uploads/'.$fetch['image'].'"></a>
			<div class="card-body text-center">
			<h6 class="card-title"> Description:'." ".$fetch['description'].'</h6>
			
			</div>
			</div>
			<div>
			</div>
			</div>
			
					';
			
		}
		

	}


	?>



</div>

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Card Details</h5>
          <button class="" type="button" data-dismiss="modal" aria-label="Close">
            <span class="btn btn-md btn-danger text-white " aria-hidden="true">X</span>
          </button>
        </div>
        <div class="modal-body">
          	
	<div class="card">
	<img class="card-img-top" src="uploads/<?php echo $im;?>">
	<div class="card-body">
		<h4 class="card-title">Description: <?php echo $id;?> </h4>
		<p class="card-text"> Email: kcsimpleslim@gmail.com</p>
		<p class="card-text"> Phone Number: 07037837788</p>

			<div class="form">
				<form role="form" method="POST" >
					<div class="form-group">
						<textarea placeholder="comment" class="form-control" name="comment"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-success">
						<input type="reset" value="Clear" class="btn btn-secondary">
					</div>

				</form>
			</div>
		
		</div>

			
		</div>


        </div>
        <div class="modal-footer">
         <button class="btn btn-info" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
		</div>

</body>	



<?php
include('dashscript.php');
 include('script.php');?>
</html>