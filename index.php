<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("linking_file.php"); ?>
    <title>DIVIANA DINES</title>
</head>
<body>
    
    <?php include("header.php"); ?>

    <div class="container-lg">
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
                              <p class="card-text">(Description to be added here later. )</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
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
                              <p class="card-text">(Description to be added here later. )</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
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
                              <p class="card-text">(Description to be added here later. )</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
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
    <?php include("footer.php"); ?>

</body>
</html>
