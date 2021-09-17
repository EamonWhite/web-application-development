<!DOCTYPE html>
<html>
<head>
	<title>DreamMaker Database</title>
	
<style>
	.bg {
		background: url('img/nature.png') no-repeat;
		width: 100%;
		height: 100%;
  }
</style>
</head>

<body class="bg">

	<?php
	
		//Step 1:  Create a database connection
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpassword = "";
		$dbname = "dreammakerservices";

		$connection = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
		
		//Test if connection occoured
		if(mysqli_connect_errno()){
			die("DB connection failed: " .
				mysqli_connect_error() .
					" (" . mysqli_connect_errno() . ")"
					);
		}

		if (!$connection)
			{
				die('Could not connect: ' . mysqli_error());
			}
		
		
		
		
		//Step 2: Perform Database Query

		$result = mysqli_query($connection,"SELECT * FROM services");
		
		
		
		
		//Step 3: User returned data
		echo "<table border='1' id='myTable'>
		<tr>
		<th>Service Name</th>
		<th>Service Description</th>
		<th>Price</th>
		</tr>";
		
		while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . $row['description'] . "</td>";
			echo "<td>" . $row['price'] ."</td>";
			echo "</tr>";
		}
		
		echo "</table>";
		
		
		
		//4.  Release returned data 
		mysqli_free_result($result);

		
		
		//5.  Close database connection
		mysqli_close($connection);
		
		
	?>

</body>
<script>
	document.getElementById("myTable").style.color = "white";
</script>
</html>