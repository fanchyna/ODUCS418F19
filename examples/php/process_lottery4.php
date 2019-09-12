<?php 
	$lastname = array ('Smith', 'Kim', 'Davis', 'Miller', 'Taylor');
	$firstname = array('John', 'Anthony', 'Richard', 'Thomas', 'Jessica');
	$v = $_POST['studentID'];
	echo "Today's Winner is: ".$firstname[$v]." ".$lastname[$v];
?>
