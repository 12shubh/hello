<?php
   include('header.php');
?>
<?php 
session_start();
if(isset($_POST['submit']))
{
 $a=$_FILES['pic'];
//var_dump($a);
$name=$a['name'];
$loc=$a['tmp_name'];
 $d="img/".$name;
 $res=move_uploaded_file($loc,$d);
 if($res)
 {
     $id=$_SESSION['uid'];
	 $q="update student set image='$name' where id='$id'";
	 include('connection.php');
	 $responce=mysqli_query($conn,$q);
	 if($responce){
	     echo"<h4 align='center' style=color:green>Profile Change Successfully</h4>";
	 }
	 else
	 {
	     echo"<h3 align='center' style=color:red>Failed</h3>";
	 }
 
 }


}


?>

<html>
<head>
    <title>Edit Profile Picture</title>
</head>
<body bgcolor="skeblue">
<table align="center" border="1" style="margin-top:150px; background-color:white;color:brown;">
<form action="changepic.php" method="POST" enctype="multipart/form-data">
<tr align="center">
<th>Select Profile Picture</th><td><input type="file" name="pic"></td>
</tr>
<tr align="right">
<td colspan="2"><input type="submit" name="submit"></td>
</tr>
</form>
<tr align="center">
<td colspan="2"><a href="profile.php"> Goto Profile</a></td>
</tr>
</table>
</body>
</html>