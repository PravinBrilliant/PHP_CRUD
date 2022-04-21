<?php $db=mysqli_connect("localhost","root","","grid");

if (isset($_POST['submit'])) {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];

		$dup=mysqli_query($db,"Select * from crud where user_email='$email'");

	if(mysqli_num_rows($dup)>0)
	{
		echo '<script>alert("Email already registered")</script>';
	}else{
	$insert="Insert into crud values(null,'$name','$email','$mobile')";
	if(mysqli_query($db,$insert))
	{
		echo'<script>alert("Registered Succesfully")</script>';
	}
	else{
		echo'<script>alert("Registered Failed")</script>';
	}}
}
 ?>



<!DOCTYPE Html>
<html>
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
	 <link rel="stylesheet" type="text/css"  href="style.css">



	 <title>PHP Crud</title>



</head>
<body bgcolor="grey">
	<form method="post" align="center" style="color:Black; background:lightblue;font-size:20px;padding-top: 20px ; border-radius: 65px;" >
		<h3 align="center">Enter your details here....</h3>
		<label>Name : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="text" name="name" placeholder="Enter your name" autocomplete="off" title="your name" required>
		<br><br>
		<label>Email : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
		<input type="email" name="email" placeholder="Enter your e-mail" autocomplete="off" title="your email" required>
		<br><br>
		<label >Mobile No : </label>
		<input type="tel" name="mobile"  pattern="[6789][0-9]{9}" autocomplete="off"  title="Ten digits code"  placeholder="Enter your mobile number" required/>

		<!-- <input type="tel"  pattern="[0-9]{10}" name="mobile" placeholder="Enter your mobile number"  required> -->
		<br><br>
		<input type="submit" name="submit" value="Submit" style= "background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 15px;">

	</form>

<hr>
<h3 align="center" style="color:black;font-size:40px; text-decoration: underline;padding-top: -15px;">User List</h3>
<table class="table table-responsive" style="width:85%" border="6" align="center">
	<tr>
		<th style="color:red; font-size: 20px;font-weight: bold;">S.no</th>
		<th style="color:black;font-size: 20px;font-weight: bold;">Name</th>
		<th style="color:red;font-size: 20px;font-weight: bold;">Email</th>
		<th style="color:black;font-size: 20px;font-weight: bold;">Mobile</th>
		<th style="color:red;font-size: 20px;font-weight: bold;">Operation</th>
	</tr>
  <?php 
  		$i=1;
  		$qry="select * from crud";
  		$run=$db->query($qry);
  		if($run -> num_rows > 0) {
			while($row=$run -> fetch_assoc()){
  				$id=$row['user_id'];

  ?>

<tr>
	<td align="center" style="color:black; font-weight: bold;"><?php echo $i++; ?>.</td>
	<td align="center"><?php echo $row['user_name'] ?> </td>
	<td align="center"><?php echo $row['user_email'] ?> </td>
	<td align="center"><?php echo $row['user_mobile'] ?> </td>
	<td align="center" >
		<a href="edit.php?id=<?php echo $id; ?>"onclick="return confirm('Are you sure want to edit?')" style="text-decoration:none;">Edit</a> |
		<a href="delete.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure want to delete?')" style="text-decoration:none;">Delete</a>
</tr>
<?php
       }
   }
?>


</table>

</table>
</body>
</html>

<?php


?>
