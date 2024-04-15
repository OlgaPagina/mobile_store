<?php 
include_once("../model/database.php");
session_start();
// check the user is logged in and permissions level is correct
// if(!isset ($_SESSION['user'])) { 
    //if the user session is not set (i.e. the user is not logged in) redirect to the index page 
    // header("location:../index.php"); 
    // }
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scdale=1.0">
    <script src="https://kit.fontawesome.com/e393240d8a.js" crossorigin="anonymous"></script>

    <!--==title==================================================================-->
    <title>The Mobile Hour</title>

    <!--Fonts============================================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Link to Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--stylesheet==========================================================-->
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>

    <!-- Link to Bootstrap dependencies-->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!--Script================================================================-->
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">
    </script>

    <!-- Header and Footer=======================================-->
    <script>
        $(function(){
            $('.header').load('../html/header.html');
            $('.footer').load('../html/footer.html');
        });
    </script>
</head>

<body>
    <!--header====================================================-->
    <header class="header" id="admin">
        
    </header>

    <section>
    <a class="nav-link" href="admin_home.php">Admin home</a>
    <h1>Edit / Delete Users</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Permission</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM user";
            //execute the query
            $result = $conn->query($sql);
            foreach($result as $row) {
                echo "<tr>";
                    echo "<th scope='row'>" . $row['firstname'] . "</th>";
                    echo "<td>" . $row['lastname'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    $perID = $row['permission_id'];
                    $sql_per = "SELECT permissions FROM permissions where permission_id = $perID";
                    $result_per = $conn->query($sql_per);
                    echo "<td>" . $row['permission_id']," - ", $result_per->fetchColumn(0) . "</td>";
                    // create link to the edit user page ensuring that we pass the correct primary key for the record to be edited
                    echo '<td><a href="../view/edit_user.php?id=' . $row['user_id'] . '"><i class="fa-regular fa-pen-to-square"></i></a></td>';
                    // create link to the delete user page ensuring that we pass the correct primary key for the record to be deleted
                    echo '<td><a href="../controller/deleteuser.php?id=' . $row['user_id'] . '" class="delete"><i class="fa-solid fa-trash-can"></i></a></td>';
            echo "</tr>";
            }
        ?>
        </tbody>
    </table>

    </section>

</body>

</html>