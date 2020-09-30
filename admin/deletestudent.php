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

<form action="deletestudent.php" method="post">
    <font color="yellow" size="4px">
        <table align="center">
            <tr>
                <th>Enter Standerd</th>
                <td><input type="number" name="standerd" placeholder="Enter Standerd" required="required"></td>
                &nbsp;
                <th>Enter Name</th>
                <td><input type="text" name="stuname" placeholder="Enter student name"></td>

                <td colspan="2"><input style="background-color: yellow" type="submit" name="submit" value="search"></td>
            </tr>
        </table>
</form>
<br>
<table align="center" width="80%" border="1">
    <tr style="background-color: #000">
        <th>No</th>
        <th>Image</th>
        <th>Name</th>
        <th>Roll No</th>
        <th>Edit</th>
    </tr>


    <?php 
	if (isset($_POST['submit'])) 
	{
		include('../dbcon.php');

		$standerd =$_POST['standerd'];
		$name = $_POST['stuname'];

		$qry = "SELECT * FROM `student` WHERE `standerd` = '$standerd' AND `name` LIKE '%$name%'";
		$run = mysqli_query($con,$qry);

		if  (mysqli_num_rows($run) < 1)
		{
			echo "<tr><td colspan='5'>No Records found</td></tr>";
		}
		else 
		{

			$count = 0;
			while ($data=mysqli_fetch_assoc($run)) 
			{
				$count++;
		?>

    <tr>
        <td><?php echo $count; ?></td>
        <td><img src="../dataimg/<?php echo $data['image'];?>" style="max-width: 80px" /></td>
        <td><?php echo $data['name']; ?></td>
        <td><?php echo $data['rollno']; ?></td>
        <td><a href="deleteform.php?sid=<?php echo $data['id']; ?>"> Delete</a></td>
    </tr>

    <?php
    
		}

	}
}

 ?>

</table>
</font>