<?php
    session_start();
    include('db.php');
    i
?>

<?php
    if(isset($_POST['program_id'])){
        $program_id = $_POST['program_id'];
        $sql = "DELETE from movie_and_tv where program_id = '$program_id'";
        $result = mysqli_query($conn,$sql);
        if($result){
            header('Location:adminhome.php');
        }
    }    
?>