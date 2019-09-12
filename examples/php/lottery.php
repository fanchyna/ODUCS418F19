<?php 
echo "<h1>Lottery Game</h1>";
$x=rand(1,3);
$y=rand(1,3);
echo "<p>Today'sa lucky number is <span style=color:red;font-size:200%>$x</span></p>";
echo "<p>Your number is <span style=color:green;font-size:200%>$y</span></p>";
if($y==$x) for($i=1;$i<=$y;$i++) echo "<h$i style=color:#808000;>Congratulations, you win!</h$i>";
else for($i=1;$i<=$y;$i++) echo "<h$i style=color:#800000;>Sorry, you lost :( Try again!</h$i>";
?>
