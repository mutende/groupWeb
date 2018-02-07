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

$dbhost ='127.0.0.1';
				$dbuser= 'root';
				$dbpass='';
				$dbname='kkcygwebdata';
				$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Error in connection');
				

$select_post ="select * from posts";


 if(isset ($_GET ['id'])){
	 
	 $page_id = $_GET['id'];
	 
	 $select_query ="select * from posts where post_id ='$page_id'";

$run_query = mysqli_query($conn, $select_query);

while($row=mysqli_fetch_array($run_query)){
	
	
	$post_id = $row['post_id'];
	$post_title = $row['post_title'];
	$post_date = $row['post_date'];
	$post_name = $row['name'];
	$post_conactinfo = $row['email_phoneno'];
	$post_content = ($row['post_content']);
	$post_image = $row['post_image'];
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