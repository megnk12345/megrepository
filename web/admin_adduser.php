<?php require('dashlink.php');
session_start();
include('session.php');
//
$uname=''; $utype=''; $password=''; $email=''; $phone=''; $sname=''; $othername='';
$error1=''; $error2=''; $error3=''; $error4=''; $error5=''; $error6=''; $error7=''; $error8=''; $error9='';
 
if(isset($_POST['submit']))
{
    $sname=$_POST['sname'];
    $othername=$_POST['othername'];
    $uname=$_POST['uname'];
    $password=$_POST['pass'];
    $cpassword=$_POST['cpass'];
    $utype="designer";
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $image = $_FILES['image']['name'];
    $tmp_name= $_FILES['image']['tmp_name'];
	
    
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
     if(empty($image)){
        $error9="<span class='error'>Profile image required</span>";
    }else{
          $file_ext=explode('.', $image);
            $image_ext=$file_ext['1'];
            $image_name=(rand(1,1000).time().".".$image_ext);
            $image="uploads/".$image_name;
		
            
            if($image_ext != 'jpg' && $image_ext != 'JPG' && $image_ext != 'jpeg' && 
            $image_ext != 'JPEG' && $image_ext != 'png' && $image_ext != 'PNG')
            {
				
			$error9="<span class='error'>Unsupported image format</span>";
            }else {
                //checkments the inputed fields
            $check = mysqli_query($conn, "SELECT * FROM login WHERE username='$uname'");
              $row = mysqli_num_rows($check);
            if($row > 0)
            {
                $error8="<span class='error'>Username already taken</span>";
            }

            else
            {
			
                $insert = mysqli_query($conn,"INSERT INTO 
                            login (usertype, username, password, email, phone, surname, othername, profile_image)
                        VALUES('$utype','$uname', '$password', '$email', '$phone', '$sname','$othername', '$image')");
                        if($insert)
                        {
                            move_uploaded_file($tmp_name, 'uploads/'.$image_name);
                            echo '<script> alert("Registration successful")</script>';
                            $uname=''; $utype=''; $password=''; $email=''; $phone=''; $sname=''; $othername=''; $image=''; 
                        }
            }
            }
           
           
        }


}

?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

<!-- Sidebar -->
    <?php  include ('sidedash.php');?>
<!-- End of Sidebar -->
<!-- Content Wrapper -->
<!-- Begin Page Content -->
<style type="text/css">
.error{
	font-size:12px;
	color:red
}
</style>
    <div class="container-fluid">
        <form actio="#" method="POST" enctype="multipart/form-data">
          
          <div>
            <input type="text" name="sname" value="<?php echo @$sname;?>" placeholder="your surname" required="required"><br/>
            <?php echo $error1;?><br/><br/>
          </div>

          <div>
              <input type="text" name="othername" value="<?php echo @$othername;?>"placeholder="your othername" required="required"><br/>
              <?php echo $error2;?><br/><br/>
          </div>

          <div>
            <input type="text" name="uname"value="<?php echo @$uname;?>" placeholder="enter username" required="required"><br/>
           <?php echo $error3;?><br/><br/>
          </div>

          <div>
            <input type="email" name="email" value="<?php echo @$email;?>" placeholder="enter email" required="required"><br/>
            <?php echo $error6;?><br/><br/>
          </div>

          <div>
            <input type="phone" name="phone" value="<?php echo @$phone;?>" placeholder="type phone" required="required"><br/>
            <?php echo $error7;?><br/><br/>
          </div>
          <div>
            <input type="file" name="image" required="required"><br/>
            <?php echo $error9;?><br/><br/>
          </div> 
		  
		  <div>
            <input type="password" name="pass" placeholder="type password" required="required"><br/>
            <?php echo $error4;?><br/><br/>
          </div>

          <div>
            <input type="password" name="cpass" placeholder="confirm password" required="required"><br/><br/>
            <?php echo $error5;?><br/>
          </div>
		  
          <button type="submit" name="submit">
              REGISTER
          </button>
          <button type="reset" name="clear">
              clear
          </button>
    </form>
   </div>
        <!-- /.container-fluid -->

</div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include('dashfooter.php');?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  
  <!--End of logout modal -->
  <!-- Bootstrap core JavaScript-->
  <?php include('dashscript.php');
  include('modal.php');

  ?>

</body>


</html>
 
