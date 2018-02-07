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
<h2>WELCOME: <?php echo strtoupper($_SESSION['user_name']); ?></h2>

<h2> <a id="hlinks" href="index.php"> Home </a></h2>
<h2> <a id="hlinks" href="view_post.php"> View Posts </a></h2>
<h2> <a id="hlinks" href="index.php?insert=insert">New Post</a></h2>
<h2> <a id="hlinks" href="comments.php"> Comments </a></h2>
<!--<h2> <a id="hlinks" href="index.php?upload=upload"> Post Images </a></h2>-->
<!--<h2> <a id="hlinks" href="edit_images.php"> Edit Images </a></h2>-->
<h2> <a id="hlinks" href="logout.php"> Logout </a></h2>

 </div>

<div id="welcome">
<p>This is the admin panel where you can manage your website files and content</p>


</div>
<?php
	if(isset($_GET['insert'])){
		
		include("posts.php");
	}

?>

<?php
	if(isset($_GET['upload'])){
		
		include("post_images.php");
	}

?>
</body>
</html>
<?php } ?>