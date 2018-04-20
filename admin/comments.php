<?php
session_start();

if(!isset($_SESSION['user_name'])){
	
	header("location: login.php");
	
}

else{
	
	?>
	

	<html>
<head>
<link href="style.css" rel="stylesheet"  type="text/css"/>
	<title> Admin panel</title>
</head>
<body>
<div id="header"> 
<img class="loginlogo "src="../images/logo.jpg" alt="Logo" height="100px" width="100px"/>
<h1>WELCOME TO THE ADMIN PANEL</h1></div>
<div id="sidebar"> 
<h2> <a id="hlinks"href="index.php"> Home </a></h2>
<h2> <a id="hlinks" href="view_post.php"> View Posts </a></h2>
<h2> <a id="hlinks" href="index.php?insert=insert">New Post</a></h2>
<!--<h2> <a id="hlinks" href="index.php?upload=upload"> Post Images </a></h2>-->
<!--<h2> <a id="hlinks" href="edit_images.php"> Edit Images </a></h2>-->

 </div>
 
 <div id="welcome">
<p>This is the admin panel where you can manage your website files and content</p>


</div>

 <?php

				
				include('../include/dbconnect.php');
				$select_comments="select * from comments order by 1 DESC";
				
				$run_query=mysqli_query($conn,$select_comments );
				
				while ($row=mysqli_fetch_array($run_query)){
				
				$comment_id=$row['c_id'];
				$comment_date= $row['c_date'];
				$commenter_name=$row['nm'];
				$commenter_phone=$row['phone'];
				$commenter_email=$row['email'];
				$comment_comment=$row['comments'];
				
				?>
				
				<div id="comments_content">
				
				<p align="left">Comment NO: <?php echo $comment_id; ?></p>
				
				<p align="left"> comment by: <i><?php echo $commenter_name; ?></i> <br/> 
				Phone Number: <?php echo $commenter_phone; ?></br>
				Email: <?php echo $commenter_email;?></p>
				
				<p align="justify"> <?php echo $comment_comment; ?></p>
				
				<p align="right">posted on: <?php echo $comment_date;?></p>
				
				<p align="right"><a href="deletecomment.php?del=<?php echo $comment_id; ?>"> Delete<h3></a></p>
				</div>
					
<?php } }?>
