<html>
	<head>
		<title>inserting a new post</title>
	</head>
<body>

	<form method="POST" action='#' 
	enctype="multipart/form-data">
	
	<table width="600" align="center" border="2" >
		<tr>
			<td align ="center" colspan="6" ><h1> NEW POST</h1></td>
		</tr>
		
		<tr> 
		<td align="right">POST TITLE:</td>
		<td><input type="text" name="title" size="30"></td>
		</tr>
		
		<tr> 
		<td align="right">NAME:</td>
		<td><input type="text" name="name" size="30"></td>
		</tr>
		
		<tr> 
		<td align="right">EMAIL/PHONE NO:</td>
		<td><input type="text" name="contact_info" size="30"></td>
		</tr>
		
		<tr> 
		<td align="right">POST CONTENT:</td>
		<td><textarea name="content" cols="40" rows="20"></textarea></td>
		</tr>
		
		<tr> 
		<td>POST IMAGE:</td>
		<td><input type="file" name="image"></td>
		</tr>

		<tr> 
		<td align="center" colspan="6"><input type="submit" name="publish" value=" Publish Now"></td>
		</tr>
</form>
</body>
</html>


<?php

if(isset($_POST['publish'])){
	
	  $post_title= $_POST['title'];
	  $post_date= date('y/m/d');
	  $post_name= $_POST['name'];
      $post_contact_info= $_POST['contact_info'];
	  $post_content= $_POST['content'];
	  $post_image= $_FILES['image']['name'];
	  $image_tmp= $_FILES['image']['tmp_name'];
	  
	  if($post_title=='' or $post_name=='' or $post_contact_info==''
			or $post_content==''){
				
				echo "<script>alert('Some fields are empty')</script>";
				
				exit();
				
			}
			
			else{
				
				$dbhost ='127.0.0.1';
				$dbuser= 'root';
				$dbpass='';
				$dbname='kkcygwebdata';
				$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Error in connection');
				
				move_uploaded_file($image_tmp,"../images/$post_image");
				
				$insert_query="insert into posts(post_title,
				post_date,name,email_phoneno,post_content,post_image)
				values('$post_title','$post_date','$post_name','$post_contact_info','$post_content','$post_image')";
				
				
				if(mysqli_query($conn, $insert_query)){
					
					
					echo"<script>alert('Post Published Successfully')</script>";
					echo"<script>window.open('view_post.php','_self')</script>";
				}
				else{
					
					die("Error:".mysqli_error($conn));
				}
			}
}	
?>}