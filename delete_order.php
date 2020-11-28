<?php
    $conn = mysqli_connect('localhost','root','root','restaurant_system','3307');
    if(!$conn){
        echo("connection error ".mysqli_connect_error());
    }

    if(!empty($_POST["OrderNo"])) { 
        // print_r($_POST['OrderNo']);
        
        $sql = "DELETE FROM itemsorders WHERE itemsorders.OrderNo = '$_POST[OrderNo]'";
        $result = mysqli_query($conn,$sql);
        
        $sql = "DELETE FROM orders WHERE orders.OrderNo = '$_POST[OrderNo]'";
        $result = mysqli_query($conn,$sql);
    }

?>
