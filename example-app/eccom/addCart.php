<?php

require "../admin/connect.php";

$product_id = $_POST["product_id"];

$select = $connect->query("SELECT * FROM cart WHERE product_id = '$product_id' ")->fetch_assoc();

if($select){
    $new_count = $select["count"] + 1;
    $update = $connect->query("UPDATE cart SET `count`='$new_count' WHERE product_id='$product_id' ");
    echo "update";
}else{

    $insert = $connect->query("INSERT INTO cart 
    (product_id , count)
    VALUES
    ('$product_id' , '1')
    ");
    
    if ($insert) {
        echo "yes";
    }
}
?>
