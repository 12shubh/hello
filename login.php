<?php
if(isset($_POST['login'])){
	$e=$_POST['email'];
	$p=$_POST['pass'];
	include('connection.php');
	$q="select * from student where email='$e' and password='$p'";
	
	$res=mysqli_query($conn,$q);
	
	if($res==true){
		$rec=mysqli_num_rows($res);
		if($rec==1)
		{
		   $data=mysqli_fetch_assoc($res);
			$id=$data['id'];
  session_start();
  
  $_SESSION['uid']=$id;
          
			header('location:profile.php');
		}
		else
		{
			echo "<script> alert('Either email or password wrong');</script>";
		}
	}else{
		echo "Login Failed";
	}

}

?>

<?php
  include('titlehead.php');
?>
<html>
<head>
   <title>Login</title>
</head>
<body bgcolor="skyblue">
<h2 align="center">Login Page</h2>
<table align="center" style="margin-top:60px;width:30%; height:200px;background-color:white;color:brown;">
<form action="login.php" method="POST">
<tr>
   <td rowspan="7"><img src="logo/login.jpg" width="120px" height="130px"></td>
</tr>
<tr>
<th> Email Id</th><td><input type="text" name="email" required></td>
</tr>
<tr>
<th> Password </th><td><input type="password" name="pass" required></td>
</tr>
<tr align="center">
<td colspan="2"><input type="submit" name="login"></td>
</tr>
<tr align="center">
<td colspan="2"><a href="index.php">Click Here For New User Registration</a></td>
</tr>

</form>
</table>
</body>
</html>

