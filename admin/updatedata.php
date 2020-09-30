<?php 

	include('../dbcon.php');

  	$rollno = $_POST['rollno'];
  	$name = $_POST['name'];
  	$city = $_POST['city'];
  	$phone = $_POST['phone'];
  	$id = $_POST['sid'];
  	$std = $_POST['std'];

    $imagename = $_FILES['img']['name'];
  	$tempname = $_FILES['img']['tmp_name'];

	move_uploaded_file($tempname,"../dataimg/$imagename");

  	$qry="UPDATE `student` SET  `rollno` = '$rollno', `name` = '$name', `city` = '$city', `contect` = '$phone', `standerd` = '$std', `image` = '$imagename' WHERE `id` = $id;";

  	$run = mysqli_query($con,$qry);

  	if ($run == true) 
  	{
  		?>
<script>
    alert("Data Updated Succesfully.");
    window.open('updateform.php?sid=<?php echo $id;?>', '_self');
</script>

<?php
  	}
  	
 ?>