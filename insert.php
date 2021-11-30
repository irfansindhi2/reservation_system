<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page page</title>
</head>
  
<body>
    <center>
        <?php
        session_start();
        $conn = mysqli_connect("localhost", "root", "", "reservation_system");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all 5 values from the form data(input)
        $date =  $_POST['date'];

        // Performing insert query execution
        $sql = "INSERT INTO reservation_log (table_ids) VALUES ('$_SESSION["total_table_ids"]')";
        
        if(mysqli_query($conn, $sql)){
            echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
  
</html>