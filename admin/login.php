<?php 

session_start();


?>

<html>
	<head>
		<title>Admin Login</title>
		<link rel="stylesheet" href="style.css">
	</head>
	
<body id="loginbody">	
<form method="post" action="login.php">
	<div id="loginmaindiv">
		<img class="loginlogo "src="../images/logo.jpg" alt="Logo" height="80px" width="80px"/>
		
		 <h1 align="center">Admin Login</h1>
	
		 <label align="center"> User Name </label><br/>
		<input type ="text" name="user_name" placeholder="username"/><br/>
		
		<label align="center">User Password</label><br/>
		<td><input type ="password" name="user_pass" placeholder="password"/></br>

		<input type="submit" name="login" value="Login"/>
		
		<!--
		
		<a id="m_account_" href="create_admin_account.php"> Create Account? </a>
		<a id="m_account_" href="manage_admins.php"> Manage Accounts? </a>
		-->
		
	</div>
</form>
</body>

</html>

<?php 
				
				require_once('../include/dbconnect.php');

				$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Error in connection');


				if(isset($_POST['login'])){
					
					
					$user_name= mysqli_real_escape_string($conn,$_POST['user_name']);
					$user_pass=mysqli_real_escape_string($conn,$_POST['user_pass']);
					
					$encrpt = md5($user_pass);
					
					$admin_query ="select * from admin_login where user_name='$user_name' AND user_pass='$user_pass'";
					
					$run = mysqli_query($conn, $admin_query);
					
					if(mysqli_num_rows($run)>0){
						
						$_SESSION['user_name']=$user_name;
						echo "<script> window.open ('index.php','_self')</script>";
					}
				
						else{
							
							echo "<script>alert('username or password incorrect')</script>";
					
					}

					mysqli_close($conn);
				}
		
?>