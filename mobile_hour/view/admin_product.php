<?php 
include_once("../model/database.php");
session_start();
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

    <!-- Link to Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!--stylesheet==========================================================-->
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>

    <!--Fonts============================================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Link to Bootstrap dependencies-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
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

    <!-- Header and Footer=======================================-->
    <!--Script================================================================-->
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
    <a class="nav-link" href="admin_home.php">Admin home</a>
    <h1>Edit / Delete Products</h1>
        

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Image</th>
                <th scope="col">Manufacturer</th>
                <th scope="col">Price</th>
                <th scope="col">Stock on hand</th>
                <th scope="col">Category</th>
                <th scope="col">Feature</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM product";
            //execute the query
            $result = $conn->query($sql);
            foreach($result as $row) {
                echo "<tr>";
                    echo "<th scope='row'>" . $row['product_name'] . "</th>";
                    echo "<td>" . $row['product_model'] . "</td>";
                    echo '<td><img src="../' . $row['image'] . '" class="imgthumb"></td>';
                    echo "<td>" . $row['manufacturer'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['stock_on_hand'] . "</td>";
                    // create a query to return and display the category description based on the categoryID foreign key in the coffee table
                    // note the query parameters for this query need to be different to the query returning the records from the coffeee table
                    $catID = $row['category_id'];
                    $sql_cat = "SELECT category FROM category where category_id = $catID";
                    $result_cat = $conn->query($sql_cat);
                    echo "<td>" . $result_cat->fetchColumn(0) . "</td>";
                    echo "<td>" . $row['feature_id'] . "</td>";
                    // you could do a similar query to above to return the origin description for the record
                    // create link to the edit product page ensuring that we pass the correct primary key for the record to be edited
                    echo '<td><a href="../view/edit_product.php?id=' . $row['product_id'] . '"><i class="bi bi-pencil-square"></i></a></td>';
                    // create link to the delete product page ensuring that we pass the correct primary key for the record to be deleted
                    echo '<td><a href="../controller/deleteproduct.php?id=' . $row['product_id'] . '" class="delete"><i class="bi bi-trash"></i></a></td>';
            echo "</tr>";
            }
        ?>
        </tbody>
    </table>

    </section>
</body>
</html>