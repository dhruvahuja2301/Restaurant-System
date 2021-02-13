<?php
    $conn = mysqli_connect('localhost','root','root','restaurant_system','3307');
    if(!$conn){
        echo("connection error ".mysqli_connect_error());
    }

    if(!empty($_POST["OrderNo"])) { 
        // print_r($_POST);
            
        $temp = explode(" ",$_POST["OrderNo"]);
        $OrderNo = $temp[0];
        $ItemID = $temp[1];
        
        $sql = "DELETE FROM itemsorders WHERE ItemID='$ItemID' AND OrderNo = '$OrderNo'";
        $result = mysqli_query($conn,$sql);
    }

?>
