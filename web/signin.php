<?php 
include('link.php');

session_start();
include('dbconnect.php');

    $error1='';  $error2=''; $uname=''; $error=''; $error3='';

    if(isset($_POST['login'])){
        $uname=$_POST['uname'];
        $pssw=$_POST['pass'];


        if(empty($uname)){
            $error1="<span class='error'>Username required</span>";
        }
        if(empty($pssw)){
            $error2="<span class='error'>password required</span>";
        }

        else
        {
            $select=mysqli_query($conn, "SELECT * FROM login WHERE username='$uname'") or die(mysqli_error($conn));
            $row=mysqli_num_rows($select);
           
             if($row > 0)
            {
               while( $fetch=mysqli_fetch_array($select))
                {
                
                       $pss=$fetch["password"];
                       $id=$fetch['id'];
                       $usertype=$fetch['usertype'];
                       if($pssw==$pss)
                       {

                            $_SESSION['id']=$id;
                            $_SESSION['usertype']=$usertype;
                            
                           header('location:main.php');
                       }
                       else
                       {
                           $error3="<span class='error'> wrong password</span>";
                       }
                }

            }
           elseif($row==0)
           {
               $error="<span class='error'> user dose not exist </span>";
           }

        }

    }

?>
</head>
<body>
	<!-- Navigation -->
		<?php include('header.php');?>
		<!-- //Navigation -->
	<!-- header -->
	
	<!-- //header -->
	<!-- sign in form -->
	 <section>
		<div id="agileits-sign-in-page" class="sign-in-wrapper">
			<div class="agileinfo_signin">
			<h3>Sign In</h3>
				<form  method="POST">
					 <div class="text-danger">
            <?php echo $error. "". $error3;
            
            //if($error3){echo $error3;} elseif($error){echo $error;}?>
        </div>
					<div class="text-danger">
						<input type="text" name="uname" value="<?php echo $uname;?>" placeholder="Your Username" > 
						 <?php echo $error1;?> 
					</div>
					<div class="text-danger">
						<input type="password" name="pass" placeholder="Password" >
						<?php echo $error2;?>
					</div>
					
					<div>
						<input type="submit" value="Sign In" name="login">
					</div>
										
				</form>
				<h6> Not a Member Yet? <a href="register.php">Sign Up Now</a> </h6>
				<h6> Forgot Your Password? <a href="recoverpassword.php">Reset Here</a> </h6>

				</div>
		</div>
	</section>
	<!-- //sign in form -->
	<!--footer section start-->		
		

        <!--footer section end-->
        <?php include('script.php');?>
</body>
		
</html>