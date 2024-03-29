<?php
    $productTypeTitle = $data['product_type'];

    switch ($productTypeTitle) {
      case 'poultry':
        $productTypeTitle = "Poultry Feeds";
        break;
      case 'fish':
        $productTypeTitle = "Fish Feeds";
        break;
      case 'drugs':
        $productTypeTitle = "Veterinary Drugs";
        break;
    }
?>
<!DOCTYPE html>
<html lang="en">
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
    <title><?= $productTypeTitle ?> Products | Tosed Farms</title>
    <meta
      name="keywords"
      content="livestock feeds, livestock drugs, poultry farming, livestock industry, poultry industry, animal health, animal nutrition, agriculture, farming, livestock products, poultry products, livestock brands, poultry brands, livestock feed brands, livestock drug brands"
    />
    <meta name="author" content="Aycodes" />
    <meta
      name="description"
      content="Discover high-quality livestock feeds and drugs from leading brands. Partner with us for innovative solutions in poultry farming and livestock management. Trusted by farmers and veterinarians for superior products and expertise in the livestock industry. Explore our range of products and services today!"
    />
    <meta name="theme-color" content="#EEC344" />

    <!-- ==============================================
		FAVICON
		=============================================== -->
    <link rel="shortcut icon" href="<?= BASE_URL ?>/img/master/favicon-white.png" />

    <!-- ==============================================
		CSS
		=============================================== -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/timeline.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" />
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.dataTables.min.css"
    />
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/stylesheet.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/home-1-styles.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/responsive.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/fonts/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/fonts/css/all.min.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/slick.min.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/animation.aos.min.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/animate.min.css" />
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

    <div class="sections blogs-grid-background">
      <div class="container">
        <div class="pages-title">
          <h1>
            Collection <br />
            <span><?= $productTypeTitle ?></span>
          </h1>
          <p>
            <a href="#">Home</a> &nbsp; > &nbsp;
            <a href="<?= BASE_URL ?>/categories">Categories</a> &nbsp; > &nbsp; <?= $productTypeTitle ?>
          </p>
        </div>
      </div>
    </div>

    <section>
      <div class="item-background">
        <div class="container">
          <div class="section-title">
            <h2><?= $productTypeTitle ?></h2>
            <p><?= $data['category_caption'] ?></p>
          </div>

          <!-- Table of products here -->
          <table id="products_table" class="display" style="width: 100%" data-page-length="25">
            <thead>
              <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Brand</th>
                <th>Net Weight</th>
                <th>Price</th>
                <th>Availability</th>
              </tr>
            </thead>
            <tbody>
                <?php
                  foreach ($data['products'] as $product) {
                  $in_stock = $product['availability_status'] === 1; 
                  $formatted_brand_name = strtolower(join("-", explode(" ", $product['brand_name'])));
                ?>
                <tr>
                  <td><?= $product['name'] ?></td>
                  <td><?= $product['description'] ?></td>
                  <td><a href="<?= BASE_URL . "/brand/" . $formatted_brand_name ?>"><?= $product['brand_name'] ?></a></td>
                  <td><?= $product['net_weight'] ?></td>
                  <td>₦ <?= number_format($product['price'], 2, '.', ',') ?></td>
                  <td>
                    <span class="badge badge-<?= $in_stock? "success" : "danger" ?> badge-pill"><?= $in_stock? "In Stock" : "Out of stock" ?></span>
                  </td>
                </tr>  
                <?php
                  }
                ?>          
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Brand</th>
                <th>Net Weight</th>
                <th>Price</th>
                <th>Availability</th>
              </tr>
            </tfoot>
          </table>

          <!-- Table of products here -->
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
                <div class="networks-list">
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                </div>
                <div class="networks-list">
                  <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
                <div class="networks-list">
                  <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="networks-list">
                  <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 custom-map" data-aos="fade-left">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.9346673594787!2d3.5169540102120247!3d6.655020093311987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103be9486c91da1b%3A0xff7856c7fc510918!2sTOSED%20INTEGRATED%20FARMS%20VENTURES!5e0!3m2!1sen!2sng!4v1708685309572!5m2!1sen!2sng"
              class="map-iframe"
            ></iframe>
          </div>
        </div>
        <div class="form-box">
          <form
            id="contact-form"
            method="post"
            action="http://quickdevs.com/templates/agrom/contact.php"
          >
            <div class="messages"></div>
            <div class="controls">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input
                      id="form_name"
                      type="text"
                      name="name"
                      class="form-control customize"
                      placeholder="Name"
                      required="required"
                      data-error="Name is required."
                    />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input
                      id="form_email"
                      type="email"
                      name="email"
                      class="form-control customize"
                      placeholder="Email address"
                      required="required"
                      data-error="Valid email is required."
                    />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input
                      id="form_phone"
                      type="tel"
                      name="phone"
                      class="form-control customize"
                      placeholder="Please enter your phone"
                    />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea
                      id="form_message"
                      name="message"
                      class="form-control customize"
                      placeholder="Your message"
                      rows="5"
                      required="required"
                      data-error="Please,leave us a message."
                    ></textarea>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 contact-btn">
                  <p>
                    <input
                      type="submit"
                      class="btn btn-custom"
                      value="Send message"
                    />
                  </p>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!--CONTACT US END-->
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
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#products_table')
        .addClass( 'nowrap' )
        .dataTable( {
          responsive: true,
          columnDefs: [
              {
                  target: 4,
                  render: DataTable.render.number(null, null, 0, '₦ '),
              },
              {
                  targets: [4, 5],
                  className: 'dt-body-right'
              },
              {
                  targets: [0,2,3,4],
                  className: 'font-weight-bold'
              },
              {
                  "targets": [1], 
                  "render": function ( data, type, row ) {
                      return '<div class="table-description">'+data+'</div>';
                  }
              }    
          ]
        });
      });
    </script>
    <script src="<?= BASE_URL ?>/js/agrom.js"></script>
    <script src="<?= BASE_URL ?>/js/util.js"></script>
    <script src="<?= BASE_URL ?>/js/swipe-content.js"></script>
    <script src="<?= BASE_URL ?>/js/main.js"></script>
  </body>
</html>
