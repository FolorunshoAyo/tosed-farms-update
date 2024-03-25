<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- ==============================================
		TITLE AND META TAGS
		=============================================== -->
  <title><?= $data['action'] === "invoice"? "Invoice" : "Request for Quote" ?> Contact Details - Cart To Invoice | Tosed Farms</title>
  <meta name="keywords" content="livestock feeds, livestock drugs, poultry farming, livestock industry, poultry industry, animal health, animal nutrition, agriculture, farming, livestock products, poultry products, livestock brands, poultry brands, livestock feed brands, livestock drug brands" />
  <meta name="author" content="Aycodes" />
  <meta name="theme-color" content="#EEC344">
  <meta name="description" content="Discover our collection of high-quality livestock products from leading brands/manufacturers. Trusted by farmers and veterinarians for superior products and expertise in the livestock industry." />

  <!-- ==============================================
		FAVICON
		=============================================== -->
  <link rel="shortcut icon" href="<?= BASE_URL ?>/img/master/favicon.png">

  <!-- ==============================================
		CSS
		=============================================== -->
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/timeline.css" />
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/stylesheet.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/responsive.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/fonts/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/fonts/css/all.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/slick.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/owl.carousel.min.css">
  <link rel="stylesheet" href='<?= BASE_URL ?>/css/animation.aos.min.css'>
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/animate.min.css">
  <script src="<?= BASE_URL ?>/js/modernizr-custom.js"></script>
  <style>
    .just-validate-error-label{
      font-size: 12px;
      font-family: 'Poppins', sans-serif;
      color: red !important;
    }
    label {
      font-family: 'Poppins', sans-serif;
      font-size: 15px;
    }
    hr{
      border-top: 1px solid rgba(0,0,0,.1);
    }
    .badge{
      font-family: var(--font-primary);
    }
    .form-loader {
      width: 15px;
      height: 15px;
      border: 2px solid #f0f0f0;
      border-bottom-color: #04AA6D;
      border-radius: 50%;
      display: inline-block;
      vertical-align: middle;
      box-sizing: border-box;
      animation: rotation 1s linear infinite;
    }

    @keyframes rotation {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    } 
  </style>
</head>

<body>

  <!-- LOADER -->
  <div id="loader-wrapper">
    <div class="loader">
      <img src="<?= BASE_URL ?>/img/master/favicon.jpg" alt="loader image" width="80" height="80" />
    </div>
  </div>
  <!-- LOADER -->

  <!--HEADER START-->
  <?php
  include VIEW_PATH . "/home/components/header.php";
  ?>
  <!--HEADER END-->

  <div class="sections gallery-background">
    <div class="container">
      <div class="pages-title">
        <h1>Contact Details for <br> <span><?= $data['action'] === "invoice"? "Invoice" : "Request for Quote" ?></span></h1>
        <p><a href="<?= BASE_URL ?>/">Home</a> &nbsp; > &nbsp; <a href="<?= BASE_URL ?>/cart-to-invoice/cart">Cart</a> &nbsp; > &nbsp; Contact Details for Invoice</p>
      </div>
    </div>
  </div>

  <section>
    <div class="container">
      <div class="section-title">
        <h2><span>Contact Details</span></h2>
        <p>Please fill the following information to <?= $data['action'] === "invoice"? "generate invoice" : "request for quote" ?> for your order.</p>
      </div>
      <div class="row">
        <div class="col-xl-8 col-lg-8 mb-4">
          <!-- Checkout -->
          <div class="card shadow-0 border">
            <form id="invoice-contact-details-form" class="p-4" method="post" action="#">
              <h5 class="card-title mb-3">Generate <?= $data['action'] === "invoice"? "invoice" : "request for quote" ?></h5>
              <div class="row">
                <div class="col-6 mb-3">
                  <p class="mb-0">First name</p>
                  <div class="form-group">
                    <input type="text" id="first_name" name="first_name" placeholder="Type here" class="form-control customize" required="required" data-error="First Name is required."/>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-6">
                  <p class="mb-0">Last name</p>
                  <div class="form-group">
                    <input type="text" id="last_name" name="last_name" placeholder="Type here" class="form-control customize" required="required" data-error="Last Name is required."/>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-6 mb-3">
                  <p class="mb-0">Phone</p>
                  <div class="form-group">
                    <input type="tel" id="phone" name="phone" value="+234 " class="form-control customize" required="required" data-error="Phone Number is required."/>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-6 mb-3">
                  <p class="mb-0">Email</p>
                  <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="example@gmail.com" class="form-control customize" required="required" data-error="Email is required." />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>

              <hr class="my-4" />

              <!-- <h5 class="card-title mb-3">Shipping info</h5>
  
              <div class="row mb-3">
                <div class="col-lg-4 mb-3">
                    Default checked radio 
                  <div class="form-check h-100 border rounded-3">
                    <div class="p-3">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked />
                      <label class="form-check-label" for="flexRadioDefault1">
                        Express delivery <br />
                        <small class="text-muted">3-4 days via Fedex </small>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 mb-3">
                    Default radio 
                  <div class="form-check h-100 border rounded-3">
                    <div class="p-3">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" />
                      <label class="form-check-label" for="flexRadioDefault3">
                        Self pick-up <br />
                        <small class="text-muted">Come to our shop </small>
                      </label>
                    </div>
                  </div>
                </div>
              </div> -->

              <div class="row">
                <div class="col-sm-12 mb-3">
                  <p class="mb-0">Address</p>
                  <div class="form-group">
                    <input type="text" name="address" id="address" placeholder="Type here" class="form-control customize" required="required" data-error="Address is required." />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-sm-6 mb-3">
                  <p class="mb-0">State</p>
                  <select name="state" id="state" class="form-control customize" data-error="State is required.">
                    <option value="">Select State</option>
                    <option>Lagos</option>
                    <option>Anambra</option>
                  </select>
                  <div class="help-block with-errors"></div>
                </div>

                <div class="col-sm-6 mb-3">
                  <p class="mb-0">City</p>
                  <select name="city" id="city" class="form-control customize" data-error="City is required.">
                    <option value="">Select City</option>
                    <option>Ojota</option>
                    <option>Ikeja</option>
                  </select>
                  <div class="help-block with-errors"></div>
                </div>

                <!-- <div class="col-sm-4 col-6 mb-3">
                  <p class="mb-0">Postal code</p>
                  <div class="form-group">
                    <input type="text" id="pcode" class="form-control customize" />
                  </div>
                </div>

                <div class="col-sm-4 col-6 mb-3">
                  <p class="mb-0">Zip</p>
                  <div class="form-group">
                    <input type="text" id="zip" class="form-control customize" />
                  </div>
                </div> -->
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="saveContact" name="saveContact" />
                <label class="form-check-label" for="saveContact">Save this contact details</label>
              </div>

              <div class="mb-3">
                <p class="mb-0">Additional Notes</p>
                <div class="form-group">
                  <textarea class="form-control customize" name="additionalNotes" rows="5"></textarea>
                </div>
              </div>

              <div class="float-end">
                <a href="<?= BASE_URL ?>/cart-to-invoice/cart" class="btn btn-light btn-custom border">Cancel</a>
                <button type="submit" class="btn btn-success btn-custom border">Continue</button>
              </div>
            </form>
          </div>
          <!-- Checkout -->
        </div>
        <div class="col-xl-4 col-lg-4 d-flex justify-content-lg-end">
          <div class="ms-lg-4 mt-4 mt-lg-0" style="width: 100%">
            <h6 class="mb-3">Summary</h6>
            <div class="d-flex justify-content-between">
              <p class="mb-2">Total price:</p>
              <p class="mb-2">₦ <?= number_format($total_price, 0, '.', ',') ?></p>
            </div>
            <!-- <div class="d-flex justify-content-between">
              <p class="mb-2">Discount:</p>
              <p class="mb-2 text-danger">- $60.00</p>
            </div> -->
            <!-- <div class="d-flex justify-content-between">
              <p class="mb-2">Shipping cost:</p>
              <p class="mb-2">+ $14.00</p>
            </div> -->
            <!-- <hr />
            <div class="d-flex justify-content-between">
              <p class="mb-2">Total price:</p>
              <p class="mb-2 fw-bold">₦ 3,000</p>
            </div> -->

            <!-- <div class="input-group mt-3 mb-4">
              <input type="text" class="form-control customize border" name="" placeholder="Promo code" />
              <button class="btn btn-light text-primary border">Apply</button>
            </div> -->

            <hr />
            <h6 class="text-dark my-4">Items in cart</h6>
            <?php
              $count = 1;
              foreach ($products as $product) {
            ?>
            <div class="d-flex mb-4">
              <div class="mr-3">
                <span class="start-100 badge rounded-pill badge-secondary">
                  <?= $count ?>
                </span>
              </div>
              <div class="">
                <p class="mb-2">
                  <?= $product['name'] ?> X <?= $product['quantity'] ?><br />
                  <?php 
                    if(isset($product['unit'])){
                      echo "Weight: " . $product['weight'] . $product['unit'];
                    }
                    if(isset($product['net_weight'])){
                      echo "Net Weight: " . $product['net_weight'];
                    }
                  ?>
                </p>
                <p class="price text-muted">Total:  <?= $product['show_price']? "₦ " . number_format($product['total_price'], 0, '.', ',') : "" ?></p>
              </div>
            </div>
            <?php
                $count++;
              }
            ?>
          </div>
        </div>
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
                  <input id="form_name" type="text" name="name" class="form-control customize customize" placeholder="Name" required="required" data-error="Name is required." />
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <input id="form_email" type="email" name="email" class="form-control customize customize" placeholder="Email address" required="required" data-error="Valid email is required." />
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <input id="form_phone" type="tel" name="phone" class="form-control customize customize" placeholder="Please enter your phone" />
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <textarea id="form_message" name="message" class="form-control customize customize" placeholder="Your message" rows="5" required="required" data-error="Please,leave us a message."></textarea>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 contact-btn">
                <p>
                  <input type="submit" class="btn btn-custom" value="Send message" />
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
  <script src="<?= BASE_URL ?>/js/agrom.js"></script>
  <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
    <script>
        //FORM VALIDATION WITH VALIDATE.JS

        const validation = new JustValidate('#invoice-contact-details-form', {
            errorFieldCssClass: 'is-invalid',
        });

        validation
        .addField('#first_name', [
            {
                rule: 'required',
                errorMessage: "Field is required"
            },
            {
            rule: 'minLength',
            value: 3,
            },
            {
            rule: 'maxLength',
            value: 30,
            },
        ])
        .addField('#last_name', [
            {
                rule: 'required',
                errorMessage: "Field is required"
            },
            {
            rule: 'minLength',
            value: 3,
            },
            {
            rule: 'maxLength',
            value: 30,
            },
        ])
        .addField('#email', [
            {
            rule: 'required',
            errorMessage: 'Field is required',
            },
            {
            rule: 'email',
            errorMessage: 'Email is invalid!',
            },
        ])
        .addField('#phone', [
            {
                rule: 'required',
                errorMessage: "Field is required"
            },
            {
            rule: 'minLength',
            value: 11,
            },
            {
            rule: 'maxLength',
            value: 11,
            },
        ])
        .addField('#address', [
            {
                rule: 'required',
                errorMessage: "Field is required"
            },
        ])
        .addField('#state', [
            {
              rule: 'required',
              errorMessage: "Field is required"
            },
        ])
        .addField('#city', [
            {
              rule: 'required',
              errorMessage: "Field is required"
            },
        ])
        .onSuccess(() => {
          const form = $('#invoice-contact-details-form');

          var formData = form.serializeArray();

          var submittedData = {};

          $.each(formData, function(index, field) {
            submittedData[field.name] = field.value;
          });

          $.ajax({
            type: "POST",
            url: url,
            data: $(this).serialize(),
            beforeSend: function (){
              $("[type='submit']").attr("disabled", true);
              $("[type='submit']").hml("<span class='form-loader'></span>");
            },
            success: function (data)
            {
              var messageAlert = 'alert-' + data.type;
              var messageText = data.message;

              var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
              if (data.type === "danger" && data.message) {
                $('#invoice-contact-details-form').find('.messages').html(alertBox);
                $("[type='submit']").attr("disabled", false);
                $("[type='submit']").hml("Container");
              }else{
                // Check If user checked storing of address and keep in local storage and redirect to download invoice pdf 
                location.href = "";
              }
            }
          });
        });

        //SCRIPT TO FETCH ALL SCHOOLS ACCROSS ALL STATES IN NIGERIA
        // fetch("schools.json")
        //     .then(data => data.json())
        //     .then(result => {
        //         updateSelect(result);
        //     });

        // function updateSelect(schoolsObj) {
        //     let htmlOutput = "";

        //     htmlOutput += `<option value="">Select school</option>`;

        //     if (schoolsObj.length !== 0) {
        //         schoolsObj.forEach((schoolObj, index) => {
        //             const state = Object.keys(schoolObj)[0];
        //             htmlOutput += `<optgroup label="${state}">`;

        //             for (let schoolID in schoolObj[state]) {
        //                 htmlOutput += `<option>${schoolObj[state][schoolID].toLowerCase()}</option>`;
        //             }

        //             htmlOutput += `</optgroup>`;

        //         });
        //     }

        //     $("#school_name").html(htmlOutput);
        // }
    </script>
</body>

</html>