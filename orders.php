<?php
    $conn = mysqli_connect('localhost','root','root','restaurant_system','3307');
    if(!$conn){
        echo("connection error ".mysqli_connect_error());
    }

    // if(isset($_POST['submit'])){
    //     if($_POST['submit']=='Edit Order'){
    //         $sql = "UPDATE orders SET Cuisine_Name = '$_POST[name]' WHERE cuisine.CuisineID = $_POST[id]";
    //         $result = mysqli_query($conn,$sql);                     
    //     } else if(($_POST['submit']=='Delete Cuisine') && isset($_POST['yes'])){
    //                 $sql = "DELETE FROM cuisine WHERE cuisine.CuisineID = $_POST[id]";
    //                 $result = mysqli_query($conn,$sql);                             
    //     } else if($_POST['submit']=='Create Cuisine'){
    //         $sql = "INSERT INTO cuisine (CuisineID, Cuisine_Name) VALUES (NULL, '$_POST[name]')";        
    //         $result = mysqli_query($conn,$sql);                     
    //     } else if($_POST['submit']=='Add Item'){
    //         $sql = "INSERT INTO items (ItemID, Item_Name, Price_per_serving, CuisineID) VALUES (NULL, '$_POST[name]', $_POST[price], $_POST[CuisineID]);";
    //         $result = mysqli_query($conn,$sql);                     
    //     } else if($_POST['submit']=='Edit Item'){
    //         $sql = "UPDATE items SET Item_Name = '$_POST[name]', Price_per_serving = '$_POST[price]' WHERE items.ItemId = $_POST[id]";
    //         $result = mysqli_query($conn,$sql);                     
    //     } else if(($_POST['submit']=='Delete Item') && isset($_POST['yes'])){
    //         $sql = "DELETE FROM items WHERE items.ItemId = $_POST[id]";
    //         $result = mysqli_query($conn,$sql);                             
    //     }
    // }

    $sql = 'SELECT * FROM customers';
    $result = mysqli_query($conn,$sql);
    $customers1 = mysqli_fetch_all($result,MYSQLI_ASSOC);
    for($i=0;$i<count($customers1);$i++){
        $j = $customers1[$i];
        $customers[$customers1[$i]['CustomerID']] = $j;
    }
    // print_r($customers);

    $sql = 'SELECT * FROM cuisine';
    $result = mysqli_query($conn,$sql);
    $cuisine = mysqli_fetch_all($result,MYSQLI_ASSOC);

    
    for($i=0;$i<count($cuisine);$i++){
        $j = $cuisine[$i]['CuisineID'];
        $sql = "SELECT ItemID, Item_Name, Times_ordered, Price_per_serving FROM items where CuisineID = '$j' ";
        $result = mysqli_query($conn,$sql);
        $items1 = mysqli_fetch_all($result,MYSQLI_ASSOC);    
        // print_r($items1);
        $itemsCuisine[$cuisine[$i]['CuisineID']] = $items1;
    }
    $sql = "SELECT * FROM items";
    $result = mysqli_query($conn,$sql);
    $items1 = mysqli_fetch_all($result,MYSQLI_ASSOC);  
    for($i=0;$i<count($items1);$i++){
        $j = $items1[$i];
        $items[$items1[$i]['ItemID']] = $j;
    }
    // print_r($items);


    $sql = 'SELECT * FROM orders';
    $result = mysqli_query($conn,$sql);
    $orders = mysqli_fetch_all($result,MYSQLI_ASSOC);
    // print_r($orders);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('linking_file.php') ?>
    <title>Diviana Dines: Orders</title>

</head>

<body>

    <?php include_once('header.php') ?>

    <div class="container">
        <h3>Orders</h3>
        <hr>
        
        <div class="col-12 col-md-8 offset-md-2">
            <span class="ml-auto card">
                <span class="card-header p-0">
                    <button class="btn btn-dark btn-lg w-100" data-toggle="collapse" href="#create">Place an Order</button>
                </span>
                    <div class="card-body collapse" id="create">
                        <form action="" id="placeOrderForm" method="post" >
                            <label for="cust" class="col-3">Customer:</label>
                            <select name="n_cust" id="n_cust" class="col-8">
                                <?php foreach($customers as $customer) { ?>
                                    <option value= " <?= $customer['CustomerID'] ?>"> <?=$customer['Customer_Name']?> -- <?=$customer['Contact_no']?> -- <?=$customer['Email_ID']?></option>
                                <?php } ?>
                            </select> <br>
                            
                            <script>
                                function getitems(val) {
                                    $.ajax({
                                        type: "POST",
                                        url: "get_items.php",
                                        data:'CuisineID='+val,
                                        success: function(data){
                                            $("#Item0").html(data);
                                        }
                                    });
                                }
                            </script>
                            <div>
                                <label for="Cuisine0" class="col-3">Cuisine:</label>
                                <select name="Cuisine" onChange="getitems(this.value);" class="col-8" id="Cuisine0">
                                    <option value="None">Select</option>
                                    <?php for($i=0;$i<count($cuisine);$i++) { ?>        
                                        <option value="<?=$cuisine[$i]['CuisineID']?>"><?=$cuisine[$i]['Cuisine_Name']?></option>
                                    <?php } ?>
                                </select>
                                
                                <label for="Item0" class="col-3">Item:</label>
                            
                                <select name="Item" id="Item0" class="col-8">
                                    <option value="None">Select Item</option>
                                </select>
                                <label for="quantity0" class="col-3">Quantity:</label>
                                <input type="number" name="quantity" min="0" id="quantity0" value="0">
                                <div id="item" class="col-12"></div>
                            </div>
                            
                            <input type="button" value="Add" class="col-3" onclick ="Additems()">
                            <script>
                                let arrn = [];
                                let arrq = [];
                                function Additems() {
                                    let val = $("#Item0")[0].value; 
                                    let valq = parseInt($("#quantity0")[0].value); 
                                    if(val!=="None" && valq!==0 && !arrn.includes(val)){
                                        
                                        arrn.push(val);
                                        arrq.push(valq);
                                    
                                    $.ajax({
                                        type: "POST",
                                        url: "add_items.php",
                                        data:'arrn='+arrn+" arrq:"+arrq,
                                        success: function(data){
                                            $("#item").html(data);
                                        }
                                    });
                                    }
                                }
                                function Removeitems(val){
                                    // alert(val);
                                    let del = arrn.indexOf(val);
                                    delete arrn[del];
                                    delete arrq[del];
                                    // console.log(arrn[0]);
                                    if(arrn.length !== 0){
                                    $.ajax({
                                        type: "POST",
                                        url: "add_items.php",
                                        data:'arrn='+arrn+" arrq:"+arrq,
                                        success: function(data){
                                            $("#item").html(data);
                                        }
                                    });
                                    }
                                    return false;
                                }
                            </script>
                            <input type="submit" value="Place Order" onclick="return placeorder()" class="col-3" name="submit">
                            <script>
                                function placeorder(){
                                    let cust = $("#n_cust")[0].value; 
                                    if(arrn.length !== 0){
                                        $.ajax({
                                            type: "POST",
                                            url: "placeorder.php",
                                            data:'arrn='+arrn+" arrq:"+arrq+" cust:"+cust,
                                            success: function(data){
                                                $("#temp").html(data);
                                                $("#orderList").load("orderList.php");
                                                $("#placeOrderForm")[0].reset();
                                                $("#item")[0].innerHTML="";
                                            }
                                        });
                                    }
                                    return false;
                                }
                            </script>
                        </form> 
                    </div>           
            </span>
        </div>
        <div id="temp">
        </div>
        <div class="row" id="orderList">
            <?php include_once("orderList.php") ?>
        </div>

    </div>

    <script>
        $(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function(){
        	$(this).prev(".card-header").find(".fas").addClass("fa-chevron-up").removeClass("fa-chevron-down");
        });
        
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fas").removeClass("fa-chevron-down").addClass("fa-chevron-up");
        }).on('hide.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fas").removeClass("fa-chevron-up").addClass("fa-chevron-down");
        });
    });
    </script>
    <?php include_once("footer.php") ?>
    

</body>

</html>