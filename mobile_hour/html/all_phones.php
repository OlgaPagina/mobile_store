<?php include "../model/database.php";?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scdale=1.0">
<script src="https://kit.fontawesome.com/e393240d8a.js" crossorigin="anonymous"></script>


<!--==title==================================================================-->
<title>The Mobile Hour</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

<!--stylesheet==========================================================-->
<link rel="stylesheet" type="text/css" href="../css/style.css"/>

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
<script>
    $(function(){
        $('.header').load('header.html');
        $('.footer').load('footer.html');
    });
</script>
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
            <li><a href="#">Mobile phones</a></li>
            <li><a href="#">Iphone</a></li>
            <li><a href="#">Samsung</a></li>
            <li><a href="#">Huawei</a></li>
            <li><a href="#">Sale</a></li>
            <li><a href="#">About us</a></li>
        </ul>
    </nav>

    <section>
    <div class="first_row"><h2>All phones</h2></div>
    
    <div class="filter">

    <div class="col-md-3">
        <form action="" method="GET">
            <div class="card shadow mt-3">

                <div class="card-header">
                    <h5>Filter 
                        <!-- <input type="checkbox" class="menu-btn-all" id="menu-btn-all">
                        <label for="menu-btn-all" class="menu-icon-all">
                            <span class="nav-icon-all">
                                <i class="fa-solid fa-angle-down"></i>
                            </span>
                        </label> -->
                        <button type="submit" class="btn btn-primary btn-sm float-end">Search</button>
                    </h5>
                </div>
            
                <input type="checkbox" class="menu-btn-all" id="menu-btn-all">
                        <label for="menu-btn-all" class="menu-icon-all">
                            <span class="nav-icon-all">
                                <i class="fa-solid fa-angle-down"></i>
                            </span>
                        </label>

            <div class="card-body">
                <h6>Category</h6>
                
                <?php
                    $sql = "SELECT * FROM category";
                    $statement = $conn->prepare($sql); 
                    $statement->execute(); 
                    $result = $statement->fetchAll(); 
                    $statement->closeCursor(); 
                    foreach($result as $row)
                    {
                        $checked = [];
                        if(isset($_GET['category'])){
                            $checked = $_GET['category'];
                        }
                        ?>
                        <div class="cat_id">
                            <input type="checkbox" name="category[]" value="<?= $row['category_id']; ?>"
                                <?php if(in_array($row['category_id'],$checked)){echo "checked";} ?>
                            />
                                <?= $row['category']; ?>
                        </div>
                        <?php
                    }
                ?>
            </div>
            <div class="card-body">
                <h6>Price</h6>
                <div class="row">
                    <div class="col-md-4">
                        <!-- <label for="">Start Price</label> -->
                        <input type="text" name="start_price" value="<?php if(isset($_GET['start_price'])){echo $_GET['start_price']; }else{echo "100";} ?>" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <!-- <label for="">End Price</label> -->
                        <input type="text" name="end_price" value="<?php if(isset($_GET['end_price'])){echo $_GET['end_price']; }else{echo "3000";} ?>" class="form-control">
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <a href="all_phones.php" class="btn btn-primary btn-sm float-end">Reset</a>
            </div>
            </div>
        </form>
    </div>
    </div>     

    <div class="allphones">
    <div class="grid-container">
        
        <?php
            if(isset($_GET['category']))
            {
                $categorychecked = [];
                $categorychecked = $_GET['category'];
                
                $startprice = $_GET['start_price'];
                $endprice = $_GET['end_price'];
            
                foreach($categorychecked as $rowcategory)
                {
                    $sql = "SELECT * FROM product WHERE category_id IN ($rowcategory) and price BETWEEN $startprice AND $endprice";
                    $statement = $conn->prepare($sql); 
                    $statement->execute(); 
                    $result = $statement->fetchAll(); 
                    $statement->closeCursor(); 
                    foreach($result as $row):
                    ?>
                    <a href='#'><div class='item'>
                        <img src= ../<?=$row['image'];?>>
                        <p>Product:  <?= $row['product_name'];?></p>
                        <p>Model: <?= $row['product_model'];?></p>
                        <p>Price: $<?=$row['price'];?></p>
                        <p>Stock: <?=$row['stock_on_hand'];?></p>
                    </div></a>
                    <?php
                    endforeach; 
                }                
            }

            elseif(isset($_GET['start_price']) && isset($_GET['end_price']))
                {
                    $startprice = $_GET['start_price'];
                    $endprice = $_GET['end_price'];
                    $sql = "SELECT * FROM product WHERE price BETWEEN $startprice AND $endprice ";
                    $statement = $conn->prepare($sql); 
                    $statement->execute(); 
                    $result = $statement->fetchAll(); 
                    $statement->closeCursor(); 
                    foreach($result as $row)
                    {
                        ?>
                        <a href='#'><div class='item'>
                            <img src= ../<?=$row['image'];?>>
                            <p>Product:  <?= $row['product_name'];?></p>
                            <p>Model: <?= $row['product_model'];?></p>
                            <p>Price: $<?=$row['price'];?></p>
                            <p>Stock: <?=$row['stock_on_hand'];?></p>
                        </div></a>
                        <?php
                    }
                }
            
            else
            {                            
                //prepared statement
                $sql = "SELECT * FROM product";
                $statement = $conn->prepare($sql); 
                $statement->execute(); 
                $result = $statement->fetchAll(); 
                $statement->closeCursor(); 
                //display the result set 
                foreach($result as $row):
                    echo "<a href='#'> <div class='item'>";
                    echo '<img src="../' . $row['image'] . '" alt="Phone">';
                    echo "<p>Product: " . $row['product_name'] . "</p>";
                    echo "<p>Model: " . $row['product_model'] . "</p>";
                    echo "<p>Price: $" . $row['price'] . "</p>";  
                    echo "<p>Stock: " . $row['stock_on_hand'] . "</p>";
                    echo "</div> </a>" ;
                endforeach; 
            }
        ?>   
    </div>
    </div>
    </section>

    <footer class="footer">

    </footer>
    


</body>
</html>