<?php 
include_once("../model/database.php");
session_start();

if(!isset ($_SESSION['user']) || $_SESSION['permissions'] != '1') {
    //if the user session is not set (i.e. the user is not logged in) redirect to the index page 
    header("location: not_allowed.php");
    }
?>

<!DOCTYPE html>
<html>

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

    <!-- Header and Footer=======================================-->
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">
    </script>
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
<!-- Edit an existing product form. Ensure the enctype is included to permit file upload -->
    <h1>Edit User</h1>
    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        else {
            header('Location: ../view/admin_users.php');
        }
    ?>
    <form enctype="multipart/form-data" action="../controller/edituser.php?id=<?php echo $id?>" method="POST">
    <?php
        $sql = "SELECT * FROM user where user_id = $id";
        //execute the query
        $result = $conn->query($sql);
        foreach($result as $row) {
    ?>
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="firstname">Enter First name:</label>
            <input type="text" id="firstname" name="firstname" value="<?php echo $row['firstname']; ?>" class="form-control" required />
        </div>
        <div class="form-group col-md-6">
            <label for="lastname">Enter Last name:</label>
            <input type="text" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>" class="form-control" required />
        </div>
        <div class="form-group col-md-6">
            <label for="permission">Select User role</label>
            <select id="permission" name="permission" class="form-control">
                <!-- check for the existing value and if true then set the dropdown to selected -->
                <option value="1" <?php if($row['permission_id'] == '1') echo 'selected ="selected"';?>>Manager</option>
                <option value="2" <?php if($row['permission_id'] == '2') echo 'selected ="selected"';?>>Admin</option>
                <option value="3" <?php if($row['permission_id'] == '3') echo 'selected ="selected"';?>>User</option>
            </select>
        </div>
        <div class="form-group col-md-6">
        <label for="email">Enter Email:</label>
            <input type="text" id="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" required />
        </div>
        </div>
        
        <div class="form-group">
        <button class="btn btn-primary mb-2" type="submit">Edit user</button>
        <button class="btn btn-primary mb-2" type="reset">Reset</button>
        </div>
        <?php
        }
        ?>
    </form>
    </section>
</body>
</html>