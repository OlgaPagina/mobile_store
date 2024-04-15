<?php 
include_once("../model/database.php");
require_once("../model/functions.php");
//session_start();

// the following statement can be used for debugging to output the values passed from the form page and stop processing the page
//die(var_dump($_POST));


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
if (isset($_POST['cust_phone'])) {
    $cust_phone = $_POST['cust_phone'];
}
if (isset($_POST['cust_address'])) {
    $cust_address = $_POST['cust_address'];
}
if (isset($_POST['postcode'])) {
    $postcode = $_POST['postcode'];
}
if (isset($_POST['city'])) {
    $city = $_POST['city'];
}
if (isset($_POST['state'])) {
    $state = $_POST['state'];
}


//call the add_new_user() function and pass the variables
//$result = add_new_customer($firstname, $lastname, $email, $password, $cust_phone, $cust_address, $postcode, $city, $state);
$result = add_new_customer($firstname, $lastname, $email, $password, $cust_phone, $cust_address, $postcode, $city, $state);


if (!$result) {
    echo ("A problem occurred");
}

else {
    header('Location: ../index.php');
}

?>