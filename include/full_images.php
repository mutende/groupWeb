<HTML>
	<head>
		<link href="style.css" rel="stylesheet" type="text/css">
		<meta name="view" content="width=device-width initial-scale=1">
	<title>
		images page
	</title>
</head>
<body>
<?php
require_once('dbconnect.php');

$select_post ="select * from images";

if(isset ($_GET ['id'])){
	
	 $image_id = $_GET['id'];
	 
	 $select_query ="select * from images where image_id ='$image_id'";

$run_query1 = mysqli_query($conn, $select_query);

while($row=mysqli_fetch_array($run_query1)){
	
	$image_id=$row['image_id'];
	$date=$row['date'];
	$image_name=$row['image_name'];
	$image_description=$row['image_description'];
	$image= $row['image'];
					

?>

<p align="left"> <i>Publishide on</i> : <b><?php echo $date; ?> 
 </b></p>
 
 <center> <img src="images/<?php echo $image; ?>"width="200" height="250"/></center>

<p> <i>Details about Photo</i>:<br><?php echo $image_description;?></p>

<?php }mysqli_close($conn); } ?>


</body>

</HTML>