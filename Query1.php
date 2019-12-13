<html>
<body>

<?php


$servername = "localhost";// sql server name
$username = "root";// sql username
$password = "";// sql password
$dbname  = "library";// database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT Name, Club FROM Members, Joined, BookClubs WHERE Members.ID = Joined.ID AND Joined.CID = BookClubs.CID";
$result = $conn->query($sql);// get result

if (!$result){
	trigger_error('Invalid query: ' .$conn->error);
}

if($result->num_rows > 0){// check for number of rows; if there are records, build html table
 echo "<table style='border: solid 1px black;'>
	<tr>
	    <th>Member's Name</th>
	    <th>Club's Name</th>

	</tr>";
}

while ($row = $result -> fetch_assoc()){// store the result in an array; then put them in html table one by one
	echo '<tr>
		<td>'.$row['Name'].'</td>
		<td>'.$row['Club'].'</td>
		
	      </tr>';
}
 echo "</table>";

?>
</body>
</html>
