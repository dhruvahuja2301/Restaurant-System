<?php
    $conn = mysqli_connect('localhost','root','root','restaurant_system','3307');
    if(!$conn){
        echo("connection error ".mysqli_connect_error());
    }
    $sql = 'SELECT * FROM customers';
    $result = mysqli_query($conn,$sql);

    $customers = mysqli_fetch_all($result,MYSQLI_ASSOC);
    if(isset($_POST['submit'])){
        if($_POST['submit']=='Edit Customer'){
            $sql = "UPDATE customers SET Customer_Name = '$_POST[name]', Contact_no = '$_POST[number]', Email_ID = '$_POST[mail]' WHERE customers.CustomerID = $_POST[id]";
            $result = mysqli_query($conn,$sql);                     
        } else if(($_POST['submit']=='Delete Customer') && isset($_POST['yes'])){
                    $sql = "DELETE FROM customers WHERE customers.CustomerID = $_POST[id]";
                    $result = mysqli_query($conn,$sql);                             
        } else if($_POST['submit']=='Add Customer'){
            // print_r($_POST);
            $sql = "INSERT INTO customers (Customer_Name, Contact_no, Email_ID, Frequency_of_arrival) VALUES ('$_POST[name]', $_POST[number], '$_POST[mail]', 0);";
            $result = mysqli_query($conn,$sql);                                         
        }
    }
    $sql = 'SELECT * FROM customers';
    $result = mysqli_query($conn,$sql);

    $customers = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('linking_file.php') ?>
    <link rel="stylesheet" href="style.css">
    <title>Diviana Dines: Customers</title>

</head>

<body>

    <?php include_once('header.php') ?>

    <div class="container-lg">
        <div class="row">
            <h1 class="col-4">Customer List</h1>
            <div class="col-6 offset-2">
                <span class="ml-auto card p-0">
                    <span class="card-header p-0">
                        <button class="btn btn-dark btn-lg w-100" data-toggle="collapse" href="#create">Add a Customer</button>
                    </span>
                    <div class="card-body collapse" id="create">
                        <form action="" method="post">
                            <div class="row my-2">
                                <label for="n_name" class="col-5">Customer Name</label>
                                <input type="text" id="n_name" name="name" class="col-6"> 
                            </div>
                            <div class="row my-2">
                                <label for="n_no" class="col-5">Phone Number</label>
                                <input type="text" id="n_no" name="number" class="col-6"> 
                            </div>
                            <div class="row my-2">
                                <label for="e_mail" class="col-5">Email ID</label>
                                <input type="text" id="e_mail" name="mail" class="col-6">                         
                            </div>
                            <div class="row my-2">
                                <input type="submit" class="col-4" value="Add Customer" name="submit">                    
                            </div>                                  
                        </form> 
                    </div>
                </span>
            </div>
        </div>
        <hr>
            
            <div class='row d-flex'>
                <div class='col-7 col-md-2'><b>Name</b></div>
                <div class='col-5 col-md-2 text-center'><b>Phone Number</b></div>
                <div class='col-7 col-md-5 col-lg-4'><b>Email ID</b></div>
                <div class='col-2 d-none d-xl-block'><b>Customer Frequency</b></div>
            </div>            
            
            <?php foreach($customers as $cust){ ?> 

                <div class='row d-flex my-2'>
                    <div class='col-7 col-md-2'><?=$cust['Customer_Name']?></div>
                    <div class='col-5 col-md-2 text-center'><?=$cust['Contact_no']?></div>
                    <div class='col-7 col-md-5 col-lg-4'><?=$cust['Email_ID']?></div>
                    <div class='col-2 d-none d-xl-block'><?=$cust['Frequency_of_arrival']?></div>
                    <div class='col-5 ml-auto col-md-3 col-xl-2'>
                        <span class=''>
                            <button class='btn btn-outline-warning my-1' data-toggle='collapse' href='#edit<?=$cust['CustomerID']?>'>&nbsp; Edit &nbsp;</button>
                            <button type='submit' value='delete' class='btn btn-outline-danger my-1' data-toggle='collapse' href='#delete<?=$cust['CustomerID']?>'>Delete</button>
                        </span>
                    </div>
                </div>
                
                <div class="card-body collapse" id="edit<?=$cust['CustomerID']?>">
                    <form action="" method="post">
                        <div class="row">
                            <label for="e_name<?=$cust['CustomerID']?>" class="col-3">Customer Name</label>
                            <input type="text" id="e_name<?=$cust['CustomerID']?>" name="name" value="<?=$cust['Customer_Name']?>" class="col-6"> 
                        </div>
                        <div class="row">
                            <label for="e_no<?=$cust['CustomerID']?>" class="col-3">Phone Number</label>
                            <input type="text" id="e_no<?=$cust['CustomerID']?>" name="number" value="<?=$cust['Contact_no']?>" class="col-6"> 
                        </div>
                        <div class="row">
                            <label for="e_mail<?=$cust['CustomerID']?>" class="col-3">Email ID</label>
                            <input type="text" id="e_mail<?=$cust['CustomerID']?>" name="mail" value="<?=$cust['Email_ID']?>" class="col-6">                         
                        </div>
                        <div>
                            <input type="submit" class="col-2 mt-2" value="Edit Customer" name="submit">                    
                        </div>
                        <input type="hidden" name="id" value="<?=$cust['CustomerID']?>">
                    </form>  
                </div>
                        
                <div class="card-body collapse" id="delete<?=$cust['CustomerID']?>">
                    <form action="" method="post">
                        <label for="d_name<?=$cust['CuisineID']?>">Are You sure you want to delete the customer '<?= $cust['Customer_Name'] ?>'</label>
                        <br><input type="checkbox" id="d_name<?=$cust['CustomerID']?>" name="yes" > Yes &nbsp;
                        <input type="submit" value="Delete Customer" name="submit">
                        <input type="hidden" name="id" value="<?=$cust['CustomerID']?>">
                    </form>  
                </div>                            
            <?php } ?>

    </div>
    <?php include_once("footer.php") ?>

</body>
    
</html>