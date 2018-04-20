<html>
<head>

	<title>create admin account</title>
</head>
<body>
	<form method="POST" action='' enctype="multipart/form-data">
		<table width= "400" align="center" border="10" bgcolor="skyblue">
			<tr>
				<td align="center" colspan="6" bgcolor="yellow"><h1> create account</h1></td>
			</tr>
			
			
			<tr>
				<td align="right">user Name</td>
				<td><input type="text" name="name" size="30"></td>
			</tr>
			
			<tr>
				<td align="right">password</td>
				<td><input type="password" name="password" size="30"></td>
			</tr>
			
			<tr>
				<td>confirm passowrd</td>
				<td><input type="password" name="confirm_password"></td>
			</tr>
			
			
		<tr> 
		<td align="center" colspan="6"><input type="submit" name="create" value="Ceate Account"></td>
		</tr>
		</table>
	</form>

</body>
</html>

<?php 

	



	if(isset($_POST['create'])){
		$username=$_POST['name'];
		$date_account_created=date('y/m/d');
		$password=$_POST['password'];
		$confirm_password=$_POST['confirm_password'];

		//$hashed_pass=password_hash($password, PASSWORD_DEFAULT,array('cost' => 12));
		
		//$hashed_confirm_pass =password_hash($confirm_password,PASSWORD_DEFAULT,array('cost' => 12));
		
		if($username=='' or $password=='' or $confirm_password==''){
			
			echo "<script>alert('some fields are empty')</script>";
		}
		
		else
		
				if( $password ==  $confirm_password){
				
					include('../include/dbconnect.php');
				
				$insert_query="insert into admin(usrnm,dt_accnt_crtd,pass,c_pass) VALUES ('$username',
				'$date_account_created','$password','$confirm_password')";
				
				if(mysqli_query($conn,$insert_query)){

						echo "<script>alert('account created')</script>";
						echo "<script>window.open('index.php','_self')</script>";	
					
				}
				
				else{
					
					die("Error :".mysqli_error($conn));
				}
		}else if($password !=  $confirm_password){
			
			echo "<script>alert('passwords do not match')</script>";
			
		}else{

			echo "<script>alert('User name Already exist, use another User name')</script>";
		}
}

?>