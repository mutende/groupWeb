<html>
<head>
	<title>images page </title>
	<link href="style.css" rel="stylesheet"  type="text/css"/>
	
	<style>
	#images {
		padding: 2px;
		margins: 0 auto;
		
	}
	#images a{
		margins:4px;
		dispaly:inline-block;
		border-radius: 6px;
	}
	#images hover{
		border-color: white;
		
	}
	
	</style>
</head>
<body>
<?php

				require_once('dbconnect.php');
				$query ="SELECT * FROM images";
				 
				$run_query =mysqli_query($conn, $query) or die("Error: ".mysqli_error($conn));
				
				while($row=mysqli_fetch_array($run_query)){
					
					$image_id=$row['image_id'];
					$date=$row['date'];
					$image_name=$row['image_name'];
					$image_description=substr($row['image_description'],0,50);
					$image= $row['image'];
					
				 
?>
<div id ="images">
<a href="full_images.php?id=<?php echo $image_id; ?>">
<img src="images/<?php echo $image; ?>"width="100" height="100"/>
</a>
<?php
mysqli_close($conn);
 } ?>
</div>

</body>
</html>