<?php 
//start session management 
    session_start(); 
//destroy the user session
    session_destroy(); 
//redirect to the home page after logout 
    header("location:../index.php"); 
?>