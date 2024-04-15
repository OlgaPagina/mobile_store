<?php
//create a function to add a new product 
function add_product($product_name, $product_model, $manufacturer, $price, $stock_on_hand, $category, $feature, $image) {
    global $conn; 
    
    $uploaddir = '../images/';
    $uploadfile = $uploaddir . basename($image);
    

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
    }


    $sql = "INSERT INTO product (product_name, product_model, manufacturer, price, stock_on_hand, category_id, feature_id, image) VALUES (:product_name, :product_model, :manufacturer, :price, :stock_on_hand, :category, :feature, :image)"; 
    $statement = $conn->prepare($sql); 
    $statement->bindValue(':product_name', $product_name); 
    $statement->bindValue(':product_model', $product_model);
    $statement->bindValue(':manufacturer', $manufacturer);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':stock_on_hand', $stock_on_hand);
    $statement->bindValue(':category', $category);
    $statement->bindValue(':feature', $feature);
    $statement->bindValue(':image', $image);
    $result = $statement->execute();
    $statement->closeCursor();
    return $result; 
}

function delete_product($id) {
    global $conn;
    $sql = "DELETE FROM product WHERE product_id = :id" ;
    $statement = $conn->prepare($sql);
    $statement->bindValue(':id', $id);
    $result = $statement->execute();
    $statement->closeCursor();
    return $result;
}

function update_product($id, $product_name, $product_model, $manufacturer, $price, $stock_on_hand, $category, $feature, $image) { 
    global $conn;

    $uploaddir = '../images/';
    $uploadfile = $uploaddir . basename($image);
    

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
    }

    $sql = "UPDATE product SET product_name = :product_name, product_model = :product_model, manufacturer = :manufacturer, price = :price, stock_on_hand = :stock_on_hand, category_id = :category, feature_id = :feature, image = :image WHERE product_id = :id"; 
    $statement = $conn->prepare($sql); 
    $statement->bindValue(':id', $id);
    $statement->bindValue(':product_name', $product_name); 
    $statement->bindValue(':product_model', $product_model);
    $statement->bindValue(':manufacturer', $manufacturer);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':stock_on_hand', $stock_on_hand);
    $statement->bindValue(':category', $category);
    $statement->bindValue(':feature', $feature);
    $statement->bindValue(':image', $image); 
    $result = $statement->execute(); 
    $statement->closeCursor(); 
    return $result; 
    }

    //create a function to add a new user 
function add_new_user($firstname, $lastname, $permission, $email, $password) { 
    global $conn;

    $sql = "INSERT INTO user (firstname, lastname, permission_id, email, password) VALUES (:firstname, :lastname, :permission, :email, :password)"; 
    $statement = $conn->prepare($sql); 
    $statement->bindValue(':firstname', $firstname); 
    $statement->bindValue(':lastname', $lastname);
    $statement->bindValue(':permission', $permission);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $result = $statement->execute();
    $statement->closeCursor();
    //die($firstname);
    return $result;  
    } 
    
//function add_new_customer($firstname, $lastname, $email, $password, $cust_phone, $cust_address, $postcode, $city, $state) { 
    function add_new_customer($firstname, $lastname, $email, $password, $cust_phone, $cust_address, $postcode, $city, $state) { 

    global $conn;

    //$sql = "INSERT INTO customer (firstname, lastname, email, password, cust_phone, cust_address, postcode, city, state) VALUES (:firstname, :lastname, :email, :password, :cust_phone, :cust_address, :postcode, :city, :state)"; 
    $sql = "INSERT INTO customer (firstname, lastname, email, password, cust_phone, cust_address, postcode, city, state) VALUES (:firstname, :lastname, :email, :password, :cust_phone, :cust_address, :postcode, :city, :state)"; 

    $statement = $conn->prepare($sql); 
    $statement->bindValue(':firstname', $firstname); 
    $statement->bindValue(':lastname', $lastname);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':cust_phone', $cust_phone); 
    $statement->bindValue(':cust_address', $cust_address);
    $statement->bindValue(':postcode', $postcode);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $result = $statement->execute();
    $statement->closeCursor();
    //die($firstname);
    return $result;  
    } 

//create a function to login 
function login($username, $password) { 
    global $conn;
    // set a global varaible to return the permissions level
    global $permissions;

    $sql = "SELECT * FROM user WHERE email = :username";
    $statement = $conn->prepare($sql);
    $statement->bindValue(':username', $username); 
    $statement->execute(); 
    $result = $statement->fetch();
    if (isset($result[0])) {
        if (password_verify($password, $result['password'])){
            $permissions = $result['permission_id'];
            $count = $statement->rowCount(); 
            return $count;
        } 

    else {
        //invalid password
    }
    } else {
        //invalid username
    }
    }

function login_customers($username, $password) { 
    global $conn;
    // set a global varaible to return the permissions level
    global $permissions;

    $sql = "SELECT * FROM customer WHERE email = :username";
    $statement = $conn->prepare($sql);
    $statement->bindValue(':username', $username); 
    $statement->execute(); 
    $result = $statement->fetch();
    if (isset($result[0])) {
        if (password_verify($password, $result['password'])){
            //$permissions = $result['permissions_id'];
            $count = $statement->rowCount(); 
            return $count;
        } 

    else {
        //invalid password
    }
    } else {
        //invalid username
    }
}

//create a function to retrieve salt 
function retrieve_salt($username) { 
    global $conn; 
    $sql = "SELECT * FROM user WHERE email = :username";
    $statement = $conn->prepare($sql); 
    $statement->bindValue(':username', $username); 
    $statement->execute(); 
    $result = $statement->fetch(); 
    $statement->closeCursor(); 
    return $result; 
    }


function update_user($id, $firstname, $lastname, $permission, $email) { 
    global $conn;
    
    //$uploaddir = '../images/';
    //$uploadfile = $uploaddir . basename($image);
        
    
    //     if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
    //     echo "File is valid, and was successfully uploaded.\n";
    // }
    
    $sql = "UPDATE user SET firstname = :firstname, lastname = :lastname, permission_id = :permission, email = :email WHERE user_id = :id"; 
    $statement = $conn->prepare($sql); 
    $statement->bindValue(':id', $id);
    $statement->bindValue(':firstname', $firstname); 
    $statement->bindValue(':lastname', $lastname);
    $statement->bindValue(':permission', $permission);
    $statement->bindValue(':email', $email);
    //$statement->bindValue(':stock_on_hand', $stock_on_hand);
    //$statement->bindValue(':feature', $feature);
    //$statement->bindValue(':image', $image); 
    $result = $statement->execute(); 
    $statement->closeCursor(); 
    return $result; 
    }

function delete_user($id) {
    global $conn;
    
    $sql = "DELETE FROM user WHERE user_id = :id";
        
    $statement = $conn->prepare($sql);
    $statement->bindValue(':id', $id);
    $result = $statement->execute();
    $statement->closeCursor();
    return $result;
    }

function add_changelog($username, $product_name, $product_model, $content, $date, $action){
    global $conn;

    $sql = "INSERT INTO changelog (username, product_name, product_model, content, date, action) VALUES (:username, :product_name, :product_model, :content, :date, :action)"; 
    $statement = $conn->prepare($sql); 
    $statement->bindValue(':username', $username); 
    $statement->bindValue(':product_name', $product_name);
    $statement->bindValue(':product_model', $product_model);
    $statement->bindValue(':action', $action);
    $statement->bindValue(':content', $content);
    $statement->bindValue(':date', $date);
    $result = $statement->execute();
    $statement->closeCursor();
    //die($firstname);
    return $result; 
    }

function add_changelog_user($username, $firstname, $lastname, $content, $date, $action){
    global $conn;

    $sql = "INSERT INTO changelog (username, firstname, lastname, content, date, action) VALUES (:username, :firstname, :lastname, :content, :date, :action)"; 
    $statement = $conn->prepare($sql); 
    $statement->bindValue(':username', $username); 
    $statement->bindValue(':firstname', $firstname);
    $statement->bindValue(':lastname', $lastname);
    //$statement->bindValue(':user_role', $user_role);
    $statement->bindValue(':action', $action);
    $statement->bindValue(':content', $content);
    $statement->bindValue(':date', $date);
    $result = $statement->execute();
    $statement->closeCursor();
    //die($firstname);
    return $result; 
    }
?>

