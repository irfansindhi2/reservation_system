<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>ABC Restaurent</title>
</head>
  
<body>
    <center>
    <?php
    $_SESSION['post-data'] = $_POST;
    //var_dump($_SESSION['post-data']);
    ?>
    <a href="login.php">LOG IN</a><br>
    <a href="signup.php">SIGN UP</a><br>
    <a href="continue.php">PROCEED AS GUEST</a><br>
        
    </center>
</body>
  
</html>