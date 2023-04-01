<?php
  $con=mysqli_connect('localhost','root','');
  $fid=$_POST['farmer'];
//   echo $fid;
  session_start();
  if($con->connect_error)
  {
    die("Connection error");
  }
  mysqli_select_db($con,'agriculture_management_system');
  $deletequery="DELETE from login where user_id='$fid'";
  $result=mysqli_query($con,$deletequery);
  header('location:adminfarmerview.php');

  if($result)
  {
      echo($fid." farmer deleted successfully");
      exit(0);
  }


  ?>