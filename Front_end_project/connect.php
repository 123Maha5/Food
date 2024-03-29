<?php
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $item = $_POST['item'];
    $quantity = $_POST['quantity'];
    $address = $_POST['address'];

    //Database connection
    $conn = new mysql('localhost','root','','restuarant');
    if($conn->connect_error)
    {
        die('Connection Failed :'.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into order(fullname,email,mobile,item,quantity,address) values(?,?,?,?,?)");
        $stmt->bind_param("ssiiis",$fullname, $email, $mobile, $item, $quantity, $address);
        $stmt->execute();
        echo "Ordered Successfully...";
        $stmt->close();
        $conn->close();
    }
?>