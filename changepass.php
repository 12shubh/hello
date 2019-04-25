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
include('connection.php');
     if(isset($_POST['changepass']))
      {
       $a=$_POST['oldp'];
       $b=$_POST['newp'];
       $qry="select * from student where id='$x' and password='$a'";
       $run=mysqli_query($conn,$qry);
       $r=mysqli_num_rows($run);
           if($r>0)
             {
                $qq= "update student set password= '$b' where id='$x'";
                $rr=mysqli_query($conn,$qq);
                    if($rr)
                    {
                      echo"<h4 align='center' style=color:green>password change</h4>";
                     }
                   
					 
              }
			   else
			        {
                     echo"<h4 align='center' style=color:red>incorrect old password</h4>";
                     }

	}

}

?>
<html>
<body bgcolor="skyblue">
<table align="center" style="background-color:white;margin-top:100px; width:40%;height:200px">
<form action="changepass.php" method="post">
<tr><td align="center" rowspan="6"><img src="logo/pass.jpg" width="100px" height="100px"></td></tr>
<tr>
<th>ENTER OLD PASS</th>  <td><input type="text" name="oldp"></td>
</tr>
<tr>
<th>ENTER NEW PASS</th>   <td><input type="text" name="newp"></td>
</tr>
<tr>
<td colspan="4" align="center"><input  style="" type="submit" value="SUBMIT" name="changepass"></td>
</tr>
<tr><td align="center" colspan="4"><a href="profile.php">GoTo Profile Page</a></td></tr>
</form>
</table>
</body>
</html>
