<?php 

require_once('../includes/connection.php') ;
if( isset( $_POST["add"] ) ) {
        
    // build a function that validates data
    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }

    // set all variables to empty by default
    $username = $email  = $message = "";
    
    // check to see if inputs are empty
    // create variables with form data
    // wrap the data with our function
    
    if( !$_POST["username"] ) {
        $nameError = "Please enter a username <br>";
    } else {
        $username = validateFormData( $_POST["username"] );
    }

    if( !$_POST["email"] ) {
        $emailError = "Please enter your email <br>";
    } else {
        $email = validateFormData( $_POST["email"] );
    }

   
    if( !$_POST["message"] ) {
        $messageError = "What no message? <br>";
    } else {
        $message = validateFormData( $_POST["message"] );
    }
    
    // check to see if each variable has data
    if( $username && $email && $message  ) {
        $query = "INSERT INTO userinfo (username,  email, signup_date, message)
        VALUES ('$username',  '$email', CURRENT_TIMESTAMP, '$message')";

        if( mysqli_query( $conn, $query ) ) {
            echo "<div class='alert alert-success'>New record in database!</div>";
        } else {
            echo "Error: ". $query . "<br>" . mysqli_error($conn);
        }
    }
    
}

/*
MYSQL INSERT QUERY

INSERT INTO users (id, username, password, email, signup_date, biography)
VALUES (NULL, 'jacksonsmith', 'abc123', 'jack@son.com', CURRENT_TIMESTAMP, 'Hello! I'm Jackson. This is my bio.');

*/

mysqli_close($conn);


?>




<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        
        <title>insert2</title>
        <link rel="stylesheet" href="style.css">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        
        <?php
      
        echo "<div class='one'>" ."Hello, today is: " . date('D' . " ". 'j' . " " .  'F' . " " . 'Y'). "</div>";
       
        ?>
        
        <div class="outsidewrapper"> 
      
            <div class="flexbox3">
            <h1>Welcome Form</h1>

            <p class="text-danger">* Required fields</p>
            </div><!--page-header -->
            
            <div class="flexbox1">  
            <div class="form-group center-block">
                
            <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
                <small class="text-danger">* <?php echo $nameError; ?></small>
                <input type="text" class="form-control" placeholder="Username" name="username"><br><br>
                </div>  
                   
                  
                    <div class="form-group center-block">
                <small class="text-danger">* <?php echo $emailError; ?></small>
                <input type="text" class="form-control" placeholder="Email" name="email"><br><br>
                    </div>
                    
                 
                  <div class="form-group center-block ">
                 <small class="text-danger">* <?php echo $messageError; ?></small>
                 <textarea class="form-control" rows="8" cols="50" name="message"></textarea><br><br>
                  </div>
                  
                
                <input type="submit" class="btn btn-primary btn-sm btn-block" name="add" value="Add Entry">
               
            </div>
            <div class="flexbox2"><p> This is the second Flex box </p></div>
         </div>
        <!-- jQuery -->
        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        
        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
    </body>
</html>
