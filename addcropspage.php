<?php

session_start();
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'agriculture_management_system');
if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  
}

if(isset($_POST['quantity']))
{
  $crpname=$_POST['cropname'];
  $crptype=$_POST['type'];
  $crpcategory=$_POST['category'];
  $quantity=$_POST['quantity'];
  $farmer_id=$_SESSION['userid'];
  $cost=$_POST['cost'];
  
  $query="INSERT INTO crop (crop_name,farmer_id,crop_type,crop_category,quantity,cost) VALUES ('$crpname','$farmer_id','$crptype','$crpcategory','$quantity','$cost')";
  $result=mysqli_query($con,$query);
  header('location:farmerhome.php');
  exit(0);
  }
  // header('location:farmerhome.php');
  // if($result)
  // {
  //   header('location:farmerhome.php');
  // }
  // else
  // {
  //   echo "<h4>Error in adding crop</h4>";
  // }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add crops</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/info.css">
    
</head>
<style>
   .button
   {
     background-color: black;
     color: white;
     border-radius: 8px;
     padding:8px;
   }
  </style>
<body>
<nav class="navbar navcustom navbar-expand-lg navbar-dark bg-success ">
  <div class="container-fluid">
    <a class="navbar-brand custom" href="#" style="text-transform:uppercase;">Agriculture crop order Management System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="    justify-content: end;">
      <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link custom1" href="farmerhome.php"><i class="fa fa-home" style="font-size:22px"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link custom1" href="logout.php"><i class="fa fa-sign-out" style="font-size:22px"></i></a>
          </li>
      </ul>
    </div>
  </div>
</nav>
    <h3>Crop Details</h3>
    <div class="div1">

       
        <form action="#" method="POST">
            <div class="mb-3">
              <label class="form-label">Crop name:</label>
              <input type="text" class="form-control" name="cropname" required>
             
            </div>
            <div class="mb-3">
                <label class="form-label">Crop category:</label>
                
            
            <div class="form-check">
                <input class="form-check-input" type="radio" name="category" value='food' required>
                <label class="form-check-label">
                  Food crop
                </label> 
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="category" value='feed' required>
                <label class="form-check-label">
                 Feed crop
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="category" value='fiber' required>
                <label class="form-check-label">
                 Fiber crop
                </label>
              </div>
              </div>
              <div class="mb-3">
                <label class="form-label">Crop type:</label>
                
            
            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" value="organic" required>
                <label class="form-check-label"">
                  Organic
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="type" value="inorganic" required>
                <label class="form-check-label">
                 Inorganic
                </label>
              </div>
             
              </div>
            <div class="mb-3">
              <label class="form-label">Quantity produced</label>
              <input type="number" class="form-control" name="quantity" id="exampleInputPassword1" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Cost per KG</label>
              <input type="number" class="form-control" name="cost" id="exampleInputPassword1" required>
            </div>
           
             
            </div>
            <button type="submit" class=" btn btn-dark" style="background: #198754;
    border: #198754;">Submit</button>
          </form>
    </div>
    
</body>
</html>