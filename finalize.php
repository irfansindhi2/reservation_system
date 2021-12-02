<?php
require('header.php');
?>

<?php
if(isset($_POST['contact-submit'])){
    $_SESSION['contact-submit'] = $_POST['contact-submit'];
    //var_dump($_SESSION);
    // $tablesoccupied = true;
    // $tidsarr = explode(',', $_SESSION['total_table_ids']);
    // $idsql = "SELECT table_occupied FROM table_info WHERE";
    // foreach($tidsarr as $id)
    // {
    //     $idsql .= " table_id=$id OR";
    // }
    // $idsql = substr($idsql, 0, -2);
    // echo $idsql;
    // $result = $conn->query($idsql);
    // $result = $result->fetch_all();
    // print_r($result[0][0]);

    // foreach($result as $key=>$val){ 
    //     foreach($val as $k=>$v){ 
    //         if($v == 1){
    //             $tablesoccupied = true;
    //         }else{
    //             $tablesoccupied = false;
    //             //echo $v . '<br />';
    //         }   
    //     }
    // }
    
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
        $_SESSION['total_table_ids'] = "";
        header('Location: index.php');
    }else{
        echo "tables are already booked!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Review Reservation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/form.css">
</head>

<body>
<div class="container">  
<form id="contact" action="" method="post">
    <?php
        echo "<h3>You are reserving ". $_SESSION['table_seats']. " seat(s) of " . $_SESSION['table_counter'] . " tables </h3>";
    ?>
    <br>
    <button name="contact-submit" type="submit" id="contact-submit">Confirm</button>
    <a href="reserve.php">Start Over</a>
</form>
</html>
</body>
</html>