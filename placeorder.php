<?php
    $conn = mysqli_connect('localhost','root','root','restaurant_system','3307');
    if(!$conn){
        echo("connection error ".mysqli_connect_error());
    }

    $sql = 'SELECT * FROM items';
    $result = mysqli_query($conn,$sql);
    $items = mysqli_fetch_all($result,MYSQLI_ASSOC);
    // print_r($items);

    $sql = 'SELECT * FROM itemsorders';
    $result = mysqli_query($conn,$sql);
    $itemsorders = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $sql = 'SELECT * FROM orders';
    $result = mysqli_query($conn,$sql);
    $orders = mysqli_fetch_all($result,MYSQLI_ASSOC);

    if(!empty($_POST["arrn"])) { 
        // print_r($_POST['arrn']);
            
        $temp = explode(" ",$_POST["arrn"]);
        // print_r($temp);
        $arrn = explode(",",$temp[0]);
        $temp1 = explode(":",$temp[1]);
        $arrq = explode(",",$temp1[1]);
        $cust = $temp[3];
        // print_r($arrn);
        // print_r($arrq);
        // print_r($cust);
        // print_r($arrq);
        
        $sql = "INSERT INTO orders (OrderNo, Total_amount, CustomerID) VALUES (NULL, 0, '$cust')";        
        $result = mysqli_query($conn,$sql);
        
        $sql = "SELECT max(OrderNo) FROM orders";
        $result = mysqli_query($conn,$sql);
        $id = mysqli_fetch_all($result,MYSQLI_ASSOC);
        // print_r($id[0]['max(OrderNo)']);
        $id = $id[0]['max(OrderNo)'];
        for($i=0;$i<count($arrn);$i++){
            if($arrn[$i]!==""){
                // print_r(gettype($arrn[$i]));
                // print_r(gettype($arrq[$i]));
                // print_r(gettype($id[0]['max(OrderNo)']));
                $sql = "INSERT INTO itemsorders (ItemID, OrderNo, Quantity) VALUES ($arrn[$i], $id, $arrq[$i])";
                $result = mysqli_query($conn,$sql);

            }
        }
    }

?>
