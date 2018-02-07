<HTML>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
<title>
kkcy4changegeeks
</title>
</head>
<body>
		<div> <?php include("include/headings.php");?></div>
		<div> <?php include ("include/navigationbar.php");?></div>
		
		<div id="comments" align="center" >
		<form action='' method="post" align="center">
	
			<h1 align="center"> <b>TALK TO US</b></h1>
		
		<label>Name</label><br/>
		<input type="text" name="name" size="35"/><br/>
		
		<label>Phone number</label><br/>
		<input type="text" name="phone" size="35"/><br/>
		
		<label>Email</label><br/>
		<input type="text" name="email" size="35"/><br/>
		
		<label>Write To Us</label><br/>
		<textarea  name="comment" cols="40" rows="10"></textarea><br/>
		
		<input type="submit" name="submit" value="Send" colspan="6"/><br/>
		
		<?php 
				$dbhost ='127.0.0.1';
				$dbuser= 'root';
				$dbpass='';
				$dbname='kkcygwebdata';
				$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Error in connection');
		
			if(isset($_POST['submit'])){
	
				$comment_date= date('y/m/d');
				$commenter_name=$_POST['name'];
				$commenter_phoneno=$_POST['phone'];
				$commenter_email=$_POST['email'];
				$comment_comment=$_POST['comment'];
				
				if($commenter_name=='' or  $commenter_email=='' or $comment_comment==''){
					
					echo "<script>alert('Either name, email,phone no or comment field is empty')</script>";
					echo "<script>window.open('contactus.php','_script')</script>";
				}
				else{
					
					$dbhost ='127.0.0.1';
					$dbuser= 'root';
					$dbpass='';
					$dbname='kkcygwebdata';
					$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Error in connection');
					
					$insert_query="insert into comments (comment_date,name,phone,email,comment) VALUES ('$comment_date','$commenter_name','$commenter_phoneno','$commenter_email','$comment_comment')";
				
				if(mysqli_query($conn,$insert_query)){
						
						
					echo"<script>alert('Thank you for your comments')</script>";
					echo"<script>window.open('contactus.php','_self')</script>";
					}
					else{
						die("Error:".mysqli_error($conn));
					}
				}
			}
		
		?>
		
		</form>
		
 <center>
 <a href="#"><img src="icons/facebook_icon.ico" width="50" height="50"></img></a>
 <a href="#"><img src="icons/twitter-icon.png" width="50" height="50"></img></a>
 </center>
	</div>
	
</body>
<HTML>