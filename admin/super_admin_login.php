<?php 

session_start();


?>
<html>


	<head>
		<title>Admin Login</title>
	</head>
	
<body>
<form method="post" action="login.php">
	<table width="400" border="10" align="center" bgcolor="skyblue">
		<tr>
			
			<td align="center" bgcolor="yellow" colspan="4"> <h1>Admin Login Form</h1></td>
		</tr>
		
		<tr>
		<td align="right">Super User Name</td>
		<td><input type ="text" name="suser_name"></td>
		</tr>
		
		<tr>
		<td align="right"> Super User Password</td>
		<td><input type ="password" name="suser_pass"></td>
		</tr>
		
		<tr>
		<td colspan="6" align="center"> <input type="submit" name="login" value="Login"></td>
		</tr>
		
		<tr>
		<center><td><a id="m_account_" href="create_super_admin_account.php"> Create Account? </a></td></center>
		</tr>
	</table>
</form>
</body>
</html>

<?php 
				
				$dbhost ='127.0.0.1';
				$dbuser= 'root';
				$dbpass='';
				$dbname='kkcygwebdata';
				$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Error in connection');


				if(isset($_POST['login'])){
					
					
					$suser_name= mysqli_real_escape_string($conn,$_POST['suser_name']);
					$suser_pass=mysqli_real_escape_string($conn,$_POST['suser_pass']);
					
					$encrpt = md5($user_pass);
					
					$admin_query ="select * from super_admin_login where user_name='$suser_name' AND user_pass='$suser_pass'";
					
					$run = mysqli_query($conn, $admin_query);
					
					if(mysqli_num_rows($run)>0){
						
						$_SESSION['suser_name']=$suser_name;
						echo "<script> window.open ('manage_admins.php','_self')</script>";
					}
				
						else{
							
							echo "<script>alert('username or password incorrect')</script>";
						}
				
				}
				


?>