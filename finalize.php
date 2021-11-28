<?php
$conn = mysqli_connect("localhost", "root", "", "reservation_system");
          
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}

$sql = "SELECT table_id, table_capacity, table_occupied FROM table_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
  // output data of each row
  $tableid = array();
  $table_capacity = array();
  $table_occupied = array();
  while($row = $result->fetch_assoc()) {
    array_push($tableid, $row["table_id"]);
    array_push($table_capacity, $row["table_capacity"]);
    array_push($table_occupied, $row["table_occupied"]);

    if($row["table_occupied"] == 0){
        echo "table_id: " . $row["table_id"]. " table_capacity: " . $row["table_capacity"]. " table_occupied <a>" . $row["table_occupied"]. "</a><br>";
    }
    else{
        echo "table_id: " . $row["table_id"]. " table_capacity: " . $row["table_capacity"]. " table_occupied " . $row["table_occupied"]. "<br>";
    }
}
} else {
  echo "0 results";
}
$conn->close();
?>