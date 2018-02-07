
<html>

<head>
<link href="style.css" rel="stylesheet"  type="text/css"/>
	<title> Manage admins</title>
</head>
<body>
<div id="header"><h1>Manage Accounts </h1></div>

<a href="index.php"> <h1 align="center"> BACK </h1></a>


 <table width="600" border="5" align="center" bgcolor="skyblue">
 
	<tr>
		<td colspan= "10" align="center" bgcolor="yellow"> <h1> Account Details</h1></td>
		
	</tr>
	
	<tr bgcolor="orange">
		<th>user id</th>
		<th> User Name </th>
		<th> password </th>
		<th> Date created </th>
		<th> Delete </th>
	</tr>
	
	<?php 
		
				$dbhost ='127.0.0.1';
				$dbuser= 'root';
				$dbpass='';
				$dbname='kkcygwebdata';
				$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Error in connection');
				
	
		$query="select * from create_account";
		$run= mysqli_query($conn, $query) or die("Error".mysqli_error($conn));
		
		while($row=mysqli_fetch_array($run)){
			
			$user_id = $row['user_id'];
			$user_name= $row['username'];
			$user_password = $row['password'];
			$date_created = $row['date_account_created'];
			
		
	?>
	
	<tr align="center">
		<td><?php echo $user_id; ?></td>
		<td><?php echo $user_name; ?></td>
		<td><?php echo $user_password; ?></td>
		<td><?php echo $date_created; ?></td>
		<td><a href="delete_admin.php?del=<?php echo $user_id; ?>"> Delete </a></td>
	</tr>
		<?php } ?>
		
</table>



	<table width="600" border="5" align="center" bgcolor="skyblue">
 
	<tr>
		<td colspan= "10" align="center" bgcolor="yellow"> <h1> Login Details</h1></td>
		
	</tr>
	
	<tr bgcolor="orange">
		<th>user id</th>
		<th> User Name </th>
		<th> password </th>
		<th> Delete </th>
	</tr>
	
	 <?php 
		
		$query="select * from admin_login";
		$run= mysqli_query($conn, $query) or die("Error".mysqli_error($conn));
		
		while($row=mysqli_fetch_array($run)){
			
			$user_id2 = $row['user_id'];
			$user_name2= $row['user_name'];
			$user_password2 = $row['user_pass'];
			
		
	?>
	
	<tr align="center">
		<td><?php echo $user_id2; ?></td>
		<td><?php echo $user_name2; ?></td>
		<td><?php echo $user_password2; ?></td>
		<td><a href="delete_admin.php?del2=<?php echo $user_id2; ?>"> Delete </a></td>
	</tr>
		<?php } ?>
		
</table>
	
	
</body>
</html>