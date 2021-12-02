<?php
require 'header.php';
// var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Log In</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/form.css">
</head>

<body>
<div class="container">  
  <form id="contact" action="" method="post">
  <h3>Log In</h3>

<?php
    if(isset($_POST['username'])){

    $sql="select * from users where user_name='".$_POST['username']."'AND user_pass='".$_POST['pass']."' limit 1";
    
    $result = $conn->query($sql);
    
    if(mysqli_num_rows($result)==1){
        header('Location: finalize.php');

    }
    else{
        echo "Username or Password wrong";
    }
        
}
?>
  

    <fieldset>
        <input id="username" name="username" placeholder="Username" type="text" tabindex="1" required autofocus>
    </fieldset>
    
    <fieldset>
        <input id="pass" name="pass" placeholder="Password" type="password" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
        <button name="submit" type="submit" id="contact-submit">Submit</button>
    </fieldset>
    <a href="reserve.php">Start Over</a>
    </form>
</body>
  
</html>