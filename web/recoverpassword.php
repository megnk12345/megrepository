<?php include('link.php');
  include('dbconnect.php');
  $error=array();
  if(isset($_POST['rpass']))
  {
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    $phone=$_POST['phn'];
    $npass=$_POST['npass'];
    $cpass=$_POST['cpass'];

    if(empty($uname))
    {
      array_push($error, 'enter username');
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      array_push($error, 'enter a valid email');
    }
    if(empty($phone))
    {
      array_push($error, 'enter your phone number');
    }
    if(empty($npass))
    {
      array_push($error, 'enter your new password');
    }
    if($npass!= $cpass)
    {
      array_push($error, 'password mismatch');
    }
    else
    {
      if(count($error) == 0)
      {
        $select=mysqli_query($conn, "SELECT * FROM login WHERE username='$uname' ");
        $row=mysqli_num_rows($select);
        if($row > 0)
        {
          $check=mysqli_query($conn, "SELECT * FROM login WHERE email= '$email' and phone= '$phone' ");
          $row=mysqli_num_rows($check);
          if($row > 0)
          {
            $fetch=mysqli_fetch_array($check);
            $id=$fetch['id'];
            $update=mysqli_query($conn, "UPDATE login SET password = '$npass' WHERE id = '$id'  ");
            if($update)
            {
              //echo '<script> alert ("password reset sucessful")</script>';
              header('location:signin.php');
            }
          }
          else
          {
            array_push($error, "incorrect email or phone number");
          }
        }
        else
        {
          array_push($error, "user dose not exist");
        }
      }
    }


  }


?>

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
      <h3>Reset Password Here</h3>
        <form method="POST">
      <div class="text-danger"> <?php include("error.php");?></div>
      <div class="text-danger">
        <input type="text" name="uname" placeholder="enter username" ><br/><br/>
      </div>

      <div class="text-danger" >
        <input type="email" name="email" placeholder="enter email"><br/><br/>
       </div>

       <div class="text-danger">
        <input type="text" name="phn" placeholder="type phone number"><br/><br/>
       </div>
       <div class="text-danger">
        <input type="password" name="npass" placeholder="type new password"><br/><br/>
       </div>
       <div class="text-danger">
        <input type="password" name="cpass" value="confirm new password"><br/><br/>
       </div>
        <div >
            <input type="submit" value="Reset" name="rpass">
            <input type="reset" class="btn" value="Clear" name="">
          </div>
    </form>
        <h6><a href="signin.php">Back to Sign In</a> </h6>
       

        </div>
    </div>
  </section>
  <!-- //sign in form -->
  <!--footer section start-->   
    

        <!--footer section end-->
        <?php include('script.php');?>
</body>
    
</html>
