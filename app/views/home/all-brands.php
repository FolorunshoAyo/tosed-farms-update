<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- ==============================================
        TITLE AND META TAGS
        =============================================== -->
    <title>All Brands | Tosed Farms</title>
    <meta name="author" content="Aycodes" />
    <meta
      name="description"
      content="Explore Our Trusted Brands: Premium Brands for Poultry, Fish Feeds, and Veterinary Products."
    />
    <!-- ==============================================
        FAVICON
        =============================================== -->
    <link rel="shortcut icon" href="img/master/favicon-white.png" />

    <!-- ==============================================
        CSS
        =============================================== -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/timeline.css" />
    <link rel="stylesheet" href="css/stylesheet.css" />
    <link rel="stylesheet" href="css/home-1-styles.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="fonts/css/all.min.css" />
    <link rel="stylesheet" href="css/slick.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/animation.aos.min.css" />
    <link rel="stylesheet" href="css/animate.min.css" />
    <script src="js/modernizr-custom.js"></script>
  </head>
  <body>
    <!-- LOADER -->
    <div id="loader-wrapper">
        <div class="loader">
        <img src="img/master/favicon.jpg" alt="loader image" width="80" height="80">
        </div>
    </div>
    <!-- LOADER -->
    
    <!--HEADER START-->
    <?php
    include VIEW_PATH . "/home/components/header.php"
    ?>
    <!--HEADER END-->
    
    <div class="sections gallery-background">
        <div class="container">
            <div class="pages-title"> 
            <h1>Brands <br> <span>Our Suppliers</span></h1>
            <p><a href="<?= BASE_URL ?>/">Home</a> &nbsp; > &nbsp; Brands</p>
            </div>
        </div>
    </div>

    <section>
        <div class="item-background">
            <div class="container">
                <div class="section-title">
                    <h2>Explore Our <span>Brands</span></h2>
                    <p>
                        Explore Our Trusted Partnerships: Premium Brands for Poultry, Fish Feeds, and Veterinary Products.
                    </p>
                </div>

                <div class="btn-toolbar mb-4 pb-2 overflow-auto">
                    <div class="btn-group btn-group-lg">
                    <?php
                        $brandCharacters = $data['unique_brand_characters'];
                        foreach ($brandCharacters as $character) {
                            break;
                    ?>
                      <button class="btn btn-default" data-target="alpha-<?= strtolower($character['first_character']) ?>"><?= strtoupper($character['first_character']) ?></button>
                      <?php
                        }
                      ?>
                    </div>
                </div>

                <div class="brands-list">
                    <div class="row">
                    <?php
                        $allBrands = BrandsModel::getAllBrandsAlphabetically();
                        foreach($allBrands as $brand){
                            $category = "";
                            switch ($brand['category']) {
                            case 'poultry':
                                $category = "Poultry Feeds";
                                break;
                            case 'fish':
                                $category = "Fish Feeds";
                                break;
                            case 'drug':
                                $category = "Veterinary Products";
                                break;
                            
                            default:
                                # code...
                                break;
                            }
                    ?>
                    <div class="col-sm-6 col-lg-3">
                        <div class="brand-box">
                            <a class="overlay" href="<?= BASE_URL . "/brand/" . convertToSlug($brand['name']) ?>"></a>
                            <figure class="brand-image"><img src="<?= BASE_URL . "/brand-images/" . $brand['image_url'] ?>" alt="<?= $brand['name']?>"></figure>
                            <h3><?= $brand['name'] ?></h3>
                            <p><a class="link-type" href="<?= BASE_URL . "/category/" . convertToSlug($category) ?>"><?= $category ?></a></p>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    </div>
                    <?php
                        $brandCharacters = $data['unique_brand_characters'];
                        foreach ($brandCharacters as $character) {
                            break;
                    ?>
                        <div id="alpha-<?= strtolower($character['first_character']) ?>" class="mb-3">
                            <h2><?= strtoupper($character['first_character']) ?></h2>
                            <div class="row">
                                <?php
                                    $allBrands = BrandsModel::getBrandsByFirstChar($character['first_character']);
                                    foreach($allBrands as $brand){
                                        $category = "";
                                        switch ($brand['category']) {
                                        case 'poultry':
                                            $category = "Poultry Feeds";
                                            break;
                                        case 'fish':
                                            $category = "Fish Feeds";
                                            break;
                                        case 'drug':
                                            $category = "Veterinary Products";
                                            break;
                                        
                                        default:
                                            # code...
                                            break;
                                        }
                                ?>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="brand-box">
                                        <a class="overlay" href="<?= BASE_URL . "/brand/" . convertToSlug($brand['name']) ?>"></a>
                                        <figure class="brand-image"><img src="<?= BASE_URL . "/brand-images/" . $brand['image_url'] ?>" alt="<?= $brand['name']?>"></figure>
                                        <h3><?= $brand['name'] ?></h3>
                                        <p><a class="link-type" href="<?= BASE_URL . "/category/" . convertToSlug($category) ?>"><?= $category ?></a></p>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>

            <!--CONTACT US START-->
            <div class="container-fluid home-contact">
                <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="contact-info">
                    <p>Get In Touch</p>
                    <h2>Contact Us</h2>
                    <div class="block-address">
                        <i class="fas fa-map-pin address-icon"></i>
                        <div class="inner-info">
                        <h4>ADDRESS</h4> 
                        <p>23/27 Ikorodu - Shagamu Rd, Ikorodu, 104101, Lagos</p>
                        </div>
                    </div>
                    <div class="block-phone">
                        <i class="fas fa-phone-square address-icon"></i>
                        <div class="inner-info">
                            <h4>OFFICE PHONE</h4> 
                            <p>0809 282 6813</p>
                        </div>
                    </div>
                    <div class="block-email">
                        <i class="fas fa-mail-bulk address-icon"></i>
                        <div class="inner-info">
                            <h4>EMAIL</h4> 
                            <p>info@tosedventures.com</p>
                        </div>
                    </div>
                    <div class="social-networks">
                        <div class="networks-list"><a href="#"><i class="fab fa-facebook-f"></i></a></div>  
                        <div class="networks-list"><a href="#"><i class="fab fa-twitter"></i></a></div>  
                        <div class="networks-list"><a href="#"><i class="fab fa-instagram"></i></a></div>  
                        <div class="networks-list"><a href="#"><i class="fab fa-linkedin-in"></i></a></div>  
                    </div>
                    </div>  
                </div>
                <div class="col-lg-6 custom-map" data-aos="fade-left">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.9346673594787!2d3.5169540102120247!3d6.655020093311987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103be9486c91da1b%3A0xff7856c7fc510918!2sTOSED%20INTEGRATED%20FARMS%20VENTURES!5e0!3m2!1sen!2sng!4v1708685309572!5m2!1sen!2sng" class="map-iframe"></iframe>
                </div>
                </div>
                <div class="form-box">
                    <form id="contact-form" method="post" action="http://quickdevs.com/templates/agrom/contact.php">
                        <div class="messages"></div>
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="form_name" type="text" name="name" class="form-control customize" placeholder="Name" required="required" data-error="Name is required.">
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
                                        <textarea id="form_message" name="message" class="form-control customize" placeholder="Your message" rows="5" required="required" data-error="Please,leave us a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 contact-btn">
                                    <p><input type="submit" class="btn btn-custom" value="Send message"></p>
                                </div>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
            <!--CONTACT US END-->
        </div>
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
    <script src="js/plugins.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/agrom.js"></script>
    <script src="js/util.js"></script> 
    <script src="js/swipe-content.js"></script> 
    <script src="js/main.js"></script>
  </body>
</html>
