<?php
  $con=mysqli_connect('localhost','root','');
  $crpid=$_POST['del'];
  session_start();
  if($con->connect_error)
  {
    die("Connection error");
  }
  mysqli_select_db($con,'agriculture_management_system');
  $deletequery="DELETE from crop where crop_id=$crpid";
  mysqli_query($con,$deletequery);
  header('location:admincropview.php');


  ?>