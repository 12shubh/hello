<?php
include('header.php');

?>
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
if(isset($_POST['edit']))
 {
   $n=$_POST['name'];
   $u=$_POST['uname'];
   $e=$_POST['email'];
   $m=$_POST['num'];
   include('connection.php');
   $qry="UPDATE student SET name = '$n', username = '$u', email = '$e', mobile = '$m' WHERE id = '$x'";
   $run=mysqli_query($conn,$qry);
 
  
        if($run>0)
          {

            echo"<h4 align='center' style=color:green;>UPDATED RECORD</h4>";
           }
          else
           {
		     echo"<h4 align='center' style=color:red;>failed</h4>";
            
            }
        
 
}

?>
<body bgcolor="skyblue">
<form action="edit.php" method="POST" name="f1">
<table style="background-color:white;color:brown; margin-top:50px" width="50%" height="250px" align="center">
 <tr>
 <td><center>NAME</center></td>   <td><center><input type="text" name="name" value="<?=$arr['name'];?>"></center> </td> 
 </tr>
 <tr>
 <td><center>USERNAME</center></td>    <td><center><input type="text" name="uname" value="<?=$arr['username'];?>" ></center> </td>
 </tr>
 <tr>
 <td><center>EMAIL</center></td>     <td><center><input type="EMAIL" name="email" value="<?=$arr['email'];?>" ></center></td>
 </tr>
 <tr>
<td><center>MOBILE NO</center></td>    <td><center><input type="NUMBER" name="num" value="<?=$arr['mobile'];?>" ></center></td> 
</tr>
<tr>
<td align="center" colspan="8"><input type="submit" value="SUBMIT" name="edit" ></td>  </tr>
<tr >
   <td align="center" colspan="8"><a href="profile.php"> GO PROFILE PAGE</a></td>
</tr>
</table>
</form>
</body>
<?php 
}
?>