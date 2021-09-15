<?php
    include("server.php");
// $conn=mysqli_connect("localhost","root","");
// 	$db=mysqli_select_db($conn,"db");
	$sender = $_POST["sender"];
	$receiver = $_POST["receiver"];

	// Sender Amount 

	$sql = "SELECT Balance FROM customers WHERE name = '$sender'";
	if(!mysqli_query($conn,$sql))
	{
		echo "<script type='text/javascript'>alert('Data Invalid')</script>";
		die("");
	}

	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$sender_amount = $row["Balance"];

	// Receiver Amount

	$sql = "SELECT Balance FROM customers WHERE name = '$receiver'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$receiver_amount = $row["Balance"];

	$amount = $_POST["transfer"];

	if($sender_amount >= $amount){

		$amount_of_sender = $sender_amount - $amount;
		$sql = "UPDATE customers set Balance = $amount_of_sender where name = '$sender'";
		$result = mysqli_query($conn,$sql);

		$amount_of_receiver = $receiver_amount + $amount;
		$sql = "UPDATE customers set Balance = $amount_of_receiver where name = '$receiver'";
		$result = mysqli_query($conn,$sql);

		$sql = "INSERT into transactions(Sender,Receiver,amount,Time) values('$sender','$receiver',$amount,now())";
		$result = mysqli_query($conn,$sql);

		$message = "Transaction Successful";
		echo "<script type='text/javascript'>alert('$message')</script>";

		include 'customers1.php';

	}else{

		$message = "Insufficient Balance";
		echo "<script type=text/javascript>alert('$message)</script>";

		include 'customers1.php';

	}
?>