<?php
require 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Book Tables</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/form.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
    $('#contact-submit').click(function() {
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        alert("You must check at least one table.");
        return false;
      }

    });
});

</script>
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



//var_dump($_SESSION);

if(isset($_SESSION["error"])){
    $error = $_SESSION["error"];
    echo "<span>$error</span>";
}

//echo $_SESSION['post-data']['date'];
//if (isset($_SESSION['post_data'])){
$sql = "SELECT table_ids FROM reservation_log WHERE '" . $_SESSION['post-data']['date'] . "'between startdatetime and enddatetime"; // occupied tables
$result = $conn->query($sql);
$tidsarr = array();
if ($result->num_rows > 0) { 
  
    while($row = $result->fetch_assoc()) {  
        //var_dump($row["table_ids"]);
        $explodex = explode(',', $row["table_ids"]);
        $tidsarr = array_merge($tidsarr, $explodex);
    }
}

//var_dump($tidsarr);
$idsql = "SELECT table_id, table_capacity FROM table_info WHERE";
foreach($tidsarr as $id)
{
    $idsql .= " table_id<>$id AND";
}
$idsql = substr($idsql, 0, -3);
//echo $idsql;
$result = $conn->query($idsql);
if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) {  
        echo "<tr><th>" . $row["table_capacity"] . "</th>";
        echo "<th><input type=\"checkbox\" name=\"check_list[]\" value=". $row["table_id"] . "></fieldset></th></tr>";
    }
}


// $sql = "SELECT table_id, table_capacity, table_occupied FROM table_info";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) { 
  
//   while($row = $result->fetch_assoc()) {  
       
//     echo "<tr><th>" . $row["table_capacity"] . "</th>";

//     if($row["table_occupied"] == 0){
//         echo "<th><input type=\"checkbox\" name=\"check_list[]\" value=". $row["table_id"] . "></fieldset><th>";
//         echo "</tr>";
//     }
//     else{
//         echo "<th color = 'red'>Occupied</fieldset><th></tr>";
//     }
// }
// }
?>

</table>
<fieldset>
      <button name="submit" type="submit" id="contact-submit">Submit</button>
</fieldset>

<a href="reserve.php">Start Over</a>
</form>
</div>







</body>



</html>