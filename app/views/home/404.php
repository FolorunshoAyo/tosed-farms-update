<!DOCTYPE html>
<html lang="en-US" class="no-js">
	
<head>
  <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
      
  <!-- ==============================================
  TITLE AND META TAGS
  =============================================== -->
  <title>Page Not Found (404) | Tosed Farms</title>
  <meta name="author" content="Aycodes">
  <meta name="theme-color" content="#EEC344">

  <!-- ==============================================
  FAVICON
  =============================================== -->  
  <link rel="shortcut icon" href="<?= BASE_URL ?>/img/master/favicon-white.png">
           
  <!-- ==============================================
  CSS
  =============================================== -->  
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/timeline.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/stylesheet.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/home-1-styles.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/responsive.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/fonts/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/fonts/css/all.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/slick.min.css"> 
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/owl.carousel.min.css">
  <link rel="stylesheet" href='<?= BASE_URL ?>/css/animation.aos.min.css'>
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/animate.min.css">
  <script src="<?= BASE_URL ?>/js/modernizr-custom.js"></script>
</head>
    
<body>
    
  <!-- LOADER -->
  <div id="loader-wrapper">
    <div class="loader">
      <img src="<?= BASE_URL ?>/img/master/favicon.jpg" alt="loader image" width="80" height="80">
    </div>
  </div>
  <!-- LOADER -->
  
    <!--HEADER START-->
    <?php
    // include VIEW_PATH . "/home/components/header.php"
    ?>
    <!--HEADER END-->
  
  <!--ERROR PAGE MESSAGE START-->
  <div class="sections error-page-bg">
      <div class="error-page">
          <div class="middle">
              <div class="error-number">404</div>
              <h4>Oops! This page can't be found</h4>
              <p>Sorry, but the page you are looking for does not exist or has been removed.</p>
              
          </div>
      </div>
  </div>
  <!--ERROR PAGE MESSAGE END-->
  
  <!--FOOTER START-->
  <?php
    include VIEW_PATH . "/home/components/footer.php";
  ?>
  <!--FOOTER END-->

  <!--SCROLL TOP START-->
  <a href="#0" class="cd-top">Top</a>
  <!--SCROLL TOP START-->
    
	<!-- ==============================================
	JAVASCRIPTS
	=============================================== -->
  <script src="<?= BASE_URL ?>/js/plugins.js"></script>
  <script src="<?= BASE_URL ?>/js/bootstrap.min.js"></script>
  <script src="<?= BASE_URL ?>/js/agrom.js"></script>
    
  </body>
</html>