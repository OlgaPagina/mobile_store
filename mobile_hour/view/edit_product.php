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
    <h1>Edit Product</h1>
    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        else {
            header('Location: ../view/admin_product.php');
        }
    ?>
    <form enctype="multipart/form-data" action="../controller/editproduct.php?id=<?php echo $id?>" method="POST">
    <?php
        $sql = "SELECT * FROM product where product_id = $id";
        //execute the query
        $result = $conn->query($sql);
        foreach($result as $row) {
    ?>
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="product_name">Select Brand</label>
            <select id="product_name" name="product_name" class="form-control">
                <!-- check for the existing value and if true then set the dropdown to selected -->
                <option value="iphone" <?php if($row['product_name'] == 'iphone') echo 'selected ="selected"';?>>Iphone</option>
                <option value="samsung" <?php if($row['product_name'] == 'samsung') echo 'selected ="selected"';?>>Samsung</option>
                <option value="huawei" <?php if($row['product_name'] == 'huawei') echo 'selected ="selected"';?>>Huawei</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="product_model">Select Model</label>
            <select id="product_model" name="product_model" class="form-control">
                <!-- check for the existing value and if true then set the dropdown to selected -->
                <option value="1" <?php if($row['product_model'] == '1') echo 'selected ="selected"';?>>1</option>
                <option value="2" <?php if($row['product_model'] == '2') echo 'selected ="selected"';?>>2</option>
                <option value="3" <?php if($row['product_model'] == '3') echo 'selected ="selected"';?>>3</option>
            </select>
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="manufacturer">Select Manufacturer</label>
            <select id="manufacturer" name="manufacturer" class="form-control">
                <!-- check for the existing value and if true then set the dropdown to selected -->
                <option value="Apple" <?php if($row['manufacturer'] == 'Apple') echo 'selected ="selected"';?>>Apple</option>
                <option value="Samsung" <?php if($row['manufacturer'] == 'Samsung') echo 'selected ="selected"';?>>Samsung</option>
                <option value="Huawei" <?php if($row['manufacturer'] == 'Huawei') echo 'selected ="selected"';?>>Huawei</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="feature">Select feature</label>
            <select id="feature" name="feature" class="form-control">
            <!-- Populate the origin dropdown from the origin table -->
            <?php
                $sql_origin = "SELECT * FROM feature";
                //execute the query
                $result_origin = $conn->query($sql_origin);
                foreach($result_origin as $row_origin) {
                    // set the value to the primary key but the label to the text description from the table
                    // check for the existing value and if true then set the dropdown to selected
                    if($row_origin['feature_id'] == $row['feature_id']) {
                        echo "<option value='" . $row_origin['feature_id'] . "' selected ='selected'>" . $row_origin['feature_id'] . "</option>";
                    }
                    else {
                        echo "<option value='" . $row_origin['feature_id'] . "'>" . $row_origin['feature_id'] . "</option>";
                    }
                }
            ?>
            </select>
        </div>
        </div>
        
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="stock_on_hand">Enter stock number</label>
            <input type="number" id="stock_on_hand" name="stock_on_hand" value="<?php echo $row['stock_on_hand']; ?>" class="form-control" required />
        </div>
        <div class="form-group col-md-6">
            <label for="price">Enter price</label>
            <input type="number" id="price" name="price" value="<?php echo $row['price']; ?>" class="form-control" step=".01" required />
        </div>
        </div>
        <div class="form-group">
            <label for="category">Category</label><br>
            <!-- Populate the category options from the category table -->
            <?php
                $sql_category = "SELECT * FROM category";
                //execute the query
                $result_category = $conn->query($sql_category);
                foreach($result_category as $row_category) {
                    echo "<div class='form-check form-check-inline'>";
                    // set the value to the primary key but the label to the text description from the table
                    // check for the existing value and if true then set the dropdown to selected
                    if($row_category['category_id'] == $row['category_id']) {
                        echo "<input type='radio' id='category' name='category' value='" . $row_category['category_id'] . "'class='form-check-input' required checked>";
                    }
                    else {
                        echo "<input type='radio' id='category' name='category' value='" . $row_category['category_id'] . "'class='form-check-input' required>";
                    }
                    echo "<label for='category' class='form-check-label'> " . $row_category['category'] . "</label><br>";
                    echo "</div>";
                }
                ?>
        </div>
        <div class="form-group">
            <label for="image">Choose an image file</label>
            <input name="image" type="file" class="form-control-file" id="image" /><br>
            <img src="../<?php echo $row['image']; ?>" width="75" height="75" />
            <!-- use a hidden form field to hold the existing image filename value -->
            <input type="hidden" name="image" value="<?php echo $row['image'];?>" />
        </div>
        <div class="form-group">
        <button class="btn btn-primary mb-2" type="submit">Edit product</button>
        <button class="btn btn-primary mb-2" type="reset">Reset</button>
        </div>
        <?php
        }
        ?>
    </form>
    </section>
</body>
</html>