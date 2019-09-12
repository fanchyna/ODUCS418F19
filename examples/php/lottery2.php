<html>
	<body>
		<h1> Lottery Game </h1>
		<?php
			$x=rand(1,3);
			$y=rand(1,3);
			echo "Today's lucky number is <font size=5 color=\"red\">$x</font><br>";
			echo "Your number is <font size=5 color="green">$y</font><br>";
			if($x==$y)
			{
				echo "<font color=green size=10> Congratulations, you win! </font>";
			} else {
				echo "<font color=red size=10> Sorry you lost :( Try again!</font>";
			}
		?>
	</body>
</html>