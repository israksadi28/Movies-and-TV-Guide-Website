<?php
    session_start();
    include('db.php');
    
?>

<?php
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admin where email = '$email'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_assoc($result);
                $_SESSION['email'] = $row['email'];
                header('Location:adminhome.php');
            
        }
    } 
?>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css3/style3.css">
	
	
	</head>
	<body>
	<div>
	<header>
	<nav>
	<div class="logo">
    <img src="logo.png">
	</div>
	<ul>
	<li><a href="http://localhost/Guide/home.php">Home</a></li>
	<li class="active"><a href="http://localhost/Guide/admin.php">Admin</a></li>
	<li><a href="http://localhost/Guide/login.php">User</a></li>
	<li><a href="">Terms & conditons </a></li>
	<li><a href="http://localhost/Guide/register.php">Register</a><li>
	</ul>
	</nav>	
	<h2 align ="center" ><br/><br/>Admin Login</h2>
	
<div align ="center">

  <form action="" method="POST">
 

            <div class="form-outline mb-4">
			
                <input type="text" class="col-sm-2 col-form-label" placeholder="Enter Email" name="email">
            </div>
            <div class="form-outline mb-4">
                <input type="password" class="col-sm-2 col-form-label" placeholder="Enter Password" name="password">
            </div>

            <button type="submit" name="submit" class="btn btn-danger ">Sign in</button>
            
 </form>
 </div>
</header>
</body>

</html>