<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['email'])){
        header('Location:login.php');
      }
    $email = $_SESSION['email'];
?>

<?php
    if(isset($_POST['myprogram_id'])){
        $myprogram_id = $_POST['myprogram_id'];
        $sql = "DELETE from myprograms where myprogram_id = '$myprogram_id'";
        $result = mysqli_query($conn,$sql);
        if($result){
            header('Location:userprofile.php');
        }
    }    
?>