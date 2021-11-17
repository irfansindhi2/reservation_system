<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page page</title>
</head>
  
<body>
    <center>
        <?php
  
        // servername => localhost
        // username => root
        // password => empty
        // database name => reservation_system
        $conn = mysqli_connect("localhost", "root", "", "reservation_system");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all 5 values from the form data(input)
        $date =  $_POST['date'];

        // Performing insert query execution
        $sql = "INSERT INTO `reservation_log` (`reserve_time`) VALUES ('$date')";
        
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