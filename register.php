<?php
    session_start();
    include('db.php');
	
    
?>

<?php
    if(isset($_POST['submit']) && isset($_FILES['picture'])){
        $user = $_POST['user_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $mobile = $_POST['mobile'];
        $value = 0;

        if(!(preg_match("/^[a-z ,.'-]+$/i",$user))){
            $error_user = "Invalid user name <br>";
            $value = 1;
        }

        $sql = "SELECT email FROM users Where email = '$email'";
        $check = mysqli_query($conn,$sql);
        $result = mysqli_fetch_assoc($check);

        if($result){
            $error_email = "This mail already exists!! <br>";
            $value = 1;
        }else{
            if(!(preg_match("/^[a-zA-Z0-9.!#$%&'*+?^_{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/i", $email))){
                $error_email = "Invalid email <br>";
                $value = 1;
            }
        }

        if(!(preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",$password))){
            $error_pass = "Password must be atleast 8 letters including 1 letter and 1 digit.<br>";
            $value = 1;
        }
        if(!(preg_match("/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/",$mobile))){
            $error_mob = "Invalid Number<br>";
            $value = 1;
        }

                
                $img_name = $_FILES['picture']['name'];
                $img_size = $_FILES['picture']['size'];
                $img_temp = $_FILES['picture']['tmp_name'];
                $error = $_FILES['picture']['error'];

                if($error === 0){
                    if($img_size > 30000000){
                        $error_msg = " File size exceeds limit!";
                        $value = 1;
                    }else{
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);
                        $allowed_exs = array("png","jpg","jpeg");

                        if(in_array($img_ex_lc,$allowed_exs)){
                            $new_img_name = uniqid("picture-", true).'.'.$img_ex_lc;
                            $img_upload_path = 'picture/' . $new_img_name;
                            move_uploaded_file($img_temp, $img_upload_path);
                        }else{
                            $error_msg = "unsupported image format";
                            $value = 1;
                        }
                    }
                }else{
                    $error_msg = "upload error!";
                    $value = 1;
                }
        
        if($value == 0){
            $sql = "INSERT into users (name, email, password, mobile, picture) values ('$user', '$email', '$password', '$mobile', '$new_img_name')";
            $result = mysqli_query($conn,$sql);
            if($result){
                header('Location: login.php');
            }
        }
    }
?>

<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="css1/style1.css">
	<style>
	.form-control{
            max-width: 100%;
            width: 223px;
            padding: 5px;
            margin: auto;
        }
	</style>
	
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
	<li><a href="http://localhost/Guide/login.php">User</a></li>
	<li><a href="">Terms & conditons </a></li>
	<li class="active"><a href="http://localhost/Guide/register.php">Register</a><li>
	</ul>
	</nav>	
	<h2 align ="center" ><br/><br/>Registration</h2>
	
<div align ="center">

  <form action=""  method="POST" enctype="multipart/form-data">
 
            <div class="form-outline mb-4">
                <br><input type="text" class="form-control" placeholder="Enter User Name" name="user_name">
            </div>
            <p style="color: red;"><?php if(isset($error_user)) echo $error_user; ?></p>
			
			<div class="form-outline mb-4">
                <input type="password" class="form-control" placeholder="Enter a Password" name="password">
            </div>
            <p style="color: red;"><?php if(isset($error_pass)) echo $error_pass; ?></p>
			
			
			<div class="form-outline mb-4">
                <input type="text" class="form-control" placeholder="Enter Valid Email" name="email">
            </div>
            <p style="color: red;"><?php if(isset($error_email)) echo $error_email; ?></p>
			
             
            <div class="form-outline mb-4">
                <input type="text" class="form-control" placeholder="Enter Mobile number" name="mobile">
            </div>
            <p style="color: red;"><?php if(isset($error_mob)) echo $error_mob; ?></p>			
			
            <div class="form-outline mb-4">
                
               <input type="file" class="form-control" name="picture" />
            </div>
            <p style="color: red;"><?php if(isset($error_msg)) echo $error_msg; ?></p>
            

            <button type="submit" name="submit" class="btn btn-danger ">Register</button>
            <p class="mt-3 font-weight-normal">Signed up already? <a href="login.php"><strong>Login now!</strong></a></p>
 </form>
 </div>
</header>
</body>

</html>