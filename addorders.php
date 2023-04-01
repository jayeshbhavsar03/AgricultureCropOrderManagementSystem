<?php
$server='localhost';
$user='root';
$password='';
$con=mysqli_connect($server,$user,$password);
mysqli_select_db($con,'agriculture_management_system');
session_start();
$userid=$_SESSION['userid'];
// echo $userid;
if(isset($_POST['order']))
{
    $value=$_POST['order'];
    $quantity_required=$_POST['quantity_required'];
    // echo $quantity_required;
    // echo $value;
    $query1="SELECT farmer_id from crop where crop_id=$value";
    $result=mysqli_query($con,$query1);
    $f_id = $result->fetch_array()[0] ?? '';
    // echo $f_id;
    
    $query2="SELECT cost from crop where crop_id=$value";
    $result1=mysqli_query($con,$query2);
    $cost = $result1->fetch_array()[0] ?? '';
    $totalcost=$quantity_required*$cost;
    $query8="SELECT quantity from crop where crop_id=$value";
    $result8=mysqli_query($con,$query8);
    $quantity_available = $result8->fetch_array()[0] ?? '';
    // echo $quantity_available;
    // echo $quantity_required;
    if($quantity_required>$quantity_available)
    {
        echo "<h2 style='text-align:center;margin-top:10%;color:red;text-transform:uppercase;'>Your required quantity exceeds the available quantity<br>Your order cannot be placed</h2>";
        
    }
    else
    {
    // echo $cost;
    $query3="INSERT into crop_orders (crop_id,customer_id,farmer_id,quantity,total_cost) values($value,'$userid','$f_id',$quantity_required,$totalcost)";
    $res=mysqli_query($con,$query3);
    if($res)
    {
        echo "<h2 align=center>Your order is placed successfully</h3>";
        $queryupdate="UPDATE crop set quantity=quantity-$quantity_required where crop_id=$value";
        mysqli_query($con,$queryupdate);
        $query4="select quantity from crop where crop_id=$value";
        $result2=mysqli_query($con,$query4);
        $available_quantity = $result2->fetch_array()[0] ?? '';
        // echo $available_quantity;
        if($available_quantity<=0)
        {
            $deletequery3="DELETE from crop where crop_id=$value";
            mysqli_query($con,$deletequery3);
        }
        
        // $deletequery1="DELETE from crop where crop_id=$value";
        // mysqli_query($con,$deletequery1);
        
        // style=text-align: center;text-transform: uppercase;
    }
    else{
        echo "<h2 align=center>Unable to place the order</h3>";
    }
}

}
?>