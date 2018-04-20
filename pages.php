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
	</style>
</head>
<body>
		<div> <?php include("include/headings.php");?></div>
		<div> <?php include ("include/navigationbar.php");?></div>
	
		
	
<?php

 if(isset ($_GET ['id'])){

	require_once('include/dbconnect.php');
	 
	 $page_id = $_GET['id'];
	 
	 $select_query ="select * from posts where p_id ='$page_id'";

$run_query = mysqli_query($conn, $select_query);

while($row=mysqli_fetch_array($run_query)){
	
	
	$post_id = $row['p_id'];
	$post_title = $row['p_ttl'];
	$post_date = $row['p_date'];
	$post_name = $row['nm'];
	$post_conactinfo = $row['contacts'];
	$post_content = ($row['p_content']);
	$post_image = $row['p_img'];

?>

<h2>

 <?php echo $post_title;?>
 
 </h2>  
 
 
<p align="left"> Publishide on : <b><?php echo $post_date; ?> 
 </b></p>
 
 <p align="justify"> <?php echo $post_content?>
 </P>
 
 <center> <img src="images/<?php echo $post_image; ?>"width="200" height="250"/></center>
<?php } } ?>


		<div id="pgfooter"> <?php include ("include/footer.php");?> </div>
</body>
</HTML>