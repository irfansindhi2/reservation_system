<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Log In</title>
</head>
<?
session_start();
?>
<body>
    <center>
        <h1>LOG IN</h1>
  
        <form action="finalize.php" method="post">
              
            <p>
                <label for="fname">User name: </label>
                <input type="text" id="fname" name="fname" required>
            </p>
            <p>
                <label for="pass">Password: </label>
                <input type="password" id="pass" name="pass" required>
            </p>
              
            <input type="submit" value="Submit">
        </form>
    </center>
</body>
  
</html>