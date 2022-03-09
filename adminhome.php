<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['email'])){
        header('Location:login.php');
      }
    $email = $_SESSION['email'];
?>
<?php
     $sql = "SELECT * FROM movie_and_tv";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
    
?>

<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<head>
	<title>Admin page</title>
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
	<li><a href="http://localhost/Guide/adminlist.php">Add new movies and tv shows</a></li>
	<li class="active"><a href="http://localhost/Guide/adminhome.php">Admin</a></li>
	<li><a href="">Terms & conditons </a></li>
	<li><a href="http://localhost/Guide/logout.php">LOG OUT</a><li>
	<li><img class="image-responsive" style="max-height:200px; max-width:100px; border-radius:50%"src="picture/<?=$row['picture']?>" alt=""></li>
	</ul>
	</nav>	
    

    <br><h4 style="color:#b1b8c7; margin:10px; padding:10px; text-align:center;">Index</h4>
    <div class="row">
       





 <?php
        }
 ?>       
        
    
    <table class="table table-borderless" style="color:#17202A;" >
        <tr>
            <th>Movie/TVShow Name</th>
            <th>Where to watch</th>
            <th>Genre</th>
            <th style= "text-align:center;" >Synopsis</th>
            <th>Delete</th>
        </tr>

        <?php
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td style="color:#17202A;"><?php echo $row['program_name']?></td>
            <td style="color:#17202A;"><?php echo $row['source']?></td>
            <td style="color:#17202A;"><?php echo $row['genre']?></td>
            <td>
                <form action="program_info.php" method="POST">
                  <input type ="submit" class="btn btn-warning" name="details" value="<?php echo $row['details']?>" style="color:#17202A;">
                  <input type="hidden" name="program_id" value="<?php echo $row['program_id'] ?>">
                </form>
            </td>
            
            <td>
                <form action="remove_programs.php" method="POST">
                  <input type ="submit" class="btn btn-warning" name="remove" value="-" style="color:red;">
                  <input type="hidden" name="program_id" value="<?php echo $row['program_id'] ?>">
                </form>
            </td>
        </tr>

        <?php
            }
        
        ?>
    </table>
</div>
</html>