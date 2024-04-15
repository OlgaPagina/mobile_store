<?php 
include_once("../model/database.php");
require_once("../model/functions.php");
session_start();

// the following statement can be used for debugging to output the values passed from the form page and stop processing the page
// die(var_dump($_POST));


//$filedir = 'images/';

// the isset function checks to ensure that a value has been passed. You couold also add additional data validation within this section
// the form data is then assigned to the relevant variables
if (isset($_POST['firstname'])) {
    $firstname = $_POST['firstname'];
}
if (isset($_POST['lastname'])) {
    $lastname = $_POST['lastname'];
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
    // hash the password before storing
    $password = password_hash($password, PASSWORD_BCRYPT);
}

$date = date('Y-m-d H:i:s'); // Current time

if (isset($_SESSION['user'])) { // Assuming 'user' holds the username in session
    $username = $_SESSION['user'];
} 
else {
    $username = 'Session username not set';
}

//call the add_new_user() function and pass the variables
$result = add_new_user($firstname, $lastname, $email, $password);

$content = "Name: $product_name, Model: $product_model, Manufacturer: $manufacturer, Price: $price, Stock: $stock_on_hand";
$action = "added new user";
add_changelog($username, $product_name, $product_model, $content, $date, $action);

if (!$result) {
    echo ("A problem occurred");
}

else {
    header('Location: ../index.php');
}

?>