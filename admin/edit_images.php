<?php
session_start();

if(!isset($_SESSION['user_name'])){
	
	header("location: login.php");
	
}

else{

?>

<html>

<head>
<link href="style.css" rel="stylesheet"  type="text/css"/>
	<title> Admin panel</title>
</head>
<body>
<div id="header"> 
<img class="loginlogo "src="../images/logo.jpg" alt="Logo" height="100px" width="100px"/>
<h1>WELCOME TO THE ADMIN PANEL</h1></div>
<div id="sidebar"> 

<h2> <a  id="hlinks" href="index.php"> Home </a></h2>
<h2> <a  id="hlinks" href="index.php?insert=insert">New Post </a></h2>
<h2> <a  id="hlinks" href="comments.php">Comments </a></h2>
<h2> <a  id="hlinks" href="index.php?upload=upload">Post Images </a></h2>


</div>

 <table width="1104" border="5" align="center" bgcolor="skyblue">
 
	<tr>
		<td colspan= "10" align="center" bgcolor="yellow"> <h1> View All Images</h1></td>
		
	</tr>
	
	<tr bgcolor="orange">
		<th> image No </th>
		<th> Image Name</th>
		<th> Date Uploaded </th>
		<th> Description </th>
		<th> Image </th>
		<th> Delete</th>
		
	</tr>
	
	<?php 
				$dbhost ='127.0.0.1';
				$dbuser= 'root';
				$dbpass='';
				$dbname='kkcygwebdata';
				$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Error in connection');
				
	
		$query="select * from images";
		$run= mysqli_query($conn, $query) or die("Error".mysqli_error($conn));
		
		while($row=mysqli_fetch_array($run)){
			$image_id = $row['image_id'];
			$image_name=$row['image_name'];
			$image_post_date = $row['date'];
			$image_description = substr($row['image_description'],0,100);
			$image = $row['image'];
		
	?>
	
	<tr align="center">
		<td><?php echo $image_id ; ?></td>
		<td><?php echo $image_name; ?></td>
		<td><?php echo $image_post_date; ?></td>
		<td><?php echo $image_description; ?></td>
		<td><img src="../images/<?php echo $image; ?>" width="80" height="80"></td>
		<td><a href="delete_img.php?delimg=<?php echo $image_id; ?>"> Delete </a></td>
	</tr>
		<?php } ?>
		
</table>
</body>
</html>

<?php } ?>