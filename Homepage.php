<html>
<body>

<?php

if (!empty($_GET['BookID'])){
$bid = $_GET['BookID'];// get the bid value from url parameters
}

$servername = "localhost";// sql server name
$username = "root";// sql username
$password = "";// sql password
$dbname  = "library";// database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);



if(isset($_GET['mode']) == 'delete'){

$sqldelete = "DELETE FROM Books WHERE BID='$bid'";//delete statement
$delete = $conn->query($sqldelete);//execute the query
if($delete)
 { 
  echo "Record deleted successfully!";
 }
}
echo "Members";
$sql = "SELECT * FROM Members";// embed a select statement
$result = $conn->query($sql);// get result

if($result->num_rows > 0){// check for number of rows; if there are records, build html table
 echo "<table style='border: solid 1px black;'>
	<tr>
	    <th>MemberID</th>
	    <th>Name</th>
	    <th>Phone</th>
	    <th>Email</th>
	    <th>Address</th>
	    <th>Age</th>
	    <th>Sex</th>
	    <th>Register_Date</th>
	    <th>Books_Read</th>
	    <th>Hold</th>

	</tr>";
}

while ($row = $result -> fetch_assoc()){// store the result in an array; then put them in html table one by one
	echo '<tr>
		<td>'.$row['ID'].'</td>
		<td>'.$row['Name'].'</td>
		<td>'.$row['Phone'].'</td>
		<td>'.$row['Email'].'</td>
		<td>'.$row['Address'].'</td>
		<td>'.$row['Age'].'</td>
		<td>'.$row['Sex'].'</td>
		<td>'.$row['RDate'].'</td>
		<td>'.$row['Books_Read'].'</td>
		<td>'.$row['Hold'].'</td>		
	      </tr>';
}
 echo "</table>";

echo "<br>";

echo "Books";
$sql = "SELECT * FROM Books";// embed a select statement
$result = $conn->query($sql);// get result

if($result->num_rows > 0){// check for number of rows; if there are records, build html table
 echo "<table style='border: solid 1px black;'>
	<tr>
	    <th>BookID</th>
	    <th>Title</th>
	    <th>Author</th>
	    <th>Quantity</th>
	    <th>Edit</th>
	    <th>Delete</th>

	</tr>";
}

while ($row = $result -> fetch_assoc()){// store the result in an array; then put them in html table one by one
	echo '<tr>
		<td>'.$row['BID'].'</td>
		<td>'.$row['Title'].'</td>
		<td>'.$row['Author'].'</td>
		<td>'.$row['Quantity'].'</td>

		<td style="border: solid 1px black;"> <a href="edit.php?BookID='.$row['BID'].'">Click </a></td>

		<td> <a href="Homepage.php?BookID='.$row['BID'].'&mode=delete">Delete </a></td>
	      </tr>';
}
 echo "</table>";
echo "<a href=Insert.php>Insert New Book </a>";

echo "<br>";
echo "<br>";

echo "Prizes";
$sql = "SELECT * FROM Prizes";// embed a select statement
$result = $conn->query($sql);// get result

if($result->num_rows > 0){// check for number of rows; if there are records, build html table
 echo "<table style='border: solid 1px black;'>
	<tr>
	    <th>Number_of_books</th>
	    <th>Prize</th>

	</tr>";
}

while ($row = $result -> fetch_assoc()){// store the result in an array; then put them in html table one by one
	echo '<tr>
		<td>'.$row['Num_of_Books'].'</td>
		<td>'.$row['Prize'].'</td>
		
	      </tr>';
}
 echo "</table>";

echo "<br>";

echo "Book Clubs";
$sql = "SELECT * FROM BookClubs";// embed a select statement
$result = $conn->query($sql);// get result

if($result->num_rows > 0){// check for number of rows; if there are records, build html table
 echo "<table style='border: solid 1px black;'>
	<tr>
	    <th>CID</th>
	    <th>Club</th>
	    <th>HostID</th>
	    <th>Book</th>
	    <th>Meet_Day</th>
	    <th>Meet_Time</th>

	</tr>";
}

while ($row = $result -> fetch_assoc()){// store the result in an array; then put them in html table one by one
	echo '<tr>
		<td>'.$row['CID'].'</td>
		<td>'.$row['Club'].'</td>
		<td>'.$row['HostID'].'</td>
		<td>'.$row['Book'].'</td>
		<td>'.$row['MeetDay'].'</td>
		<td>'.$row['MeetTime'].'</td>
		
	      </tr>';
}
 echo "</table>";

echo "<br>";

echo "Joined";
$sql = "SELECT * FROM Joined";// embed a select statement
$result = $conn->query($sql);// get result

if($result->num_rows > 0){// check for number of rows; if there are records, build html table
 echo "<table style='border: solid 1px black;'>
	<tr>
	    <th>Member ID</th>
	    <th>Club ID</th>


	</tr>";
}

while ($row = $result -> fetch_assoc()){// store the result in an array; then put them in html table one by one
	echo '<tr>
		<td>'.$row['ID'].'</td>
		<td>'.$row['CID'].'</td>

		
	      </tr>';
}
 echo "</table>";

echo "<br>";

echo "Checked Out";
$sql = "SELECT * FROM ChecksOut";// embed a select statement
$result = $conn->query($sql);// get result

if($result->num_rows > 0){// check for number of rows; if there are records, build html table
 echo "<table style='border: solid 1px black;'>
	<tr>
	    <th>Member ID</th>
	    <th>Book ID</th>
	    <th>Due Date</th>

	</tr>";
}

while ($row = $result -> fetch_assoc()){// store the result in an array; then put them in html table one by one
	echo '<tr>
		<td>'.$row['MID'].'</td>
		<td>'.$row['BID'].'</td>
		<td>'.$row['Due_Date'].'</td>
		
	      </tr>';
}
 echo "</table>";

echo "<br>";

echo "Supplier";
$sql = "SELECT * FROM Supplier";// embed a select statement
$result = $conn->query($sql);// get result

if($result->num_rows > 0){// check for number of rows; if there are records, build html table
 echo "<table style='border: solid 1px black;'>
	<tr>
	    <th>Supplier ID</th>
	    <th>Book ID</th>

	</tr>";
}

while ($row = $result -> fetch_assoc()){// store the result in an array; then put them in html table one by one
	echo '<tr>
		<td>'.$row['SID'].'</td>
		<td>'.$row['BIDs'].'</td>
		
	      </tr>';
}
 echo "</table>";


echo "<a href=Query1.php>Which members have joined clubs? </a>";
echo "<br>";
echo "<a href=Query2.php>What books are currently checked out? </a>";
echo "<br>";
echo "<a href=Query3.php>List the names, age, gender and club name of members who host book clubs. </a>";



?>
</body>
</html>
