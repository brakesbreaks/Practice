<?php
    $con = mysqli_connect("localhost", "root", "", "examination_mdb");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Practice v1.0</title>
        <link rel="stylesheet" href="../css/view_student/view_student.css">
    </head>
    <body>
            <?php 
                if(isset($_POST['main'])){
                    header('location:../main.php');
                }
            ?>
        <header>
            <form method="POST">
                <p class="header_p">Student Records</p>
                <button class="button_logout" type="submit" name="logout">Logout</button>
                <button class="main" type="submit" name="main">Main Menu</button>
            </form>
        </header>
        <div class="container">
            <table>
                <tr>
                    <th>Id #</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Operation</th>
                </tr>
                <?php 
                    $sql = "select * from student";
                    $result = mysqli_query($con, $sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['studID'];
                ?>
                <tr>
                    <td><?php echo $row['studID']?></td>
                    <td><?php echo $row['studFName']?></td>
                    <td><?php echo $row['studMName']?></td>
                    <td><?php echo $row['studLName']?></td>
                    <td><a href="update_student.php?id=<?php echo $id; ?>">Update</a> | 
                        <a href="delete_student.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
                </tr>
                <?php
                        }
                    }
                ?>
            </table>
        </div>
        <div class="button_container">
            <?php
            if(isset($_POST['add'])){
                header('location:add_student.php');
            }
            if(isset($_POST['search'])){
                header('location: search_student.php');
            }
            ?>
            <form method="POST">
                <button class="add_button" type="submit" name="add">Add</button>
                <button class="search_button" type="submit" name="search">Search</button>
            </form>
        </div>
    </body>
</html>