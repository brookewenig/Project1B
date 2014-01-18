<?php
$db_connection = mysql_connect("localhost", "cs143", "");
if (!db_connection) {
	$errmsg=mysql_error($db_connection);
	print "Connection failed <br>";
	exit(1);
}
mysql_select_db("TEST", $db_connection);
echo <<<END
<form action='queries.php' method='GET'>
Type an SQL query in the following box: <br><br>
<textarea name="query" cols="60" rows = "8"></textarea>
<input type="submit" value="Submit!"><br>
END;
$query=$_GET['query'];
$rs=mysql_query($query, $db_connection);
echo "<strong>Results from MySQL:</Strong><br><br>";
echo "<table border='1'>";
$numCols = mysql_num_fields($rs);
echo "<tr>";
for ($i=0; $i<$numCols; $i++)
{
	echo "<td align='center'><strong>";
	echo mysql_field_name($rs, $i);
	echo "</strong></td>";
}
echo "</tr>";
while ($row=mysql_fetch_row($rs)){
	echo "<tr align='center'>";
	foreach ($row as $element){
	if ($element === NULL)
		echo "<td>N/A</td>";
	else
		echo "<td>$element</td>";
	}
	echo "</tr>";
}
echo "</table>";

mysql_close($db_connection);
?>
