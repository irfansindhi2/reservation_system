<?php
require 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Book Tables</title>
</head>
<body>

<?php
var_dump($_SESSION);

if(isset($_SESSION["error"])){
    $error = $_SESSION["error"];
    echo "<span>$error</span>";
}
?> 
<form action="check.php" method="post">

<?php
//var_dump($_SESSION['post-data']);
$sql = "SELECT table_id, table_capacity, table_occupied FROM table_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
  
  $tableid = array();
  $table_capacity = array();
  $table_occupied = array();
  while($row = $result->fetch_assoc()) {   
    echo "table_id: " . $row["table_id"]. " table_capacity: " . $row["table_capacity"];

    if($row["table_occupied"] == 0){
        echo " table_occupied <a>" . $row["table_occupied"] . "</a>";
        echo " <input type=\"checkbox\" name=\"check_list[]\" value=". $row["table_id"] . "><br>";
    }
    else{
        echo " table_occupied " . $row["table_occupied"]. "<br>";
    }
}
} else {
  echo "0 results";
}
$conn->close();
?>
<input type="submit" value="Submit">
<a href="reserve.php">Book Again</a>
</form>
</body>
