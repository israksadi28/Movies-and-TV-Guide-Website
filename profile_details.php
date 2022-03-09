 <?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['email'])){
        header('Location:login.php');
      }

    $email = $_SESSION['email'];
    $user_id = $_SESSION['user_id'];
?>

<?php
    $sql = "SELECT * from users where user_id = '$user_id' and email = '$email'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){

        $row = mysqli_fetch_assoc($result);
    }
?>

<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<head>
	<title>User Profile</title>
	<link rel="stylesheet" type="text/css" href="css4/style4.css">
	
	
	</head>
	<body class="card bg-danger text-white" style="background-color: #15131a;">
	<header>
	<nav>
	<div class="logo">
    <img src="logo.png">
	</div>
	<ul>
	<li><a href="http://localhost/Guide/home.php">Home</a></li>
	<li><a href="http://localhost/Guide/movie_tv.php">Movies and TV shows</a></li>
	<li class="active"><a href="http://localhost/Guide/userprofile.php">User</a></li>
	<li><a href="">Terms & conditons </a></li>
	<li><a href="http://localhost/Guide/logout.php">LOG OUT</a><li>
	<li><img class="image-responsive" style="max-height:200px; max-width:100px; border-radius:50%"src="picture/<?=$row['picture']?>" alt=""></li>
	</ul>
	</nav>	
	
	<body style="background-color: #15131a;">
    <h4 style="color:#b1b8c7; text-align:center; margin: 20px; padding:10px;">Profile Info</h4>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
                
        </div>
        <div class="col-sm-4"></div>
    </div>
    <div class="card bg-danger text-white" style="margin: 20px 80px; padding:20px;background-color:#b1b8c7;">
        
        <div class="row">
            <div class="col-md-2">
            
            </div>
            <div class="col-md-6">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;">Name:</h6>
            </div>
            <div class="col-md-4">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;"><?php echo $row['name']?></h6>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
            
            </div>
            <div class="col-md-6">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;">Email:</h6>
            </div>
            <div class="col-md-4">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;"><?php echo $row['email']?></h6>
            </div>
        </div>

        
        <div class="row">
            <div class="col-md-2">
            
            </div>
            <div class="col-md-6">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;">Mobile Number:</h6>
            </div>
            <div class="col-md-4">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;"><?php echo $row['mobile']?></h6>
            </div>
        </div>
    </div>
	
	</body>
	</html>