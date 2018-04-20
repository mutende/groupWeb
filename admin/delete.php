<?php
					
				
	
	if(isset($_GET['del'])){
		include("../include/dbconnect.php");
		
		$delete_id=$_GET['del'];
		$delete_query="delete from posts where p_id='$delete_id' ";
		
		if(mysqli_query($conn, $delete_query)){
			
			echo "<script>alert('Post Has Been Deleted')</script>";
			echo "<script>window.open('view_post.php','_self')</script>";
		}
	}

?>