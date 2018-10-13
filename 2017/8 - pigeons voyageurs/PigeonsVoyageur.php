<?php
//ini_set('memory_limit', '1M');

function insert($pigeon)
{
   $insertQuery ="insert into Pigeons(id, numberTimes) values ('$pigeon', 0)";
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "test";
   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   $result = mysqli_query($conn, $insertQuery);
   mysqli_commit($conn);
	$conn->close();
	return;
}
function getRowCount($pigeon){
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "test";
   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
	$findQuery = "Select * from Pigeons where id ='$pigeon' limit 1";
	$result = mysqli_query($conn, $findQuery);
	
	$row_cnt = mysqli_num_rows($result);
	$conn->close();
	return $row_cnt;
}
function update($pigeon){
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "test";
   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
	$row_cnt = getRowCount($pigeon);
	if ($row_cnt>0){
		$getCount = "Select numberTimes from Pigeons where id ='$pigeon' limit 1";
		$result = mysqli_query($conn, $getCount);
		$value = mysqli_fetch_object($result);
		$count = $value->numberTimes;
		$count++;
		$updateQuery="Update Pigeons set numberTimes = $count where id ='$pigeon' ";
		$result = mysqli_query($conn, $updateQuery);
	}else{
		insert($pigeon);
	}
	mysqli_commit($conn);
	$conn->close();
	return;
}

function findMissing(){
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "test";
   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   $findQuery = "Select * from Pigeons where numberTimes % 2 <> 0";
   $result = mysqli_query($conn, $findQuery);
   while ($row = mysqli_fetch_array($result)) {
      echo nl2br($row["ID"] ."-" . $row["NUMBERTIMES"]."\n");
	 // print(nl2br("\n"));
	//  print(nl2br("\n"));
   }
   mysqli_commit($conn);
   return;
}

ini_set('memory_limit', '1M');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE Pigeons (
ID VARCHAR(7) NOT NULL, 
NUMBERTIMES int
)";

$query = "SELECT 1 FROM Pigeons";
$result = mysqli_query($conn, $query);

if(empty($result)) {
	if ($conn->query($sql) === TRUE) {
		echo "Table MyGuests created successfully";
	} else {
		
		echo "Error creating table: " . $conn->error;
	}
}

$conn->close();
$pigeonId="";
$file_lines = file('100pigeons2.txt');
	foreach ($file_lines as $line) {
		$pigeonId = trim($line);
		update($pigeonId);
		
	}
	findMissing();
	echo("done");
	
?>