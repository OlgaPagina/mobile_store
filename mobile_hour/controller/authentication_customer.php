<?php 
//start session management 
    session_start(); 
//connect to the database 
    require("../model/database.php"); 
//retrieve the functions 
    require("../model/functions.php"); 

//retrieve the username and password entered into the form 
    $username = $_POST["username"]; 
    $password = $_POST["password"]; 

    // $hashed_password = password_hash($password, PASSWORD_BCRYPT);

//call the login() function 
    $count = login_customers($username, $password); 

//if there is one matching record 
    if($count == 1){ 
    //start the user session to allow authorised access to secured web pages
        $_SESSION["user"] = $username; 
    //if login is successful, create a success message to display on the admin home page
        $_SESSION["success"] = "Hello ". $username. ". Have a great day!";
    //set the permissions level for the user. This is used to control access to pages
        //$_SESSION["permissions"] = $permissions;
    //redirect to admin_home.php 
        header("location:../html/customer_home.php"); 
    } 
else { 
//if login not successful, create an error message to display on the login page 
    $_SESSION["error"] = "Incorrect username or password. Please try again."; 
//redirect to login.php 
    header("location: ../index.php");
} 
?>