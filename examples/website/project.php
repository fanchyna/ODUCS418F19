<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head>
		<title>A Simple Website</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15" />
		<link rel="stylesheet" href="styles.css" />
	</head>
	<body>
	<div id="conteneur">
		  <div id="header">A Simple Website</div>
		  
		  <?php include 'navbar.php'; ?>
		<div id="centre">
	<?php
		require 'authentication.php';
		
		// connect to the server
		$connection = sqlsrv_connect( $server, $connectionInfo )
			or die("ERROR: selecting database server failed");
		
		// prepare SQL query
		$query = "SELECT * FROM project";
		
		// Execute SQL query
		$query_result = sqlsrv_query($connection, $query)
			or die( "ERROR: Query is wrong");
		
		// Output query results: HTML table
		echo "<table border=1>";
		echo "<tr>";
		
		// fetch attribute names
		foreach( sqlsrv_field_metadata($query_result) as $fieldMetadata)
			echo "<th>".$fieldMetadata['Name']."</th>";
		echo "</tr>";
		
		// fetch table records
		while ($line = sqlsrv_fetch_array($query_result, SQLSRV_FETCH_ASSOC)) {
			echo "<tr>\n";
			foreach ($line as $cell) {
				echo "<td> $cell </td>";
			}
			echo "</tr>\n";
		}
		echo "</table>";
		
		// close the connection with database
		sqlsrv_close($connection);
	?>
	</div>
</div>
</body>
</html>