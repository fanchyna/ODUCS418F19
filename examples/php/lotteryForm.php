<html>
	<form method ="post" >
		Pick a student (0-4)! 
		<input type="text" name="studentID" /> <br>
		<input type="submit" value = "go"/>
	</form>
	<?php 
		$lastname = array ('Smith', 'Kim', 'Davis', 'Miller', 'Taylor');
		$firstname = array('John', 'Anthony', 'Richard', 'Thomas', 'Jessica');
		if (!empty($_POST['studentID'])){
			$v = $_POST['studentID'];
			echo "Today's Winner is: ".$firstname[$v]." ".$lastname[$v];
		}	
	?>
</html>
