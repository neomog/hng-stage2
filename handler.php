<?php

$request_method = $_SERVER['REQUEST_METHOD'];

// if ($request_method == "POST") {
//     header("location: message.php");
// }

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div style="text-align: center" class="alert alert-success" role="alert">
  Message sent successfully
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
 
// Define variables and initialize with empty values
$nameErr = $emailErr = $messageErr = "";
$name = $email = $subject = $message = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate user name
    if(empty($_POST["name"])){
        $nameErr = "Please enter your name.";
    } else{
        $name = filterName($_POST["name"]);
        if($name == FALSE){
            $nameErr = "Please enter a valid name.";
        }
    }
    
    // Validate email address
    if(empty($_POST["email"])){
        $emailErr = "Please enter your email address.";     
    } else{
        $email = filterEmail($_POST["email"]);
        if($email == FALSE){
            $emailErr = "Please enter a valid email address.";
        }
    }
    

    
    // Validate message
    if(empty($_POST["message"])){
        $messageErr = "Please enter your comment.";     
    } else{
        $message = filterString($_POST["message"]);
        if($message == FALSE){
            $messageErr = "Please enter a valid comment.";
        }
    }


    function filterName($field){
        // Sanitize user name
        $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
        
        // Validate user name
        if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            return $field;
        } else{
            return FALSE;
        }
    }    
    function filterEmail($field){
        // Sanitize e-mail address
        $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
        
        // Validate e-mail address
        if(filter_var($field, FILTER_VALIDATE_EMAIL)){
            return $field;
        } else{
            return FALSE;
        }
    }
    function filterString($field){
        // Sanitize string
        $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
        if(!empty($field)){
            return $field;
        } else{
            return FALSE;
        }
    }
?>
