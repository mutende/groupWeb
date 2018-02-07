<! DOCKTYPE HTML>
<html>
<head>
	<link href="style.css" rel="styesheet" type="text/css"/>
	<style>
		#searchbox input[type="text"]{
	
	height: 35px;
	width: 220px;
	border: none;
	font-size: 17px;
	text-align: center;
}
#searchbox input[type="submit"]{
	
	height: 35px;
	width: 80px;
	text-align:center;
	font-size: 17px;
	
}

	</style>
</head>
<body>
<div id="sidebar">
<center>
 <a href="#"><img src="icons/facebook_icon.ico" width="50" height="50"></img></a>
 <a href="#"><img src="icons/twitter-icon.png" width="50" height="50"></img></a>
 </center>
		<div id="searchbox"> 

			<form action="search.php", method="get" enctype="multipart/form-data">
			
				<input type="text" name="value" placeholder="search titles of posts" size="25" align="center">
				<input type="submit" name="search" value="search">
				
				</form>
		</div>
		
		<h2 align="center">Recent Posts</h2>
<?php

				$dbhost ='127.0.0.1';
				$dbuser= 'root';
				$dbpass='';
				$dbname='kkcygwebdata';
				
				require_once('/dbconnect.php');
				$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Error in connection');
				
				$query ="SELECT * FROM posts order by 1 DESC LIMIT 0,5";
				 
				$run_query1 =mysqli_query($conn, $query) or die("Error: ".mysqli_error($conn));
				
				while($row=mysqli_fetch_array($run_query1)){
					
					$post_id=$row['post_id'];
					$title=$row['post_title'];
					$image=$row['post_image'];
					
				 
?>
	<center>
	
			
		<a href="pages.php?id=<?php echo $post_id; ?>">
		<h2> <?php echo $title; ?></h2>
		</a>
		
		<a href="pages.php?id=<?php echo $post_id; ?>">
		<img src='images/<?php echo $image ;?>' width='150' height='200'>
		</a>
	</center>
				 
				 <?php } ?>
				</div>
				
</body>
</html>