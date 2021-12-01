<?php
require 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Book Tables</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
<div class="container">  
  <form id="contact" action="check.php" method="post">
  <h3>Available Tables</h3>
    <table>
    <tr>
    <th>Capacity</th>
    <th>Reserve</th>
    </tr>
<?php
// var_dump($_SESSION);

if(isset($_SESSION["error"])){
    $error = $_SESSION["error"];
    echo "<span>$error</span>";
}

//var_dump($_SESSION['post-data']);
$sql = "SELECT table_id, table_capacity, table_occupied FROM table_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
  
  while($row = $result->fetch_assoc()) {  
       
    echo "<tr><th>" . $row["table_capacity"] . "</th>";

    if($row["table_occupied"] == 0){
        echo "<th><input type=\"checkbox\" name=\"check_list[]\" value=". $row["table_id"] . "></fieldset><th>";
        echo "</tr>";
    }
    else{
        echo "<th color = 'red'>Occupied</fieldset><th></tr>";
    }
}
}
?>

</table>
<fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
</fieldset>

<a href="reserve.php">Book Again</a>
</form>
</div>







</body>



</html>