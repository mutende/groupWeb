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
<style>
table{
	margin-top: 20px;
}
</style>
	<title> Admin panel</title>
</head>
<body>
<div id="header"> 
<img class="loginlogo "src="../images/logo.jpg" alt="Logo" height="100px" width="100px"/>
<h1>WELCOME TO THE ADMIN PANEL</h1></div>
<div id="sidebar"> 

<h2> <a id="hlinks" href="index.php">Home</a></h2>
<h2> <a id="hlinks" href="index.php?insert=insert">New Post</a></h2>
<h2> <a id="hlinks" href="comments.php">Comments</a></h2>
<!--<h2> <a id="hlinks" href="index.php?upload=upload">Post Images</a></h2>-->
<!--<h2> <a id="hlinks" href="edit_images.php">Edit Images</a></h2>-->

 </div>
 
  <table width="1104" border="5" align="center" bgcolor="skyblue">
 
	<tr>
		<td colspan= "10" align="center" bgcolor="yellow"> <h1> View All Posts</h1></td>
		
	</tr>
	
	<tr bgcolor="orange">
		<th> Post No </th>
		<th> Post Date </th>
		<th> Post Auther </th>
		<th> Post Title </th>
		<th> Post Image </th>
		<th> Post content </th>
		<th> Delete Post </th>
		<th> Edit Post </th>
	</tr>
	
	<?php 
		
				$dbhost ='127.0.0.1';
				$dbuser= 'root';
				$dbpass='';
				$dbname='kkcygwebdata';
				$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Error in connection');
				
	
		$query="select * from posts";
		$run= mysqli_query($conn, $query) or die("Error".mysqli_error($conn));
		
		while($row=mysqli_fetch_array($run)){
			
			$post_id = $row['post_id'];
			$post_date = $row['post_date'];
			$post_auther = $row['name'];
			$post_title = $row['post_title'];
			$post_image = $row['post_image'];
			$post_content = substr($row['post_content'],0,100);
		
	?>
	
	<tr align="center">
		<td><?php echo $post_id; ?></td>
		<td><?php echo $post_date; ?></td>
		<td><?php echo $post_auther; ?></td>
		<td><?php echo $post_title; ?></td>
		<td><img src="../images/<?php echo $post_image; ?>" width="80" height="80"></td>
		<td><?php echo $post_content; ?></td>
		<td><a href="delete.php?del=<?php echo $post_id; ?>"> Delete </a></td>
		<td><a href="edit_post.php?edit=<?php echo $post_id; ?>"> Edit </a></td>
	</tr>
		<?php } ?>
		
</table>
</body>
</html>
<?php } ?>