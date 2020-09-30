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
?>

<form method="post" action="addstudent.php" enctype="multipart/form-data"> <br>

    <table align="center" border="1" width="50%" style="color: yellow" "margin-left: 300px">
        <tr>
            <th>Roll no.</th>
            <td><input type="text" name="rollno" placeholder="Enter Rollno."></td>
        </tr>

        <tr>
            <th>Full name</th>
            <td><input type="text" name="name" placeholder="Full Name"></td>
        </tr>

        <tr>
            <th>City</th>
            <td><input type="text" name="city" placeholder="Enter city"></td>
        </tr>

        <tr>
            <th>Phone</th>
            <td><input type="text" name="phone" placeholder="Enter phone no."></td>
        </tr>

        <tr>
            <th>Standerd</th>
            <td><input type="text" name="std" placeholder="standerd"></td>
        </tr>

        <tr>
            <th>image</th>
            <td><input type="file" name="img"></td>
        </tr>
        <br>
        <tr>
            <td colspan="2" align="center"><input style="background-color: yellow" class="btn" type="submit" name="submit" value="submit"></td>
        </tr>


    </table>

</form>

</body>

</html>

<?php 

  if (isset($_POST['submit']))
  {	

    include('../dbcon.php');

  	$rollno = $_POST['rollno'];
  	$name = $_POST['name'];
  	$city = $_POST['city'];
  	$phone = $_POST['phone'];
  	$std = $_POST['std'];

    $imagename = $_FILES['img']['name'];
  	$tempname = $_FILES['img']['tmp_name'];

	move_uploaded_file($tempname,"../dataimg/$imagename");

  	$qry="INSERT INTO `student`(`rollno`, `name`, `city`, `contect`, `standerd`, `image`) VALUES ('$rollno','$name','$city','$phone','$std','$imagename')";

  	$run = mysqli_query($con,$qry);

  	if ($run==true) 
  	{
  		?>
<script>
    alert("Data inserted Succesfully.");
</script>

<?php
  	}
  	
  }
 ?>