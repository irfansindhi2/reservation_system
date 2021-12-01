<?php
require('header.php');
?>

<?php
if(isset($_POST['confirm'])){
    // var_dump($_SESSION);
    $tablesoccupied = true;
    $tidsarr = explode(',', $_SESSION['total_table_ids']);
    $idsql = "SELECT table_occupied FROM table_info WHERE";
    foreach($tidsarr as $id)
    {
        $idsql .= " table_id=$id OR";
    }
    $idsql = substr($idsql, 0, -2);
    $result = $conn->query($idsql);
    $result = $result->fetch_all();
    // print_r($result[0][0]);

    foreach($result as $key=>$val){ 
        foreach($val as $k=>$v){ 
            if($v == 1){
                $tablesoccupied = true;
            }else{
                $tablesoccupied = false;
                //echo $v . '<br />';
            }   
        }
    }
    
    $enddatetime = date('Y-m-d H:i:s',strtotime('+1 hour',strtotime($_SESSION['post-data']['date'])));
    

    if($tablesoccupied == false){
        // insert new reservation
        $sql = "INSERT INTO reservation_log (startdatetime, enddatetime, guest_num, table_ids) VALUES ('{$_SESSION['post-data']['date']}', '$enddatetime', '{$_SESSION['post-data']['guests']}', '{$_SESSION['total_table_ids']}')";
        $conn->query($sql);
        echo $sql;
        // update occupied tables
        $sql = "UPDATE table_info SET table_occupied = '1' WHERE";
        foreach($tidsarr as $id)
        {
            $sql .= " table_id=$id OR";
        }
        $sql = substr($sql, 0, -2);
        //echo $sql;
        $conn->query($sql);
    }else{
        echo "tables are already booked!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Review Reservation</title>
</head>

<body>
    <?php
        echo "<h1>You have reserved ". $_SESSION['table_seats']. " seat(s) of " . $_SESSION['table_counter'] . " tables </h1>";
    ?>
    <br>
    <h2>Confirm Reservation: </h2>
    <form action="" method="post">
    <input type="submit" name="confirm" value="confirm">
    </form>
    <a href="reserve.php">Book Again</a>
</body>
</html>