<HTML>
	<head>
		<link href="style.css" rel="stylesheet" type="text/css">
		<meta name="view" content="width=device-width initial-scale=1">
	<title>
		kkcy4changegeeks
	</title>
		<style>
		p{
			padding:0px 20px 0px 20px;
			font-size: 20px;
		}
		h2{
			
			text-align: center;
			font-size: 35px;
			font-weight: bold;
		}
		a{
			text-decoration: none;
			padding: -10px 0px 10px 0px;
		}
	</style>
</head>
<body>
		<div> <?php include("include/headings.php");?></div>
		<div> <?php include ("include/navigationbar.php");?></div>
			
			<div id="content">
			<?php
			
				require_once('/include/dbconnect.php');
				if(isset ($_GET['search'])){
					
					
					$search_id = $_GET['value'];
					
					$search_query ='select * from posts where post_title like '.$search_id;
					
					$run_query = mysqli_query($conn, $search_query  ) or die("Error".mysqli_error($conn));
					
					
					if(empty($search_id)){
						
						echo "<script>alert('you are searching for nothing')</script>";
						echo "<script>window.open('index.php''_self')</script>";
					}
					
					else{
					while($search_row=mysqli_fetch_array($run_query)){
						
						$post_title = $search_row['post_title'];
						$post_image = $search_row['post_image'];
						$post_content = substr($search_row ['post_content'],0,150);
						$post_id = $search_row['post_id'];
						
						mysqli_close($conn);
				
			?>
				<center>
				
				<a href="pages.php?id=<?php echo $post_id; ?>">
				<h2><?php echo $post_title; ?> </h2>
				</a>
				<img src="images/<?php echo $post_image; ?>" width="150" height="200">
				</center>
				<p align="left"><?php echo $post_content; ?> </p>
				
			
				<?php } } } ?>
			</div>
		<div> <?php include ("include/sidebar.php");?> </div>
		<div> <?php include ("include/footer.php");?> </div>
		
</body>

</HTML>