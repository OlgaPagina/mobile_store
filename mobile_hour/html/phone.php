<?php include "../model/database.php";?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scdale=1.0">
<script src="https://kit.fontawesome.com/e393240d8a.js" crossorigin="anonymous"></script>


<!--==title==================================================================-->
<title>The Mobile Hour</title>

<!--stylesheet==========================================================-->
<link rel="stylesheet" type="text/css" href="../css/style.css"/>

<!-- Link to Bootstrap=================================================-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Link to Bootstrap dependencies-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script
	src="https://code.jquery.com/jquery-3.7.1.min.js"
	integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
	crossorigin="anonymous">
</script>
<script>
    $(function(){
        $('.header').load('html/header.html');
        $('.footer').load('html/footer.html');
    });
</script>
</head>

<body>

    <!--header====================================================-->
    <header class="header">
        <div class="logo"><p class="header_logo"> Mobile Hour</p></div>
        <div class="search">
            <form action="/action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="icons">
            <a href="#"><i class="fa fa-fw fa-user"></i>My account</a>
            <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
    </header>

    <!--navigation-bar========================================================-->
    <nav class="navbar">
        <ul class="menu">
            <li><a href="#">Mobile phones</a></li>
            <li><a href="#">Iphone</a></li>
            <li><a href="#">Samsung</a></li>
            <li><a href="#">Huawei</a></li>
            <li><a href="#">Sale</a></li>
            <li><a href="#">About us</a></li>
        </ul>
    </nav>

    <div class="phone">
        
        <?php
        //prepared statement
        $sql = "SELECT * FROM product";
        $statement = $conn->prepare($sql); 
        $statement->execute(); 
        $result = $statement->fetchAll(); 
        $statement->closeCursor(); 
        //display the result set 
        foreach($result as $row):
        
        echo "<div class='item'>";
        echo "<div clas='name'>" "<p>Product: " . $row['product_name'] . "</p>""</div>";
        echo "<div clas='img'>" '<img src="' . $row['image'] . '" alt="Phone">' "</div>";
        echo "<p>Model: " . $row['product_model'] . "</p>";
        echo "<p>Price: $" . $row['price'] . "</p>";  
        
        echo "</div>" ;
        endforeach; 
        ?>   
    </div>

</body>