<?php
$server='localhost';
$user='root';
$password='';
$con=mysqli_connect($server,$user,$password);
mysqli_select_db($con,'agriculture_management_system');
try
{
if(isset($_POST['user']))
{
    session_start();
    $radio=$_POST['role'];
    $userid=$_POST['user'];
    $_SESSION['userid']=$user;
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];
    // $name=$_POST['name'];
    // $phone=$_POST['phone'];
    // $email=$_POST['email'];
    // $address=$_POST['address'];
    $yourName = $con->real_escape_string($_POST['name']);
    $yourEmail = $con->real_escape_string($_POST['email']);
    $yourPhone = $con->real_escape_string($_POST['phone']);
    $addresses = $con->real_escape_string($_POST['address']);

    if($radio=='farmer')
    {
        $value=2;

    }
    else
    {
    
        $value=3;
    }
    
    
    $query="INSERT INTO `agriculture_management_system`.`login` (`user_id`, `password`, `role_id`) VALUES ('$userid', '$password', $value);";
    if($password==$confirmpassword)
    {
    
    if($value==2)
    {

    //    $query1="INSERT INTO `agriculture_management_system`.`farmer` (`farmer_id`, `farmer_name`,'email','address') VALUES ('$userid','$name','$email','$address')";
          $query1="INSERT INTO farmer (farmer_id,farmer_name,email,phone_number,city) VALUES ('$userid','".$yourName."','".$yourEmail."', '".$yourPhone."','".$addresses."')";
     
           mysqli_query($con,$query) && mysqli_query($con,$query1);
           header('location:index.php');
    }
    else if($value==3)
    {

        $query1="INSERT INTO customer (customer_id,customer_name,email,phone_number,city) VALUES ('$userid','".$yourName."','".$yourEmail."', '".$yourPhone."','".$addresses."')";
       mysqli_query($con,$query) && mysqli_query($con,$query1);
       header('location:index.php');
    }
    // else if($value==4)
    // {

    //     $query1="INSERT INTO worker (worker_id,worker_name,email,phone_number,city) VALUES ('$userid','".$yourName."','".$yourEmail."', '".$yourPhone."','".$addresses."')";
    //    mysqli_query($con,$query) && mysqli_query($con,$query1);
    //    echo "Logged in as worker";
    // }
    // ;
    }
    else{
        die('<h3 align="center">Password Mismatch</h3>');
    }
    
    // header('location:index.php');
    
    
}
}
catch(Exception $e)
{
    echo "<h2 align=center>Choose different user id</h2>" ;
}
?>