<?php
require 'header.php';
$_SESSION["error"] = "";

// if(!$_SESSION['post-data']){
//     $_SESSION['post-data'] = $_POST;
// }

if(isset($_POST['submit'])){
    $_SESSION['post-data'] = $_POST;
    header('Location: book.php');
}

?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Reservation System</title>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/form.css">
<style>
    body {
	font-family:"Open Sans", Helvetica, Arial, sans-serif;
    }
    </style>



</head>

<body>
<script>
function myFunction() {
    var x = document.getElementById("date");
        var myDate = new Date(x.value);
        if(myDate.getDate() == 4 && myDate.getMonth() == 6){
            alert("$10 has to be deposited as hold fee on 4th july");
        }
        else if(myDate.getDay() === 6){
            alert("$10 has to be deposited as hold fee on weekends");
        }
        else if(myDate.getDay() === 0){ 
            alert("$10 has to be deposited as hold fee on weekends");
        }
}
</script>

<div class="container">  
  <form id="contact" action="" method="post">
    <h3>Book Your Table</h3>
    <h4>Quick and Easy!</h4>
    <fieldset>
      <input id="fname" name="fname" placeholder="Your name" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input id="email" name="email" placeholder="Your Email Address" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input id="phone" name="phone" placeholder="Your Phone Number" type="tel" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input id="date" name="date" placeholder="Reservation Date and Time" class="form-control" type="text" onfocus="(this.type='datetime-local')" onblur="(this.type='datetime-local')" required tabindex="5" onfocusout="myFunction()">
      *your reservation will last 1 hour
    </fieldset>
    <fieldset>
    <input id="guests" name="guests" min=1 type = "number" placeholder="Number of Guests " tabindex="5" required>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
 
  
</div>
</body>
  
</html>