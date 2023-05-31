<?php

    $con = mysqli_connect("localhost","root", "", "examination_mdb");

    $id = $_GET['id'];

    $sql = "delete from student where studID = $id";

    if(mysqli_query($con,$sql)){
        header('location: view_student.php');
    }else{
        echo mysqli_error($con);
    }


?>