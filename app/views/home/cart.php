<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- ==============================================
		TITLE AND META TAGS
		=============================================== -->
    <title>Cart To Invoice | Tosed Farms</title>
    <meta name="keywords" content="livestock feeds, livestock drugs, poultry farming, livestock industry, poultry industry, animal health, animal nutrition, agriculture, farming, livestock products, poultry products, livestock brands, poultry brands, livestock feed brands, livestock drug brands" />
    <meta name="author" content="Aycodes" />
    <meta name="theme-color" content="#EEC344">
    <meta name="description" content="Generate an invoice from our collection of high-quality livestock products from leading brands/manufacturers. Trusted by farmers and veterinarians for superior products and expertise in the livestock industry." />

    <!-- ==============================================
		FAVICON
		=============================================== -->
    <link rel="shortcut icon" href="<?= BASE_URL ?>/img/master/favicon.png">

    <!-- ==============================================
		CSS
		=============================================== -->

    <link rel="stylesheet" href="<?= BASE_URL ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/select2.min.css">
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
        #cart-section .overlay{
            position: absolute;
            inset: 0px;
            background-color: #f0f5f5ab;
            opacity: 0;
            z-index: 2;
            visibility: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity .5s ease-in;
        }

        #cart-section .overlay.act{
            opacity: 1;
            visibility: visible;
        }

        .cart-spinner {
            width: 48px;
            height: 48px;
            border: 5px solid #FFF;
            border-bottom-color: #04AA6D;
            border-radius: 50%;
            display: inline-block;
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

        label {
            font-family: var(--font-primary);
            font-size: 15px;
        }

        hr{
            border-top: 1px solid rgba(0,0,0,.1);
        }

        strong{
            font-weight: bold;
        }

        #products p{
            color: #343a40;
            font-size: 0.8rem;
        }

        #productTotal{
            font-size: 1rem;
        }

        .alert.alert-dismissable{
            margin-bottom: 0.5rem;
            font-family: var(--font-primary);
            font-size: 16px; 
        }

        .select2-container {
            display: block;
            font-family: var(--font-primary);
            font-size: 18px;
        }

        .select2-container .select2-selection--single {
            outline: 0;
            display: block;
            width: 100%;
            height: calc(2.25rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #f0f5f5;
            background-clip: padding-box;
            border: none;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            margin: 5px 0px;
            transition: 0.6s;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            line-height: 36px;
            padding-left: 12px;
            color: #6c757d
        }

        .select2-container .select2-selection--single .select2-selection__arrow {
            height: 34px;
            width: 34px;
            top: 10px;
            right: 3px
        }

        .select2-container .select2-selection--single .select2-selection__arrow b {
            border-color: #6c757d transparent transparent transparent;
            border-width: 6px 6px 0 6px
        }

        .select2-container--open .select2-selection--single .select2-selection__arrow b {
            border-color: transparent transparent #6c757d transparent !important;
            border-width: 0 6px 6px 6px !important
        }

        .select2-results__option {
            padding: 6px 12px
        }

        .select2-dropdown {
            border: #dee2e6;
            background-color: #fff;
            -webkit-box-shadow: 0 0 25px 0 rgba(73, 80, 87, .1);
            box-shadow: 0 0 25px 0 rgba(73, 80, 87, .1)
        }

        .select2-container--default .select2-search--dropdown {
            padding: 10px;
            background-color: #fff
        }

        .select2-container--default .select2-search--dropdown .select2-search__field {
            border: 1px solid #dee2e6;
            background-color: #fff;
            color: #6c757d;
            outline: 0
        }

        .select2-container--default .select2-results__group {
            font-weight: 600
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #04AA6D
        }

        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: #f9f9f9;
            color: #16181b
        }

        .select2-container--default .select2-results__option[aria-selected=true]:hover {
            background-color: #04AA6D;
            color: #fff
        }

        .select2-container .select2-selection--multiple {
            min-height: 38px;
            background-color: #fff;
            border: 1px solid #dee2e6 !important
        }

        .select2-container .select2-selection--multiple .select2-selection__rendered {
            padding: 1px 10px
        }

        .select2-container .select2-selection--multiple .select2-search__field {
            border: 0;
            color: #6c757d
        }

        .select2-container .select2-selection--multiple .select2-search__field::-webkit-input-placeholder {
            color: #6c757d
        }

        .select2-container .select2-selection--multiple .select2-search__field::-moz-placeholder {
            color: #6c757d
        }

        .select2-container .select2-selection--multiple .select2-search__field:-ms-input-placeholder {
            color: #6c757d
        }

        .select2-container .select2-selection--multiple .select2-search__field::-ms-input-placeholder {
            color: #6c757d
        }

        .select2-container .select2-selection--multiple .select2-search__field::placeholder {
            color: #6c757d
        }

        .select2-container .select2-selection--multiple .select2-selection__choice {
            background-color: #04AA6D;
            border: none;
            color: #fff;
            border-radius: 3px;
            padding: 0 7px;
            margin-top: 7px
        }

        .select2-container .select2-selection--multiple .select2-selection__choice__remove {
            color: #fff;
            margin-right: 5px
        }

        .select2-container .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: #fff
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
                <h1><span>Cart To Invoice</span></h1>
                <p><a href="<?= BASE_URL ?>/">Home</a> &nbsp; > &nbsp; Cart TO Invoice</p>
            </div>
        </div>
    </div>

    <section id="cart-section">
        <div class="container">
            <div class="section-title">
                <h2><span>Cart</span></h2>
                <p>You can add a new product by clicking the add button</p>
            </div>
            <div class="py-2">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="overlay">
                                <span class="cart-spinner"></span>
                            </div>
                            <div class="card-header py-3">
                                <h5 class="mb-0">Cart - <span id="cartNumber">0</span> item(s)</h5>
                            </div>
                            <div id="products" class="card-body">
                                <!-- <div class="row">
                                        <div class="col-md-8 mb-4 mb-lg-0">
                                            <p><strong>Blue denim shirt</strong></p>
                                            <p>Weight: 100kg</p>
                                            <button type="button" class="btn btn-warning btn-sm mb-2 text-white" title="Edit Product">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm me-1 mb-2" title="Trash Product">
                                                Delete
                                            </button>
                                        </div>
                        
                                        <div class="col-md-4 mb-4 mb-lg-0">   
                                            <p class="mb-4 text-start text-md-center">
                                                <strong>Qty: 2</strong>
                                            </p>
                                            <p class="text-start text-md-center">
                                                <strong>₦5,000</strong>
                                            </p>
                                        </div>
                                    </div>
                                    <hr class="my-4" /> -->
                            </div>
                            <div class="card-footer d-flex flex-wrap align-items-center justify-content-between p-2">
                                <p id="totalPrice" class="mb-1 mb-sm-0 text-dark" style="font-size: 18px;">Total: ₦ <strong>0.00</strong></p>
                                <div>
                                    <button class="mr-1 mb-1 mb-sm-0  btn btn-custom btn-success" onclick="openModal()">Add Product</button>
                                    <button class="btn btn-custom mr-1 mb-1 mb-sm-0" onclick="printInvoice()">Print Invoice</button>
                                    <button class="mb-1 mb-sm-0 btn btn-custom btn-secondary" onclick="RFQ()">Request Quote</button>
                                </div>
                            </div>
                        </div>
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
                                    <input id="form_name" type="text" name="name" class="form-control customize" placeholder="Name" required="required" data-error="Name is required." />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="form_email" type="email" name="email" class="form-control customize" placeholder="Email address" required="required" data-error="Valid email is required." />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="form_phone" type="tel" name="phone" class="form-control customize" placeholder="Please enter your phone" />
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

    <!-- Add Modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="error-message"></div>
                    <div class="form-group">
                        <label for="productName">Select Product:</label>

                        <select class="d-block p-4 form-control" id="product" onchange="populateModalForm()">
                            <!-- Product Options would dynamically be added here -->
                        </select>
                    </div>
                    <div id="modalForm"></div>
                    <p class="mt-3 mx-2 font-weight-bold font-22 text-right" id="productTotal"></p>
                </div>
                <div class="modal-footer">
                    <button id="add-btn" type="button" class="btn btn-custom btn-success" onclick="addProductFromModal()">Add Product</button>
                    <!-- <button id="edit-btn" type="button" class="btn btn-warning d-none" onclick="editProductFromModal()">Edit</button> -->
                </div>
            </div>
        </div>
    </div>

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
    <script src="<?= BASE_URL ?>/js/select2.min.js"></script>
    <script>
        // Fetch Products From Local Storage
        $("#product").select2();
        let productsData = [];
        let optgroupMap = {};
        let selectedProducts = [];

        function storeSelectedProducts(selectedProducts) {
            if (selectedProducts.length === 0) {
                localStorage.removeItem("cart");
            } else {
                localStorage.setItem("cart", JSON.stringify(selectedProducts));
            }
        };


        // After ajax call
        initiateApp();

        function initiateApp(){
            $.ajax({
                type: "GET",
                url: "http://localhost/tosed-farms/all-products",
                success: function (data)
                {
                    var data = JSON.parse(data);
                    var messageAlert = 'alert-' + data.status;
                    var products = data.products;
                    
                    if (messageAlert === "danger" && products) {
                        var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Unable to fetch products please try again</div>';
                        $el.find('.messages').html(alertBox);
                        $el[0].reset();
                    }else{
                        productsData = data.products;
                        // console.log(productsData);
                        populateProductList();
                        getSelectedProducts();
                    }
                },
                error: function (data){
                    // Set a timeout over;lay for refreshing page
                }
            });
        }

        function printInvoice(){
            if(selectedProducts.length > 0){
                var data = {selectedProducts};

                $.ajax({
                    type: "POST",
                    url: "http://localhost/tosed-farms/cart/checkout",
                    data: data,
                    beforeSend: function(){
                        $("#cart-section .overlay").addClass("act");
                    },
                    success: function (data)
                    {
                        var data = JSON.parse(data);
                        var messageAlert = 'alert-' + data.status;
                        var products = data.products;
                        
                        if (messageAlert === "danger" && products) {
                            // var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Unable to fetch products please try again</div>';
                            // $el.find('.messages').html(alertBox);
                            alert("Unable to process request");
                        }else{
                            location.href = "<?= BASE_URL ?>/request?action=invoice";
                        }
                    },
                    error: function (data){
                        // Set a timeout over;lay for refreshing page
                    }
                });
            }else{
                alert("You need to add at least one product to cart");
            }
        }

        function RFQ(){
            if(selectedProducts.length > 0){
                var data = {selectedProducts};

                $.ajax({
                    type: "POST",
                    url: "http://localhost/tosed-farms/cart/checkout",
                    data: data,
                    beforeSend: function(){
                        $("#cart-section .overlay").addClass("act");
                    },
                    success: function (data)
                    {
                        var data = JSON.parse(data);
                        var messageAlert = 'alert-' + data.status;
                        var products = data.products;
                        
                        if (messageAlert === "danger" && products) {
                            // var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Unable to fetch products please try again</div>';
                            // $el.find('.messages').html(alertBox);
                            alert("Unable to process request");
                        }else{
                            location.href = "<?= BASE_URL ?>/request?action=quote";
                        }
                    },
                    error: function (data){
                        // Set a timeout over;lay for refreshing page
                    }
                });
            }else{
                alert("You need to add at least one product to cart");
            }
        }

        function getSelectedProducts() {
            if (localStorage.getItem("cart") !== null) {
                // There is saved cart
                selectedProducts = JSON.parse(localStorage.getItem("cart"));
                renderSelectedProducts();
            } else {
                // No saved cart
                document.getElementById("cartNumber").innerText = selectedProducts.length;
                document.getElementById("products").innerHTML = `<div class="h-100 w-100 d-flex align-items-center justify-content-center"> <p>No products in this cart.</p></div>`
            }

            // Remove preloader in this area
        }

        // Populate the product datalist
        function populateProductList() {
            const productList = document.getElementById("product");
            const option = document.createElement("option");
            option.value = "";
            option.innerHTML = "Select Product";
            productList.appendChild(option);

            productsData.forEach(product => {
                if (!optgroupMap[product.category]) {
                    var optgroup = document.createElement("optgroup");
                    switch (product.category) {
                        case "poultry":
                            optgroup.label = "Poultry Feeds";       
                            break;
                        case "fish":
                            optgroup.label = "Fish Feeds";       
                            break;
                        case "drug":
                            optgroup.label = "Veterinary Products";       
                            break;
                        case "additive":
                            optgroup.label = "Feed Additives";       
                            break;
                        case "ingredient":
                            optgroup.label = "Feed Ingredients";       
                            break;
                        case "miscellaneous":
                            optgroup.label = "Miscellaneous";       
                            break;
                    }
                    optgroupMap[product.category] = optgroup;
                    productList.appendChild(optgroup);
                }
                const option = document.createElement("option");
                option.value = product.id;
                option.innerHTML = product.name + (product.show_price? (product.unit ? ' (₦' + parseInt(product.price).toLocaleString() + ' per ' + (product.unit === 'g' ? '100g' : '1kg') + ')' : ' (₦' + parseInt(product.price).toLocaleString() + ')') : '') + (product.category !== 'miscellaneous' && product.type !== "unbranded"? ' (' + product.net_weight + ')' : '');
                // Append the option to the corresponding optgroup
                optgroupMap[product.category].appendChild(option);
            });
        }

        // Function to populate the modal form based on selected product
        function populateModalForm() {
            $(".modal-title").text("Add Product");
            const selectedProductId = document.getElementById("product").value;
            document.getElementById("productTotal").innerHTML = "";

            if (selectedProductId !== "") {
                const product = productsData.find(prod => prod.id == selectedProductId);
                let modalFormHTML = "";
                if (product.unit) {
                    const minInput = product.unit === "g" ? 100 : 1;
                    modalFormHTML += `<label for='productWeight'>Enter Product Weight in (${product.unit === "g"? "grams" : "kilograms"}):</label>`;
                    modalFormHTML += `<input type="number" class="form-control customize" id="productWeight" min="${minInput}" step="${minInput}" ${product.show_price? "onkeyup='calculateSingleProductTotal()'" : ""} required>`;
                }

                modalFormHTML += "<label for='productQuantity'>Enter Quantity:</label>";
                modalFormHTML += `<input type="number" class="form-control customize" id="productQuantity" ${product.show_price? "onkeyup='calculateSingleProductTotal()'" : ""} required>`;

                document.getElementById("modalForm").innerHTML = modalFormHTML;
            } else {
                document.getElementById("modalForm").innerHTML = "";
                document.getElementById("productTotal").innerHTML = "";
            }

        }

        function calculateSingleProductTotal() {
            // Calculate price as user enters product quantity or weight
            const product = productsData.find(prod => prod.id == document.getElementById("product").value);
            const productTotal = document.getElementById("productTotal");
            const productWeight = document.getElementById("productWeight");
            const productQuantity = document.getElementById("productQuantity");

            if (product.unit) {
                if ((!isNaN(productWeight.value) && productWeight.value > 0) && (!isNaN(productQuantity.value) && productQuantity.value > 0)) {
                    // Both Product Weight and Quantity Calculation
                    const result = ((parseFloat(productWeight.value / (product.unit === "g" ? 100 : 1)) * parseFloat(product.price)) * parseFloat(productQuantity.value));
                    productTotal.innerHTML = "NGN " + result.toLocaleString();
                } else {
                    productTotal.innerHTML = "";
                }
            } else {
                if (!isNaN(productQuantity.value) && productQuantity.value > 0) {
                    // Only Product Quantity
                    const result = (parseFloat(product.price) * parseFloat(productQuantity.value));
                    productTotal.innerHTML = "NGN " + result.toLocaleString();
                } else {
                    productTotal.innerHTML = "";
                }
            }
        }

        // Function to open the modal
        function openModal() {
            // $(".modal-footer #add-btn").removeClass( "d-none" ).addClass( "d-inline-block" );
            // $(".modal-footer #edit-btn").removeClass( "d-inline-block" ).addClass( "d-none" );
            //Reset select input and price update back to default
            // $("#product").prop("disabled", false);
            // $("#product").val("").trigger("change");
            $('#myModal').modal('show');
        }

        // Function to add a product from the modal
        function addProductFromModal() {
            const selectedProduct = document.getElementById("product");

            const selectedProductDetails = {};

            if (!selectedProduct.value) {
                var alertBox = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Please Select a Product </div>';
                $('.error-message').html(alertBox);
            } else {
                const selectedProductId = selectedProduct.value;
                const product = productsData.find(prod => prod.id == selectedProductId);
                const selectedProductQuantity = parseFloat(document.getElementById("productQuantity").value);

                if (product.unit) {
                    const selectedProductWeight = parseInt(document.getElementById("productWeight").value);
                    if (!(!isNaN(selectedProductWeight) && selectedProductWeight > (product.unit === "g" ? 99 : 0))) {
                        var alertBox = `<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Invalid Weight (Minimum ${product.unit === "g"? "100g" : "1kg"} and above)</div>`;
                        $('.error-message').html(alertBox);
                        return;
                    } else {
                        selectedProductDetails.unit = product.unit;
                        selectedProductDetails.weight = selectedProductWeight;
                        selectedProductDetails.total_price = product.show_price? ((parseFloat(selectedProductWeight / (product.unit === "g" ? 100 : 1)) * parseFloat(product.price)) * parseFloat(selectedProductQuantity)) : 0;
                    }
                }

                if (!isNaN(selectedProductQuantity) && selectedProductQuantity > 0) {
                    selectedProductDetails.id = product.id;
                    selectedProductDetails.product_id = product.product_id;
                    selectedProductDetails.name = product.name;
                    selectedProductDetails.quantity = selectedProductQuantity;
                    selectedProductDetails.type = product.type;
                    selectedProductDetails.single_price = product.price;
                    selectedProductDetails.category = product.category;
                    selectedProductDetails.show_price = product.show_price;

                    if(product.net_weight){
                        selectedProductDetails.net_weight = product.net_weight;
                    }

                    // check if products exists in the selectedProducts Array and update
                    const matchingProductsIndexes = selectedProducts.map((product, index) => [product, index]).filter(details => details[0].id === selectedProductDetails.id).map(details => details[1]);

                    if (matchingProductsIndexes.length > 0) {
                        for (const findProductsIndex of matchingProductsIndexes) {
                            if (selectedProductDetails.unit) {
                                if (selectedProducts[findProductsIndex].weight === selectedProductDetails.weight) {
                                    // selected product has the same weight with an existing product
                                    selectedProducts[findProductsIndex].total_price = selectedProducts[findProductsIndex].total_price + selectedProductDetails.total_price;
                                    selectedProducts[findProductsIndex].quantity = selectedProducts[findProductsIndex].quantity + selectedProductDetails.quantity;
                                }

                                if (selectedProducts[findProductsIndex].weight !== selectedProductDetails.weight) {
                                    let productWithSimilarWeightExists = false;

                                    for (const findProductsIndex of matchingProductsIndexes) {
                                        if (selectedProducts[findProductsIndex].weight === selectedProductDetails.weight) {
                                            productWithSimilarWeightExists = true;
                                        }
                                    }

                                    if (!productWithSimilarWeightExists) {
                                        selectedProducts.push(selectedProductDetails);
                                    }
                                }
                            }

                            if (!selectedProducts[findProductsIndex].unit) {
                                // selected product does not have unit
                                selectedProducts[findProductsIndex].total_price = selectedProducts[findProductsIndex].total_price + selectedProductDetails.total_price;
                                selectedProducts[findProductsIndex].quantity = selectedProducts[findProductsIndex].quantity + selectedProductDetails.quantity;
                            }
                        }
                    } else {
                        selectedProducts.push(selectedProductDetails);
                    }
                    console.log(selectedProducts);
                    storeSelectedProducts(selectedProducts);
                    getSelectedProducts();
                    calculateTotal();
                    $('.error-message').html("");
                    $('#myModal').modal('hide');
                } else {
                    var alertBox = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Invalid Quantity </div>';
                    $('.error-message').html(alertBox);
                    return;
                }

                // Clear input fields and close modal
                $('#product').val("").trigger("change");
                document.getElementById("modalForm").innerHTML = "";
                document.getElementById("productTotal").innerHTML = "";
            }
        }

        // Function to render selected products
        function renderSelectedProducts() {
            const productsContainer = document.getElementById("products");
            document.getElementById("cartNumber").innerText = selectedProducts.length;
            productsContainer.innerHTML = "";

            // console.log(selectedProducts);

            // Should be {id: number, quantity: number, weight: number (in g or kg), type: 'unbranded', category: 'miscellaneous', total_price: number }
            let productIndex = 0;
            for (let product of selectedProducts) {
                productsContainer.innerHTML +=
                    `<div class="row text-dark">
                        <div class="col-6 mb-4 mb-sm-0">
                            <h5 class="mb-1">${product.name}</h5>
                            ${product.show_price? `<p class="mb-1">Price: ₦ ${parseFloat(product.single_price).toLocaleString()} ${product.unit? `per ${product.unit === "g"? "100g" : " 1kg"}` : "" }</p>` : ""}
                            ${product.weight? `<p class="mb-1">Weight: ${product.weight + product.unit}</p>` : ''}
                            ${product.net_weight? `<p class="mb-1">Net Weight: ${product.net_weight}</p>` : ''}
                            <button type="button" class="btn btn-custom btn-danger btn-sm me-1 mb-2" title="Trash Product" onclick="deleteProduct('${productIndex}')">
                                Delete
                            </button>
                        </div>

                        <div class="col-6 mb-4 mb-sm-0 text-right">   
                            <p class="mb-2">
                                Qty: ${product.quantity}
                            </p>
                            <p>
                                Total: <strong>${product.show_price? "₦ " + product.total_price.toLocaleString() : "Call For Pricing" }</strong>
                            </p>
                        </div>
                    </div>
                    <hr class="my-4" />`;
                productIndex++;
            }

            calculateTotal();
        }

        // Function to edit a selected product
        // function editProduct(productIndex) {
        //     $(".modal-title").text("Edit Product");           

        //     $(".modal-footer #add-btn").removeClass( "d-inline-block" ).addClass( "d-none" );
        //     $(".modal-footer #edit-btn").removeClass( "d-none" ).addClass( "d-inline-block" );

        //     const product = selectedProducts[productIndex];
        //     const selectedProduct = document.getElementById("product");
        //     // update selected product
        //     $('#product').val(product.id.toString()).trigger('change');
        //     $('#product').prop('disabled', true);
        //     document.getElementById("productTotal").innerHTML = "₦ " + product.total_price.toLocaleString();

        //     let modalFormHTML = "";
        //     if (product.unit) {
        //         const minInput = product.unit === "g" ? 100 : 1;
        //         modalFormHTML += `<label for='productWeight'>Enter Product Weight in (${product.unit === "g"? "grams" : "kilograms"}):</label>`;
        //         modalFormHTML += `<input type="number" class="form-control" id="productWeight" min="${minInput}" step="${minInput}" value="${product.weight}" onkeyup="calculateSingleProductTotal()" required>`;
        //     }

        //     modalFormHTML += "<label for='productQuantity'>Enter Quantity:</label>";
        //     modalFormHTML += `<input type="number" class="form-control" id="productQuantity" value="${product.quantity}" onkeyup="calculateSingleProductTotal()" required>`;

        //     document.getElementById("modalForm").innerHTML = modalFormHTML;

        //     $("#myModal").modal("show");
        // }

        // function editProductFromModal(){
        //     const selectedProduct = document.getElementById("product");

        //     if(!selectedProduct.value){
        //         var alertBox = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Please Select a Product </div>';
        //         $('.error-message').html(alertBox);
        //     }else{
        //         const selectedProductId = selectedProduct.value;
        //         const product = productsData.find(prod => prod.id == selectedProductId);
        //         const selectedProductQuantity = parseFloat(document.getElementById("productQuantity").value);
        //         const productUpdateData = {};

        //         if(product.unit){
        //             const selectedProductWeight = parseInt(document.getElementById("productWeight").value);
        //             if (!(!isNaN(selectedProductWeight) && selectedProductWeight > 0)) {
        //                 var alertBox = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Invalid Weight </div>';
        //                 $('.error-message').html(alertBox);
        //                 return;
        //             }else{
        //                 productUpdateData.unit = product.unit;
        //                 productUpdateData.weight = selectedProductWeight;
        //                 productUpdateData.total_price = ((parseFloat(selectedProductWeight / (product.unit === "g"? 100 : 1)) * parseFloat(product.price)) * parseFloat(selectedProductQuantity))
        //             }
        //         }

        //         if (!isNaN(selectedProductQuantity) && selectedProductQuantity > 0) {
        //             productUpdateData.quantity = selectedProductQuantity;
        //             productUpdateData.total_price = productUpdateData.total_price? productUpdateData.total_price : selectedProductQuantity * product.price;

        //             // const productIndex = selectedProducts.findIndex(function(product) {
        //             //     return product.id == selectedProductId;
        //             // });

        //             // for(const property in productUpdateData){
        //             //     selectedProducts[productIndex][property] = productUpdateData[property]; 
        //             // }                  
        //             storeSelectedProducts(selectedProducts);  
        //             calculateTotal();
        //             $('.error-message').html("");
        //             $('#myModal').modal('hide');
        //         } else {
        //             var alertBox = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Invalid Quantity </div>';
        //             $('.error-message').html(alertBox);
        //             return;
        //         }

        //         // Clear input fields and close modal
        //         document.getElementById("product").value = "";
        //         document.getElementById("modalForm").innerHTML = "";
        //     }
        // }

        // Function to delete a selected product

        function deleteProduct(productIndex) {
            if (confirm("Are you sure you want to delete this item?")) {
                selectedProducts.splice(productIndex, 1);
            }

            storeSelectedProducts(selectedProducts);
            getSelectedProducts();
            calculateTotal();
        }

        // Function to calculate total price
        function calculateTotal() {
            let totalPrice = 0;
            for (const product of selectedProducts) {
                totalPrice += product.total_price;
            }
            document.getElementById("totalPrice").innerHTML = `Total Price: <strong>₦ ${totalPrice === 0? "0.00" : totalPrice.toLocaleString()}</strong>`;
        }
    </script>
</body>

</html>