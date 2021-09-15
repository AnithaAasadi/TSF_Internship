<?php
$url = 'b3.jpg';
?>
<html>
<head>
<title>Transaction history</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
</head>
<style>
table, td, th {
  border: 2px solid black;
}

table {
  border-collapse: collapse;
  width: 50%;
  border:5px;
  background-color: lightcyan;
}

td,th {
  text-align: center;
}
body, html {
  height: 100%;
  margin: 0;
}
body
{
    background-image:url('<?php echo $url ?>');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100%; 

}
</style>
<body>
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
<?php
	include("server.php");
	$query="select * from transactions";
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0)
	{ 
		echo "<center><div>";
		echo "<table>";
		echo "<tr>";
			echo "<th colspan='5'><h2>All Transactions</h2></th>";
		echo "</tr>";
		echo "<tr>";
			echo "<th>Sender</th>";
			echo "<th>Receiver</th>";
			echo "<th>Amount</th>";
			echo "<th>Time</th>";
		echo "</tr>";
			while($row=mysqli_fetch_assoc($result))
			{
			echo "<tr>
				<td>".$row['Sender']."</td>
				<td>".$row['Receiver']."</td>
				<td>".$row['amount']."</td>
				<td>".$row['time']."</td>
			</tr>";
			}
			echo "</table></div></center>";
		}
		else
			echo "0 results";
		mysqli_close($conn);
		?>
</body>
</html>