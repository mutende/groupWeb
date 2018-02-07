<?php
					
				$dbhost ='127.0.0.1';
				$dbuser= 'root';
				$dbpass='';
				$dbname='kkcygwebdata';
				$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Error in connection');
	
	if(isset($_GET['del'])){
		
		$delete_id=$_GET['del'];
		$delete_query="delete from comments where comment_id='$delete_id' ";
		
		if(mysqli_query($conn, $delete_query)){
			
			echo "<script>alert('Comment Has Been Deleted')</script>";
			echo "<script>window.open('comments.php','_self')</script>";
		}
	}

?>