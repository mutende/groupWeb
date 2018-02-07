
<html>
<head>

	<title>post image</title>
</head>
<body>

	<form method="POST" action='' enctype="multipart/form-data">
		<table width= "400" align="center" border="2">
			<tr>
				<td align="center" colspan="6"><h1> Post an Image</h1></td>
			</tr>
			
			
			<tr>
				<td align="right">Image Name</td>
				<td><input type="text" name="name" size="30"></td>
			</tr>
			
			<tr>
				<td align="right">Image Description</td>
				<td><textarea name="description" cols="30" rows="10"></textarea></td>
			</tr>
			
			<tr>
				<td>Select Image</td>
				<td><input type="file" name="image"></td>
			</tr>
			
			
		<tr> 
		<td align="center" colspan="6"><input type="submit" name="post" value=" Post Image"></td>
		</tr>
		</table>
	</form>

</body>
</html>

<?php 

	



	if(isset($_POST['post'])){
		
		$image_name=$_POST['name'];
		$image_post_date=date('y/m/d');
		$image_description=$_POST['description'];
		$image=$_FILES['image']['name'];
		$image_temp=$_FILES['image']['tmp_name'];
		
		
		if($image_name=='' or $image_description=='' or $image==''){
			
			echo "<script>alert('some fields are empty')</script>";
		}
		
		else{
			
							
				$dbhost ='127.0.0.1';
				$dbuser= 'root';
				$dbpass='';
				$dbname='kkcygwebdata';
				$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Error in connection');
				
				move_uploaded_file($image_temp,"../images/$image");
				
				$insert_query="insert into images(date,image_name,image_description,image) VALUES ('$image_post_date',
				'$image_name','$image_description','$image')";
				
				if(mysqli_query($conn,$insert_query)){
					
					
					echo "<script>alert('Image Posted')</script>";
					echo "<script>window.open('index.php','_self')</script>";
				}
				
				else{
					
					die("Error:".mysqli_error($conn));
				}
		}
}




?>