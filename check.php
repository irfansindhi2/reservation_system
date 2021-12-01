<?php
require 'header.php';
// var_dump($_SESSION);
$sql = "SELECT table_id, table_capacity FROM table_info WHERE";
foreach($_POST['check_list'] as $table)
{
    $sql .= " table_id=$table OR";
}
$sql = substr($sql, 0, -2);
$result = $conn->query($sql);
$total_seats = 0;
$total_table_ids = array();
if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) {   
        $total_seats += $row['table_capacity'];
        array_push($total_table_ids, $row['table_id']);
        $table_counter += 1;
    }
}

if ($_SESSION['post-data']['guests'] > $total_seats){
    $_SESSION["error"] = "Please book more tables according to the number of guests specified earlier";
    header('Location: book.php');
    
}else{
    $_SESSION['table_seats'] = $total_seats;
    $_SESSION['table_counter'] = $table_counter;
    $_SESSION['total_table_ids'] = "";
    foreach ($total_table_ids as $value) {
        $_SESSION['total_table_ids'] .= "$value,";
    }
    $_SESSION['total_table_ids'] = substr($_SESSION['total_table_ids'], 0, -1);
    header('Location: redirect.php');
}
?>