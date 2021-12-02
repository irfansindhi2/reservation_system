<?php
require 'header.php';
//var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Sign Up</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/form.css">
    <script>
     function myFunction() {
    var checkBox = document.getElementById("ismailaddress");  
    var textMail = document.getElementById("mailaddress");  
    var textBil = document.getElementById("billaddress");  
 
    if (checkBox.checked == true){
          textBil.value=textMail.value;  
    } else {
          textBil.value="";
    }
 
  }
    </script>
</head>

<body>
    
<div class="container">  
<form id="contact" action="" method="post">
<h3>Sign Up</h3>

<?php
    if(isset($_POST['username'])){

    $sql="select * from users where user_name='".$_POST['username']."'OR email='".$_POST['email']."' limit 1";
    
    $result = $conn->query($sql);
    
    if(mysqli_num_rows($result)==1){
        echo "Use another username and(or) email";
    }
    else{
        $sql = "INSERT INTO users (fname, email, phone, user_name, user_pass, mail_address, bill_address, pref_payment) VALUES ('".$_POST['fname']."', '".$_POST['email']."', '".$_POST['phone']."', '".$_POST['username']."', '".$_POST['pass']."', '".$_POST['mailaddress']."', '".$_POST['billaddress']."', '".$_POST['ppayment']."')";
        $conn->query($sql);
        header('Location: finalize.php');

    }
        
}
?>
              
<fieldset>
Name<input id="fname" name="fname" placeholder="Name" value="<?php echo $_SESSION['post-data']['fname']?>" type="text" tabindex="1" required autofocus>
</fieldset>

<fieldset>
Email<input id="email" name="email" placeholder="Email" value="<?php echo $_SESSION['post-data']['email']?>" type="text" tabindex="1" required autofocus>
</fieldset>

<fieldset>
Phone<input id="phone" name="phone" placeholder="Phone" value="<?php echo $_SESSION['post-data']['phone']?>" type="text" tabindex="1" required autofocus>
</fieldset>

<fieldset>
User name<input id="username" name="username" type="text" tabindex="1" required autofocus>
</fieldset>

<fieldset>
Password<input id="pass" name="pass" type="text" tabindex="1" required autofocus>
</fieldset>

<fieldset>
Mailing address<input id="mailaddress" name="mailaddress" type="text" tabindex="1" required autofocus>
</fieldset>

<fieldset>
Billing address<input id="billaddress" name="billaddress" type="text" tabindex="1" required autofocus><input type="checkbox" id="ismailaddress" onclick="myFunction()"> *check if same as mailing address
</fieldset>

<fieldset>
Preferred payment method
<select name="ppayment" id="ppayment" required autofocus tabindex="1">
  <option value="cash">Cash</option>
  <option value="credit">Credit</option>
  <option value="check">Check</option>
</select>

</fieldset>


<fieldset>
    <button name="submit" type="submit" id="contact-submit">Submit</button>
</fieldset>
<a href="reserve.php">Start Over</a>       
</form>
  
</body>
  
</html>