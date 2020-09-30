<?php

 session_start();
			
			if (isset($_SESSION['uid']))
			{
				echo "";
			}
			else
			{
				header('location: ../login.php');
			}
?>

<?php
	include('header.php');
	include('../dbcon.php');

	$sid = $_GET['sid'];

	$qry = "SELECT * FROM `student` WHERE `id` = '$sid'";
	$run = mysqli_query($con,$qry);

	$data = mysqli_fetch_assoc($run);

	?>

<form method="post" action="updatedata.php" enctype="multipart/form-data"> <br>

    <table align="center" border="1" width="50%" style="color: yellow" "margin-left: 300px">
        <tr>
            <th>Roll no.</th>
            <td><input type="text" name="rollno" value=<?php echo $data['rollno']; ?>></td>
        </tr>

        <tr>
            <th>Full name</th>
            <td><input type="text" name="name" value=<?php echo $data['name']; ?>></td>
        </tr>

        <tr>
            <th>City</th>
            <td><input type="text" name="city" value=<?php echo $data['city']; ?>></td>
        </tr>

        <tr>
            <th>Phone</th>
            <td><input type="text" name="phone" value=<?php echo $data['contect']; ?>></td>
        </tr>

        <tr>
            <th>Standerd</th>
            <td><input type="text" name="std" value=<?php echo $data['standerd']; ?>></td>
        </tr>

        <tr>
            <th>image</th>
            <td><input type="file" name="img"></td>
        </tr>
        <br>
        <tr>
            <td colspan="2" align="center">
                <input type="hidden" name="sid" value="<?php echo $data['id']; ?>" />

                <input style="background-color:#BFC8D1" class="btn" type="submit" name="submit" value="submit"></td>
        </tr>


    </table>

</form>

</body>

</html>