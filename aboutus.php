<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("linking_file.php"); ?>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://jqueryui.com//resources/demos/style.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <title>Diviana Dines: About Us</title>

</head>

<body>

    <?php include("header.php"); ?>

    <div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb bg-dark">
                <li class="breadcrumb-item"><a href="./index.php" class="text-white-50">Home</a></li>
                <li class="breadcrumb-item active"><a href="#" class="text-white">About Us</a></li>
            </ol>
            <div class="col-12">
               <h3>About Us</h3>
               <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <h2 id="history">Our History</h2>
                <div id="historydata" class="hide">
                    <p>Started in 2010, Diviana Dines quickly established itself as a culinary icon par excellence in Hong Kong. With its unique brand of world fusion cuisine that can be found nowhere else, it enjoys patronage from the A-list clientele in Hong Kong.  Featuring four of the best three-star Michelin chefs in the world, you never know what will arrive on your plate the next time you visit us.</p>
                    <p>The restaurant traces its humble beginnings to <em>The Frying Pan</em>, a successful chain started by our CEO, Mr. Peter Pan, that featured for the first time the world's best cuisines in a pan.</p>
                </div>
            </div>
            
            <!-- Card-1 -->
            <div class="col-12 col-md-6">
                <div class="card border-danger" id="factscard">
                    <h3 class="card-header bg-danger" id="facts">Facts At a Glance</h3>
                    <div class="card-body hide" id="factsdata">
                        <dl class="row">
                            <dt class="col-6">Started</dt>
                            <dd class="col-6">3 Feb. 2013</dd>
                            <dt class="col-6">Major Stake</dt>
                            <dd class="col-6">Hk Fine Foods Inc.</dd>
                            <dt class="col-6">Last Year's Turnover</dt>
                            <dd class="col-6">$1,250,375</dd>
                            <dt class="col-6">Employees</dt>
                            <dd class="col-6">40</dd>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- Card-2 -->
            <div class="col-12 pt-5">
                <div class="card card-body">
                    <blockquote class="blockquote">
                        <p class="mb-0">You better cut the pizza into four pieces because I'm not hungry enough to eat six</p>
                        <footer class="blockquote-footer">
                            Yogi Berra,
                            <cite title="Source Title">The Wit and Wisdom of Yogi Berra, P.Pepe, Diversion Books, 2014</cite>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-12 col-sm-12">
                <h2>Corporate Leadership</h2>
                <div id="accordion">
                    <h3>Peter Pan <small>Chief Epicurious Officer</small></h3>
                    <div>    
                        <p>Our CEO, Peter, credits his hardworking East Asian immigrant parents who undertook the arduous journey to the shores of America with the intention of giving their children the best future. His mother's wizardy in the kitchen whipping up the tastiest dishes with whatever is available inexpensively at the supermarket, was his first inspiration to create the fusion cuisines for which <em>The Frying Pan</em> became well known. He brings his zeal for fusion cuisines to this restaurant, pioneering cross-cultural culinary connections.</p>
                    </div>
                  
                    <h3>Dhanasekaran Witherspoon <small>Chief Food Officer</small></h3>
                    <div>    
                        <p>Our CFO, Danny, as he is affectionately referred to by his colleagues, comes from a long established family tradition in farming and produce. His experiences growing up on a farm in the Australian outback gave him great appreciation for varieties of food sources. As he puts it in his own words, <em>Everything that runs, wins, and everything that stays, pays!</em></p>
                    </div>
                        
                    <h3>Agumbe Tang <small>Chief Taste Officer</small></h3>
                    <div>    
                        <p>Blessed with the most discerning gustatory sense, Agumbe, our CTO, personally ensures that every dish that we serve meets his exacting tastes. Our chefs dread the tongue lashing that ensues if their dish does not meet his exacting standards. He lives by his motto, <em>You click only if you survive my lick.</em></p>
                    </div>

                    <h3>Alberto Somayya <small>Executive Chef</small></h3>
                    <div>    
                        <p>Award winning three-star Michelin chef with wide International experience having worked closely with whos-who in the culinary world, he specializes in creating mouthwatering Indo-Italian fusion experiences. He says, <em>Put together the cuisines from the two craziest cultures, and you get a winning hit! Amma Mia!</em></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include("footer.php"); ?>
    <script>
        // about us accordion
$( function() {
  $( "#accordion" ).accordion({
    heightStyle: "content"
  });
} );
    </script>
</body>

</html>
