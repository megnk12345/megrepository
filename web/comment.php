
<?php include('dashlink.php');
		
include 'dbconnect.php';

//include('link.php');


	if(isset($_GET['vid'])) 
	{

		$id=$_GET['vid'];

	$select=mysqli_query($conn, "SELECT * FROM cards WHERE card_id='$id'");
	$row=mysqli_num_rows($select);
if($row>0)

{
	$fetch=mysqli_fetch_array($select);
	$image=$fetch['image'];
	$designer_id=$fetch['designer_id'];
	$des=$fetch['description'];

}



function comment($conn, $id)
{
		$sel=mysqli_query($conn, "SELECT * FROM comments WHERE design_id='$id'");
		$num_row=mysqli_num_rows($sel);

		if($num_row > 0)
		{
			while ($each=mysqli_fetch_assoc($sel)) 
			{
				$display='
					<div class="">
					<p class="text text-dark"> '.$each['name'].' :'.$each['comment'].'</p>
					<p class="text text-danger" style="float:right;"> '.$each['add_date'].'</p>

					</div>


				';
				
			}
				return $display;
			
		}
}



}

$get="SELECT * FROM login WHERE id ='$designer_id'";
$query=mysqli_query($conn, $get);
$num=mysqli_num_rows($query);

if ($num>0) 
{
	$retrieve=mysqli_fetch_array($query);
	
	$email=$retrieve['email'];
	$phone=$retrieve['phone'];
}



if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$comment=$_POST['comment'];

		if(empty($name))
		{
			$name="Anonymous";
		}

		if(empty($comment))
		{
			$error="No comment";
		}
else{

		$query="INSERT INTO comments (design_id, name, comment) VALUES('$id', '$name', '$comment')";

		$insert=mysqli_query($conn,$query);

		if ($insert==true) 
		{
			$comment=''; $name='';
		}

}

}

?>
</heed>
<body>



<div class="container-fluid">
	
	<div class="row">
		<div class="col-6 offset-2">
	<div class="card">

	<img class="card-img-top"  src="uploads/<?php echo $image;?>" style="">
	<div class="card-body text-center">
		<h4 class="card-title">Description: <?php echo $des;?> </h4>
		<h5 class="lead"> Designer Contact Details</h5>
		<p class="card-text"> Email: <?php echo $email;?></p>
		<p class="card-text"> Phone Number: <?php echo $phone;?></p>

			<div class="form">
				<form role="form" method="POST">
					<div class="form-group">
						<input type="text" name="name" class="form-control">
						
					</div>
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
	<div class="col-4">
		<div class="card">
			<div class="card-header bg-dark text-center text-white">Comments</div>
			<div class="card-body bg-light">
				<?php echo comment($conn, $id); ?>

			</div>

		</div>

	</div>
	</div>
</div>




<?php include('dashscript.php');
 //include('script.php');?>
</body>


<script type="text/javascript">
	

		function comment($conn)

</script>
</html>