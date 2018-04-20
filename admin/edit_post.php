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
<div id="header"><a href="index.php"> <h1>welcome to the admin panel </h1></a></div>
<div id="sidebar"> 

<h2> <a id="hlinks" href="index.php"> Home </a></h2>
<h2> <a id="hlinks" href="view_post.php"> View Posts </a></h2>
<h2> <a id="hlinks" href="posts.php">New Post </a></h2>
<h2> <a id="hlinks" href="#">Comments </a></h2>

 </div>

<?php

				



if(isset($_GET['edit'])){

	include("../include/dbconnect.php");
	
	$edit_id=$_GET['edit'];
	
	$edit_query="select *from posts where p_id='$edit_id'";
	
	$run_edit =mysqli_query($conn, $edit_query);
	
	while($edit_row =mysqli_fetch_array($run_edit)){
		
		
	$post_id = $edit_row['p_id'];
	$post_title = $edit_row['p_ttl'];
	$post_author = $edit_row['nm'];
	$post_contact_info=$edit_row['contacts'];
	$post_image = $edit_row['p_img'];
	$post_content = $edit_row['p_content'];


?>
	


	<form method="POST" action="edit_post.php?edit_form=<?php echo $post_id;?>" enctype="multipart/form-data">
	
	<table width="600" bgcolor="skyblue" align="center" border="2" >
		<tr>
			<td align ="center" colspan="6" ><h1> Edit Post</h1></td>
		</tr>
		
		<tr> 
		<td align="right">POST TITLE:</td>
		<td><input type="text" name="title" size="30" value="<?php echo $post_title; ?>"></td>
		</tr>
		
		<tr> 
		<td align="right">NAME:</td>
		<td><input type="text" name="name" size="30" value="<?php echo $post_author; ?>">></td>
		</tr>
		
		<tr> 
		<td align="right">EMAIL/PHONE NO:</td>
		<td><input type="text" name="contact_info" size="30" value="<?php echo $post_contact_info; ?>"></td>
		</tr>
		
		<tr> 
		<td align="right">POST CONTENT:</td>
		<td><textarea name="content" cols="40" rows="20" > <?php echo $post_content; ?></textarea></td>
		</tr>
		
		<tr> 
		<td>POST IMAGE:</td>
		<td><input type="file" name="image"></td>
		<td><img src="../images/<?php echo $post_image; ?>" width="80" height="80"></td>
		</tr>

		<tr> 
		<td align="center" colspan="6"><input type="submit" name="update" value=" Update Now"></td>
		</tr>
</form>

<?php }} ?>
</body>
</html>


<?php


if(isset($_POST['update'])){
		
	  $update_id = $_GET['edit_form'];
	  $post_title1= $_POST['title'];
	  $post_date1= date('y/m/d');
	  $post_name1= $_POST['name'];
      $post_contact_info1= $_POST['contact_info'];
	  $post_content1= $_POST['content'];
	  $post_image1= $_FILES['image']['name'];
	  $image_tmp= $_FILES['image']['tmp_name'];
	  
	  if($post_title1=='' or $post_name1=='' or $post_contact_info1==''
			or $post_content1==''){
				
				echo "<script>alert('Some fields are empty')</script>";
				
				exit();
				
			}
			
			else{
				
				move_uploaded_file($image_tmp,"../images/$post_image1");
				
				$update_query="update posts set p_ttl='$post_title1', p_date='$post_date1',nm='$post_name1',contacts='$post_contact_info1',p_content='$post_content1',p_img='$post_image1' where p_id='$update_id'";
				if(mysqli_query($conn,$update_query)){
					
					echo "<script>alert('Post Updated')</script>";
					echo "<script>window.open('view_post.php','_self')</script>";
					
				}
				else{
					
					die("Error:".mysqli_error($conn));
				}
			}
}	

mysqli_close($conn)
?>

<?php } ?>