<?php
// print_r($_POST);

    $conn = mysqli_connect('localhost','root','root','restaurant_system','3307');
    if(!$conn){
        echo("connection error ".mysqli_connect_error());
    }
    // print_r($_POST);

    if(!empty($_POST["arrn"])) { 
            
            $temp = explode(" ",$_POST["arrn"]);
            $arrn = explode(",",$temp[0]);
            $temp = explode(":",$temp[1]);
            $arrq = explode(",",$temp[1]);
            // print_r($arrn);
            // print_r($arrq);
            for($i=0;$i<count($arrn);$i++){
                if($arrn[$i]!==""){
                    $sql = "SELECT * FROM items where items.ItemID = $arrn[$i]";
                    $result = mysqli_query($conn,$sql);
                    $item = mysqli_fetch_all($result,MYSQLI_ASSOC);
                
        ?>  
                <h6><?=$item[0]['Item_Name']?> - Rs.<?=$item[0]['Price_per_serving']?>/-  Quantity :- <?= $arrq[$i] ?> <button value="<?=$item[0]['ItemID']?>" class="btn btn-outline-danger" onclick="return Removeitems(this.value)"><i class="fas fa-trash-alt"></i></button> </h6>        
    <?php } } }?>

