<?php
  session_start();
  if(!isset($_SESSION['account_id']))
  header('location:login.php');
 
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>doctors</title>
<style>
body{
	background-color:#e6e6e6;
}
img{
	width: 200px;
	height: 200px;
    border: 20px;
    padding: 20px;
 
}
div{
    
	font-family:Arial, Helvetica, sans-serif;
	color:black; 
    
}
.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4682b4;
  color: white;
}

.topnav-right {
  float: right;
}
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 10%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}
form.example::after {
  content: "";
  clear: both;
  display: table;
}

</style>
</head>
<body>
<?php 
$db = mysqli_connect("localhost", "root", "", "clinic");?>

<div class="topnav">
  <a class="active" href="docList.php">Doctor Details</a>
  <a href="appointment.php">Book appointment</a>
  <a href="contact.php">Contact</a>
  <div class="topnav-right">
    <a href="profile.php">Profile</a>
    <a href="logout.php">Logout</a>
  </div>
</div>
<br>
<form class="example" action="/action_page.php">
  <input type="text" placeholder="Search.." name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form> 
<?php
$list="select * from doctors ";
$result=mysqli_query($db,$list);
while ( $rows = $result->fetch_assoc() ) {
	?>
	<div>
	<br><img src="images/<?php echo $rows['pic']?>" style="  float:left; style=width:200px; height:200px;"/><br><br><br>
	Name:<?php echo $rows['name']?><br>
	Age:<?php echo $rows['age']?><br>
	Gender:<?php echo $rows['gender']?><br>
    Speciality:<?php echo $rows['speciality']?><br>
	Qualification:<?php echo $rows['qualification']?><br>
    Experience:<?php echo $rows['experience']?><br>
    Timing:<?php echo $rows['timing']?><br><br><br><br><hr>
	</div></a>
<?php
}
?>
</body>
</html>
  