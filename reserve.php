<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Reservation System</title>
</head>
<?
session_start();
?>
<body>
    <center>
        <h1>Reservations Here!!!</h1>
  
        <form action="redirect.php" method="post">
              
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
                <label for="guests">Number of guests: </label>
                <input type="number" id="guests" name="guests" required>
            </p> 
              
            <input type="submit" value="Submit">
        </form>
    </center>
</body>
  
</html>