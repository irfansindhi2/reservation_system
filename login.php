<?php
require 'header.php';
// var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Log In</title>
</head>

<body>

    <center>

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
        <h1>LOG IN</h1>
  
        <form action="" method="post">
              
            <p>
                <label for="username">User name: </label>
                <input type="text" id="username" name="username" required>
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