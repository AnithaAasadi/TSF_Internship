<?php
include("server.php");
session_start();
$data=$_POST['name'];
$sql="select Name from customers where NOT Name='$data'";
$result=mysqli_query($conn,$sql);
?>
<?php
$url = 'b3.jpg';
?>
<html>
<head>
	<title>Transfer Money</title>
	
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
<style>
table.center {
  margin-left: auto; 
  margin-right: auto;
  width: 275px;
  height: 170px;
  background-color: lightcyan;
}
td,th{
	text-align:center;
}
.btn {
  background-color: Black;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
  position: absolute;
  left: 720px;
  top: 330px;
}
.btn:hover{
	background-color: darkcyan;
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
	<script type="text/javascript">
		function send() {
			// body...
			var a = document.getElementById("sender").value;
			var arr = ["A.Anitha","A.Sravanalakshmi","A.Pushpalatha","A.Anand","A.Saraswathi","K.Mahesh","V Kohli","Ms Dhoni","KL Rahul","O.Ramya"];
			var index = arr.indexOf(a);
    		if (index > -1) 
        		arr.splice(index, 1);
        	var str = "";
        	for (var i = 0; i < arr.length; i++) 
        		str = str +"<option value="+arr[i]+">"+arr[i]+"</option>";
        	
        	document.getElementById("receiver").innerHTML = str;
		}
	</script>
</head>
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

	<form method="post" action="update_amount.php">
	<table border="2" class="center">
	<th colspan="2" >Money Transaction</th>
	<tr><td><b>Receiver Name </b></td>
	<td>
		<select id="receiver" name="receiver" style="width: 150px; height: 30px; font-size: 18px;" required>
		<option selected>Select </option>
		<?php
			while ($row = $result->fetch_assoc()) 
			{
				$uname1 = $row['Name'];
				echo "<option value=$uname1 name='name'>";
				echo $uname1;
				echo "</option>";
			}
		?>
	</select>
	</td>
	</tr>
	<tr><td><b>Amount</b></td>
		<td>
		<input type="number" min="1" name="transfer" placeholder="Enter Amount" style="width: 150px; height: 30px; font-size: 18px;" required>
		</td>
	</tr>
		<center><?php echo "<button name='sender' value=$data class='btn'>Send</button>";?></center>
	
</form>

</table>
</body>
</html>