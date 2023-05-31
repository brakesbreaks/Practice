<?php
    $con = mysqli_connect("localhost", "root", "", "examination_mdb");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Practice v1.0</title>
        <link rel="stylesheet" href="../css/view_student/search_student.css">
    </head>
    <body>
        <header>
            <?php 
                if(isset($_POST['record'])){
                    header('location: view_student.php');
                }
            ?>
            <form method="POST">
                <p class="header_p">Search Student</p>
                <button class="button_logout" type="submit" name="logout">Logout</button>
                <button class="record" type="submit" name="record">Student Record</button>
            </form>
        </header>
        <form class="form_search" method="POST">
            <input type="text" name="search_bar" placeholder="Search By ID #" required>
            <button type="submit" name="search">Search</button>
        </form>
        <table>
            <tr>
                <th>Id #</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
            </tr>
            <?php
                if(isset($_POST['search'])){
                    $searchKey = $_POST['search_bar'];
                    $sql = "select * from student where studID like '%$searchKey%'";
                    $result = mysqli_query($con,$sql);

                    while($row = mysqli_fetch_assoc($result)){
            ?>
                    <tr>
                        <td><?php echo $row['studID']?></td>
                        <td><?php echo $row['studFName']?></td>
                        <td><?php echo $row['studMName']?></td>
                        <td><?php echo $row['studLName']?></td>
                    </tr>
            <?php
                    }
                }
                
            ?>
        </table>
    </body>
</html>