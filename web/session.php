<?php
  include('dbconnect.php');
function login()
{
if (isset($_SESSION['id']))

{

	return true;
	}
else 
{
	return false;
}

}

if (login())
{
		
	
}
else
{
	header('location:login.php'); 

}

?>


