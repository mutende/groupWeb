<?php
	
	if(isset($_GET['del'])){

		include('../include/dbconnect.php');
		
		$delete_id=$_GET['del'];
		$delete_query="delete from comments where c_id='$delete_id' ";
		
		if(mysqli_query($conn, $delete_query)){
			
			echo "<script>alert('Comment Has Been Deleted')</script>";
			echo "<script>window.open('comments.php','_self')</script>";
		}
	}

?>