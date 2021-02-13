<?php
// print_r($_POST);

    $conn = mysqli_connect('localhost','root','root','restaurant_system','3307');
    if(!$conn){
        echo("connection error ".mysqli_connect_error());
    }

    if(!empty($_POST["CuisineID"])) { 
        $sql = 'SELECT * FROM cuisine';
        $result = mysqli_query($conn,$sql);
        $cuisine = mysqli_fetch_all($result,MYSQLI_ASSOC);

        
        for($i=0;$i<count($cuisine);$i++){
            $j = $cuisine[$i]['CuisineID'];
            $sql = "SELECT ItemID, Item_Name, Times_ordered, Price_per_serving FROM items where CuisineID = '$j' ";
            $result = mysqli_query($conn,$sql);
            $items1 = mysqli_fetch_all($result,MYSQLI_ASSOC);    
            // print_r($items1);
            $items[$cuisine[$i]['CuisineID']] = $items1;
        }
        ?>
        <option value="None">Select Item</option>
            <?php for($i=0;$i<count($items[$_POST["CuisineID"]]);$i++) { ?>        
            <option value="<?=$items[$_POST["CuisineID"]][$i]['ItemID']?>"><?=$items[$_POST["CuisineID"]][$i]['Item_Name']?>  - Rs.<?=$items[$_POST["CuisineID"]][$i]['Price_per_serving']?>/- </option>
        <?php } ?>

    <?php } ?>
