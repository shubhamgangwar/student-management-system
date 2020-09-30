<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style type="text/css">
        body {
            background-image: url("dataimg/bg.jpg");
        }
    </style>
</head>

<body>
    <div style="background: #ffff01">
        <h5 align="right"><a href="login.php">Admin Login >></a></h5>
    </div>
    <div class="card text-center">
        <div style="background: #ff49" class="card-body">
            <h1 class="card-title">Welcome to Student Management System</h1>
        </div>
    </div>
    <form method="post" action="index.php">
        <table style="width: 30%" align="center" border="2">
            <tr>
                <td colspan="2" align="center" bgcolor="orange"><b>Student Information</td></b>
            </tr>
            <tr>
                <td style="color: #fff"> Choose Standerd</td>&nbsp<td><select name="std" required="required">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                    </select></td>
            </tr>
            <tr>
                <td style="color: #fff">Enter Roll no.</td>
                <td><input type="text" name="rollno"></td>
            </tr>
            <tr>
                <td colspan="2" style="padding-left: 40%"><input type="submit" name="submit" value="Show Details" style="background: yellow"></td>
            </tr>
        </table>
    </form>
    <?php 
    if(isset($_POST['submit'])) {
        $std = $_POST['std'];
        $rollno = $_POST['rollno'];
        include('dbcon.php');
        $qry = "SELECT * FROM `student` WHERE `standerd`='$std' AND `rollno`='$rollno'";

        $run = mysqli_query($con,$qry);
        
        if (mysqli_num_rows($run) >0)
            {
                $data = mysqli_fetch_assoc($run);
                ?>
                <font color="yellow" align="center">
        <table border="2" width="50%" align="center" style="margin-top: 20px">
            <tr>
                <th colspan="3">
                    <h2>Student Detaills</h2>
                </th>
            </tr>
            <tr>
                <td rowspan="5"><img src="dataimg/<?php echo $data['image']; ?>" style="max-height: 150px" "max-width: 120px"></td>
                <th>Roll No</th>
                <td><?php echo $data['rollno']; ?></td>
            </tr>
            <tr>
                <th>NAME</th>
                <td><?php echo $data['name']; ?></td>
            </tr>
            <tr>
                <th>Standerd</th>
                <td><?php echo $data['standerd']; ?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><?php echo $data['contect']; ?></td>
            </tr>
            <tr>
                <th>City</th>
                <td><?php echo $data['city']; ?></td>
            </tr>
        </table>
    </font>
    <?php
}
    else 
    {
        ?>
    <script>
        alert("No record found");
    </script>
    <?php
}
}
?>
</body>

</html>
