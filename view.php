<!DOCTYPE html>
<html>
<head>
<title>customer details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
table, td, th {
  border: 3px solid blue;
}

table {
  border-collapse: collapse;
  width: 50%;
  
}

td,th {
  text-align: center;
}
body, html {
  height: 100%;
  margin: 0;
  background-color: lightcyan;
}
body
{
    background-color: lightcyan;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100%; 

}
.btn {
  background-color: Black;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
  position: absolute;
  left: 700px;
  top: 350px;
}

.btn:hover {
  background-color: darkcyan;
}
</style>
<?php
	include("server.php");
	$data=$_POST['name'];
	$query="select * from customers where Name='$data'";
	if(!mysqli_query($conn,$query))
		die("Failed ".mysqli_error($conn));
		$row = mysqli_query($conn,$query);
		$result = mysqli_fetch_array($row);
		$id = $result["S.no"];
		$uname = $result["Name"];
		$email = $result["EmailId"];
		$balance = $result["Balance"];

	?>
</head>
<body bgcolor="cyan">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Spark Banking System</a>
    </div>
    
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php">Home</a></li>
      <li><a href="customers1.php">View Customers</a></li>
      <li><a href="transaction.php">All Transaction</a></li>
    </ul>
  </div>
</nav>
<table align="center" style="width: 500px; line-height:30px;">
		<tr>
			<th colspan="4"><h2>Customer Details</h2></th>
		</tr>
		<tr>
			<th>S.No</th>
			<th>Name</th>
			<th>EmailId</th>
			<th>Current Balance</th>
		</tr>
		<tr>
			<td><?php echo $id ?></td>
			<td><?php echo $uname ?></td>
			<td><?php echo $email ?></td>
			<td><?php echo $balance ?></td>
		</tr>
	</table>

	<form method="POST" action="transfer_amount.php">
	<div class="container">
		<?php
  		echo "<Button class='btn' type='submit' name='name' value=$uname>Transfer Money</Button>";
  		?>

	</div> 
	</form>
    </html>