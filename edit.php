<?php
$db = mysqli_connect("localhost","root","","grid");
if(!$db){
	die('error in db' . mysqli_error($db));
}else{
$id = $_GET['id'];

$qry="select * from crud where user_id=$id";
  		$run=$db->query($qry);
  		if($run -> num_rows > 0) {
			while($row=$run -> fetch_assoc()){
  			$username = $row['user_name'];
  			$useremail = $row['user_email'];
  			$usermobile = $row['user_mobile'];	

} 
}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" type="text/css"  href="style.css">
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --> 
	<title>Edit User</title>
</head>
<body>

<form method="post"align="center" style="color:Black; background:lightblue;font-size:20px;padding-top: 20px ; border-radius: 65px;">
 		<h3 align="center">Update your Details</h3>	
		<label>Name : </label>
		<input type="text" name="name" title="your name" value="<?php echo $username;?>" autocomplete="off" required>
		<br><br>
		<label>Email : </label>
		<input type="email" name="email" title="your email" value="<?php echo $useremail;?>" autocomplete="off" required>
		<br><br>
		<label>Mobile number : </label>
		<input type="tel" name="mobile"  pattern="[6789][0-9]{9}"  title="Ten digits code" autocomplete="off" placeholder="Enter your mobile number" value="<?php echo $usermobile;?>"required/>

		<!-- <input type="text" name="mobile"   required> -->
		<br><br>
		<input type="submit" name="update" value="Update" style= "background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 15px;">

	</form>



</body>
</html>

<?php

	if(isset($_POST['update'])){
		$name = $_POST['name'];
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];

		$qry="update crud set user_name='$name', user_email='$email', user_mobile='$mobile' where user_id=$id";

		if(mysqli_query($db,$qry)){
			header('location:user.php');
		} else{
			echo mysqli_error($db);
		}


	}