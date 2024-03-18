<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>
  <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
      
  <!-- ==============================================
  TITLE AND META TAGS
  =============================================== -->
  <title>Contact Us | Tosed Farms</title>
  <meta name="keywords" content="livestock feeds, livestock drugs, poultry farming, livestock industry, poultry industry, animal health, animal nutrition, agriculture, farming, livestock products, poultry products, livestock brands, poultry brands, livestock feed brands, livestock drug brands">
  <meta name="author" content="Aycodes">
  <meta name="description" content="Contact us today for all your livestock drug and feed distribution needs. As specialists in the field, we provide top-quality products and locally produced feeds tailored to meet your farm's requirements. Reach out to us for personalized solutions and expert advice.">
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
        <img
          src="<?= BASE_URL ?>/img/master/favicon.jpg"
          alt="loader image"
          width="80"
          height="80"
        />
      </div>
    </div>
    <!-- LOADER -->

    <!--HEADER START-->
    <?php
    include VIEW_PATH . "/home/components/header.php";
    ?> 
    <!--HEADER END-->
  
  <div class="sections">
      <div class="container">
          <div class="pages-title">
              <h1>Get in Touch <br> <span>CONTACT</span></h1>
              <p><a href="#">Home</a> &nbsp; > &nbsp; <a href="#">Contact</a></p>
          </div>
      </div>
  </div>
  
  <section>
      <div class="container">
          <div class="row">
            <!--CONTACT INFORMATION START-->
            <div class="col-lg-6">
              <div class="contact-box">
                <div class="section-title">
                  <h2>Send <span>Message</span></h2>
                  <p>
                    Have a question or feedback? We're here to help! Send us a message, and we'll get back to you as soon as possible.
                  </p>
                </div>
                <div class="span-contact">
                  <div class="contact-icon"><i class="fas fa-phone"></i></div> 
                  <p>&nbsp;0809 282 6813</p>
                </div>
                <div class="span-contact">
                  <div class="contact-icon"><i class="fas fa-envelope"></i></div> 
                  <p>&nbsp;info@tosedfarmsventures.com</p>
                </div>
                <div class="span-contact">
                  <div class="contact-icon"><i class="fas fa-map"></i></div> 
                  <p>&nbsp;Adddres:  23/27 Ikorodu - Shagamu Rd, Ikorodu, 104101, Lagos</p>
                </div>
              </div>
            </div>
            <!--CONTACT INFORMATION END-->
              
            <!--CONTACT FORM START-->        
            <div class="col-lg-6 space-break">
              <div class="contact-form">
                  <form id="contact-form" method="post" action="http://quickdevs.com/templates/agrom/contact.php">
                      <div class="messages"></div>
                      <div class="controls">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <input id="form_name" type="text" name="name" class="form-control customize" placeholder="Name" required="required" data-error="Firstname is required.">
                                      <div class="help-block with-errors"></div>
                                  </div>
                              </div>
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <input id="form_email" type="email" name="email" class="form-control customize" placeholder="Email address" required="required" data-error="Valid email is required.">
                                      <div class="help-block with-errors"></div>
                                  </div>
                              </div>
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <input id="form_phone" type="tel" name="phone" class="form-control customize" placeholder="Please enter your phone">
                                      <div class="help-block with-errors"></div>
                                  </div>
                              </div>
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <textarea id="form_message" name="message" class="form-control customize" placeholder="Your message" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                      <div class="help-block with-errors"></div>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <p><input type="submit" class="btn btn-custom" value="Send message"></p>
                              </div>
                          </div>
                      </div>
                  </form>  
              </div>
            </div>
            <!--CONTACT FORM END-->    
          </div>
      </div>
      
      <!--MAP START-->    
      <div class="container-fluid map-wide">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.9346673594787!2d3.5169540102120247!3d6.655020093311987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103be9486c91da1b%3A0xff7856c7fc510918!2sTOSED%20INTEGRATED%20FARMS%20VENTURES!5e0!3m2!1sen!2sng!4v1708685309572!5m2!1sen!2sng" class="map-iframe"></iframe>
      </div>
      <!--MAP END--> 
      
  </section>
  
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