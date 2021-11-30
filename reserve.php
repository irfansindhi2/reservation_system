<?php
require 'header.php';
$_SESSION["error"] = "";

if(!$_SESSION['post-data']){
    $_SESSION['post-data'] = $_POST;
}

if(isset($_POST['submit'])){
    $_SESSION['post-data'] = $_POST;
    header('Location: book.php');
}

?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Reservation System</title>
</head>

<body>
    <center>
        <h1>Reservations Here!!!</h1>
  
        <form action="" method="post">
              
            <p>
                <label for="fname">Name: </label>
                <input type="text" id="fname" name="fname" required>
            </p>
            <p>
                <label for="phone">Phone: </label>
                <input type="tel" id="phone" name="phone" placeholder="1234567890" pattern="[0-9]{10}" required>
            </p>
            <p>
                <label for="email">Email: </label>
                <input type="email" id="email" name="email" required>
            </p>
            <p>
                <label for="date">Date and Time: </label>
                <input type="datetime-local" id="date" name="date" required>
            </p>  
            <p>
                <label for="guests">Number of Guests: </label>
                <input type="number" id="guests" name="guests" min=1 required>
            </p>
              
            <input type="submit" name="submit" value="Submit">
        </form>
    </center>
</body>
  
</html>