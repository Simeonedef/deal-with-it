<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require 'redbubble/redbubble.php';

$redbubble = new Redbubble('prolificlee');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Get some swag</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="css/grayscale.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="index.html">
                	<!-- Insert navbar logo here -->
                    <i class="fa fa-play-circle"></i> <span class="light">Deal</span> With It
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="shop.php">Shop</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header>
        <div class="container-fluid">
           <div class="row">
            <img src="//placehold.it/1624x700" class="img-responsive">
           </div>
        </div>
    </header>

    <br>
    <br>
    <br>
    <br>

    <!-- Products Section -->
    <section id="about" class="container text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Products</h2>
            </div>
            <div class="row">
                <?php
                    if (!isset($_GET['rbu']) && !isset($_GET['cID']))
                    {
                        $count = 0;
                        $collections = $redbubble->getCollections();
                        
                        foreach ($collections as $collection)
                        {
                            $newRow = 0;
                            $count = $count + 1;
                            if ($count % 4 == 0)
                            {
                                echo '<div class="row">';
                                $newRow = 1;
                            }

                            echo '<div class="col-md-3">';
                            echo '<p>';
                            echo '<a href="' . $collection['url'] . '">';
                            echo '<img src="' . $collection['image'] . '" alt="' . $collection['collection_id'] . '" />';
                            echo '<h5>' . $collection['title'] . '</h5>';
                            echo '</a>';
                            echo '</p>';
                            echo '</div>';
                            if ($newRow == 1)
                            {
                                echo '</div>';
                                $newRow = 0;
                            }
                        }
                    }
                    else
                    {
                        $products = $redbubble->getProducts($_GET['cID']);

                        $count2 = 0;
                        
                        foreach ($products as $product)
                        {

                            $newRow2 = 0;
                            $count2 = $count2 + 1;
                            if ($count2 % 4 == 0)
                            {
                                echo '<div class="row">';
                                $newRow2 = 1;
                            } 

                            echo '<div class="col-md-3">';
                            echo '<p>';
                            echo '<a href="' . $product['link'] . '" target="_blank">';
                            echo '<img src="' . $product['design_image'] . '" alt="' . $product['title'] . '" />';
                            echo '<img src="' . $product['product_image'] . '" alt="' . $product['title'] . '" />';
                            echo '<h5>' . $product['title'] . '</h5>';
                            echo '<h6>' . $product['price'] . '</h6>';
                            echo '</a>';
                           echo '</p>';
                            echo '</div>';
                            if ($newRow2 == 1)
                            {
                                echo '</div>';
                                $newRow2 = 0;
                            } 
                        }
                    }
                ?>
            </div>
        </div>
    </section>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
        	<div class="row">
        		<div class="col-md-4 text-left">
            		<h6><i class="fa fa-angle-right"></i> Useful links</h6>
            		<small><a href="legal.html">Legal</a>
            		<br><a href="tc.html">Terms & Conditions</a>
            		<br><a href="contact.html">Contact Us</a></small>
            	</div>
            	<div class="col-md-4 text-left">
            		<h6><i class="fa fa-angle-right"></i> About Us</h6>
            		<small>Deal With It and its designs aim to be that sarcastic friend that you have who comments on nothing and everything, voicing the epitomes that you will have during your time as a girl trying to make sense of the beautiful chaos that is the 21st century.</small>
            	</div>
            	<div class="col-md-4">
            		<div class="row">
            			<h6>Copyright &copy; Deal With It 2017</h6>
            		</div>
            		<div class="row">
            			<p><a href="http://twitter.com"><i class="fa fa-twitter-square"></i></a>
            			<a href="http://instagram.com"><i class="fa fa-instagram"></i></a>
            			<a href="http://snapchat.com"><i class="fa fa-snapchat-square"></i></a></p>
            		</div>
            	</div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Theme JavaScript -->
    <script src="js/grayscale.js"></script>

</body>

</html>
