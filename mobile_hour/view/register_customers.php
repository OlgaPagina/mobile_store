<?php 
include_once("../model/database.php");
session_start();
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
    <header class="header">
        
    </header>

    <nav class="navbar">
        <input type="checkbox" class="menu-btn" id="menu-btn">
        <label for="menu-btn" class="menu-icon">
            <span class="nav-icon">
                <i class="fas fa-bars"></i>
            </span>
        </label>

        <ul class="menu">
            <li><a href="html/all_phones.php">Mobile phones</a></li>
            <li><a href="#">Iphone</a></li>
            <li><a href="#">Samsung</a></li>
            <li><a href="#">Huawei</a></li>
            <li><a href="#">Sale</a></li>
            <li><a href="#">About us</a></li>
        </ul>
    </nav>

    <section>

<!-- Add new product form. Ensure the enctype is included to permit file upload -->
    <h1>Registration</h1>
    <form enctype="multipart/form-data" action="../controller/addnewcustomer.php" method="POST">
        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="firstname">First name:</label>
            <input type="text" id="firstname" name="firstname" placeholder="First Name" class="form-control" required />
        </div>
        <div class="form-group col-md-6">
        <label for="lastname">Last name:</label>
            <input type="text" id="lastname" name="lastname" placeholder="Last Name" class="form-control" required />
        </div>
       
        <div class="form-group col-md-6">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" placeholder="Email" class="form-control" required />
        </div>
        <div class="form-group col-md-6">
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" placeholder="Password" class="form-control" required />
        </div>
        <div class="form-group col-md-6">
            <label for="cust_phone">Phone number:</label>
            <input type="text" id="cust_phone" name="cust_phone" placeholder="Phone number" class="form-control" required />
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="address">Street address:</label>
            <input type="text" id="cust_address" name="cust_address" placeholder="Street address" class="form-control" required />
        </div>
        <div class="form-group col-md-6">
        <label for="postcode">Postcode:</label>
            <input type="text" id="postcode" name="postcode" placeholder="Postcode" class="form-control" required />
        </div>
       
        <div class="form-group col-md-6">
            <label for="city">City:</label>
            <input type="text" id="city" name="city" placeholder="City" class="form-control" required />
        </div>
        <div class="form-group col-md-6">
            <label for="state">State:</label>
            <input type="text" id="state" name="state" placeholder="State" class="form-control" required />
        </div>
        </div>

        <div class="form-group">
        <button class="btn btn-primary mb-2" type="submit">Register</button>
        <button class="btn btn-primary mb-2" type="reset">Reset</button>
        </div>
    </form>
    </section>

</body>

</html>