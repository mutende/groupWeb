<?php
					
				$dbhost ='127.0.0.1';
				$dbuser= 'root';
				$dbpass='';
				$dbname='kkcygwebdata';
				$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Error in connection');
	
	if(isset($_GET['del'])){
		
		$delete_id=$_GET['del'];
		
		
		$delete_query="delete from create_account where user_id='$delete_id' ";
		
		
		if(mysqli_query($conn, $delete_query)){
		echo "<script>alert('Account Has Been Deleted')</script>";
			echo "<script>window.open('manage_admins.php','_self')</script>";
			
		}
	}

	
	if(isset($_GET['del2'])){
		$delete_id2=$_GET['del2'];
		$delete_query2="delete from admin_login where user_id='$delete_id2' ";
		
		if(mysqli_query($conn, $delete_query2)){
			echo "<script>alert('Account Has Been Deleted')</script>";
			echo "<script>window.open('manage_admins.php','_self')</script>";
			
		}
		
		
	}
?>