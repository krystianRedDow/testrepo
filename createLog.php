<?php
$ourFileName = $argv[2].$argv[1].".txt";
$ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");

$mysqli = new mysqli ("127.0.0.1","serkr522","krystian!!","phpci");
if($mysqli->connect_errno > 0) {echo "ERROR";}




$sql="SELECT * from build_error WHERE build_id=".$argv[1]." ";
$result = $mysqli->query($sql);
while($row=$result->fetch_assoc()) {
$text = "Errortype: ".$row["plugin"]."|||| File: ".$row["file"]."|||| Line: ".$row["line_start"]."|||| Message: ".$row["message"]."\n";
fwrite($ourFileHandle,$text);
}

fclose($ourFileHandle);

?>