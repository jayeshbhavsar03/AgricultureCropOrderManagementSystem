<?php
  $con=mysqli_connect('localhost','root','');
  $cid=$_POST['customer'];
//   echo $fid;
  session_start();
  if($con->connect_error)
  {
    die("Connection error");
  }
  mysqli_select_db($con,'agriculture_management_system');
  $deletequery="DELETE from login where user_id='$cid'";
  $result=mysqli_query($con,$deletequery);
  header('location:admincustomerview.php');

  if($result)
  {
      echo($cid." customer deleted successfully");
      exit(0);
  }


  ?>