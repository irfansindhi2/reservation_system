<?php
require 'header.php';
//var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>ABC Restaurent</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/form.css">
</head>
  
<body>
<div class="container">  
  <form id="contact" action="check.php" method="post">
    <button onclick="location.href='login.php'" type="button">LOG IN</button>
    <button onclick="location.href='signup.php'" type="button">SIGN UP</button>
    <button onclick="location.href='finalize.php'" type="button">PROCEED AS GUEST</button>
    <a href="reserve.php">Start Over</a>
    </form>
</div>
</body>
  
</html>