<?php
    session_start();
    include('db.php');
    
?>

<?php
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users where email = '$email' and password = '$password'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_assoc($result);
                $_SESSION['email'] = $row['email'];
                header('Location:userprofile.php');
            
        }
    } 
?>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<head>
	<title>User Login</title>
	<link rel="stylesheet" type="text/css" href="css2/style2.css">
	
	
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
	<li><a href="http://localhost/Guide/admin.php">Admin</a></li>
	<li class="active"><a href="http://localhost/Guide/login.php">User</a></li>
	<li><a href="">Terms & conditons </a></li>
	<li><a href="http://localhost/Guide/register.php">Register</a><li>
	</ul>
	</nav>	
	<h2 align ="center" ><br/><br/>User Login</h2>
	
<div align ="center">

  <form action="" method="POST">
 

            <div class="form-outline mb-4">
			
                <input type="text" class="col-sm-2 col-form-label" placeholder="Enter Registered Email" name="email">
            </div>
            <div class="form-outline mb-4">
                <input type="password" class="col-sm-2 col-form-label" placeholder="Enter Password" name="password">
            </div>

            <button type="submit" name="submit" class="btn btn-danger ">Sign in</button>
            <p class="mt-3 font-weight-normal">Don't have an account? <a href="register.php"><strong>Register it's free!</strong></a></p>
 </form>
 </div>
</header>
</body>

</html>