<?php
					
				$dbhost ='127.0.0.1';
				$dbuser= 'root';
				$dbpass='';
				$dbname='kkcygwebdata';
				$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Error in connection');
	
	if(isset($_GET['delimg'])){
		
		$delete_id=$_GET['delimg'];
		$delete_query="delete from images where image_id='$delete_id' ";
		
		if(mysqli_query($conn, $delete_query)){
			
			echo "<script>alert('Image Has Been Deleted')</script>";
			echo "<script>window.open('edit_images.php','_self')</script>";
		}
	}

?>