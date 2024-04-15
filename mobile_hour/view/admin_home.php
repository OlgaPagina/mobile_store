<?php 
include_once("../model/database.php");
session_start(); 

if(!isset ($_SESSION['user'])) { 
    //if the user session is not set (i.e. the user is not logged in) redirect to the index page 
    header("location:../index.php"); 
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e393240d8a.js" crossorigin="anonymous"></script>

    <!--==title==================================================================-->
    <title>The Mobile Hour</title>

    <!-- Link to Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!--Fonts============================================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!--Script================================================================-->
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">
    </script>

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
    <script language="JavaScript" type="text/javascript">
        $(document).ready(function(){
            $("a.delete").click(function(e){
                if(!confirm('Click OK to confirm delete?')){
                    e.preventDefault();
                    return false;
                }
                return true;
            });
        });
    </script>

    <script>
            $(function(){
                $('.header').load('../html/header.html');
                $('.footer').load('../html/footer.html');
            });
    </script>

    <!--stylesheet==========================================================-->
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
</head>

<body>
    <!--header====================================================-->
    <header class="header" id="admin">
        
    </header>

    <section>
    <div class="logout">
        <button><a href="../controller/logout.php">Logout</a></button>
    </div>
    <h1>Admin Home</h1>
    <!-- Output the success message to screen -->
    <p><?php echo $_SESSION["success"]; ?></p>
    <!-- <p><?php echo $_SESSION["permissions"]; ?></p>
    <p><?php echo $_SESSION["user"]; ?></p> -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Products</th>
                <th scope="col">Users</th>
                <th scope="col">Changelog</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td scope="col">
                <a class="nav-link" href="add_product.php">Add Product</a>
                <a class="nav-link" href="admin_product.php">Edit Products</a>
            </td>
            <td scope="col">
                <a class="nav-link" href="add_user.php">Add User</a>
                <a class="nav-link" href="admin_users.php">Edit Users</a>
            </td>
            <td scope="col">
                <a class="nav-link" href="admin_changelog.php">Changelog</a>
            </td>
        </tr>
        </tbody>
    </table>
    </section>

</body>

</html>