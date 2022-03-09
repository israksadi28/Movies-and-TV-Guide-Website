<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['email'])){
        header('Location:login.php');
      }
    $email = $_SESSION['email'];
?>
<?php
    $sql = "SELECT user_id,name,picture from users where email = '$email'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
             $_SESSION['user_id'] = $row['user_id'];
    
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
    

    <br><h4 style="color:#b1b8c7; margin:10px; padding:10px; text-align:center;"><?php echo $row['name']?></h4>
    <div class="row">
       





 <?php
        }}
 ?>       

 <?php
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT COUNT(myprogram_id) as total_programs from myprograms where user_id = '$user_id'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $total_programs = $row['total_programs'];
    }else{
        $total_programs = 0;
    }
 ?>
   
        <div class="col-md">
                <form action="profile_details.php" method="POST">
                    <div style="margin:30px; padding:10px; align-items:center; text-align:center; align-content:center;">
                        <button class="btn btn-warning"  "name="button">Your info</button>
                    </div>
                </form>
        </div>
    </div>
</div>
   
        
    



    <h4 style="color:#17202A; margin:10px; padding:10px; text-align:center;">My Watch List</h4>
    <table class="table table-borderless" style="color:#17202A;" >
        <tr>
            <th>Movie/TVShow Name</th>
            <th>Where to watch</th>
            <th>Duration</th>
            <th>Synopsis</th>
            <th>Your Rating</th>
			<th>overall rating</th>
            <th>Remove from watchlist</th>
        </tr>

        <?php
      if(!isset($_POST['submit'])){
          $user_id = $_SESSION['user_id'];
        $sql = "SELECT * from myprograms where user_id = '$user_id'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result)){
      
    ?>
        <tr>
            <td><?php echo $row['myprogram_name']?></td>
            <td><?php echo $row['mysource']?></td>
            <td><?php echo $row['myduration']?></td>
			
            
            
            <td>
                <form action="program_details.php" method="POST">
                  <input type ="submit" class="btn btn-warning" name="details" value="<?php echo $row['mydetails']?>" ;">
                  <input type="hidden" name="myprogram_id" value="<?php echo $row['myprogram_id'] ?>">
                </form>
            </td>
            <td>
                <form action="program_rate.php" method="GET">
                  <input type ="submit" class="btn btn-warning" name="rate" value="Rate" ;">
                  <input type="hidden" name="myprogram_id" value="<?php echo $row['myprogram_id'] ?>">
                </form>
            </td>
			
			<td>
			
                    <?php echo $row['rating'] ?></h6>
            
			</td>
			
			
            <td>
                <form action="remove_program.php" method="POST">
                  <input type ="submit" class="btn btn-warning" name="remove" value="-" style="color:red;">
                  <input type="hidden" name="myprogram_id" value="<?php echo $row['myprogram_id'] ?>">
                </form>
            </td>
        </tr>
    <?php
        }
      }
    }
    ?>
    </table>

</header>
</html>