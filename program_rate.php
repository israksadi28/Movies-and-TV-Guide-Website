<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['email'])){
        header('Location:login.php');
      }
    $email = $_SESSION['email'];
?>

<?php
    if(isset($_POST['submit']) && isset($_GET['myprogram_id'])){
        $myshow_id = $_GET['myprogram_id'];
        $rate = $_POST['rate'];
        
            $sql = "UPDATE myprograms set rating = '$rate' where myprogram_id = '$myprogram_id'";
            $result = mysqli_query($conn,$sql);
            if($result){
                header('Location:userprofile.php');
            }
        }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shows Recommender</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <style>
        .rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 1em;
    font-size: 6vw;
    color: #FFD600;
    cursor: pointer
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}

body {
    background: #222225;
    color: white
}

h1,
p {
    text-align: center
}

h1 {
    margin-top: 150px
}

p {
    font-size: 1.2rem
}

@media only screen and (max-width: 600px) {
    h1 {
        font-size: 14px
    }

    p {
        font-size: 12px
    }
}
    </style>
</head>
<body style="background: #222124; color:#b1b8c7; font: size 14px;">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <form action="" class="login-form text-center" method="POST" enctype="multipart/form-data">
            <h1 class="mb-5 font-weight-light text-uppercase">Rate Your Program</h1>
            
            <h1>Star rating </h1>
<div class="rating"> <input type="radio" name="rate" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rate" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rate" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rate" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rate" value="1" id="1"><label for="1">☆</label>
</div>
<button type="submit" name="submit" class="btn btn-warning">Rate</button>
            <h6 style="color: red;"><?php if(isset($em)) echo $em; ?></h6>

            
        </form>
    </div>
</body>
</html>