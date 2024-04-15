<?php include "../model/database.php";

//start session management 
session_start();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scdale=1.0">
<script src="https://kit.fontawesome.com/e393240d8a.js" crossorigin="anonymous"></script>

<!--==title==================================================================-->
<title>The Mobile Hour</title>

<!-- Link to Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        $(function(){
            $('.header').load('header.html');
            $('.footer').load('footer.html');
        });
    </script>

<!--stylesheet==========================================================-->
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
</head>

<body>
    <!--header====================================================-->
    <header class="header">
        
    </header>

     <!--navigation-bar========================================================-->
     <nav class="navbar">
        <input type="checkbox" class="menu-btn" id="menu-btn">
        <label for="menu-btn" class="menu-icon">
            <span class="nav-icon">
                <i class="fas fa-bars"></i>
            </span>
        </label>

        <ul class="menu">
            <li><a href="all_phones.php">Mobile phones</a></li>
            <li><a href="#">Iphone</a></li>
            <li><a href="#">Samsung</a></li>
            <li><a href="#">Huawei</a></li>
            <li><a href="#">Sale</a></li>
            <li><a href="#">About us</a></li>
        </ul>
    </nav>

    <div class="container justify-content-center align-items-center">       
     <div class="content">
        <h2>Hello</h2>
                <form action="../controller/authentication_customer.php" method="POST">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control form-control-lg bg-light fs-6" id="username" name="username" placeholder="Email">
                    </div>
                    <div class="input-group mb-1">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" id="password" name="password" placeholder="Password">
                    </div>

                    <div class="input-group mb-3">
                        <button class="btn btn-lg  w-100 fs-6">Login</button>
                    </div>
                </form>

                <div class="row">
                    <small>Don't have account? <a href="../view/register_customers.php">Sign Up</a></small>
                </div>                
        </div>
    </div>
    <!--Footer=========================================-->
    <footer class="footer">
      
    </footer>

</body>

</html>