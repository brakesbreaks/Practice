<?php 
    $con = mysqli_connect("localhost", "root", "", "examination_mdb");
    if(!$con){
        die(mysqli_error($con));
    }else{
        $id = $_GET['id'];
        $sql = "select * from student where studID = $id";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $idnum = $row['studID'];
                $firstname = $row['studFName'];
                $middlename = $row['studMName'];
                $lastname = $row['studLName'];
            }
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Practice v1.0</title>
        <link rel="stylesheet" href="../css/view_student/update_student.css">
    </head>
    <body>
        <header>
            <?php 
                if(isset($_POST['record'])){
                    header('location: view_student.php');
                }
            ?>
            <form method="POST">
                <p class="header_p">Update Student</p>
                <button class="button_logout" type="submit" name="logout">Logout</button>
                <button class="record" type="submit" name="record">Student Record</button>
            </form>
        </header>
        <div class="form_container">
            <form method="POST">
                <input type="number" name="studid" value="<?php echo $idnum ?>" required><br>
                <input type="text" name="firstname" value="<?php echo $firstname ?>" required><br>
                <input type="text" name="middlename" value="<?php echo $middlename ?>" required><br>
                <input type="text" name="lastname" value="<?php echo $lastname ?>" required><br><br>
                <button type="submit" name="update">Update</button>
            </form>
            <?php 
                if(isset($_POST['update'])){
                    $newid = $_POST['studid'];
                    $newfirst = $_POST['firstname'];
                    $newmiddle = $_POST['middlename'];
                    $newlast = $_POST['lastname'];

                    $sql = "update student set studID='$newid', studFName='$newfirst', 
                            studMName='$newmiddle', studLName='$newlast' where studID=$id";

                    $result = mysqli_query($con, $sql);

                    if($result){
                        header('location:view_student.php');
                    }else{
                        die(mysqli_error($con));
                    }
                }
            ?>
        </div>
    </body>
</html>