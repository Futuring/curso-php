<?php
    ini_set("display_errors", "On");
    $dir = __DIR__;
    $separator = DIRECTORY_SEPARATOR;

require_once($dir.$separator."..".$separator."Functions".$separator."Load.php");    

    \Corpora\Functions\load("assets", "styles");
    \Corpora\Functions\load("assets", "scripts");
    
    use Corpora\Functions\Assets\Styles;

    Styles\addAsset("css\styles.css");
    Styles\addAsset("css\styles22.css");
    Styles\addAsset("css\vakiress.css");

    $paginas = [
        "Home" => 'home', 
        "Sobre" => 'about', 
        "Portifolio" => 'portifolio',
        "Contato" => 'contato'
    ];

 
    
    $dirPage = $dir.$separator."..".$separator."pages".$separator;

    if(array_key_exists("page", $_GET)) {
        $page = $_GET['page'];
    } else {
        $page = "home";
    }

    if( ! in_array($page, $paginas)) 
        $page = "404";
    
    $page .= ".php";
    $arquivo = $dirPage.$page;
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta charset="utf-8" />
    <title>Corpora Corporate HTML Theme</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
      <!--Favicon -->
	<link rel="icon" type="image/png" href="images/favicon.png" />
		
	<!-- CSS Files -->
    <?=  Styles\getStringAssets(); ?>
	<link rel="stylesheet" href="css/animate.min.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.css" />
	<link rel="stylesheet" href="css/owl.carousel.css" />
	<link rel="stylesheet" href="css/prettyPhoto.css" />

	<!-- Page Styles -->
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/responsive.css" />
	<!-- End Page Styles -->

    <link rel="stylesheet" href="css/page-loader.css?v=1.0" />
	<!-- End CSS Files -->
</head>

<body>

    <!-- Page Loader -->
	<section id="loader-wrapper">
        <div id="loader">
            Loading . . .
        </div>
	</section>
    <!-- Page Loader END -->
    
    <!-- nav -->
    <nav id="nav" class="header section-area">
        <div>
            <div class="c1"><a class="logo" href="index.html"><img alt="..." src="images/logo.png" /></a></div>
            <div class="c2">
                
                <!-- search firld -->
                <div class="search-1">
                    <form action="index.html" method="post">
                        <div>
                            <input type="text" value="search" onfocus="if(this.value=='search'){this.value=''}" onblur="if(this.value==''){this.value='search'}" />
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <!-- search firld END -->

                <!-- nav links -->
                <div class="nav-area">
                    <ul class="nav nav-pills">
                        <?php foreach ($paginas as $label => $valor ) : ?>
                            <li>
                                <a href="?page=<?= $valor ?>">
                                       <?= $label ?>
                                 </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!-- nav links END -->

                <!-- mobile -->
                <div class="nav-area-mobile">
                    <p><i class="fa fa-bars"></i></p>
                    <ol>
                        <?php foreach ($paginas as $label => $valor ) : ?>
                            <li>
                                <a href="?page=<?= $valor ?>">
                                       <?= $label ?>
                                 </a>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </div>
                <!-- mobile END -->

            </div>
            <div class="clearfix"></div>
        </div>
    </nav>
    <!-- nav END -->

     <?php require_once $arquivo; ?>

    <!-- footer -->
    <section class="footer animated" data-animation="fadeIn" data-animation-delay="400">

        <!-- buy theme area -->
        <section class="buy section-area">
            <div>
                <span>This is an elegant multi-purpose theme.</span> <a href="#" class="btn">BUY IT</a>
            </div>
        </section>
        <!-- buy theme area END -->

       <!-- content footer -->
        <section class="f-content section-area">
            <div>
                <div class="c1d">
                    <div>
                        <p class="m-logo"><img alt="..." src="images/logo-footer.png" /></p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum facilisis magna. Nunc et mi eget quam.</p>
                        
                        <p>
                        
                        <a class="social" href="#"><i class="fa fa-twitter"></i></a> 
                        <a class="social" href="#"><i class="fa fa-facebook"></i></a> 
                        <a class="social" href="#"><i class="fa fa-flickr"></i></a> 
                        <a class="social" href="#"><i class="fa fa-youtube"></i></a> 
                        <a class="social" href="#"><i class="fa fa-google-plus"></i></a> 
                        <a class="social" href="#"><i class="fa fa-pinterest"></i></a> 
                        <a class="social" href="#"><i class="fa fa-tumblr"></i></a> 
                        <a class="social" href="#"><i class="fa fa-linkedin"></i></a>
                        
                        </p>

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </section>
        <!-- content footer END -->

        <!-- bottom footer -->
        <section class="bt section-area">
            <div>
                <div class="c1"><p>© 2014 Corpora</p></div>
               <div class="c2"><a data-scroll class="to-top" href="#nav"><i class="fa fa-angle-up"></i></a></div>
                <div class="clearfix"></div>
            </div>
        </section>
        <!-- bottom footer END -->

    </section>
    <!-- footer END -->

	<!-- JS Files -->
	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.appear.js"></script>
	<script type="text/javascript" src="js/modernizr-latest.js"></script>
	<script type="text/javascript" src="js/smooth-scroll.js"></script>
	<script type="text/javascript" src="js/jquery.isotope.js?v=4.0"></script>
	<script type="text/javascript" src="js/owl.carousel.js"></script>
	<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
	<script type="text/javascript" src="js/plugins.js?v=1.0"></script>
    <script type="text/javascript" src="js/home.js"></script>
    <!-- JS Files END -->

</body>
</html>