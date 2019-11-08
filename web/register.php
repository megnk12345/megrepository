<?php include('link.php');

session_start();
include('dbconnect.php');
    //
    $uname=''; $utype=''; $password=''; $email=''; $phone=''; $sname=''; $othername=''; 

    $error1=''; $error2=''; $error3=''; $error4=''; $error5=''; $error6=''; $error7=''; $error8=''; $error9='';
    if(isset($_POST['submit']))
    {
        //collect data from form
        $sname=$_POST['sname'];
        $othername=$_POST['othername'];
        $uname=$_POST['uname'];
        $password=$_POST['pass'];
        $cpassword=$_POST['cpass'];
        $utype="designer";
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $design = $_FILES['image']['name'];
        $tmp_name= $_FILES['image']['tmp_name'];
        //$image=mysqli_real_escape_string($conn, $_FILES['image']['name']);
       // $image = $_FILES['image']['name'];
        //$tmp_name= $_FILES['image']['tmp_name'];
        
        //FORM VALIDATION 
        if(empty($sname)){
            $error1="<span class='error'>surname required</span>";
        }
        if(empty($othername)){
            $error2="<span class='error'>other names required</span>";
        }
        if(empty($uname)){
            $error3="<span class='error'>username required</span>";
        }
        if(empty($password)){
            $error4="<span class='error'>password required</span>";
        }
        if($password!=$cpassword){
            $error5="<span class='error'>password mismatch!</span>";
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error6="<span class='error'>provide a valid email</span>";
        }
        if(empty($phone)){
            $error7="<span class='error'>phone number required</span>";
        }
        if(empty($design)){
        $error9="<span class='error'>Profile image required</span>";
    }

         

            else
            {
                 $file_ext=explode('.', $design);
            $design_ext=$file_ext[1];
            $design=(rand(1,1000).time().".".$design_ext);
            
            if($design_ext=='jpg' || $design_ext=='JPG'|| $design_ext=='jpeg'|| 
            $design_ext=='JPEG'|| $design_ext=='png' || $design_ext=='PNG')
            {
            } 

            else
            {
                $error9="<span class='error'>Unsupported image format</span>";
            }
               

                //checkments the inputed fields
                $check=mysqli_query($conn, "SELECT * FROM login WHERE username='$uname'");
                  $row=mysqli_num_rows($check);
                if($row > 0)
                {
                    $error8="<span class='error'>Username already taken</span>";
                }

                else
                {

                    $insert= mysqli_query($conn,"INSERT INTO 
                                login (username, usertype, password, email, phone, surname, othername, profile_image)
                            VALUES('$uname','$utype', '$password', '$email', '$phone', '$sname','$othername', '$design')");
                            if($insert)
                            {
                                move_uploaded_file( $design, '../uploads/');
                                echo '<script> alert("Registration successful")</script>';
                                $uname=''; $utype=''; $password=''; $email=''; $phone=''; $sname=''; $othername='';$design='';
                            }
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
			<h3>Sign Up</h3>
				<form  enctype="multipart/form-data" method="POST">
					<div class="text-danger"> <p><?php echo $error8;?></p></div>
        <div class="text-danger">
            <input type="text" name="sname" value="<?php echo $sname;?>" placeholder="your surname"><br/><br/>
            <?php echo $error1;?>
        </div>

        <div class="text-danger">
            <input type="text" name="othername" value="<?php echo $othername;?>"placeholder="your othername"><br/><br/>
            <?php echo $error2;?>
        </div>

        <div class="text-danger">
          <input type="text" name="uname"value="<?php echo $uname;?>" placeholder="enter username" ><br/><br/>
          <?php echo $error3;?>
        </div>

        <div class="text-danger">
          <input type="password" name="pass"value="<?php echo $password;?>"placeholder="type password"><br/><br/>
          <?php echo $error4;?>
        </div>

        <div class="text-danger">
          <input type="password" name="cpass"value="<?php echo $cpassword;?>" placeholder="confirm password"><br/><br/>
          <?php echo $error5;?>
        </div>

        <div class="text-danger">
          <input type="email" name="email"value="<?php echo $email;?>" placeholder="enter email"><br/><br/>
          <?php echo $error6;?>
        </div>

        <div class="text-danger">
          <input type="text" name="phone" value="<?php echo $phone;?>" placeholder="type phone number"><br/><br/>
          <?php echo $error7;?>
        </div>
          <div class="text-danger">
          <input type="file" name="image" value="<?php echo $image;?>" ><br/><br/>
          <?php echo $error9;?>
        </div>
        <div>
            <input type="submit" value="Register" name="submit">
          </div>
                
				<h6> Already a Member? <a href="signin.php">Sign In</a> </h6>
			

				</div>
		</div>
	</section>
	<!-- //sign in form -->
	<!--footer section start-->		
		

        <!--footer section end-->
        <?php include('script.php');?>
</body>
		
</html>