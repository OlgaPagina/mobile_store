<?php 
include_once("../model/database.php");
require_once("../model/functions.php");
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
else {
    header('Location: ../view/admin_users.php');
}

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
if (isset($_POST['permission'])) {
    $permission = $_POST['permission'];
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}

$date = date('Y-m-d H:i:s'); // Current time

if (isset($_SESSION['user'])) { // Assuming 'user' holds the username in session
    $username = $_SESSION['user'];
} 
else {
    $username = 'Session username not set';
}

//call the update_product() function and pass the variables including the primary key for the record to be updated
$result = update_user($id, $firstname, $lastname, $permission, $email);

$content = "Firs tname: $firstname, Last name: $lastname, User role: $permission, Email: $email";
$action = "edited user";
add_changelog_user($username, $firstname, $lastname, $content, $date, $action);

if (!$result) {
    echo ("A problem occurred");
}

else {
    header('Location: ../view/admin_users.php');
}
