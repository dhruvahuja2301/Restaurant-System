<?php
    $conn = mysqli_connect('localhost','root','root','restaurant_system','3307');
    if(!$conn){
        echo("connection error ".mysqli_connect_error());
    }

    if(!empty($_POST["i"])) { 
        // print_r($_POST);
            
        $temp = explode(" ",$_POST["i"]);
        $OrderNo = $temp[0];
        $temp1 = explode(":",$temp[1]);
        $ItemID = $temp1[1];
        $temp1 = explode(":",$temp[2]);
        $quantity = $temp1[1];
        // print_r($OrderNo);    
        // print_r($ItemID);    
        // print_r($quantity);    
        $sql = "UPDATE itemsorders SET Quantity='$quantity' WHERE ItemID='$ItemID' AND OrderNo = '$OrderNo'";
        $result = mysqli_query($conn,$sql);
    }

?>
