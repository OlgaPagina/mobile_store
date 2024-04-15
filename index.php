<?php include "model/database.php";

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
      $(document).onclick(function() {
        $('#loginModal').modal('show');
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
      });
    </script>

    <script>
        $(function(){
            $('.header').load('html/header.html');
            $('.footer').load('html/footer.html');
        });
    </script>

<!--stylesheet==========================================================-->
<link rel="stylesheet" type="text/css" href="css/style.css"/>
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
            <li><a href="html/all_phones.php">Mobile phones</a></li>
            <li><a href="#">Iphone</a></li>
            <li><a href="#">Samsung</a></li>
            <li><a href="#">Huawei</a></li>
            <li><a href="#">Sale</a></li>
            <li><a href="#">About us</a></li>
        </ul>
    </nav>

    <!--image============================================================-->
    <div class="home-img">
        <img src="images/home_mobiles.JPG" alt="phones">
    </div>

    <!--phones-->
    <div class="phones-container">

        <a href="#" class="phone-box">
            <img src="images/iphone1.jpg" alt="iphone1">
            <span>Iphone</span>
        </a>

        <a href="#" class="phone-box">
            <img src="images/samsung1.webp" alt="iphone1">
            <span>Samsung</span>
        </a>

        <a href="#" class="phone-box">
            <img src="images/huawei1.jpg" alt="iphone1">
            <span>Huawei</span>
        </a>
    </div>

    <!--Footer=========================================-->
    <footer class="footer">
      
    </footer>

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

          <div class="modal-content">

            <div class="modal-header border-bottom-0">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <div class="modal-body">

              <div class="form-title text-center">
                <h4>Login</h4>
              </div>

              <div class="d-flex flex-column text-center">
                <form action="controller/authentication.php" method="POST">

                  <div class="form-group">
                    <input type="email" class="form-control" id="username" name="username" placeholder="Your email...">
                  </div>

                  <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Your password...">
                  </div>

                  <button type="submit" class="btn btn-info btn-block btn-round">Login</button>
                </form>
            </div>

          </div>

            <div class="modal-footer d-flex justify-content-center">
              <div class="signup-section">Not a member yet? <a href="view/register.php" class="text-info"> Sign Up</a>.</div>
            </div>
            
        </div>
    </div>

</body>

</html>