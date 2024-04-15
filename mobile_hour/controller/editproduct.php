<?php 
include_once("../model/database.php");
require_once("../model/functions.php");
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
else {
    header('Location: ../view/admin_product.php');
}

// the following statement can be used for debugging to output the values passed from the form page and stop processing the page
// die(var_dump($_POST));


$filedir = 'images/';

// the isset function checks to ensure that a value has been passed. You couold also add additional data validation within this section
// the form data is then assigned to the relevant variables
if (isset($_POST['product_name'])) {
    $product_name = $_POST['product_name'];
}
if (isset($_POST['product_model'])) {
    $product_model = $_POST['product_model'];
}
if (isset($_POST['manufacturer'])) {
    $manufacturer = $_POST['manufacturer'];
}
if (isset($_POST['price'])) {
    $price = $_POST['price'];
}
if (isset($_POST['stock_on_hand'])) {
    $stock_on_hand = $_POST['stock_on_hand'];
}
if (isset($_POST['category'])) {
    $category = $_POST['category'];
}
if (isset($_POST['feature'])) {
    $feature = $_POST['feature'];
}

// check to see if a new file has been added for upload
// if no new file has been added then set the image value to the existing value
if($_FILES['image']['size'] == 0) {
    $image = $_POST['image'];    
}
// if a new file for upload has been added set the filename to the new file
else {
    $image = $filedir . basename($_FILES['image']['name']);
}    

$date = date('Y-m-d H:i:s'); // Current time

if (isset($_SESSION['user'])) { // Assuming 'user' holds the username in session
    $username = $_SESSION['user'];
} 
else {
    $username = 'Session username not set';
}

//call the update_product() function and pass the variables including the primary key for the record to be updated
$result = update_product($id, $product_name, $product_model, $manufacturer, $price, $stock_on_hand, $category, $feature, $image);

$content = "Name: $product_name, Model: $product_model, Manufacturer: $manufacturer, Price: $price, Stock: $stock_on_hand";

$action = "edited product";

add_changelog($username, $product_name, $product_model, $content, $date, $action);

if (!$result) {
    echo ("A problem occurred");
}

else {
    header('Location: ../view/admin_product.php');
}

?>