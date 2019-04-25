<?php 
session_start();
    if(!isset($_SESSION['uid']))
	{
	  header('location:login.php');
     }
	else
{
 $x=$_SESSION['uid'];

$q="select * from student where id='$x'";

include('connection.php');
$res=mysqli_query($conn,$q);
if($res==true){
	//echo "success";
	$r=mysqli_num_rows($res);
	if($r>0){
		$arr=mysqli_fetch_assoc($res);
		//var_dump($arr);
	}
}else{
echo "Failed";
}

 ?>
 <?php 
include('header.php');
?>
<html>
<head>
    <title>Welcome To Profile Page</title>
</head>
<body bgcolor="yellowgreen">
<br>
<img src="img/<?=$arr['image']; ?>" width="200px" height="150px">
<br>
<a href="changepic.php">Change your profile picture</a>
<a href="changepass.php" style="float:right">Change password</a>
<h3 align="left">WELCOME: <?=$arr['name'];?></h3>

<table border="1" align="center" style="margin-top:50px"> 
     <tr style="background-color:black;color:white;">
	     <th>ID</th>
		 <th>NAME</th>
		 <th>USERNAME</th>
		 <th>EMAIL</th>
		 <th>CONTACT NO</th>
		 <th>ACTION</th>
	 </tr>
	 <tr align="center" style="background-color:white;">
	     <td><?= $arr['id'];?></td>
		 <td><?= $arr['name']; ?></td>
		 <td><?= $arr['username']; ?></td>
		 <td><?= $arr['email'];?></td>
		 <td><?= $arr['mobile']; ?></td>
		 <td><a href="edit.php">Edit</a></td>
	 </tr>

</table>
</body>	
</html>

<?php
}
?>