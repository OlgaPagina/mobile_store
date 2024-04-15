<?php 
include_once("../model/database.php");
require_once("../model/functions.php");
session_start();

// the isset function checks to ensure that a value has been passed. You couold also add additional data validation within this section
// the form data is then assigned to the relevant variables
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}


//call the delete_product() function and pass the primary key for th record to be deleted
$result = delete_product($id);

if (!$result) {
    echo ("A problem occurred");
}

else {
    header('Location: ../view/admin_product.php');
}

?>