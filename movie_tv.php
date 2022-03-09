<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['email'])){
      header('Location:login.php');
    }
    $email = $_SESSION['email'];
    $user_id =  $_SESSION['user_id'];
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
	<li class="active"><a href="http://localhost/Guide/movie_tv.php">Movies and TV shows</a></li>
	<li><a href="http://localhost/Guide/userprofile.php">User</a></li>
	<li><a href="">Terms & conditons </a></li>
	<li><a href="http://localhost/Guide/logout.php">LOG OUT</a><li>
	</ul>
	</nav>

<br>


 

    <h4 style="color:#17202A; margin:10px; padding:10px; text-align:center;">Index</h4>

    
    <table class="table table-borderless" style="color:#17202A;">
        <tr>
            <th>Name</th>
            <th>Where to watch</th>
            <th>Duration</th>
            <th>Add </th>
        </tr>

    <?php
      if(!isset($_POST['submit'])){
        $sql = "SELECT * from movie_and_tv";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result)){
      
    ?>
        <tr>
            <td><?php echo $row['program_name']?></td>
            <td><?php echo $row['source']?></td>
            <td><?php echo $row['duration']?></td>
            <td>
                <form action="" method="POST">
                <button type="submit" name="btn" class="btn btn-success "> + </button>
                <input type="hidden" name="program_id" value="<?php echo $row['program_id'] ?>">
                </form>
            </td>
        </tr>
    <?php
        }
      }
    }
    ?>


<?php
      if(isset($_POST['submit'])){
        $genre = $_POST['genre'];
        if($genre =="All"){
        $sql = "SELECT * from movie_and_tv";
        }else{
          $sql = "SELECT * from movie_and_tv where genre = '$genre'";
        }
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result)){
      
    ?>
        <tr>
            <td><?php echo $row['program_name']?></td>
            <td><?php echo $row['source']?></td>
            <td><?php echo $row['duration']?></td>
            <td><?php echo $row['details']?></td>
            <td>
                <form action="" method="POST">
                <button type="submit" name="button" class="btn btn-success">Add</button>
                <input type="hidden" name="program_id" value="<?php echo $row['program_id'] ?>">
                </form>
            </td>
        </tr>
    <?php
        }
      }
    }
    ?>

<?php
  if(isset($_POST['btn']) && isset($_POST['program_id'])){
    $program_id = $_POST['program_id'];
    $sql = "SELECT * from movie_and_tv where program_id = $program_id";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
      $row = mysqli_fetch_assoc($result);
      $program_name = $row['program_name'];
      $source = $row['source'];
      $details = $row['details'];
      $duration = $row['duration'];
      $schedule = $row['schedule'];
      $genre = $row['genre'];
      $show_image = $row['show_image'];
      $rating = 0;
    }
    $sql = "SELECT * from myprograms where program_id = '$program_id' and user_id = '$user_id'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
      echo "<h5 style='color:red;'>This movie/show is already in your list!!</h5>";
    }else{                
      $sql = "INSERT into myprograms (myprogram_name,mysource,mygenre,myduration,mydetails,myschedule,myshow_image,rating,program_id,user_id)
              values ('$program_name','$source','$genre','$duration','$details','$schedule','$show_image','$rating','$program_id','$user_id')";
      $result = mysqli_query($conn,$sql);
      if($result){
        echo "<h5 style='color:green;'>Added to list</h5>";
      }
    }
  }
?>
    </table>
</header>
</html>