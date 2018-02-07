<html>
<head>

	<title>create super admin account</title>
</head>
<body>
	<form method="POST" action='' enctype="multipart/form-data">
		<table width= "400" align="center" border="10" bgcolor="skyblue">
			<tr>
				<td align="center" colspan="6" bgcolor="yellow"><h1> create account</h1></td>
			</tr>
			
			
			<tr>
				<td align="right">super user Name</td>
				<td><input type="text" name="sname" size="30"></td>
			</tr>
			
			<tr>
				<td align="right">super password</td>
				<td><input type="password" name="spassword" size="30"></td>
			</tr>
			
			<tr>
				<td>confirm  super passowrd</td>
				<td><input type="password" name="sconfirm_password"></td>
			</tr>
			
			
		<tr> 
		<td align="center" colspan="6"><input type="submit" name="screate" value="Ceate Account"></td>
		</tr>
		</table>
	</form>

</body>
</html>

<?php 

	



	if(isset($_POST['screate'])){
		$susername=$_POST['sname'];
		$sdate_account_created=date('y/m/d');
		$spassword=$_POST['spassword'];
		$sconfirm_password=$_POST['sconfirm_password'];
		
		
		
		if($susername=='' or $spassword=='' or $sconfirm_password==''){
			
			echo "<script>alert('some fields are empty')</script>";
		}
		
		else
		
				if( $password ==  $confirm_password){
				
							
				$dbhost ='127.0.0.1';
				$dbuser= 'root';
				$dbpass='';
				$dbname='kkcygwebdata';
				$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Error in connection');
				
				
				$insert_query="insert into super_account(username,date_account_created,password,confirm_password) VALUES ('$susername',
				'$sdate_account_created','$spassword','$sconfirm_password')";
				
				if(mysqli_query($conn,$insert_query)){
					
					$login_query= "insert into super_admin_login (user_name,user_pass) values('$susername','$spassword')";
					
					if(mysqli_query($conn,$login_query)){
						
						echo "<script>alert('account created')</script>";
						echo "<script>window.open('super_admin_login.php','_self')</script>";
						
					}
					else{
						die("Error 1:".mysqli_error($conn));
					}
				}
				
				else{
					
					die("Error 2:".mysqli_error($conn));
				}
		}else{
			
			echo "<script>alert('passwords do not match')</script>";
			
		}
}




?>