<?php 
$orig = "I'll \"walk\" the <em>dog</em> now";
$a = htmlentities($orig);
$b = html_entity_decode($a); echo $a; // I'll
&quot;walk&quot; the &lt;em&gt;dog&lt;/em&gt; now
echo $b; // I'll "walk" the <em>dog</em> now
 ?>
