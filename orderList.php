<?php
$conn = mysqli_connect('localhost','root','root','restaurant_system','3307');
if(!$conn){
    echo("connection error ".mysqli_connect_error());
}

$sql = 'SELECT * FROM customers';
$result = mysqli_query($conn,$sql);
$customers1 = mysqli_fetch_all($result,MYSQLI_ASSOC);
for($i=0;$i<count($customers1);$i++){
    $j = $customers1[$i];
    $customers[$customers1[$i]['CustomerID']] = $j;
}
$sql = 'SELECT * FROM cuisine';
$result = mysqli_query($conn,$sql);
$cuisine = mysqli_fetch_all($result,MYSQLI_ASSOC);


for($i=0;$i<count($cuisine);$i++){
    $j = $cuisine[$i]['CuisineID'];
    $sql = "SELECT ItemID, Item_Name, Times_ordered, Price_per_serving FROM items where CuisineID = '$j' ";
    $result = mysqli_query($conn,$sql);
    $items1 = mysqli_fetch_all($result,MYSQLI_ASSOC);    
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

                if(count($orders)==0){
                    echo("<b>No Orders Present</b>");
                }
                for($i=0;$i<count($orders);$i++){
                    $id = $orders[$i]['OrderNo'];
                    $sql = "SELECT * FROM itemsorders WHERE itemsorders.OrderNo=$id";
                    $result = mysqli_query($conn,$sql);
                    $ordersitems = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    // print_r($ordersitems);
            ?>
                <div class="col-12 col-lg-6 my-3">
                    <div class="card" id="">
                        <div class="card-header p-0">
                            <button class="w-100 btn btn-lg bg-danger text-dark text-center collapsed" data-toggle="collapse" href="#order<?=$i?>">
                                <?= $customers[$orders[$i]['CustomerID']]['Customer_Name']?>
                                &nbsp; - &nbsp;<?=$orders[$i]['Date_and_time']?>&nbsp;&nbsp;<span class="fas fa-chevron-down"></span>
                            </button>
                        </div>
                        

                        <div class="card-body collapse" id="order<?=$i?>">

                            <span class="mr-2">
                                <button class="btn  btn-outline-warning" data-toggle="collapse" href="#edit<?=$i?>">Edit</button>
                                <button class="btn btn-outline-danger" data-toggle="collapse" href="#delete<?=$i?>">Delete</button>
                                <button class="btn btn-outline-dark" data-toggle="collapse" href="#add_item_<?=$i?>">Add an item</button>
                            </span>

                            <div class="card-body collapse" id="edit<?=$i?>">
                                <!-- <form action="" method="post">
                                        <label for="e_name<?=$cuisine[$i]['CuisineID']?>">Cuisine Name</label>
                                        <input type="text" id="e_name<?=$cuisine[$i]['CuisineID']?>" name="name" value="<?=$cuisine[$i]['Cuisine_Name']?>"> 
                                        <input type="submit" value="Edit Cuisine" name="submit">
                                        <input type="hidden" name="id" value="<?=$cuisine[$i]['CuisineID']?>">
                                </form>   -->
                                <dl class="mt-3" id="dl_<?=$orders[$i]['OrderNo']?>">
                                <?php
                                    
                                    if(count($ordersitems)==0){
                                     echo("<b>No Items For this Order</b>");   
                                    }
                                    else {
                                ?>
                                    <span class="row">
                                        <dt class="col-3 border">Dish Name</dt>
                                        <dt class="col-3 border">Quantity</dt>
                                        <dt class="col-6 border">Action</dt>
                                        
                                    </span>
                                    <?php
                                        
                                        for($j=0;$j<count($ordersitems);$j++){
                                            // print_r($ordersitems);
                                    ?>

                                        <span class="row my-0">
                                            <dd class="col-3 mb-0 border"><?=$items[$ordersitems[$j]['ItemID']]['Item_Name']?></dd>
                                            <dd class="col-3 mb-0 border"><?=$ordersitems[$j]['Quantity']?></dd>
                                            <dd class="col-6 py-2 mb-0 border">
                                                <button class="btn btn-outline-warning mx-1" data-toggle="collapse" href="#edit<?=$i?>_item<?=$j?>">edit <i class="fas fa-pen"></i></button>
                                                <button type="submit" value="delete" class="mx-1 btn btn-outline-danger" data-toggle="collapse" href="#delete<?=$ordersitems[$j]['OrderNo']?>_item<?=$ordersitems[$j]['ItemID']?>">delete <i class="fas fa-trash-alt"></i></button>
                                            </dd>
                                            
                                        </span>
                                        <span>
                                            <div class="card-body collapse input_top_space" id="edit<?=$i?>_item<?=$j?>">
                                                <form action="" method="post" class="row">
                                                    
                                                    <label for="e<?=$i?>_i<?=$j?>_quantity" class="col-3 my-0">Quantity:</label>
                                                    <input type="number" id="e<?=$i?>_i<?=$j?>_quantity" name="price" class="my-0 col-5" value="<?=$ordersitems[$j]['Quantity']?>">
                                                    <input type="button" class="col-3 offset-1 my-0" value="Edit Item" onclick="return edit_item(<?=$i?>,<?=$j?>,<?=$ordersitems[$j]['OrderNo']?>,<?=$ordersitems[$j]['ItemID']?>)" name="submit"> 
                                                </form> 
                                            </div>
                                            <script>
                                                function edit_item(vali,valj,i,j){
                                                    let str = "#e"+vali+"_i"+valj+"_quantity";
                                                    if($(str)[0].value !=0){
                                                        // alert($(str)[0].value);
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "edit_item.php",
                                                            data:'i='+i+" j:"+j+" newq:"+$(str)[0].value,
                                                            success: function(data){
                                                                // $("#temp1").html(data);
                                                                $("#orderList").load("orderList.php");
                                                            }
                                                        });
                                                    }
                                                    return false;
                                                }
                                            </script>
                                            <div class="card-body collapse" id="delete<?=$ordersitems[$j]['OrderNo']?>_item<?=$ordersitems[$j]['ItemID']?>">
                                                <form action="" method="post">
                                                    <label for="d<?=$ordersitems[$j]['OrderNo']?>_i<?=$ordersitems[$j]['ItemID']?>_name">Are You sure you want to delete this Item</label>
                                                    <br><input type="checkbox" id="d<?=$ordersitems[$j]['OrderNo']?>_i<?=$ordersitems[$j]['ItemID']?>_name" name="yes" > Yes &nbsp;
                                                    <input type="button" value="Delete Item" name="submit" onclick="delete_item(<?=$ordersitems[$j]['OrderNo']?>,<?=$ordersitems[$j]['ItemID']?>)">                        
                                                </form>  
                                            </div>
                                            <script>
                                                function delete_item(val1,val2) {
                                                    
                                                    if($("#d"+val1+"_i"+val2+"_name")[0].checked){
                                                        
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "delete_item.php",
                                                            data:'OrderNo='+val1+" "+val2,
                                                            success: function(data){
                                                                // $("#temp").html(data);
                                                                $("#orderList").load("orderList.php");
                                                            }
                                                        });
                                                    }
                                                }
                                            </script>
                                        </span>
                                    <?php } 
                                    } ?>
            
                                </dl>
                            </div>
                            
                            <div class="card-body collapse" id="delete<?=$i?>">
                                <form action="" method="post">
                                    <label for="d_name<?=$orders[$i]['OrderNo']?>">Are You sure you want to delete this order</label>
                                    <br><input type="checkbox" id="d_name<?=$orders[$i]['OrderNo']?>" name="yes" > Yes &nbsp;
                                    <input type="button" value="Delete Order" name="submit" onclick="delete_order(<?=$orders[$i]['OrderNo']?>)">
                                </form>  
                            </div>
                            <script>
                                function delete_order(val) {
                                    
                                    if($("#d_name"+val)[0].checked){
                                        
                                        $.ajax({
                                            type: "POST",
                                            url: "delete_order.php",
                                            data:'OrderNo='+val,
                                            success: function(data){
                                                $("#temp").html(data);
                                                $("#orderList").load("orderList.php");
                                            }
                                        });
                                    }
                                }
                            </script>
                            <script>
                                function getitems_add(val,OrderNo) {
                                    // alert("#Item"+OrderNo)
                                    $.ajax({
                                        type: "POST",
                                        url: "get_items.php",
                                        data:'CuisineID='+val,
                                        success: function(data){
                                            $("#Items"+OrderNo).html(data);
                                        }
                                    });
                                }
                            </script>
                            <div class="card-body collapse input_top_space" id="add_item_<?=$i?>">
                                <form action="" method="post" class="row">    
                                    <div>
                                        <label for="Cuisine<?=$orders[$i]['OrderNo']?>" class="col-3">Cuisine:</label>
                                        <select name="Cuisine" onChange="getitems_add(this.value,<?=$orders[$i]['OrderNo']?>);" class="col-8" id="Cuisine<?=$orders[$i]['OrderNo']?>">
                                            <option value="None">Select</option>
                                            <?php for($j=0;$j<count($cuisine);$j++) { ?>        
                                                <option value="<?=$cuisine[$j]['CuisineID']?>"><?=$cuisine[$j]['Cuisine_Name']?></option>
                                            <?php } ?>
                                        </select>
                                        
                                        <label for="Items<?=$orders[$i]['OrderNo']?>" class="col-3">Item:</label>
                                    
                                        <select name="Item" id="Items<?=$orders[$i]['OrderNo']?>" class="col-8">
                                            <option value="None">Select Item</option>
                                        </select>
                                        <label for="quantity<?=$orders[$i]['OrderNo']?>" class="col-3">Quantity:</label>
                                        <input type="number" name="quantity" min="0" id="quantity<?=$orders[$i]['OrderNo']?>" value="0">
                                        <input type="button" value="Add Item" onclick="return Additem(<?=$orders[$i]['OrderNo']?>)" class="col-3" name="submit">
                                        <script>
                                            function Additem(OrderNo){
                                                
                                                val = $("#Items"+OrderNo)[0].value;
                                                valq = $("#quantity"+OrderNo)[0].value;
                                                
                                                if(val!=="None" && valq!==0){
                                                                                                    
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "add_item_order.php",
                                                        data:'val='+val+" valq:"+valq+" OrderNo:"+OrderNo,
                                                        success: function(data){
                                                            $("#orderList").load("orderList.php");
                                                        }
                                                    });
                                                }
                                                return false;
                                            }
                                        </script>
                                    </div>
                                </form> 
                            </div>
                            <span id="orderList_dl">
                                <dl class="mt-3" id="dl_<?=$orders[$i]['OrderNo']?>">
                                <?php
                                    
                                    if(count($ordersitems)==0){
                                     echo("<b>No Items For this Order</b>");   
                                    }
                                    else {
                                ?>
                                    <span class="row">
                                        <dt class="col-3 border">Dish Name</dt>
                                        <dt class="col-3 border">Price per Serving</dt>
                                        <dt class="col-3 border">Quantity</dt>
                                        <dt class="col-3 border">Total Price</dt>
                                        
                                    </span>
                                    <?php
                                        
                                        for($j=0;$j<count($ordersitems);$j++){
                                    ?>

                                        <span class="row my-0">
                                            <dd class="col-3 mb-0 border"><?=$items[$ordersitems[$j]['ItemID']]['Item_Name']?></dd>
                                            <dd class="col-3 mb-0 border"><?=$items[$ordersitems[$j]['ItemID']]['Price_per_serving']?></dd>
                                            <dd class="col-3 mb-0 border"><?=$ordersitems[$j]['Quantity']?></dd>
                                            <dd class="col-3 mb-0 border">
                                                <?= $ordersitems[$j]['Quantity']*$items[$ordersitems[$j]['ItemID']]['Price_per_serving'];?>
                                            </dd>

                                        </span>
                                        
                                    <?php } 
                                    } ?>
                                    <h4 class="text-right mt-3">Total Amount :- Rs. <?=$orders[$i]['Total_amount']?>/-</h4>
            
                                </dl>
                            </span>
                        </div>
                    </div>
                </div>
            <?php } ?>
