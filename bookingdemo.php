<?php

// Connect to the database.
$conn = new PDO('mysql:localhost:33006;railwaysystem', 'root', 'root');

// Get the passenger name from the user input.
$passenger_name = $_POST['passenger_name'];

// Get the train ID from the passenger table by matching the passenger name.
$train_id = getTrainIdByPassengerName($passenger_name);
$conn = new PDO('mysql:host=localhost:33006:railwaysystem', 'root', 'root');
// If the train ID is not found, then retrieve the train ID from the trains table.
if ($train_id === null) {
  $train_id = retrieveTrainIdFromTrainsTable($passenger_name);
}

// If the train ID is still not found, then insert a new record into the passenger table with the passenger name and a default train ID of 1.
if ($train_id === null) {
  // Prepare the SQL query.
  $sql = 'INSERT INTO passengers (passenger_name, train_id) VALUES (:passenger_name, 1)';
  $stmt = $conn->prepare($sql);

  // Bind the passenger name parameter.
  $stmt->bindParam(':passenger_name', $passenger_name);

  // Execute the query.
  $stmt->execute();

  // Get the train ID from the newly inserted record.
  $train_id = $conn->lastInsertId();
}

// Display the train ID to the user.
echo "The train ID for the passenger name \"$passenger_name\" is $train_id.";

function getTrainIdByPassengerName($passenger_name) {
  // Prepare the SQL query.
  $conn = new PDO('mysql:host=localhost:33006:railwaysystem', 'root', 'root');
  $sql = 'SELECT train_id FROM passengers WHERE passenger_name = :passenger_name';
  $stmt = $conn->prepare($sql);

  // Bind the passenger name parameter.
  $stmt->bindParam(':passenger_name', $passenger_name);

  // Execute the query.
  $stmt->execute();

  // Get the train ID from the result set.
  $train_id = $stmt->fetchColumn();

  // Return the train ID.
  return $train_id;
}

function retrieveTrainIdFromTrainsTable($train_name) {
  // Prepare the SQL query.
  $conn = new PDO('mysql:host=localhost:33006:railwaysystem', 'root', 'root');
  $sql = 'SELECT train_id FROM trains WHERE train_name = :train_name';
  $stmt = $conn->prepare($sql);

  // Bind the train name parameter.
  $stmt->bindParam(':train_name', $train_name);

  // Execute the query.
  $stmt->execute();

  // Get the train ID from the result set.
  $train_id = $stmt->fetchColumn();

  // Return the train ID.
  return $train_id;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Book a ticket</title>
	<LINK REL="STYLESHEET" HREF="STYLE.CSS">
	<style type="text/css">
		#booktkt	{
			margin:auto;
			margin-top: 50px;
			width: 40%;
			height: 60%;
			padding: auto;
			padding-top: 50px;
			padding-left: 50px;
			background-color: rgba(0,0,0,0.3);
			border-radius: 25px;
		}
		html { 
		  background: url(img/bg7.jpg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		#journeytext	{
			color: white;
			font-size: 28px;
			font-family:"Comic Sans MS", cursive, sans-serif;
		}
		#trains	{
			margin-left: 90px;
			font-size: 15px;
		}
		#submit	{
			margin-left: 150px;
			margin-bottom: 40px;
			margin-top: 30px
		}
	</style>
	<script type="text/javascript">
		function validate()	{
			var trains=document.getElementById("trains");
			if(trains.selectedIndex==0)
			{
				alert("Please select your train");
				trains.focus();
				return false;		
			}
		}
	</script>
</head>
<body>
	<?php
		include ('head.php');
	?>
	<div id="booktkt">
	<h1 align="center" id="journeytext">Choose your journey</h1><br/><br/>
	<form method="post" name="journeyform" onsubmit="return validate()">
	Enter UserName:<input type="text" name="passenger_name" value="name" required><br/><br/>
		<select id="trains" name="trains" required>
			<option selected disabled>-------------------Select trains here----------------------</option>
			<option value="macherlaMEMU" >Guntur - Macherla--> MEMU</option>
			<option value="LTT" >Mumbai Centeral -  Chennai--> Express</option>
			<option value="Vandebharat">Vizag - Secundrabad--> SuperFast</option>
			<option value="rajdhani" >Mumbai - Delhi--> SuperFast</option>
			<option value="palnadu" >Secundrabad - Guntur--> Express</option>
		</select>
		<br/><br/>
		<input type="submit" name="submit" id="submit" class="button" />
	</form>
	</div>
	</body>
	</html>