<html>
<head>
<title>registration form</title>
</head>
<body bgcolor="skyblue">
<?php 
include('titlehead.php');
?>
<h2 align="center"> REGISTRATION PAGE</h2>
<form action="index.php" method="POST" name="f1">
<table  style="background-color:white;color:brown; margin-top:50px" width="50%" height="250px" align="center">
 <tr>
 <td><center>NAME</center></td>   <td><center><input type="text" name="name" required></center> </td> 
 </tr>
 <tr>
 <td><center>USERNAME</center></td>    <td><center><input type="text" name="uname"  required></center> </td>
 </tr>
 <tr>
 <td><center>PASSWORD</center></td>    <td><center><input type="PASSWORD"  name="pass" required></center></td>
 </tr>
 <tr>
 <td><center>EMAIL</center></td>     <td><center><input type="EMAIL" name="email" required></center></td>
 </tr>
 <tr>
<td><center>MOBILE NO</center></td>    <td><center><input type="NUMBER" name="num" required></center></td> 
</tr>
<tr>
<td><center><input type="submit" value="SUBMIT" name="LOGIN" ></center></td>    <td><center><input type="RESET" value="RESET" ></center></td></tr>
<tr>
   <td colspan="2" align="center"><a href="login.php">Click Here For LogIn.....</a></td>
</tr>
</table>
</form>
</body>
</html>
<tr>
<?php
if(isset($_POST['LOGIN']))
{
$N=$_POST['name'];
$U=$_POST['uname'];
$P=$_POST['pass'];
$E=$_POST['email'];
$M=$_POST['num'];
include('connection.php');
$t="select * from student where email='$E'";
$y=mysqli_query($conn,$t);
if($y==true)
{
     $u=mysqli_num_rows($y);
	
       if($u>0)
           { 
		   
	           echo "<h1 align='center' style=color:red;>Email Already Registered</h1>";
               }
			 
			 
       else
            {
             
             $sql="INSERT INTO `student`(`name`, `username`, `password`, `email`, `mobile`) VALUES ('$N','$U','$P','$E','$M')";
             $res=mysqli_query($conn,$sql);
              if($res==true)
	          {
                echo"<h1 align='center' style=color:green>Registration Successfylly</h1>";
              
	             }
	            else
	               {
	                 echo "<h2 align='center' style=color:red>Registraion Failed</h2>";
	                 }
	 
              }
    }
}
?>