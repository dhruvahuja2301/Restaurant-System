<?php
    $conn = mysqli_connect('localhost','root','root','restaurant_system','3307');
    if(!$conn){
        echo("connection error ".mysqli_connect_error());
    }
    $sql = 'SELECT * FROM cuisine';
    $result = mysqli_query($conn,$sql);

    $cuisine = mysqli_fetch_all($result,MYSQLI_ASSOC);
    // print_r();
    if(isset($_POST['submit'])){
        if($_POST['submit']=='Edit Cuisine'){
            $sql = "UPDATE cuisine SET Cuisine_Name = '$_POST[name]' WHERE cuisine.CuisineID = $_POST[id]";
            $result = mysqli_query($conn,$sql);                     
        } else if(($_POST['submit']=='Delete Cuisine') && isset($_POST['yes'])){
                    $sql = "DELETE FROM cuisine WHERE cuisine.CuisineID = $_POST[id]";
                    $result = mysqli_query($conn,$sql);                             
        } else if($_POST['submit']=='Create Cuisine'){
            $sql = "INSERT INTO cuisine (CuisineID, Cuisine_Name) VALUES (NULL, '$_POST[name]')";        
            $result = mysqli_query($conn,$sql);                     
        } else if($_POST['submit']=='Add Item'){
            $sql = "INSERT INTO items (ItemID, Item_Name, Price_per_serving, CuisineID) VALUES (NULL, '$_POST[name]', $_POST[price], $_POST[CuisineID]);";
            $result = mysqli_query($conn,$sql);                     
        } else if($_POST['submit']=='Edit Item'){
            $sql = "UPDATE items SET Item_Name = '$_POST[name]', Price_per_serving = '$_POST[price]' WHERE items.ItemId = $_POST[id]";
            $result = mysqli_query($conn,$sql);                     
        } else if(($_POST['submit']=='Delete Item') && isset($_POST['yes'])){
            $sql = "DELETE FROM items WHERE items.ItemId = $_POST[id]";
            $result = mysqli_query($conn,$sql);                             
        }
    }
    $sql = 'SELECT * FROM cuisine';
    $result = mysqli_query($conn,$sql);

    $cuisine = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('linking_file.php') ?>
    <title>Diviana Dines: Manage Menu</title>

</head>

<body>

    <?php include_once('header.php') ?>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-6">
                <h3>Cuisines</h3>
            </div>
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 offset-xl-1 mt-2">
                <span class="ml-auto card">
                    <span class="card-header p-0">
                        <button class="btn btn-dark btn-lg w-100" data-toggle="collapse" href="#create">Add a Cuisine</button>
                    </span>
                    <div class="card-body collapse" id="create">
                        <form action="" method="post" class="text-center">
                            <label for="n_name">Cuisine Name:</label>
                            <input type="text" id="n_name" name="name" >                                    
                            <input type="submit" value="Create Cuisine" name="submit">
                        </form> 
                    </div>
               </span>
            </div>
        </div>
        
        <hr>
        <div class="row">
            <?php
                if(count($cuisine)==0){
                    echo("<b>No Cuisine Present</b>");
                }
                for($i=0;$i<count($cuisine);$i++){
            ?>
                <div class="col-12 col-lg-6 my-3">
                    <div class="card" id="">
                    <div class="d-flex align-items-center justify-content-between">
                            <span class="card-header p-0">
                                <button class="btn btn-lg bg-danger text-dark text-center collapsed" data-toggle="collapse" href="#cuisine<?=$i?>">
                                    <?=$cuisine[$i]['Cuisine_Name']?>&nbsp;<span class="fas fa-chevron-down"></span>
                                </button>
                            </span>
                            <span class="mr-2">
                                <button class="btn  btn-outline-warning" data-toggle="collapse" href="#edit<?=$i?>">Edit</button>
                                <button type="submit" value="delete" class="btn btn-outline-danger" data-toggle="collapse" href="#delete<?=$i?>">Delete</button>
                                <button type="submit" value="create_item" class="btn btn-outline-dark" data-toggle="collapse" href="#create_item<?=$i?>">Add an item</button>
                            </span>
                        </div>
                        <div class="card-body collapse" id="edit<?=$i?>">
                            <form action="" method="post">
                                    <label for="e_name<?=$cuisine[$i]['CuisineID']?>">Cuisine Name</label>
                                    <input type="text" id="e_name<?=$cuisine[$i]['CuisineID']?>" name="name" value="<?=$cuisine[$i]['Cuisine_Name']?>"> 
                                    <input type="submit" value="Edit Cuisine" name="submit">
                                    <input type="hidden" name="id" value="<?=$cuisine[$i]['CuisineID']?>">
                            </form>  
                        </div>
                        
                        <div class="card-body collapse" id="delete<?=$i?>">
                            <form action="" method="post">
                                <label for="d_name<?=$cuisine[$i]['CuisineID']?>">Are You sure you want to delete the cuisine '<?= $cuisine[$i]['Cuisine_Name'] ?>'</label>
                                <br><input type="checkbox" id="d_name<?=$cuisine[$i]['CuisineID']?>" name="yes" > Yes &nbsp;
                                <input type="submit" value="Delete Cuisine" name="submit">
                                <input type="hidden" name="id" value="<?=$cuisine[$i]['CuisineID']?>">
                            </form>  
                        </div>
                        
                        <div class="card-body collapse input_top_space" id="create_item<?=$i?>">
                            <form action="" method="post" class="row">
                                <label for="n_i_name<?=$cuisine[$i]['CuisineID']?>" class="col-5">Item Name:</label>
                                <input type="text" id="n_i_name<?=$cuisine[$i]['CuisineID']?>" class="col-5" name="name" >
                                <label for="n_i_price<?=$cuisine[$i]['CuisineID']?>" class="col-5">Price per Serving:</label>
                                <input type="text" id="n_i_price<?=$cuisine[$i]['CuisineID']?>" class="col-5" name="price" >
                                <input type="submit" class="offset-6 col-3" value="Add Item" name="submit">
                                <input type="hidden" value="<?=$cuisine[$i]['CuisineID']?>" class="col-12" name="CuisineID">     
                            </form> 
                        </div>

                        <div class="card-body collapse" id="cuisine<?=$i?>">
                            <dl>

                                <?php
                                    $id = $cuisine[$i]['CuisineID'];
                                    $sql = "SELECT * FROM items WHERE items.CuisineID=$id";
                                    $result = mysqli_query($conn,$sql);
                                    $items = mysqli_fetch_all($result,MYSQLI_ASSOC);
                                    // print_r($items);
                                    if(count($items)==0){
                                     echo("<b>No Items in this Cuisine</b>");   
                                    }
                                    else {
                                ?>
                                    <span class="row">
                                        <dt class="col-4">Dish Name</dt>
                                        <dt class="col-6">Price per Serving</dt>
                                        
                                    </span>
                                    <?php
                                        
                                        for($j=0;$j<count($items);$j++){
                                    ?>

                                        <span class="row">
                                            <dd class="col-4"><?=$items[$j]['Item_Name']?></dd>
                                            <dd class="col-4"><?=$items[$j]['Price_per_serving']?></dd>
                                            <dd><button class="btn btn-outline-warning mx-1" data-toggle="collapse" href="#edit<?=$i?>_item<?=$j?>">Edit</button></dd>
                                            <dd><button type="submit" value="delete" class="mx-1 btn btn-outline-danger" data-toggle="collapse" href="#delete<?=$i?>_item<?=$j?>">Delete</button></dd>
                                            
                                        </span>
                                        <span>
                                            <div class="card-body collapse input_top_space" id="edit<?=$i?>_item<?=$j?>">
                                                <form action="" method="post" class="row">
                                                    <label for="e<?=$i?>_i<?=$j?>_name" class="col-5">Item Name:</label>
                                                    <input type="text" id="e<?=$i?>_i<?=$j?>_name" class="col-5" name="name" value="<?=$items[$j]['Item_Name']?>" >
                                                    <label for="e<?=$i?>_i<?=$j?>_price" class="col-5">Price per Serving:</label>
                                                    <input type="text" id="e<?=$i?>_i<?=$j?>_price" class="col-5" name="price" value="<?=$items[$j]['Price_per_serving']?>">
                                                    <input type="submit" class="offset-6 col-3" value="Edit Item" name="submit"> 
                                                    <input type="hidden" value="<?=$items[$j]['ItemID']?>" name="id"> 
                                                </form> 
                                            </div>
                                            
                                            <div class="card-body collapse" id="delete<?=$i?>_item<?=$j?>">
                                                <form action="" method="post">
                                                    <label for="d<?=$i?>_i<?=$j?>_name">Are You sure you want to delete the Item '<?=$items[$j]['Item_Name']?>'</label>
                                                    <br><input type="checkbox" id="d<?=$i?>_i<?=$j?>_name" name="yes" > Yes &nbsp;
                                                    <input type="submit" value="Delete Item" name="submit">
                                                    <input type="hidden" name="id" value="<?=$items[$j]['ItemID']?>">
                                                </form>  
                                            </div>
                                        </span>
                                    <?php } 
                                    } ?>
            
                            </dl>
                        </div>
                    </div>
                </div>
            <?php } ?>
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