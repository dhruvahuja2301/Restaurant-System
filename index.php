<?php
    $conn = mysqli_connect('localhost','root','root','restaurant_system','3307');
    if(!$conn){
        echo("connection error ".mysqli_connect_error());
    }
    $sql = 'SELECT * FROM customers ORDER BY customers.FREQUENCY_OF_ARRIVAL DESC LIMIT 10';
    $result = mysqli_query($conn,$sql);
    $customers = mysqli_fetch_all($result,MYSQLI_ASSOC);
    // print_r($customers);

    $sql = 'SELECT * FROM cuisine';
    $result = mysqli_query($conn,$sql);
    $cuisine = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $sql = "SELECT * FROM `items` WHERE items.CuisineID <> 1 ORDER BY items.Times_ordered DESC LIMIT 10";
    $result = mysqli_query($conn,$sql);
    $items = mysqli_fetch_all($result,MYSQLI_ASSOC);  
  // print_r($items);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("linking_file.php"); ?>
    <title>DIVIANA DINES</title>
</head>
<body>
    
    <?php include("header.php"); ?>

    <div class="container-lg">
        <h3>Our Speciality</h3>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="veg-maharaja.jpg" class="d-block img-fluid" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Veg Maharaja Burger</h5>
                              <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Omnis cumque animi commodi. Suscipit odit officiis quo, pariatur commodi quia, sint asperiores quis eos incidunt recusandae autem alias! Sit, modi enim!</p>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="cheese pizza.jpg" class="d-block img-fluid" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Triple Cheese Margherita</h5>
                              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque rerum incidunt commodi explicabo recusandae, voluptate sequi maxime corporis expedita ab error est, eius, minus eveniet deserunt at! Voluptas, debitis consequatur.</p>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="lasagne.jpg" class="d-block img-fluid" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Lasagne</h5>
                              <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga voluptates necessitatibus totam amet, perferendis ut qui ducimus illum laboriosam. Perspiciatis dolore accusantium maxime recusandae dolorem ut iusto, odit asperiores distinctio?</p>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="container pt-3">
      <div class="row">
        <h3>Most Ordered Items</h3>
      </div>
      <div class="row">
          <Table border="2" class="w-100">
            <thead>
              <tr>
                <th class="px-2">Dish Name</th>
                <th class="px-2">Price per Serving</th>
                <th class="px-2">Times Ordered</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                for($i=0;$i<count($items);$i++){ ?>
                  <tr>
                    <td class="px-2"><?=$items[$i]['Item_Name']?></td>
                    <td class="px-2"><?=$items[$i]['Price_per_serving']?></td>
                    <td class="px-2"><?=$items[$i]['Times_ordered']?></td>
                  </tr>
                <?php } ?>
            </tbody>
          </Table>   
      </div>    
    </div>

    <div class="container pt-3">
      <div class="row">
        <h3>Most Frequent Customers</h3>
      </div>
      <div class="row">
          <Table border="2" class="w-100">
            <thead>
              <tr>
                <th class="px-2">Customer Name</th>
                <th class="px-2">Contact Number</th>
                <th class="px-2">Email ID</th>
                <th class="px-2">Frequency of Arrival</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                for($i=0;$i<count($customers);$i++){ ?>
                  <tr>
                    <td class="px-2"><?=$customers[$i]['Customer_Name']?></td>
                    <td class="px-2"><?=$customers[$i]['Contact_no']?></td>
                    <td class="px-2"><?=$customers[$i]['Email_ID']?></td>
                    <td class="px-2"><?=$customers[$i]['Frequency_of_arrival']?></td>
                  </tr>
                <?php } ?>
            </tbody>
          </Table>   
      </div>    
    </div>

    <?php include("footer.php"); ?>

</body>
</html>
