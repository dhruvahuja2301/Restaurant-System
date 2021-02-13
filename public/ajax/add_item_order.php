<?php
    $conn = mysqli_connect('localhost','root','root','restaurant_system','3307');
    if(!$conn){
        echo("connection error ".mysqli_connect_error());
    }

    if(!empty($_POST["val"])) { 
        // print_r($_POST['val']);
            
        $temp = explode(" ",$_POST["val"]);
        $ItemID = $temp[0];
        $temp1 = explode(":",$temp[1]);
        $quantity = $temp1[1];
        $temp1 = explode(":",$temp[2]);
        $OrderNo = $temp1[1];
    
        $sql = "INSERT INTO itemsorders (ItemID, OrderNo, Quantity) VALUES ($ItemID, $OrderNo, $quantity)";
        $result = mysqli_query($conn,$sql);
    }

?>
