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
<br>
<div style="width: 100%">
    <br>
    <table style="font-size: 25px" align="center">
        <tr>
            <td style="color: #fff">1.</td>
            <td><a style="color: yellow" href="addstudent.php">Add Student Detaills </a></td>
        </tr>

        <tr>
            <td style="color: #fff">2.</td>
            <td><a style="color:#BAD2D8" href="updatestudent.php">Update Student Detalls</a></td>
        </tr>

        <tr>
            <td style="color: #fff">3.</td>
            <td><a style="color: #3FF37F" href="deletestudent.php">Delete Student Detalls</a></td>
        </tr>

    </table>
</div>
</body>

</html>