<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['email'])){
        header('Location:admin.php');
      }
    $email = $_SESSION['email'];
?>

<?php
    if(isset($_POST['submit']) && isset($_FILES['show_image'])){
        $program_name = $_POST['program_name'];
        $genre = $_POST['genre'];
        $source = $_POST['source'];
        $duration = $_POST['duration'];
        $details = $_POST['details'];
        $schedule = $_POST['schedule'];
        $value = 0;

        if(!(preg_match("/^[a-z ,.'-]+$/i",$program_name))){
            $error_show = "Invalid program name <br>";
            $value = 1;
        }
        if(!(preg_match("/^[a-zA-Z0-9 ,.'-]+$/i",$genre))){
            $error_genre = "Invalid genre <br>";
            $value = 1;
        }
        if(!(preg_match("/^[a-z ,.'-]+$/i",$source))){
            $error_source = "Invalid source <br>";
            $value = 1;
        }
        if(!(preg_match("/^[a-zA-Z0-9 ,.'-]+$/i",$duration))){
            $error_duration = "Invalid duration <br>";
            $value = 1;
        }

                
                $img_name = $_FILES['show_image']['name'];
                $img_size = $_FILES['show_image']['size'];
                $img_temp = $_FILES['show_image']['tmp_name'];
                $error = $_FILES['show_image']['error'];

                if($error === 0){
                    if($img_size > 30000000){
                        $error_msg = "limit exceeded!!";
                        $value = 1;
                    }else{
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);
                        $allowed_exs = array("png","jpg","jpeg");

                        if(in_array($img_ex_lc,$allowed_exs)){
                            $new_img_name = uniqid("program-", true).'.'.$img_ex_lc;
                            $img_upload_path = 'program/' . $new_img_name;
                            move_uploaded_file($img_temp, $img_upload_path);
                        }else{
                            $error_msg = "unsupported image type (only png, jpg and jpeg allowed)";
                            $value = 1;
                        }
                    }
                }else{
                    $error_msg = "error occured while uploading!";
                    $value = 1;
                }
        
        if($value == 0){
            $sql = "INSERT into movie_and_tv (program_name, source, duration, details, schedule, genre, show_image) values ('$program_name', '$source', '$duration', '$details', '$schedule', '$genre', '$new_img_name')";
            $result = mysqli_query($conn,$sql);
            if($result){
                header('Location: adminhome.php');
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<head>
	<title></title>
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
	<li class="active"><a href="http://localhost/Guide/register.php">Add movies/tv shows</a><li>
	</ul>
	</nav>	
	<h2 align ="center" ><br/><br/>Add movies/tv shows</h2>
	
<div align ="center">
<body style="background: #222124; color:#b1b8c7; font: size 14px;">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <form action="" class="login-form text-center" method="POST" enctype="multipart/form-data">
            
            <div class="form-outline mb-4" style="padding: 10px;">
                <input type="text" class="form-control" placeholder="Enter Name" name="program_name">
            </div>
            <h6 style="color: red;"><?php if(isset($error_show)) echo $error_show; ?></h6>

            <div class="form-outline mb-4" style="padding: 10px;">
                <input type="file" class="form-control" placeholder="Add Image" name="show_image">
            </div>
            <h6 style="color: red;"><?php if(isset($error_msg)) echo $error_msg; ?></h6>

            <div class="form-outline mb-4" style="padding: 10px;">
                <input type="text" class="form-control" placeholder="Enter genre" name="genre">
            </div>
            <h6 style="color: red;"><?php if(isset($error_genre)) echo $error_genre; ?></h6>

            <div class="form-outline mb-4" style="padding: 10px;">
                <input type="text" class="form-control" placeholder="Enter source" name="source">
            </div>
            <h6 style="color: red;"><?php if(isset($error_source)) echo $error_source; ?></h6>

            <div class="form-outline mb-4" style="padding: 10px;">
                <input type="text" class="form-control" name="duration" placeholder="Enter duration">
            </div>
            <h6 style="color: red;"><?php if(isset($error_duration)) echo $error_duration; ?></h6>

            <div class="form-outline mb-4" style="padding: 10px;">
                <input type="text" class="form-control" placeholder="Enter details" name="details">
            </div>

            <div class="form-outline mb-4" style="padding: 10px;">
                <input type="text" class="form-control" placeholder="Enter schedule" name="schedule">
            </div>
            <button type="submit" name="submit" class="btn btn-danger">Enter</button>
            
        </form>
    </div>
</body>
</html>