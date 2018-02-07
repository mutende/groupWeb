<! DOCKTYPE HTML>
<html>
<head>
			<link href="style.css" rel="stylesheet" type="text/css"/>
			<style>
				#content p{
					font-size:17px;
					padding:0px 10px 0px 10px;
					font-family: sans-serif;
				}
				a{
					text-decoration: none;
					font-family:sans-serif;
					font-size: 15px;
					padding: 0px 20px 0px 0px;
					color:black;
				}
				a:hover{
					
					font-weight: bold;
					font-size:19px;
					cursor:pointer;
				}
			</style>
</head>
<body>
		<div id="content">

		<?php

					
		require_once('/dbconnect.php');
		$select_random_post = " select * from posts order by  rand() LIMIT 0,4";

		$run_post = mysqli_query($conn, $select_random_post);

		while($row=mysqli_fetch_array($run_post)){


		$post_id = $row['post_id'];
		$post_title = $row['post_title'];
		$post_date = $row['post_date'];
		$post_name = $row['name'];
		$post_conactinfo = $row['email_phoneno'];
		$post_content = substr($row['post_content'],0,200);
		$post_image = $row['post_image'];


		mysqli_close($conn);
		?>

		<h2>
		<a href ="pages.php?id=<?php echo $post_id;?>">
		<?php echo $post_title;?>
		</a>

		</h2>  


		<p align="left"> publishide on : <b><?php echo $post_date; ?> 
		</b></p>
		
		<center> <img src="images/<?php echo $post_image; ?>"width="150" height="200"/></center>
		<p align="justify"> <?php echo $post_content?>
		<p align="right"> <a href="pages.php?id=<?php echo $post_id;?>"> Read More </a></P>
		<p align="left"> Published by: <?php echo $post_name ?></p>

	
		<?php } ?>
				
		</div>
		</body>
	</html>