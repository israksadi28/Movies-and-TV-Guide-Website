<?php
    session_start();
    include('db.php');
    
?>

<?php
    if(isset($_POST['program_id'])){
        $program_id = $_POST['program_id'];
        $sql = "SELECT * from movie_and_tv where program_id = '$program_id'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){

            $row = mysqli_fetch_assoc($result);
        }
    }    
?>

<!DOCTYPE html>
<html>
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
	<li><a href="http://localhost/Guide/login.php">Movies and TV shows</a></li>
	<li class="active"><a href="http://localhost/Guide/adminhome.php">Admin</a></li>
	<li><a href="">Terms & conditons </a></li>
	<li><a href="http://localhost/Guide/logout.php">LOG OUT</a><li>
	
	</ul>
	</nav>	

    <h4 style="color:#b1b8c7; text-align:center; margin: 20px; padding:10px;">Movie/TV Information</h4>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
                <div class="card bg-danger text-white" style="border: none; align-items:center; background-color: #15131a;">
                    <img class="image-responsive" style="max-height:300px; max-width:300px;"src="program/<?=$row['show_image']?>" alt="">
                </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <div class="card bg-danger text-white" style="margin: 20px 80px; padding:20px;background-color:#17202A;">
        
        <div class="row">
            <div class="col-md-2">
            
            </div>
            <div class="col-md-6">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;">Movie/TV show Name:</h6>
            </div>
            <div class="col-md-4">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;"><?php echo $row['program_name']?></h6>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
            
            </div>
            <div class="col-md-6">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;">Genre:</h6>
            </div>
            <div class="col-md-4">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;"><?php echo $row['genre']?></h6>
            </div>
        </div>

        
        <div class="row">
            <div class="col-md-2">
            
            </div>
            <div class="col-md-6">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;">Source:</h6>
            </div>
            <div class="col-md-4">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;"><?php echo $row['source']?></h6>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
            
            </div>
            <div class="col-md-6">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;">Duration:</h6>
            </div>
            <div class="col-md-4">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;"><?php echo $row['duration']?></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            
            </div>
            <div class="col-md-6">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;">Details:</h6>
            </div>
            <div class="col-md-4">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;"><?php echo $row['details']?></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            
            </div>
            <div class="col-md-6">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;">Schedule:</h6>
            </div>
            <div class="col-md-4">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;"><?php echo $row['schedule']?></h6>
            </div>
        </div>
        
    </div>
</body>
</html>