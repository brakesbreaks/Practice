<?php
    $con = mysqli_connect("localhost", "root", "", "examination_mdb"); 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Practice v1.0</title>
        <link rel="stylesheet" href="../css/view_student/add_student.css">
    </head>
    <body>
        <header>
            <?php 
                if(isset($_POST['record'])){
                    header('location: view_student.php');
                }
            ?>
            <form method="POST">
                <p class="header_p">Add Student</p>
                <button class="button_logout" type="submit" name="logout">Logout</button>
                <button class="record" type="submit" name="record">Student Record</button>
            </form>
        </header>
        <div class="form_container">
            <form method="POST">
                <input type="number" name="studid" placeholder="Student's ID" required><br>
                <input type="text" name="firstname" placeholder="Student's First name" required><br>
                <input type="text" name="middlename" placeholder="Student's Middle name'" required><br>
                <input type="text" name="lastname" placeholder="Student's Last name" required><br><br>
                <button type="submit" name="save">Save</button>
            </form>
        </div>
    </body>
    <?php
                    if(isset($_POST['save'])){
                        $studid = $_POST['studid'];
                        $firstname = $_POST['firstname'];
                        $middlename = $_POST['middlename'];
                        $lastname = $_POST['lastname'];
                
                        $sql = "insert into student (studID, studFName, studMName, studLName)
                                value('$studid','$firstname', '$middlename','$lastname')";
                
                        $result = mysqli_query($con, $sql);
                        if($result){
                            header('location:view_student.php');
                        }else{
                            die(mysqli_error($result));
                        }
                    }
                ?>
</html>