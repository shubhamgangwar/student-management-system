<?php
	session_start();
	if (isset($_SESSION['uid']))
	{
		header('location: admin/admindash.php');
	}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Admin Login</title>

    <style>
        @import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";

        .btn {
            width: 30%;
            background: yellow;
            border: 2px double #4caf50;
            color: black;
            font-size: 18px;
            cursor: pointer;
            margin: 12px 0;
        }

        .body {
            background-image: url(dataimg/bg.jpg);
        }
    </style>

</head>

<body class="body">
    <div style="background-color: yellow">
        <h1 align="center" style="background: transparent">Admin Login</h1>
    </div>
    <div align="center"> <img src="images/login.png.png" style="max-width: 150px"></div>
    <form method="post" action="login.php">

        <table align="center">

            <tr>
                <td><i class="fa fa-user"></i></td>
            </tr>
            <tr>
                <td style="color: #fff">Username :</td>
                <td><input type="text" name="uname" placeholder="Username"></td>
            </tr>

            <tr>
                <td><i class="fa fa-lock"></i></td>
            </tr>
            <tr>
                <td style="color: #fff">Password</td>
                <td><input type="password" name="pass" placeholder="password"></td>
            </tr>

            <tr>
                <td colspan="2" align="center"><input type="submit" name="login" value="Login" class="btn"></td>
            </tr>

        </table>
    </form>
</body>

</html>

<?php 

	include('dbcon.php');
	if (isset($_POST['login'])) 
	{
		$username = $_POST['uname'];
		$password = $_POST['pass'];

		$qry= "SELECT * FROM `admin` WHERE username ='$username' AND password = '$password'";

		$run=mysqli_query($con,$qry);
		$row=mysqli_num_rows($run);


		if ($row <1) 
		{
			?>
<script>
    alert("username or password not match !!");
    window.open('login.php', '_self');
</script>

<?php	
		}
		else
		{
			$data = mysqli_fetch_assoc($run);
			$id=$data['id'];
			session_start();
			$_SESSION['uid'] = $id;
			header('location:admin/admindash.php');
		}
	}

 ?>