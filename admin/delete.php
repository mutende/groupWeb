<?php
					
				$dbhost ='127.0.0.1';
				$dbuser= 'root';
				$dbpass='';
				$dbname='kkcygwebdata';
				$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Error in connection');
	
	if(isset($_GET['del'])){
		
		$delete_id=$_GET['del'];
		$delete_query="delete from posts where post_id='$delete_id' ";
		
		if(mysqli_query($conn, $delete_query)){
			
			echo "<script>alert('Post Has Been Deleted')</script>";
			echo "<script>window.open('view_post.php','_self')</script>";
		}
	}

?>