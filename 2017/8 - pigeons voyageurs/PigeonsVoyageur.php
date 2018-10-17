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
   }
   mysqli_commit($conn);
   return;
}

function read($file)
{
    $fp = fopen($file, 'rb');
	
    while(($line = fgets($fp)) !== false)
        yield rtrim($line, "\r\n");
	echo nl2br (memory_get_usage (TRUE)."\n");
	 $memoryUsed = memory_get_peak_usage(false);
	 echo nl2br($memoryUsed."\n");
    fclose($fp);
}

ini_set('memory_limit', '100');
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
if (!empty($result)){
	$delete= "DROP TABLE Pigeons";
	$result = mysqli_query($conn, $delete);
}
if ($conn->query($sql) === TRUE) {
	echo "Table MyGuests created successfully";
} else {		
	echo "Error creating table: " . $conn->error;
}

$conn->close();
$path='10Mpigeons.txt';
$pigeonId="";
foreach(read($path) as $line)
{
    $pigeonId = trim($line);
			update($pigeonId);
}

//$file_lines = file('10Mpigeons.txt');
	//foreach ($file_lines as $line) {
		//print("here");
		//$pigeonId = trim($line);
		//$intPigeon = (int)$pigeonId;
		//update($intPigeon);
		
	//}

	
	findMissing();
	
	echo("done");

?>